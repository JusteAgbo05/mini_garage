<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Technicien;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    public function index()
    {
        $reparations = Reparation::with('vehicule', 'techniciens')->paginate(8);
        return view('garage.reparations.index', compact('reparations'));
    }

    public function show(Reparation $reparation)
    {
        $reparation->load('vehicule', 'techniciens');
        return view('garage.reparations.show', compact('reparation'));
    }

    public function create()
    {
        $vehicules   = Vehicule::orderBy('marque')->get();
        $techniciens = Technicien::orderBy('nom')->get();
        return view('garage.reparations.create', compact('vehicules', 'techniciens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicule_id'       => 'required|exists:vehicules,id',
            'date'              => 'required|date',
            'duree_main_oeuvre' => 'required|numeric|min:0',
            'objet_reparation'  => 'required|max:255',
            'techniciens'       => 'required|array|min:1',
            'techniciens.*'     => 'exists:techniciens,id',
        ]);

        $reparation = Reparation::create([
            'vehicule_id'       => $request->vehicule_id,
            'date'              => $request->date,
            'duree_main_oeuvre' => $request->duree_main_oeuvre,
            'objet_reparation'  => $request->objet_reparation,
        ]);

        $reparation->techniciens()->sync($request->techniciens);

        return redirect()->route('reparations.index')
                         ->with('succes', 'Reparation ajoutee avec succes.');
    }

    public function edit(Reparation $reparation)
    {
        $vehicules   = Vehicule::orderBy('marque')->get();
        $techniciens = Technicien::orderBy('nom')->get();
        $technicienIds = $reparation->techniciens->pluck('id')->toArray();
        return view('garage.reparations.edit', compact('reparation', 'vehicules', 'techniciens', 'technicienIds'));
    }

    public function update(Request $request, Reparation $reparation)
    {
        $request->validate([
            'vehicule_id'       => 'required|exists:vehicules,id',
            'date'              => 'required|date',
            'duree_main_oeuvre' => 'required|numeric|min:0',
            'objet_reparation'  => 'required|max:255',
            'techniciens'       => 'required|array|min:1',
            'techniciens.*'     => 'exists:techniciens,id',
        ]);

        $reparation->update([
            'vehicule_id'       => $request->vehicule_id,
            'date'              => $request->date,
            'duree_main_oeuvre' => $request->duree_main_oeuvre,
            'objet_reparation'  => $request->objet_reparation,
        ]);

        $reparation->techniciens()->sync($request->techniciens);

        return redirect()->route('reparations.index')
                         ->with('succes', 'Reparation modifiee avec succes.');
    }

    public function destroy(Reparation $reparation)
    {
        $reparation->techniciens()->detach();
        $reparation->delete();

        return redirect()->route('reparations.index')
                         ->with('succes', 'Reparation supprimee avec succes.');
    }

    // Methodes API

    public function apiIndex()
    {
        return response()->json(Reparation::with('vehicule', 'techniciens')->get());
    }

    public function apiShow($id)
    {
        $reparation = Reparation::with('vehicule', 'techniciens')->findOrFail($id);
        return response()->json($reparation);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'vehicule_id'       => 'required|exists:vehicules,id',
            'date'              => 'required|date',
            'duree_main_oeuvre' => 'required|numeric|min:0',
            'objet_reparation'  => 'required|max:255',
            'techniciens'       => 'required|array|min:1',
            'techniciens.*'     => 'exists:techniciens,id',
        ]);

        $reparation = Reparation::create([
            'vehicule_id'       => $request->vehicule_id,
            'date'              => $request->date,
            'duree_main_oeuvre' => $request->duree_main_oeuvre,
            'objet_reparation'  => $request->objet_reparation,
        ]);

        $reparation->techniciens()->sync($request->techniciens);

        return response()->json($reparation->load('vehicule', 'techniciens'), 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $reparation = Reparation::findOrFail($id);

        $request->validate([
            'vehicule_id'       => 'required|exists:vehicules,id',
            'date'              => 'required|date',
            'duree_main_oeuvre' => 'required|numeric|min:0',
            'objet_reparation'  => 'required|max:255',
            'techniciens'       => 'array',
            'techniciens.*'     => 'exists:techniciens,id',
        ]);

        $reparation->update([
            'vehicule_id'       => $request->vehicule_id,
            'date'              => $request->date,
            'duree_main_oeuvre' => $request->duree_main_oeuvre,
            'objet_reparation'  => $request->objet_reparation,
        ]);

        if ($request->has('techniciens')) {
            $reparation->techniciens()->sync($request->techniciens);
        }

        return response()->json($reparation->load('vehicule', 'techniciens'));
    }

    public function apiDestroy($id)
    {
        $reparation = Reparation::findOrFail($id);
        $reparation->techniciens()->detach();
        $reparation->delete();
        return response()->json(['message' => 'Reparation supprimee avec succes.']);
    }
}
