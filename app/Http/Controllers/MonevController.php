<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use App\Models\Opd;
use App\Models\Strategi;
use Illuminate\Http\Request;

class MonevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monev = Monev::with(['strategi', 'opd'])->get();
        return view('admin.monev.index', compact('monev'));
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
        //
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
        $monev = Monev::findOrFail($id);
        $monev->anggaran = explode('; ', $monev->anggaran);
        $monev->sumberdana = explode('; ', $monev->sumberdana);
        return view('admin.monev.update', compact('monev', 'strategis', 'opd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Temukan data yang akan diupdate
        $monev = Monev::findOrFail($id);

        // 2. Validasi semua input dari request
        $validatedData = $request->validate([
           'id_strategi' => 'required|exists:strategis,id',
            'id_opd'        => 'required|exists:opds,id',


            'anggaran'     => 'required|array',
            'anggaran.*'   => 'required|string',
            'sumberdana'   => 'required|array',
            'sumberdana.*' => 'required|string',
            // Validasi untuk data triwulan sebagai array
            'dokumen_anggaran'  => 'nullable|array',
            'realisasi'     => 'nullable|array',
            'volumeTarget'  => 'nullable|array',
            'satuan_realisasi'  => 'nullable|array',
            'uraian'    => 'nullable|array',
        ]);

        $anggaranString = implode('; ', $validatedData['anggaran']);
        $sumberdanaString = implode('; ', $validatedData['sumberdana']);

        // 3. Siapkan data untuk diupdate dengan memetakan nama field
        $updateData = [
           'id_strategi' => $validatedData['id_strategi'],

            'id_opd'           => $validatedData['id_opd'],
            'anggaran'      => $anggaranString,
            'sumberdana'    => $sumberdanaString,


            // Peta nama input ke nama kolom database untuk data array
            'dokumen_anggaran' => $validatedData['dokumen_anggaran'] ?? [],
            'realisasi'        => $validatedData['realisasi'] ?? [],
            'volumeTarget'     => $validatedData['volumeTarget'] ?? [],
            'satuan_realisasi'     => $validatedData['satuan_realisasi'] ?? [],
            'uraian'       => $validatedData['uraian'] ?? [],
        ];

        // 4. Lakukan update pada data
        $monev->update($updateData);

        // 5. Tambahkan log dan redirect dengan pesan sukses

        return redirect()->route('monev')->with('success', 'Data Monitoring Evaluasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
