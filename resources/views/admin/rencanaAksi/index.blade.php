@extends('components.layout')

@section('content')
<div class="container-fluid py-4">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Rencana Aksi</li>
                </ol>
                {{-- <h6 class="font-weight-bolder text-white mb-0">Rencana Aksi</h6> --}}
            </nav>

            <div class="ms-md-auto pe-md-1 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
            </div>
        </div>
    </nav>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Daftar Rencana Aksi</h6>

                    {{-- ✅ Tombol Tambah Data --}}
                    <a href="{{ route('rencana_aksi.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Sub Program</th>
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
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rencanaAksi as $index => $item)
                                     <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->strategi->strategi ?? '-' }}</td>
                                        <td>{{ $item->rencana_aksi }}</td>
                                        <td>{{ $item->sub_kegiatan }}</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td>{{ $item->nama_program }}</td>
                                        <td>{{ $item->lokasi }}</td>
                                        <td class="text-center">{{ $item->volume }}</td>
                                        <td class="text-center">{{ $item->satuan }}</td>
                                        <td class="text-center">{{ $item->tahun }}</td>
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
                                        <td>{{ $item->keterangan ?? '-' }}</td>
                                        <td>

                                            <a href="{{ route('rencana_aksi.update', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('rencana_aksi.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center text-muted">Belum ada data Rencana Aksi.</td>
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
