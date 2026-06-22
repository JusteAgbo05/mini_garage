<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index(Request $request)
    {
        $recherche = $request->input('recherche');

        $vehicules = Vehicule::when($recherche, function ($query, $recherche) {
            return $query->where('marque', 'like', '%' . $recherche . '%')
                         ->orWhere('immatriculation', 'like', '%' . $recherche . '%');
        })->paginate(6);

        return view('garage.vehicules.index', compact('vehicules', 'recherche'));
    }

    public function show(Vehicule $vehicule)
    {
        $vehicule->load('reparations.techniciens');
        return view('garage.vehicules.show', compact('vehicule'));
    }

    public function create()
    {
        return view('garage.vehicules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules|max:20',
            'marque'          => 'required|max:100',
            'modele'          => 'required|max:100',
            'couleur'         => 'required|max:50',
            'annee'           => 'required|digits:4|integer',
            'kilometrage'     => 'required|integer|min:0',
            'carrosserie'     => 'required|max:50',
            'energie'         => 'required|max:50',
            'boite'           => 'required|max:50',
        ]);

        Vehicule::create($request->all());

        return redirect()->route('vehicules.index')
                         ->with('succes', 'Vehicule ajoute avec succes.');
    }

    public function edit(Vehicule $vehicule)
    {
        return view('garage.vehicules.edit', compact('vehicule'));
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'immatriculation' => 'required|max:20|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque'          => 'required|max:100',
            'modele'          => 'required|max:100',
            'couleur'         => 'required|max:50',
            'annee'           => 'required|digits:4|integer',
            'kilometrage'     => 'required|integer|min:0',
            'carrosserie'     => 'required|max:50',
            'energie'         => 'required|max:50',
            'boite'           => 'required|max:50',
        ]);

        $vehicule->update($request->all());

        return redirect()->route('vehicules.index')
                         ->with('succes', 'Vehicule modifie avec succes.');
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('vehicules.index')
                         ->with('succes', 'Vehicule supprime avec succes.');
    }

    // Methodes API

    public function apiIndex()
    {
        return response()->json(Vehicule::with('reparations')->get());
    }

    public function apiShow($id)
    {
        $vehicule = Vehicule::with('reparations.techniciens')->findOrFail($id);
        return response()->json($vehicule);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules|max:20',
            'marque'          => 'required|max:100',
            'modele'          => 'required|max:100',
            'couleur'         => 'required|max:50',
            'annee'           => 'required|digits:4|integer',
            'kilometrage'     => 'required|integer|min:0',
            'carrosserie'     => 'required|max:50',
            'energie'         => 'required|max:50',
            'boite'           => 'required|max:50',
        ]);

        $vehicule = Vehicule::create($request->all());
        return response()->json($vehicule, 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $request->validate([
            'immatriculation' => 'required|max:20|unique:vehicules,immatriculation,' . $id,
            'marque'          => 'required|max:100',
            'modele'          => 'required|max:100',
            'couleur'         => 'required|max:50',
            'annee'           => 'required|digits:4|integer',
            'kilometrage'     => 'required|integer|min:0',
            'carrosserie'     => 'required|max:50',
            'energie'         => 'required|max:50',
            'boite'           => 'required|max:50',
        ]);

        $vehicule->update($request->all());
        return response()->json($vehicule);
    }

    public function apiDestroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();
        return response()->json(['message' => 'Vehicule supprime avec succes.']);
    }
}
