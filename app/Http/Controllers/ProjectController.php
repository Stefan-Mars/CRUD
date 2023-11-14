<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kozijnen;
use App\Models\Attributes;
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
        // Other validation rules for your form fields
    ]);

    // Create a new project and retrieve its ID
    $project = Project::create($formFields);
    $projectId = $project->id;

    // Update Kozijnen records with the project_id
    $kozijnenRecords = Kozijnen::all();
    foreach ($kozijnenRecords as $kozijn) {
        $kozijn->project_id = $projectId;
        $kozijn->save(['timestamps' => false]);
    }

    return redirect('/')->with('message', 'Project created successfully!');
}
    public function show(Project $project){
        $kozijnen = Kozijnen::all();
        return view('projects/show', compact('kozijnen','project'));
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
        $kozijnen = Kozijnen::all();
        $attributes = array();
        foreach($kozijnen as $koz) {
            array_push($attributes, Kozijnen::find($koz->id)->attributes);
        }
        
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
