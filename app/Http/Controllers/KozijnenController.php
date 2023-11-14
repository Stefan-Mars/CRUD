<?php

namespace App\Http\Controllers;

use App\Models\Kozijnen;
use Illuminate\Http\Request;

class KozijnenController extends Controller
{

    public function store(Request $request){
        $formFields = $request->validate([
            'kozijn' => 'required',
        ]);
        Kozijnen::insert($formFields);

        return back()->with('message', 'Kozijn created successfully!');
    }
    public function destroy(Kozijnen $kozijnen) {
        $kozijnen->delete();
        return back()->with('message', 'Kozijn deleted successfully');
    }

}
