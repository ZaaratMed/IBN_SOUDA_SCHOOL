<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EnseignantController extends Controller
{
    // Afficher tous les enseignants
    public function index()
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $enseignants = Enseignant::with(['user', 'matiere'])->get();
    // dd($enseignants);
    return view('enseignants.index', compact('enseignants'));
}

    // Afficher le formulaire de création
    public function create()
    {   
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $users = User::where('role_id',3)->get();
        $matieres = Matiere::all();
        // dd($users);
        return view('enseignants.create',['users' => $users, 'matieres' => $matieres]);
    }

    // Ajouter un nouvel enseignant
    public function store(Request $request)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'matiere_id' => 'required|exists:matieres,id',
        ]);

        Enseignant::create($validatedData);
        return redirect()->route('enseignants.index')->with('success', 'Enseignant ajouté avec succès.');
    }

    // Afficher un enseignant spécifique
    public function show($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return view('enseignants.show', compact('enseignant'));
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $enseignant = Enseignant::findOrFail($id);
        $users = User::where('role_id',3)->get();
        $matieres = Matiere::all();
        return view('enseignants.edit', compact('enseignant','users','matieres'));
    }

    // Mettre à jour les informations d'un enseignant
    public function update(Request $request, $id)
    {
        // dd($request);
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        
        $validatedData = $request->validate([
            'matiere_id' => 'required|exists:matieres,id',
        ]);
        
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->update($validatedData);
        return redirect()->route('enseignants.index')->with('success', 'Enseignant modifié avec succès.');
    }

    // Supprimer un enseignant
    public function destroy($id)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();
        return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès.');
    }
}
