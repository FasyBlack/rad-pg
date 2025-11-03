<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opd = Opd::all();
        return view('admin.opd.index', compact('opd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'opd' => 'required',
            'status' => 'required|string|max:50',
        ]);

        Opd::create([
            'opd' => $validatedData['opd'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('opd')->with('success', 'Opd created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'e_opd' => 'required',
            'e_status' => 'required|string|max:50',
        ]);

        $opd = Opd::findOrFail($id);
        $opd->update([
            'opd' => $validatedData['e_opd'],
            'status' => $validatedData['e_status'],
        ]);

        return redirect()->route('opd')->with('success', 'Opd updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $opd = Opd::findOrFail($id);
        $opd->delete();

        return redirect()->route('opd')->with('success', 'Opd deleted successfully.');
    }
}
