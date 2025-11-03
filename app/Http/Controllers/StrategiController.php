<?php

namespace App\Http\Controllers;

use App\Models\Strategi;
use Illuminate\Http\Request;

class StrategiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strategi = Strategi::all();
        return view('admin.strategi.index', compact('strategi'));
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
        $validateData = $request->validate([
            'program' => 'required',
            'strategi' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        Strategi::create([
            'program' => $validateData['program'],
            'strategi' => $validateData['strategi'],
            'keterangan' => $validateData['keterangan'],
        ]);

       return redirect()->route('strategi')->with('success', 'Data strategi berhasil disimpan!');

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
        $validateData = $request->validate([
            'e_program' => 'required',
            'e_strategi' => 'required|string|max:255',
            'e_keterangan' => 'required|string',
        ]);

        $strategi = Strategi::findOrFail($id);

        $strategi->update([
            'program' => $validateData['e_program'],
            'strategi' => $validateData['e_strategi'],
            'keterangan' => $validateData['e_keterangan'],
        ]);

        return redirect()->route('strategi')->with('success', 'Data strategi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Strategi::where('id', $id)->delete();

        return redirect()->route('strategi')->with('success', 'Data Berhasil Dihapus');
    }
}
