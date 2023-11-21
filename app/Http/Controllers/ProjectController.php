<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kozijnen;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        $projects = Project::all();

        return view('projects/index', compact('projects'));
    }
    public function store(Request $request)
{
    $formFields = $request->validate([
        'KlantNaam' => 'required',
        'ProjectAdres' => 'required',
        'Email' => ['required', 'email'],
    ]);

    $project = Project::create($formFields);

    $attributes = Kozijnen::all();
    $attributeValues = $request->except(['_token', 'KlantNaam', 'ProjectAdres', 'Email']);

    foreach ($attributes as $attribute) {
        $value = $attributeValues[$attribute->kozijn] ?? null;
        $project->kozijnen()->attach($attribute->id, ['value' => $value]);
    }

    return redirect('/')->with('message', 'Project created successfully!');
}
    public function show(Project $project){
        $kozijnen = $project->kozijnen;
        $akkoord = $project->akkoord;
        $info = $project->info;
        return view('projects/show', compact('kozijnen','project','info','akkoord'));
    }

    public function create(Request $request){
        $kozijnen = Kozijnen::all();


        $attributes = array();
        foreach( $kozijnen as $koz) {
            array_push($attributes, Kozijnen::find($koz->id)->attributes);
        }

        return view('projects.create', compact('kozijnen', 'attributes'));
    }

    public function edit(Project $project)
    {
        $kozijnen1 = Kozijnen::all();
        $attributes = array();
        foreach($kozijnen1 as $koz) {
            array_push($attributes, Kozijnen::find($koz->id)->attributes);
        }
        $kozijnen = $project->kozijnen;
        return view('projects/edit', compact('kozijnen','project','attributes'));
    }

    public function update(Request $request, Project $project) {
        $formFields = $request->validate([
            'KlantNaam' => 'required',
            'ProjectAdres' => 'required',
            'Email' => ['required', 'email'],
            '*' => 'required',
        ]);
        $project->update($formFields);

        return redirect('/')->with('message', 'Project updated successfully!');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect('/')->with('message', 'Project deleted successfully');
    }
    



    
}
