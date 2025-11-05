@extends('components.layout')
@section('content')
    <div class="container-fluid py-4">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Monitoring Evaluasi</li>
                    </ol>
                    {{-- <h6 class="font-weight-bolder text-white mb-0">Monitoring Evaluasi</h6> --}}
                </nav>
                <div class="ms-md-auto pe-md-1 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
            </div>
        </nav>
       <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Daftar Monitoring Evaluasi</h6>

                        {{-- ✅ Tombol Tambah Data --}}
                        {{-- <a href="{{ route('monev.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a> --}}
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Strategi</th>
                                        <th>Rencana Aksi / Aktivitas</th>
                                        <th>Sub Kegiatan</th>
                                        <th>Kegiatan</th>
                                        <th>Program</th>
                                        <th>Lokasi</th>
                                        <th class="text-center">Volume Target</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Tahun</th>
                                        <th>Perangkat Daerah</th>
                                        <th>Anggaran</th>
                                        <th>Sumber Dana</th>
                                        <th>Status</th>
                                        <th>Dokumen Anggaran</th>
                                        <th>Realisasi Anggaran</th>
                                        <th>Volume Realisasi</th>
                                        <th>Satuan Volume</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($monev as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->strategi->strategi ?? '-' }}</td>
                                            <td>{{ $item->rencanaKerja->rencana_aksi }}</td>
                                            <td>{{ $item->rencanaKerja->sub_kegiatan }}</td>
                                            <td>{{ $item->rencanaKerja->kegiatan }}</td>
                                            <td>{{ $item->rencanaKerja->nama_program }}</td>
                                            <td>{{ $item->rencanaKerja->lokasi }}</td>
                                            <td class="text-center">{{ $item->rencanaKerja->volume }}</td>
                                            <td class="text-center">{{ $item->rencanaKerja->satuan }}</td>
                                            <td class="text-center">{{ $item->rencanaKerja->tahun }}</td>
                                            <td>{{ $item->opd->opd ?? '-' }}</td>
                                            @php
                                                $anggarans = explode('; ', $item->anggaran);
                                                $sumberdanas = explode('; ', $item->sumberdana);
                                            @endphp

                                            @if (count($anggarans) > 1)
                                                <td class="multi-item-rensi align-middle">
                                                    @foreach ($anggarans as $anggaran)
                                                        <div>{{ $anggaran ?: '-' }}</div>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td class="align-middle">{{ $item->anggaran ?: '-' }}</td>
                                            @endif

                                            @if (count($sumberdanas) > 1)
                                                <td class="multi-item-rensi align-middle">
                                                    @foreach ($sumberdanas as $sumber)
                                                        <div>{{ $sumber ?: '-' }}</div>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td class="align-middle">{{ $item->sumberdana ?: '-' }}</td>
                                            @endif
                                             {{-- kolom status --}}
                                                    <td class="text-center">
                                                        @if ($item->status === 'Valid')
                                                            <span class="badge bg-success">{{ $item->status }}</span>
                                                        @else
                                                            <span class="badge bg-secondary">{{ $item->status }}</span>
                                                        @endif
                                                    </td>

                                                    @php
                                                        // Definisikan array pemetaan angka ke Romawi di sini
                                                        // Indeks 0 sengaja dikosongkan agar $romanMap[1] menjadi 'I'
                                                        $romanMap = ['', 'I', 'II', 'III', 'IV'];
                                                    @endphp

                                                    {{-- Kolom Dokumen Anggaran (Tidak perlu diubah, sudah benar) --}}
                                                    <td class="text-center">
                                                        @forelse (($item->dokumen_anggaran ?? []) as $status)
                                                            @if ($status && str_contains($status, 'ADA'))
                                                                <span
                                                                    class="badge bg-success d-block mb-1">{{ $status }}</span>
                                                            @elseif ($status)
                                                                <span
                                                                    class="badge bg-danger d-block mb-1">{{ $status }}</span>
                                                            @endif
                                                        @empty
                                                            <span>-</span>
                                                        @endforelse
                                                    </td>

                                                    {{-- Kolom Realisasi (Diperbaiki dengan Flexbox) --}}
                                                    <td>
                                                        @if (is_array($item->realisasi))
                                                            @foreach ($item->realisasi as $triwulan => $nilai)
                                                                @if ($nilai)
                                                                    {{-- Bungkus setiap baris dengan div dan gunakan flex --}}
                                                                    <div style="display: flex; align-items: baseline;">
                                                                        {{-- Atur lebar tetap untuk label --}}
                                                                        <span style="width: 55px; display: inline-block;">
                                                                            TW {{ $romanMap[$triwulan] ?? $triwulan }}
                                                                        </span>
                                                                        <span>:</span>
                                                                        {{-- Beri sedikit jarak kiri --}}
                                                                        <span
                                                                            style="margin-left: 5px;">{{ $nilai }}</span>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ $item->realisasi }}
                                                        @endif
                                                    </td>

                                                    {{-- Kolom Volume realisasi (Diperbaiki dengan Flexbox) --}}
                                                    <td>
                                                        @if (is_array($item->volumeTarget))
                                                            @foreach ($item->volumeTarget as $triwulan => $nilai)
                                                                @if ($nilai)
                                                                    <div style="display: flex; align-items: baseline;">
                                                                        <span style="width: 55px; display: inline-block;">
                                                                            TW {{ $romanMap[$triwulan] ?? $triwulan }}
                                                                        </span>
                                                                        <span>:</span>
                                                                        <span
                                                                            style="margin-left: 5px;">{{ $nilai }}</span>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ $item->volumeTarget }}
                                                        @endif
                                                    </td>

                                                    {{-- Kolom Satuan Realisasi (Diperbaiki dengan Flexbox) --}}
                                                    <td>
                                                        @if (is_array($item->satuan_realisasi))
                                                            @foreach ($item->satuan_realisasi as $triwulan => $nilai)
                                                                @if ($nilai)
                                                                    <div style="display: flex; align-items: baseline;">
                                                                        <span style="width: 55px; display: inline-block;">
                                                                            TW {{ $romanMap[$triwulan] ?? $triwulan }}
                                                                        </span>
                                                                        <span>:</span>
                                                                        <span
                                                                            style="margin-left: 5px;">{{ $nilai }}</span>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ $item->satuan_realisasi }}
                                                        @endif
                                                    </td>
                                                    {{-- kolom uraian --}}
                                                    <td>
                                                        @if (is_array($item->uraian))
                                                            @foreach ($item->uraian as $triwulan => $nilai)
                                                                @if ($nilai)
                                                                    <div style="display: flex; align-items: baseline;">
                                                                        <span style="width: 55px; display: inline-block;">
                                                                            TW {{ $romanMap[$triwulan] ?? $triwulan }}
                                                                        </span>
                                                                        <span>:</span>
                                                                        <span
                                                                            style="margin-left: 5px;">{{ $nilai }}</span>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ $item->uraian }}
                                                        @endif
                                                    </td>
                                                    {{-- @if ($adaPesan)
                                                        <td>{{ $item->pesan }}</td>
                                                    @endif --}}

                                            <td>

                                                 <form action="{{ route('monev.edit', $item->id) }}"
                                                                    method="GET" style="display:inline;">
                                                                    <button class="btn btn-sm btn-warning">
                                                                        Edit/Lengkapi Data
                                                                    </button>
                                                                </form>
                                                <form id="formDelete-{{ $item->id }}"
                                                    action="{{ route('monev.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDeleteSub('{{ $item->id }}')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="15" class="text-center text-muted">Belum ada data Rencana Aksi.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-between align-items-center px-4 mt-3">
                            {{-- <div class="text-sm text-muted">
                            Menampilkan {{ $rencanaAksi->firstItem() ?? 0 }} sampai {{ $rencanaAksi->lastItem() ?? 0 }} dari {{ $rencanaAksi->total() ?? 0 }} hasil
                        </div>
                        <div>
                            {{ $rencanaAksi->links('vendor.pagination.bootstrap-5') }}
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
