<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\RencanaKerja;
use App\Models\Strategi;
use Illuminate\Http\Request;

class RencanaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rencana_kerja.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opd = Opd::all();
        $strategis = Strategi::all();
        return view('admin.rencana_kerja.create', compact('strategis', 'opd'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_strategi' => 'required|exists:strategis,id',
            'id_opd' => 'required|exists:opds,id',
            'rencana_aksi' => 'required|string',
            'kegiatan' => 'required|string',
            'sub_kegiatan' => 'required|string',
            'nama_program' => 'required|string',
            'lokasi' => 'required|string',
            'volume' => 'required|string',
            'satuan' => 'required|string',
            'anggaran' => 'required|string',
            'sumberdana' => 'required|string',
            'tahun' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        RencanaKerja::create([
            'id_strategi' => $validatedData['id_strategi'],
            'id_opd' => $validatedData['id_opd'],
            'rencana_aksi' => $validatedData['rencana_aksi'],
            'kegiatan' => $validatedData['kegiatan'],
            'sub_kegiatan' => $validatedData['sub_kegiatan'],
            'nama_program' => $validatedData['nama_program'],
            'lokasi' => $validatedData['lokasi'],
            'volume' => $validatedData['volume'],
            'satuan' => $validatedData['satuan'],
            'anggaran' => $validatedData['anggaran'],
            'sumberdana' => $validatedData['sumberdana'],
            'tahun' => $validatedData['tahun'],
            'keterangan' => $validatedData['keterangan'] ?? null,
        ]);

        // Logic to store Rencana Kerja goes here

        return redirect()->route('rencana_kerja')->with('success', 'Rencana Kerja created successfully.');
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
        $opd = Opd::all();
        $strategis = Strategi::all();
        $rencanaKerja = RencanaKerja::findOrFail($id);
        return view('admin.rencana_kerja.edit', compact('rencanaKerja', 'strategis', 'opd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_strategi' => 'required|exists:strategis,id',
            'id_opd' => 'required|exists:opds,id',
            'rencana_aksi' => 'required|string',
            'kegiatan' => 'required|string',
            'sub_kegiatan' => 'required|string',
            'nama_program' => 'required|string',
            'lokasi' => 'required|string',
            'volume' => 'required|string',
            'satuan' => 'required|string',
            'anggaran' => 'required|string',
            'sumberdana' => 'required|string',
            'tahun' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $rencanaKerja = RencanaKerja::findOrFail($id);
        $rencanaKerja->update([
            'id_strategi' => $validatedData['id_strategi'],
            'id_opd' => $validatedData['id_opd'],
            'rencana_aksi' => $validatedData['rencana_aksi'],
            'kegiatan' => $validatedData['kegiatan'],
            'sub_kegiatan' => $validatedData['sub_kegiatan'],
            'nama_program' => $validatedData['nama_program'],
            'lokasi' => $validatedData['lokasi'],
            'volume' => $validatedData['volume'],
            'satuan' => $validatedData['satuan'],
            'anggaran' => $validatedData['anggaran'],
            'sumberdana' => $validatedData['sumberdana'],
            'tahun' => $validatedData['tahun'],
            'keterangan' => $validatedData['keterangan'] ?? null,
        ]);

        return redirect()->route('rencana_kerja')->with('success', 'Rencana Kerja updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rencanaKerja = RencanaKerja::findOrFail($id);
        $rencanaKerja->delete();

        return redirect()->route('rencana_kerja.index')->with('success', 'Rencana Kerja deleted successfully.');
    }
}
