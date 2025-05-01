<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // public function __construct()
    // {
    //     // Solution alternative si authorizeResource ne fonctionne pas
    //     $this->middleware('auth');
    //     $this->middleware('can:create,Video')->only(['create', 'store']);
    // }
    public function index()
{
    $videos = Video::all();
    // dd(auth()->user());
    // dd(Gate::abilities()); // Vérifie toutes les Gates enregistrées
    return view('videos.index', compact('videos'));
}

    public function create()
{   
    if (!Gate::allows('manage-videos')) {
        abort(403, 'Unauthorized action.');
    }
    // $user = Auth::user();
    // dd($user->role->nom);
    // dd(auth()->user()->role->nom, Gate::allows('manage-videos'));
    // dd(auth()->user(), auth()->user()->role);
    // dd(auth()->user()->role_id, auth()->user()->role->nom);
    // dd(auth()->user()->role_id === 1 || auth()->user()->role_id === 3);
    // if (!Gate::allows('manage-videos')) {
    //     abort(403, 'Unauthorized action.');
    // }
    return view('videos.create');
}
public function store(Request $request)
{   
    if (!Gate::allows('manage-videos')) {
        abort(403, 'Unauthorized action.');
    }
    // Validation des données
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'url' => 'required|mimes:mp4,avi,mov', // Taille maximale peut être ajoutée |max:10240 (10MB)
        'niveau' => 'required|string|max:255'
    ]);

    // Vérifier si l'utilisateur connecté est un enseignant
    // if (!auth()->user()->enseignant) {
    //     return redirect()->back()->withErrors(['error' => 'Seul un enseignant peut ajouter une vidéo.']);
    // }
    // dd(auth()->user()->enseignant);

    // Upload du fichier vidéo
    $videoPath = $request->file('url')->store('videos', 'public');

    // Création de la vidéo dans la base de données
    $video = new Video();
    $video->titre = $request->input('titre');
    $video->description = $request->input('description');
    $video->niveau = $request->input('niveau');
    $video->url = $videoPath;

    // Affecter l'enseignant authentifié
    $video->enseignant_id = auth()->user()->enseignant->id;

    $video->save();
    // dd($request->all());

    return redirect()->route('videos.index')->with('success', 'Vidéo ajoutée avec succès');
}


public function edit($id)
{
    if (!Gate::allows('manage-videos')) {
        abort(403, 'Unauthorized action.');
    }
    $video = Video::findOrFail($id);
    return view('videos.edit', compact('video'));
}

public function update(Request $request, $id)
{
    if (!Gate::allows('manage-videos')) {
        abort(403, 'Unauthorized action.');
    }
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'url' => 'nullable|file|mimes:mp4,avi,mov|max:10240',
        'niveau' => 'required|string|max:255',
    ]);

    $video = Video::findOrFail($id);
    $video->titre = $request->titre;
    $video->description = $request->description;
    $video->niveau = $request->niveau;

    if ($request->hasFile('url')) {
        if ($video->url && Storage::exists('public/' . $video->url)) {
            Storage::delete('public/' . $video->url);
        }

        $videoPath = $request->file('url')->store('videos', 'public');
        $video->url = $videoPath;
    }

    $video->save();

    return redirect()->route('videos.index')->with('success', 'Vidéo mise à jour avec succès');
}

public function destroy($id)
{
    if (!Gate::allows('manage-videos')) {
        abort(403, 'Unauthorized action.');
    }
    $video = Video::findOrFail($id);
    // Storage::delete('public/' . $video->url);
    Storage::disk('public')->delete($video->url);
    $video->delete();

    return redirect()->route('videos.index')->with('success', 'Vidéo supprimée avec succès');
}


}
