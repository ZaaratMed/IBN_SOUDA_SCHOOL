<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $matieres = Matiere::all();
    return view('matieres.index', compact('matieres'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('matieres.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
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
    $matiere = Matiere::findOrFail($id);
    return view('matieres.edit', compact('matiere'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
    ]);

    $matiere = Matiere::findOrFail($id);
    $matiere->update(['nom' => $request->nom]);

    return redirect()->route('matieres.index')->with('success', 'Matière mise à jour.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $matiere = Matiere::findOrFail($id);
    $matiere->delete();

    return redirect()->route('matieres.index')->with('success', 'Matière supprimée.');
}
}
