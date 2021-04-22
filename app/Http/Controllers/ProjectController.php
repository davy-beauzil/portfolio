<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\project as ModelsProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index(){
        return Inertia::render('Portfolio/Portfolio', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,

            'projects' => $this->getAllProjects()
        ]);
    }

    public function store(Request $request){
        
        Validator::make($request->all(),
            ['image'=>"required|file|image|mimes:jpg,png,jpeg,gif"])->validate();
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->visible = $request->visible;
        $project->content_html = $request->content_html;
        if($request->hasFile('image')){
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->extension();
            $request->file('image')->move(public_path('/img/portfolio'), $filename);
            $project->image = $filename;
        }
        $saved = $project->save();

        if($saved){
            return Redirect::route('admin.portfolio', ['message' => 'Le projet a bien été créé', 'class' => 'success']);
        }else{
            return Redirect::route('admin.portfolio', ['message' => 'Une erreur est survenue lors de la création du projet', 'class' => 'danger']);
        }
    }

    public function uploadImage(Request $request){

        if($request->hasFile('file')){
            $file = $request->file('file');
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path('/img/portfolio'), $imageName);
            $result = ['location' => $imageName];
            return json_encode($result);
        }
    }

    public function getAllProjects(){
        $projects = ModelsProject::where('projects.visible', true)->get();
        return $projects;
    }

    public function indexProject($id){
        $project = ModelsProject::where('projects.id', '=', $id)->get();
        if($project){
            return Inertia::render('Portfolio/Project', ['project' => $project]);
        }else{
            return Redirect::route('portfolio', ['message' => 'La page sur laquelle vous souhaitez aller n\'existe pas ou plus.', 'class' => 'danger']);
        }
    }
}
