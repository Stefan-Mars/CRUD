<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kozijnen;
use App\Models\Attributes;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function show(){
        return view('admin/admin');
    }
    public function attributes(Attributes $Attributes)
    {
        $kozijnen = Kozijnen::paginate(14);
        $attributes = Attributes::get();
        return view('admin/attributes', compact('kozijnen', 'attributes'));
    }
    public function accounts(){
        $users = User::all();
        
        $roles = Role::with('permissions')->get();
        return view('admin/accounts', compact('users','roles'));
    }
    public function roles(Request $request, $userId){
        $user = User::find($userId);
        $roleId = $request->user_role;
    
        if ($user && $roleId) {
            $newRole = Role::find($roleId);
    
            if ($user->hasRole('Admin') && $newRole->name !== 'Admin') {
                return back()->with("message", "Je mag geen admin veranderen");
            }
    
            $user->syncRoles([$newRole]);
            return back()->with("message", "Rol succesvol bewerkt!");
        }
    
        return back()->with("message", "Kan rol niet bewerken voor gebruiker!");
    }
    
    
}
