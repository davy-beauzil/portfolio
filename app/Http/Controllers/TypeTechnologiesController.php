<?php

namespace App\Http\Controllers;

use App\Models\technology;
use App\Models\TypeTechnologies;
use App\Models\typeTechnologies as ModelsTypeTechnologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class TypeTechnologiesController extends Controller
{

    public function index(){

        return Inertia::render('TechnologiesAdmin', ['types' => TypeTechnologies::all(), 'technologies' => technology::all()]);

    }

    public function store(Request $request){

        $type = new TypeTechnologies();
        $type->name = $request->input('name');
        $saved = $type->save();

        if($saved){
            return Redirect::route('admin.technologies', ['message' => 'Le type de technologie a bien été enregistré', 'class' => 'success', 'types' => TypeTechnologies::all()]);
        }else {
            return Redirect::route('admin.technologies', ['message' => 'Une erreur est survenue lors de l\'enregistrement du type de technologie', 'class' => 'danger', 'types' => TypeTechnologies::all()]);
        }

    }

    public function update(Request $request){

        $type = TypeTechnologies::find($request->id);
        $type->name = $request->name;
        $saved = $type->save();

        if($saved){
            return Redirect::route('admin.technologies', ['message' => 'Le type de technologie a bien été mis à jour', 'class' => 'success', 'types' => TypeTechnologies::all()]);
        }else {
            return Redirect::route('admin.technologies', ['message' => 'Une erreur est survenue lors de la modification du type de technologie', 'class' => 'danger', 'types' => TypeTechnologies::all()]);
        }

    }

    public function delete(Request $request){

        $type = TypeTechnologies::find($request->id);
        $deleted = $type->delete();

        if($deleted){
            return Redirect::route('admin.technologies', ['message' => 'Le type de technologie a bien été supprimé', 'class' => 'success', 'types' => TypeTechnologies::all()]);
        }else {
            return Redirect::route('admin.technologies', ['message' => 'Une erreur est survenue lors de la suppression du type de technologie', 'class' => 'danger', 'types' => TypeTechnologies::all()]);
        }

    }
}
