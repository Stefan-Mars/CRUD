<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kozijnen;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
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

        if ($attributeValues) {
            foreach ($attributes as $attribute) {
                $value = $attributeValues[$attribute->kozijn] ?? null;
                $extraInfo = $attributeValues['extra' . $attribute->kozijn] ?? null;
                $project->kozijnen()->attach($attribute->id, ['value' => $value, 'extraInfo' => $extraInfo]);
            }
        }

        return redirect('/')->with('message', 'Project created successfully!');
    }
    public function show(Project $project)
    {
        if ($project) {
            $kozijnen = $project->kozijnen;
            $akkoord = $project->akkoord;
            $info = $project->info;
            return view('projects/show', compact('kozijnen', 'project', 'info', 'akkoord'));
        } else {
            return redirect('/')->with('message', 'Project does not exist!');
        }
    }

    public function create(Request $request)
    {
        $kozijnen = Kozijnen::all();


        $attributes = array();
        foreach ($kozijnen as $koz) {
            array_push($attributes, Kozijnen::find($koz->id)->attributes);
        }

        return view('projects.create', compact('kozijnen', 'attributes'));
    }

    public function edit(Project $project)
    {
        if ($project) {
            $all = Kozijnen::all();
            $attributes = array();
            foreach ($all as $koz) {
                array_push($attributes, Kozijnen::find($koz->id)->attributes);
            }
            $kozijnen = $project->kozijnen;
            return view('projects/edit', compact('kozijnen', 'project', 'attributes'));
        } else {
            return redirect('/')->with('message', 'Project does not exist!');
        }
    }

    public function update(Request $request, Project $project)
    {
        if ($project) {
            $formFields = $request->validate([
                'KlantNaam' => 'required',
                'ProjectAdres' => 'required',
                'Email' => ['required', 'email'],
            ]);




            $attributes = Kozijnen::all();
            $attributeValues = $request->except(['_token', 'KlantNaam', 'ProjectAdres', 'Email']);

            foreach ($attributes as $attribute) {
                $value = $attributeValues[$attribute->kozijn] ?? null;
                $extraInfo = $attributeValues['extra' . $attribute->kozijn] ?? null;
                $project->kozijnen()->attach($attribute->id, ['value' => $value, 'extraInfo' => $extraInfo]);
            }

            $project->update($formFields);

            return redirect('/')->with('message', 'Project updated successfully!');
        } else {
            return redirect('/')->with('message', 'Project does not exist!');
        }
    }

    public function destroy(Project $project)
    {
        if ($project) {
            $project->delete();
            return redirect('/')->with('message', 'Project deleted successfully');
        } else {
            return redirect('/')->with('message', 'Project does not exist!');
        }
    }
}
