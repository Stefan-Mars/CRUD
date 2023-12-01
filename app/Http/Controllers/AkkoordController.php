<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Akkoord;
use App\Models\Project;
use App\Models\projectInfo;
use Illuminate\Http\Request;

class AkkoordController extends Controller
{
    public function create(Request $request, Project $project)
    {

        $akkoord = $project->akkoord;

        if (!$akkoord || ($akkoord && $akkoord->project_id != $project->id)) {
            $info = projectInfo::where('project_id', $project->id)->get();
            return view('projects/akkoord/create', compact('project', 'info'));
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Akkoord already exists!');
        }
    }

    public function store(Request $request, Project $project)
    {
        $akkoord = $project->akkoord;
        if (!$akkoord || ($akkoord && $akkoord->project_id != $project->id)) {
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
                "signatureData" => "sometimes|nullable",
                "tekeningData" => "sometimes|nullable",
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
        $akkoord = $project->akkoord;
        if ($akkoord || ($akkoord && $akkoord->project_id == $project->id)) {
            $akkoord = Akkoord::where('project_id', $project->id)->first();
            return view('projects/akkoord/edit', compact('akkoord'));
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Akkoord does not exist!');
        }
    }
    public function update(Request $request, Project $project)
    {
        $akkoord = $project->akkoord;
        if ($akkoord || ($akkoord && $akkoord->project_id == $project->id)) {
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
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Akkoord does not exist!');
        }
    }
    public function download(Project $project)
    {

        $akkoord = $project->akkoord;
        $dompdf = new Dompdf();

        $html = "
            <html>
                <head>

                    <style>" . file_get_contents('http://crud.test/css/output.css') . "
                        *{
                            margin: 5px;
                            font-size: 13px;
                        }
                        table{
                            border-collapse: separate;
                            border-spacing: 0.25rem 0.25rem;
                        }
                        
                        .hide-for-pdf {
                            display: none !important;
                        }
                        .pdf, #textbox{
                            background-color: rgb(254 202 202);
                        }
                        .custom-radio {
                            display: inline-block;
                            width: 15px;
                            height: 15px;
                            background-color: #fff;
                        }
                        .custom-radio.checked {
                            background-color: #000;
                        }
                        b,img,.custom-radio,#textbox, span{
                            margin: 0px;
                        }
                        
                        .bg-red-100 {
                            background-color: rgb(254 226 226);
                        }
                          
                        
                        .bg-red-200{
                            background-color: rgb(254 202 202);
                        }
                          
                        .bg-red-300,.tr  {
                            background-color: rgb(252 165 165);
                        }
                          
                        .bg-red-400 {
                            background-color: rgb(248 113 113);
                        }
                        .title{
                            color: white;
                            font-weight: bold;
                            text-transform: uppercase;
                        }
                        .margin{
                            margin-left: 100px;
                        }
    
                          
                    </style>
                </head>
                <body>"
            . view('projects/akkoord/edit', compact('akkoord')) .
            "</body>
            </html>";




        $dompdf->loadHtml($html);


        $dompdf->render();

        $dompdf->stream("akkoord.pdf");
    }
}
