<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $types = Type::all();
        return view('types.index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $data = $request->validate([
            'titre' => 'required|min:3|unique:types,titre',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['photo'] = $imageName;
        }

        // Create new type record
        try {
            Type::create($data);
            return redirect()
                ->route('types.index')
                ->with('success', 'Type ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create type. Please try again.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'titre' => 'required|min:3|unique:types,titre,' . $type->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['photo'] = $imageName;
        } else{
            unset($data['photo']); 
        }
        $type->update($data);
        return redirect()->route('types.index')->with('success', 'Type modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index')->with('success', 'Type supprimé avec succès');
    }
}
