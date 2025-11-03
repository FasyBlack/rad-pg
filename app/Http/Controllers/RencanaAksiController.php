<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\RencanaAksi;
use App\Models\Strategi;
use Illuminate\Http\Request;

class RencanaAksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rencanaAksi = RencanaAksi::with(['strategi', 'opd'])->get();
        return view('admin.rencanaAksi.index', compact('rencanaAksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opd = Opd::all();
        $strategis = Strategi::all();
        return view('admin.rencanaAksi.create', compact('strategis', 'opd'));
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
            'anggaran' => 'required|array',
            'anggaran.*' => 'required|string',
            'sumberdana' => 'required|array',
            'sumberdana.*' => 'required|string',
            'tahun' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        // 4. Ubah array anggaran dan sumberdana menjadi string
        $anggaranString = implode('; ', $validatedData['anggaran']);
        $sumberdanaString = implode('; ', $validatedData['sumberdana']);

        RencanaAksi::create([
            'id_strategi' => $validatedData['id_strategi'],
            'id_opd' => $validatedData['id_opd'],
            'rencana_aksi' => $validatedData['rencana_aksi'],
            'kegiatan' => $validatedData['kegiatan'],
            'sub_kegiatan' => $validatedData['sub_kegiatan'],
            'nama_program' => $validatedData['nama_program'],
            'lokasi' => $validatedData['lokasi'],
            'volume' => $validatedData['volume'],
            'satuan' => $validatedData['satuan'],
            'anggaran'      => $anggaranString,
            'sumberdana'    => $sumberdanaString,
            'tahun' => $validatedData['tahun'],
            'keterangan' => $validatedData['keterangan'] ?? null,
        ]);

        return redirect()->route('rencanaAksi')->with('success', 'Rencana Aksi created successfully.');
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
        $rencanaAksi = RencanaAksi::findOrFail($id);
        return view('admin.rencanaAksi.edit', compact('rencanaAksi', 'strategis', 'opd'));
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
        $rencanaAksi = RencanaAksi::findOrFail($id);
        $rencanaAksi->update([
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

        return redirect()->route('rencanaAksi')->with('success', 'Rencana Aksi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rencanaAksi = RencanaAksi::findOrFail($id);
        $rencanaAksi->delete();
        return redirect()->route('rencanaAksi.index')->with('success', 'Rencana Aksi deleted successfully.');
    }
}
