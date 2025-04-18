<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $reservations = Reservation::with('chambre', 'client')->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::where('id', '!=', Auth::id())->get();

        $chambres = Chambre::all();
        return view('reservations.create', compact('clients', 'chambres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'chambre_id' => 'required|exists:chambres,id',
            'date_arrivee' => 'required|date|after_or_equal:today',
            'date_departe' => 'required|date|after_or_equal:date_arrivee',
        ]);
        Reservation::create($data);
        return redirect()->route('reservations.index')->with('success', 'La réservation a été créée avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {

        $clients = User::where('id', '!=', Auth::id())->get();
        $chambres = Chambre::all();

        return view('reservations.edit', compact('reservation', 'clients', 'chambres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'chambre_id' => 'required|exists:chambres,id',
            'date_arrivee' => 'required|date|after_or_equal:today',
            'date_departe' => 'required|date|after_or_equal:date_arrivee',
        ]);
        $reservation->update($data);

        return redirect()->route('reservations.index')->with('success', 'La réservation a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'La réservation a été supprimée avec succès.');
    }
}
