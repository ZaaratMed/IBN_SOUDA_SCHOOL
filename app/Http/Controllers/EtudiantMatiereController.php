<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\EtudiantMatiere;
use Illuminate\Support\Facades\Gate;

class EtudiantMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $relations = EtudiantMatiere::with(['etudiant', 'matiere'])->get();
    return view('etudiant-matiere.index', compact('relations'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        // Vérifier que le rôle 'etudiant' existe et récupérer les étudiants associés
        $etudiants = User::whereHas('role', function ($query) {
            $query->where('nom', 'etudiant');
        })->get();
        // dd($etudiants);

    
        $matieres = Matiere::all();
    
        return view('etudiant-matiere.create', compact('etudiants', 'matieres'));
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('is-admin')) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'etudiant_id' => 'required|exists:users,id',
            'matiere_id' => 'required|exists:matieres,id',
        ]);
    
        EtudiantMatiere::create($validated);
        return redirect()->route('etudiant-matiere.index')->with('success', 'Relation ajoutée avec succès.');
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
    $relation = EtudiantMatiere::findOrFail($id);
    $etudiants = User::whereHas('role', function ($query) {
        $query->where('nom', 'etudiant');
    })->get();

    $matieres = Matiere::all();
    return view('etudiant-matiere.edit', compact('relation', 'etudiants', 'matieres'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $validated = $request->validate([
        'etudiant_id' => 'required|exists:users,id',
        'matiere_id' => 'required|exists:matieres,id',
    ]);

    $relation = EtudiantMatiere::findOrFail($id);
    $relation->update($validated);

    return redirect()->route('etudiant-matiere.index')->with('success', 'Relation mise à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $relation = EtudiantMatiere::findOrFail($id);
    $relation->delete();

    return redirect()->route('etudiant-matiere.index')->with('success', 'Relation supprimée avec succès.');
}

}
