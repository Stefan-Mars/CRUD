<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Button;
use App\Models\Akkoord;
use App\Models\Content;
use App\Models\Project;
use App\Models\Kozijnen;
use App\Models\projectInfo;
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

    // Attach all available attributes dynamically
    $attributes = Kozijnen::all(); // Assuming you have an Attribute model
    $attributeValues = $request->except(['_token', 'KlantNaam', 'ProjectAdres', 'Email']);

    foreach ($attributes as $attribute) {
        $value = $attributeValues[$attribute->kozijn] ?? null;
        $project->kozijnen()->attach($attribute->id, ['value' => $value]);
    }

    return redirect('/')->with('message', 'Project created successfully!');
}
    public function show(Project $project){
        $kozijnen = $project->kozijnen;
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
    public function akkoord(Request $request, Project $project){
        $info = projectInfo::find($project->id);
        return view('projects/akkoord', compact('project','info'));
    }
    public function info(Project $project){
        $content = Content::get();
        return view('projects/info', compact('content','project'));
    }
    public function infoCreate(Request $request,Project $project){
        try{
        $rules = [
            'datumBestelling' => 'required',
            'ProjectNaam' => 'required',
            'telefoonnummer' => 'required',
            'datum' => 'required',
            'label' => 'required',
            'totaalEuro' => 'required',
            'dagen' => 'required',
            'personen' => 'required',
            'naam' => 'required',
            'korting' => 'required',
            'diversen' => 'required',
            'Kraan' => 'sometimes|nullable',
            'gevelbekleding' => 'sometimes|nullable',
            'SRLM' => 'sometimes|nullable',
            'andereGevelbekleding' => 'sometimes|nullable',
            'gordijnen' => 'sometimes|nullable',
            'ZetWater' => 'sometimes|nullable',
            'Loodgieterswerk' =>'sometimes|nullable',
            'Electrawerk' =>'sometimes|nullable',
            'Stuckvloer' => 'sometimes|nullable',
            'afvoer' => 'required',
            'Kraantype' => 'required',
            'BTW' => 'required',
            'inmeting' => 'required',
            'orderVerwerktDoor' => 'required',
    
        ];
        $formFields = $request->validate($rules);
    
        $projectInfo = projectInfo::create($formFields);
    
        $button = new Button();
    
        $content = Content::all();
        foreach ($content as $attribute) {
            $button->{'field' . $attribute->id} = $request->input('field' . $attribute->id);
            $button->{'inclusief' . $attribute->id} = $request->input('inclusief' . $attribute->id);
        }
   
        $project->info()->save($projectInfo);
        $projectInfo->buttons()->save($button);
       
        }
        catch(Exception $e){
            return $e;
        }
        return back()->with('message', 'Project created successfully!');

    }
    public function akkoordCreate(Request $request,Project $project){

        $formFields = $request->validate([
            "soortAanvraag" => "required",
            "naamOpdrachtgever" => "required",
            "ProjectAdres" => "required",
            "postcode" => "required",
            "woonplaats" => "required",
            "telefoonnummer" => "required",
            "Email" => "required",
            "naamMonteur" => "required",
            "doorWieAfTeWerken" => "required",
            "inTePlannenTijd" => "required",
            "ordernummerFabrikant" => "required",
            "ruimteSchoon" => "required",
            "ramenDeurenGoed" => "required",
            "eigendommenBeschadigd" => "required",
            "afwerkingUitgevoerd" => "required",
            "ruitenKozijnenOnbeschadigd" => "required",
            "overigePunten" => "required",
            "anderePunten" => "sometimes|nullable",
        ]);
    
        $akkoord = Akkoord::create($formFields);
    
        $project->akkoord()->save($akkoord);
    
        return redirect('/')->with('message', 'Akkoord created successfully!');

    }



    
}
