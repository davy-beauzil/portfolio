<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\technology;
use App\Models\typeTechnologies;
use Illuminate\Support\Facades\Redirect;

class TechnologyController extends Controller
{
    public function store(Request $request){
        
        $technology = new technology();

        $technology->name = $request->input('name');
        $technology->level = $request->input('level');
        $technology->fontAwesomeClass = $request->input('icon');
        if($request->input('visible')){
            $technology->visible = $request->input('visible');
        }else {
            $technology->visible = false;
        }
        $technology->type_id = $request->input('type_id');
        $saved = $technology->save();

        if($saved){
            return Redirect::route('admin.technologies', ['message' => 'La technologie a bien été enregistrée', 'class' => 'success', 'types' => TypeTechnologies::all()]);
        }else {
            return Redirect::route('admin.technologies', ['message' => 'Une erreur est survenue lors de l\'enregistrement de la technologie', 'class' => 'danger', 'types' => TypeTechnologies::all()]);
        }
    }

    public function getMastered(){

        $mastered = technology::join('type_technologies', 'technologies.type_id', '=', 'type_technologies.id')
            ->select('technologies.*', 'type_technologies.*')
            ->where('technologies.visible', true)
            ->where('technologies.level', '>', 50)
            ->get();
        
        return $mastered;

    }

    public function getNotMastered(){

        $notMastered = technology::join('type_technologies', 'technologies.type_id', '=', 'type_technologies.id')
            ->select('technologies.*', 'type_technologies.*')
            ->where('technologies.visible', true)
            ->where('technologies.level', '<', 50)
            ->get();
        
        return $notMastered;

    }

    public function update(Request $request){

        $technology = technology::find($request->id);
        $technology->name = $request->name;
        $technology->level = $request->level;
        $technology->fontAwesomeClass = $request->icon;
        $technology->visible = $request->visible;
        $technology->type_id = $request->type_id;

        $saved = $technology->save();
        
        if($saved){
            return Redirect::route('admin.technologies', ['message' => 'La technologie a bien été mise à jour', 'class' => 'success', 'types' => TypeTechnologies::all()]);
        }else{
            return Redirect::route('admin.technologies', ['message' => 'Une erreur est survenue lors de la modification de la technologie', 'class' => 'danger', 'types' => TypeTechnologies::all()]);
        }

    }

    public function delete(Request $request){

        $technology = technology::find($request->id);
        $deleted = $technology->delete();
        
        if($deleted){
            return Redirect::route('admin.technologies', ['message' => 'La technologie a bien été supprimée', 'class' => 'success', 'types' => TypeTechnologies::all()]);
        }else{
            return Redirect::route('admin.technologies', ['message' => 'Une erreur est survenue lors de la suppression de la technologie', 'class' => 'danger', 'types' => TypeTechnologies::all()]);
        }

    }
}
