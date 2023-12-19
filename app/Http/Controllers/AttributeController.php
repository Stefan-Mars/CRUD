<?php

namespace App\Http\Controllers;


use App\Models\Kozijnen;
use App\Models\Attributes;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(Attributes $Attributes)
    {
        $kozijnen = Kozijnen::paginate(14);
        $attributes = Attributes::get();
        return view('admin', compact('kozijnen', 'attributes'));
    }
    public function store(Request $request, Kozijnen $kozijnen)
    {
        $formFields = $request->validate([
            'attribute' => 'required',
        ]);
        $formFields["kozijnen_id"] = $kozijnen->id;
        Attributes::insert($formFields);

        return back()->with('message', 'Attribuut succesvol opgeslagen!');
    }

    public function destroy(Attributes $Attributes)
    {
        $Attributes->delete();
        return back()->with('message', 'Attribuut succesvol verwijderd');
    }
}
