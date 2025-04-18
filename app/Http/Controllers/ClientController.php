<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = User::where('id', '!=', Auth::id())->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $data['password']  = "randomnon used password";
        try {
            User::create($data);
            return redirect()->route('clients.index')->with('success', 'Client created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create client: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $client)
    {
        $client->load('reservations.chambre');
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $client)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $client->id,
        ]);

        try {
            $client->update($data);
            return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update client: ' . $e->getMessage())->withInput();
        }
    }
}
