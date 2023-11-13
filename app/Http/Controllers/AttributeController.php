<?php

namespace App\Http\Controllers;


use App\Models\Kozijnen;
use App\Models\Attributes;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function store(Request $request, Kozijnen $kozijnen){
        $formFields = $request->validate([
            'attribute' => 'required',
        ]);
        $formFields["kozijn_id"] = $kozijnen->id;
        Attributes::insert($formFields);

        return redirect('/admin')->with('message', 'Attribute created successfully!');
    }

    public function destroy(Attributes $Attributes) {
        $Attributes->delete();
        return back()->with('message', 'Attribute deleted successfully');
    }
}
