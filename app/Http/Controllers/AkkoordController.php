<?php

namespace App\Http\Controllers;

use App\Models\Akkoord;
use App\Models\Project;
use App\Models\projectInfo;
use Illuminate\Http\Request;

class AkkoordController extends Controller
{
    public function create(Request $request, Project $project)
    {
        $akkoord = $project->akkoord;
        if (!$akkoord || ($akkoord && $akkoord->id != $project->id)) {
            $info = projectInfo::find($project->id);
            return view('projectAkkoord/create', compact('project', 'info'));
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Akkoord already exists!');
        }
    }

    public function store(Request $request, Project $project)
    {
        $akkoord = $project->akkoord;
        if (!$akkoord || ($akkoord && $akkoord->id != $project->id)) {
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

            return redirect('/project/' . $project->id)->with('message', 'Akkoord created successfully!');
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Akkoord already exists!');
        }
    }
    public function edit(Project $project)
    {
        $akkoord = Akkoord::where('project_id', $project->id)->first();

        return view('projectAkkoord/edit', compact('akkoord'));
    }
    public function update(Request $request, Project $project)
    {
        $akkoord = Akkoord::where('project_id', $project->id)->first();
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


        $akkoord->update($formFields);


        return redirect('/project/' . $project->id)->with('message', 'Akkoord updated successfully!');
    }
}
