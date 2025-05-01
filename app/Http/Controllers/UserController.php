<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    // Afficher tous les utilisateurs
    public function index()
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }

    $users = User::with('role')->get();

    // Comptage des rôles
    $totalUsers = User::count();
    $totalStudents = User::where('role_id', 2)->count();
    $totalTeachers = User::where('role_id', 3)->count();

    return view('users.index', compact('users', 'totalUsers', 'totalStudents', 'totalTeachers'));
}


    // Formulaire pour créer un utilisateur
    public function create()
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);
        // dd($request->role_id);
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'role_id' => $request->role_id,
        // ]);
        $user = new User();
        $user->fill($request->all())->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    // Éditer un utilisateur existant
    public function edit($id)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    // Mettre à jour un utilisateur
    public function update(Request $request, $id)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}

