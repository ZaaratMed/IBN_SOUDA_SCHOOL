<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $matieres = Matiere::all();
    return view('matieres.index', compact('matieres'));
}
public function mesMatieres()
{
    if (!Gate::allows('is-etudiant')) {
        abort(403, 'Unauthorized action.');
    }
    $user = auth()->user();
   

    // Vérifiez si l'utilisateur est un étudiant
    // if ($user->role->nom != 'etudiant') {
    //     return redirect()->back()->withErrors(['error' => 'Cette section est réservée aux étudiants.']);
    // }
    // dd($user->role->nom);
    // Récupérez les matières associées à cet étudiant
    $matieres = $user->matieres;

    return view('matieres.etudiant', compact('matieres'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    return view('matieres.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $matiere = new Matiere();
    $matiere->name = $request->input('name');
    $matiere->description = $request->input('description'); // optionnel
    $matiere->save();

    return redirect()->route('matieres.index')->with('success', 'Matière ajoutée avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $matiere = Matiere::findOrFail($id);
    return view('matieres.edit', compact('matiere'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $matiere = Matiere::findOrFail($id);
    $matiere->update(['name' => $request->name,'description' => $request->description]);

    return redirect()->route('matieres.index')->with('success', 'Matière mise à jour.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $matiere = Matiere::findOrFail($id);
    $matiere->delete();

    return redirect()->route('matieres.index')->with('success', 'Matière supprimée.');
}
}
