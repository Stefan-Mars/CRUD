<?php

namespace App\Http\Controllers;

use App\Models\Kozijnen;
use Illuminate\Http\Request;

class KozijnenController extends Controller
{

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'kozijn' => 'required',
        ]);
        Kozijnen::insert($formFields);

        return back()->with('message', 'Kozijn succesvol opgeslagen!');
    }

    public function update(Request $request, Kozijnen $kozijnen)
{
    $formFields = $request->validate([
        'name' => 'required',
    ]);

    // Map form field 'name' to database field 'kozijn'
    $updatedFields = ['kozijn' => $formFields['name']];

    $kozijnen->update($updatedFields);
    return back()->with('message', 'Kozijn succesvol bewerkt');
}
    public function destroy(Kozijnen $kozijnen)
    {
        $kozijnen->delete();
        return back()->with('message', 'Kozijn succesvol verwijderd');
    }
}
