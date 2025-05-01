<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagePresentation;
use Illuminate\Support\Facades\Gate;

class PagePresentationController extends Controller
{
    public function index()
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $pages = PagePresentation::all();
    return view('PagePresentation.index', compact('pages'));
}

    public function show()
{
    $page = PagePresentation::first();

    return view('PagePresentation.accueil', compact('page'));
}
public function edit($id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $page = PagePresentation::findOrFail($id);
    return view('PagePresentation.edit', compact('page'));
}
public function update(Request $request, $id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'contenu' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $page = PagePresentation::findOrFail($id);

    // Upload de l'image si une nouvelle image est fournie
    if ($request->file('image_url')) {
        $imagePath = $request->file('image_url')->store('images', 'public');
        $page->image_url = $imagePath;
    }

    $page->titre = $validatedData['titre'];
    $page->contenu = $validatedData['contenu'];
    $page->save();

    return redirect()->route('Pages.index')->with('success', 'Page de présentation mise à jour avec succès.');
}
public function destroy($id)
{
    if (!Gate::allows('is-admin')) {
        abort(403, 'Unauthorized action.');
    }
    $page = PagePresentation::findOrFail($id);
    if ($page->image) {
        Storage::disk('public')->delete($page->image); // Supprime l'image
    }
    $page->delete();

    return redirect()->route('PagePresentation.index')->with('success', 'Page de présentation supprimée avec succès.');
}

}
