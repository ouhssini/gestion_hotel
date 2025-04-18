<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Type;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambres = Chambre::with('type')->get();
        return view('chambres.index',[
            'chambres' => $chambres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all(); 
        return view('chambres.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|string',
            'superficie' => 'required|integer',
            'etage' => 'required',
            'prix' => 'required|integer',
            'type_id' => 'required|integer',
        ]);

        Chambre::create($data);
        return redirect()->route('chambres.index')->with('success', 'Chambre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        $reservations = $chambre->reservations()->with('client')->get();
        return view('chambres.show', compact('chambre', 'reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        $types = Type::all(); 
        return view('chambres.edit', compact('chambre','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        $data = $request->validate([
            'description' => 'required|string',
            'superficie' => 'required|integer',
            'etage' => 'required',
            'prix' => 'required|integer',
            'type_id' => 'required|integer',
        ]);

        $chambre->update($data);
        return redirect()->route('chambres.index')->with('success', 'Chambre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        //
    }
}
