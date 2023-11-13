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
            "Soort_Kozijn" => 'required',
            "Afwerking_Kozijn" => 'required',
            "Merk_Kozijn" => 'required',
            "Kleur_Kozijn_Binnen" => 'required',
            "Profielvorm_Kozijn" => 'required',
            "Profielvorm_Draaideel" => 'required',
            "Verbindingen" => 'required',
            "Standaard_Passief_Kozijn" => 'required',
            "Beglazing_U_Waarde" => 'required',
            "Veiligheidsglas" => 'required',
            "Roeden" => 'required',
            "Wienersprossen" => 'required',
            "Type_Opplakroede" => 'required',
            "Warmedge_Afstandhouder" => 'required',
            "Waterslagen_Type" => 'required',
            "Vensterbanken_Type" => 'required',
            "Roosters_Horizontaal/Verticaal" => 'required',
            "Kleur_Roosters" => 'required',
            "Horren" => 'required',
            "Gordijnen/Zonwering" => 'required',
            "Dorpels_Deuren" => 'required',
            "Type_Scharnieren" => 'required',
            "Kleur_Hang_En_Sluitwerk" => 'required',
            "Montage_Nieuwbouw" => 'required',
            "Nachtventilatie" => 'required',

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
            "Soort_Kozijn" => 'required',
            "Afwerking_Kozijn" => 'required',
            "Merk_Kozijn" => 'required',
            "Kleur_Kozijn_Binnen" => 'required',
            "Profielvorm_Kozijn" => 'required',
            "Profielvorm_Draaideel" => 'required',
            "Verbindingen" => 'required',
            "Standaard_Passief_Kozijn" => 'required',
            "Beglazing_U_Waarde" => 'required',
            "Veiligheidsglas" => 'required',
            "Roeden" => 'required',
            "Wienersprossen" => 'required',
            "Type_Opplakroede" => 'required',
            "Warmedge_Afstandhouder" => 'required',
            "Waterslagen_Type" => 'required',
            "Vensterbanken_Type" => 'required',
            "Roosters_Horizontaal/Verticaal" => 'required',
            "Kleur_Roosters" => 'required',
            "Horren" => 'required',
            "Gordijnen/Zonwering" => 'required',
            "Dorpels_Deuren" => 'required',
            "Type_Scharnieren" => 'required',
            "Kleur_Hang_En_Sluitwerk" => 'required',
            "Montage_Nieuwbouw" => 'required',
            "Nachtventilatie" => 'required',

        ]);
        $project->update($formFields);

        return redirect('/')->with('message', 'Project updated successfully!');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect('/')->with('message', 'Project deleted successfully');
    }
}
