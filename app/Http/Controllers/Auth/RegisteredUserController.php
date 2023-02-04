<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Facades\UserPermissions;
use App\Models\Type;
use App\Models\Permission;
use App\Models\Role;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function create() {
        $roles = Role::orderBy('name')->get();
        return view('auth.register', compact('roles'));
        //return view('auth.register');
    }
        
        

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
            
/*
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type_id' => $request->type_id,
            'password' => Hash::make($request->password),
        ]);*/
            
        //PermissionController::loadPermissions(Auth::user()->type_id);
        UserPermissions::loadPermissions(Auth::user()->role_id);
        //UserPermissions::loadPermissions(Auth::user()->type_id);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
