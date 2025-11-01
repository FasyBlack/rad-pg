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
        return view('admin.strategi.index');
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
            'strategi' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        Strategi::create([
            'strategi' => $validateData['strategi'],
            'keterangan' => $validateData['keterangan'],
        ]);

        return redirect()->back()->with('success', 'Data strategi berhasil disimpan!');
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
            'e_strategi' => 'required|string|max:255',
            'e_keterangan' => 'required|string',
        ]);

        $strategi = Strategi::findOrFail($id);

        $strategi->update([
            'strategi' => $validateData['e_strategi'],
            'keterangan' => $validateData['e_keterangan'],
        ]);

        return redirect()->back()->with('success', 'Data strategi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Strategi::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data strategi berhasil dihapus!');
    }
}
