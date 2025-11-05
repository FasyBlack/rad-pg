<?php

namespace App\Http\Controllers;

use App\Models\Monev;
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
        $rencanaKerja = RencanaKerja::with(['strategi', 'opd'])->get();
        return view('admin.rencanaKerja.index', compact('rencanaKerja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opd = Opd::all();
        $strategis = Strategi::all();
        return view('admin.rencanaKerja.create', compact('strategis', 'opd'));
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

        $rencana = RencanaKerja::create([
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

         $monev = Monev::create([
            // 'id_pengguna'   => $rencana->id_pengguna,
            'id_strategi' => $rencana->id_strategi,
            'id_renja'      => $rencana->id,
            'id_opd'        => $rencana->id_opd,
            'anggaran'      => $anggaranString,
            'sumberdana'    => $sumberdanaString,
            'is_locked'     => true,


        ]);

        // Logic to store Rencana Kerja goes here

        return redirect()->route('rencanakerja')->with('success', 'Rencana Kerja created successfully.');
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
        $rencanaKerja->anggaran = explode('; ', $rencanaKerja->anggaran);
        $rencanaKerja->sumberdana = explode('; ', $rencanaKerja->sumberdana);
        return view('admin.rencanaKerja.update', compact('rencanaKerja', 'strategis', 'opd'));
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
            'anggaran'     => 'required|array',
            'anggaran.*'   => 'required|string',
            'sumberdana'   => 'required|array',
            'sumberdana.*' => 'required|string',
            'tahun' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $rencanaKerja = RencanaKerja::findOrFail($id);
        $anggaranString = implode('; ', $validatedData['anggaran']);
        $sumberdanaString = implode('; ', $validatedData['sumberdana']);
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
            'anggaran'      => $anggaranString,
            'sumberdana'    => $sumberdanaString,
            'tahun' => $validatedData['tahun'],
            'keterangan' => $validatedData['keterangan'] ?? null,
        ]);

        return redirect()->route('rencanakerja')->with('success', 'Rencana Kerja updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rencanaKerja = RencanaKerja::findOrFail($id);
        $rencanaKerja->delete();

        return redirect()->route('rencanakerja')->with('success', 'Rencana Kerja deleted successfully.');
    }
}
