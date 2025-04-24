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
    return view('videos.index', compact('videos'));
}

    public function create()
{   
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
    
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'url' => 'required|mimes:mp4,avi,mov' ,// |max:10240, // Taille maximale 10MB
        'niveau' => 'required|string|max:255'
    ]);

    // Upload du fichier vidéo
    $videoPath = $request->file('url')->store('videos', 'public');

    // Création de la vidéo dans la base de données
    $video = new Video();
    $video->titre = $request->input('titre');
    $video->description = $request->input('description');
    $video->niveau = $request->input('niveau');
    $video->url = $videoPath;
    $video->enseignant_id = 1;

    $video->save();

    return redirect()->route('videos')->with('success', 'Vidéo ajoutée avec succès');
}

public function edit($id)
{
    // if (Gate::denies('manage-videos')) {
    //     abort(403, 'Unauthorized action.');
    // }
    $video = Video::findOrFail($id);
    return view('videos.edit', compact('video'));
}

public function update(Request $request, $id)
{
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

    return redirect()->route('videos')->with('success', 'Vidéo mise à jour avec succès');
}

public function destroy($id)
{
    $video = Video::findOrFail($id);
    // Storage::delete('public/' . $video->url);
    Storage::disk('public')->delete($video->url);
    $video->delete();

    return redirect()->route('videos')->with('success', 'Vidéo supprimée avec succès');
}


}
