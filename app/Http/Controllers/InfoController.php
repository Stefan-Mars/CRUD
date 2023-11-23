<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Content;
use App\Models\Project;
use App\Models\projectInfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function create(Project $project)
    {
        $info = $project->info;
        if (!$info || ($info->project_id != $project->id)) {
            $content = Content::get();
            return view('projects/info/create', compact('content', 'project'));
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Info already exists!');
        }
    }
    public function store(Request $request, Project $project)
    {
        $info = $project->info;
        if (!$info || ($info->project_id != $project->id)) {
            $formFields = $request->validate([
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
                'diversen' => 'sometimes|nullable',
                'Kraan' => 'sometimes|nullable',
                'gevelbekleding' => 'sometimes|nullable',
                'SRLM' => 'sometimes|nullable',
                'andereGevelbekleding' => 'sometimes|nullable',
                'gordijnen' => 'sometimes|nullable',
                'ZetWater' => 'sometimes|nullable',
                'Loodgieterswerk' => 'sometimes|nullable',
                'Electrawerk' => 'sometimes|nullable',
                'Stuckvloer' => 'sometimes|nullable',
                'afvoer' => 'sometimes|nullable',
                'Kraantype' => 'sometimes|nullable',
                'BTW' => 'required',
                'inmeting' => 'required',
                'orderVerwerktDoor' => 'required',

            ]);

            $projectInfo = projectInfo::create($formFields);

            $button = new Button();

            $content = Content::all();
            foreach ($content as $attribute) {
                $button->{'field' . $attribute->id} = $request->input('field' . $attribute->id);
                $button->{'inclusief' . $attribute->id} = $request->input('inclusief' . $attribute->id);
            }

            $project->info()->save($projectInfo);
            $projectInfo->buttons()->save($button);


            return redirect('/project/' . $project->id)->with('message', 'Info created successfully!');
        } else {
            return redirect('/project/' . $project->id)->with('message', 'Info already exists!');
        }
    }
    public function edit(Project $project)
    {
        $projectInfo = ProjectInfo::where('project_id', $project->id)->first();
        $buttons = Button::where('project_info_id', $projectInfo->id)->first();
        $content = Content::get();
        return view('projects/info/edit', compact('content', 'project', 'projectInfo', 'buttons'));
    }
    public function update(Request $request, Project $project)
    {
        $projectInfo = ProjectInfo::where('project_id', $project->id)->first();
        $formFields = $request->validate([
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
            'diversen' => 'sometimes|nullable',
            'Kraan' => 'sometimes|nullable',
            'gevelbekleding' => 'sometimes|nullable',
            'SRLM' => 'sometimes|nullable',
            'andereGevelbekleding' => 'sometimes|nullable',
            'gordijnen' => 'sometimes|nullable',
            'ZetWater' => 'sometimes|nullable',
            'Loodgieterswerk' => 'sometimes|nullable',
            'Electrawerk' => 'sometimes|nullable',
            'Stuckvloer' => 'sometimes|nullable',
            'afvoer' => 'sometimes|nullable',
            'Kraantype' => 'sometimes|nullable',
            'BTW' => 'required',
            'inmeting' => 'required',
            'orderVerwerktDoor' => 'required',

        ]);

        $projectInfo->update($formFields);

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

        return redirect('/project/' . $project->id)->with('message', 'Info updated successfully!');
    }
}
