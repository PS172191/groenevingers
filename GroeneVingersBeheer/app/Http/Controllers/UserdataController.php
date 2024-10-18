<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('management.index', compact('users'));
    }

    public function create()
    {
        $roleType = Role::all();

        return view('management.create', compact('roleType'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer', // Ensure that the role ID is required and of integer type
        ]);

        // Create a new user with the provided data
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id'); // Assign the role ID from the form

        // Save the user to the database
        $user->save();

        // Redirect to the index page with a success message
        return redirect()->route('management.index')
            ->with('success', 'User created successfully.');

        dd($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('management.show', compact('user'));
    }

    public function edit($id)
    {
        $roleType = Role::all();
        $user = User::findOrFail($id);

        return view('management.edit', compact('user', 'roleType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:8',
            'role_id' => 'required|int',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('management.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('management.index')->with('success', 'User deleted successfully.');
    }
}
