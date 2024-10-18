<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('management.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('management.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;

        $user->save();

        return redirect()->route('management.index')->with('message', 'Gebruiker toegevoegd.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('management.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role_id');

        $user->save();

        return redirect()->route('management.index')->with('message', 'Gebruiker bijgewerkt.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('management.index')->with('message', 'Gebruiker verwijderd.');
    }
}
