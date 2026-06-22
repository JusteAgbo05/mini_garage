<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function index()
    {
        $techniciens = Technicien::paginate(8);
        return view('garage.techniciens.index', compact('techniciens'));
    }

    public function show(Technicien $technicien)
    {
        $technicien->load('reparations.vehicule');
        return view('garage.techniciens.show', compact('technicien'));
    }

    public function create()
    {
        return view('garage.techniciens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'        => 'required|max:100',
            'prenom'     => 'required|max:100',
            'specialite' => 'required|max:150',
        ]);

        Technicien::create($request->all());

        return redirect()->route('techniciens.index')
                         ->with('succes', 'Technicien ajoute avec succes.');
    }

    public function edit(Technicien $technicien)
    {
        return view('garage.techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, Technicien $technicien)
    {
        $request->validate([
            'nom'        => 'required|max:100',
            'prenom'     => 'required|max:100',
            'specialite' => 'required|max:150',
        ]);

        $technicien->update($request->all());

        return redirect()->route('techniciens.index')
                         ->with('succes', 'Technicien modifie avec succes.');
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();

        return redirect()->route('techniciens.index')
                         ->with('succes', 'Technicien supprime avec succes.');
    }

    // Methodes API

    public function apiIndex()
    {
        return response()->json(Technicien::with('reparations')->get());
    }

    public function apiShow($id)
    {
        $technicien = Technicien::with('reparations.vehicule')->findOrFail($id);
        return response()->json($technicien);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'nom'        => 'required|max:100',
            'prenom'     => 'required|max:100',
            'specialite' => 'required|max:150',
        ]);

        $technicien = Technicien::create($request->all());
        return response()->json($technicien, 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $technicien = Technicien::findOrFail($id);

        $request->validate([
            'nom'        => 'required|max:100',
            'prenom'     => 'required|max:100',
            'specialite' => 'required|max:150',
        ]);

        $technicien->update($request->all());
        return response()->json($technicien);
    }

    public function apiDestroy($id)
    {
        $technicien = Technicien::findOrFail($id);
        $technicien->delete();
        return response()->json(['message' => 'Technicien supprime avec succes.']);
    }
}
