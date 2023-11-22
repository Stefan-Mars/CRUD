<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Content;
use App\Models\Project;
use App\Models\projectInfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function create(Project $project){
        $content = Content::get();
        return view('projectInfo/create', compact('content','project'));
    }
    public function store(Request $request,Project $project){

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
       
    
        return back()->with('message', 'Info created successfully!');

    }
    public function edit(Project $project){
        $projectInfo = ProjectInfo::where('project_id', $project->id)->first();
        $buttons = Button::where('project_info_id', $projectInfo->id)->first();
        $content = Content::get();
        return view('projectInfo/edit', compact('content','project','projectInfo','buttons'));
    }
    public function update(Request $request, Project $project) {
        $projectInfo = ProjectInfo::where('project_id', $project->id)->first();
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
        
        $validatedData = $request->validate($rules);
    
        $projectInfo->update($validatedData);
    
        $content = Content::all();
        foreach ($content as $attribute) {
            $fieldName = 'field' . $attribute->id;
            $inclusiefName = 'inclusief' . $attribute->id;
    
            $projectInfo->buttons()->updateOrCreate(
                ['project_info_id' => $projectInfo->id],
                [
                    $fieldName => $request->input($fieldName),
                    $inclusiefName => $request->input($inclusiefName),
                ]
            );
        }
    
        return back()->with('message', 'Info updated successfully!');
    }
}
