<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommercialController extends Controller
{
    public function create()
    {
        return view('commercial.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'date' => 'nullable|date',
            'nom_commercial' => 'required|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'contact' => 'required|string|max:255',
            'heure' => 'nullable|string|max:255',
            'nom_prenom' => 'nullable|string|max:255',
            'societe' => 'nullable|string|max:255',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Créer un nouveau commercial avec les données validées
        Commercial::create($validatedData);

        // Rediriger l'utilisateur après la création
        return redirect()->route('commercials.index')->with('success', 'Commercial ajouté avec succès!');
    }

    public function edit($id)
    {
        $commercial = Commercial::findOrFail($id);
        return view('commercial.edit', compact('commercial'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'date' => 'nullable|date',
            'nom_commercial' => 'required|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'contact' => 'required|string|max:255',
            'heure' => 'nullable|string|max:255',
            'nom_prenom' => 'nullable|string|max:255',
            'societe' => 'nullable|string|max:255',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Mettre à jour le commercial avec les données validées
        $commercial = Commercial::findOrFail($id);
        $commercial->update($validatedData);

        // Rediriger l'utilisateur après la mise à jour
        return redirect()->route('commercials.index')->with('success', 'Commercial mis à jour avec succès!');
    }

    // Les autres méthodes restent inchangées
}
