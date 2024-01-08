<?php

namespace App\Http\Controllers;

use App\Models\Akkoord;
use App\Models\Signatures;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function store(Akkoord $akkoord,Request $request){

        $formFields = $request->validate([
            "image" => "sometimes|nullable"
        ]);
        $formFields["ip_address"] = $request->ip();
        $newSignature = Signatures::create($formFields);
        $akkoord->signature()->save($newSignature);
        return view('projects/akkoord/edit', compact('akkoord'));
    }
    public function create(Akkoord $akkoord,Request $request)
    {
        return view('projects/akkoord/signatures/create', compact('akkoord'));
    }
}
