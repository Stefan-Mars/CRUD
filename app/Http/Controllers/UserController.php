<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users/register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:40'],
            'email' => ['required', 'max:40', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        $user->assignRole('Gast');

        auth()->login($user);

        return redirect('/home')->with('message', 'Gebruiker aangemaakt en ingelogd');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Je bent uitgelogd!');
    }

    public function login()
    {
        return view('users/login');
    }
    public function show()
    {
        return view('users/show');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'max:40', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'Je bent ingelogd!');
        }

        return back()->withErrors(['email' => 'Ongeldige inloggegevens'])->onlyInput('email');
    }

}
