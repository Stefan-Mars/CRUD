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
    public function store(Request $request){
        $formFields = $request->validate([
            'KlantNaam' => 'required',
            'ProjectAdres' => 'required',
            'Email' => ['required', 'email'],
            '*' => 'required',
        ]);
        Project::create($formFields);

        return redirect('/')->with('message', 'Project created successfully!');
    }
    public function show(Project $project){
        $kozijnen = Kozijnen::all();
        return view('projects/show', compact('kozijnen','project'));
    }

    public function create(Request $request){
        $attributes = Attributes::all();
        $kozijnen = Kozijnen::all();
        return view('projects/create', compact('kozijnen','attributes'));
    }

    public function edit(Project $project)
    {
        $attributes = Attributes::all();
        $kozijnen = Kozijnen::all();
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
