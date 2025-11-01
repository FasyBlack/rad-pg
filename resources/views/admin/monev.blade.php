@extends('components.layout')
@section('content')
    <div class="container-fluid py-4">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Monev</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Monitoring Evaluasi</h6>
                </nav>
                <div class="ms-md-auto pe-md-1 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Authors table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table  ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sub Program</th>
                                        <th>Rencana Aksi / Aktivitas</th>
                                        <th>Sub Kegiatan</th>
                                        <th>Kegiatan</th>
                                        <th>Program</th>
                                        <th>Lokasi</th>
                                        <th>Volume Target</th>
                                        <th>Satuan</th>
                                        <th>Tahun</th>
                                        <th>Perangkat Daerah</th>
                                        <th>Anggaran</th>
                                        <th>Sumber Dana</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="nomor">1</td>
                                        <td class="kolom-lebar">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum</td>
                                        <td class="kolom-lebar">ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum</td>
                                        <td class="kolom-lebar">ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum</td>
                                        <td class="kolom-lebar">ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum </td>
                                        <td class="kolom-lebar"> aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur.</td>
                                        <td>pariatur.</td>
                                        <td>pariatur.</td>
                                        <td>Satuan</td>
                                        <td>Tahun</td>
                                        <td>Perangkat Daerah</td>
                                        <td>Anggaran</td>
                                        <td>Sumber Dana</td>
                                        <td>Keterangan</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="table-footer">
                        {{-- Taruh info pagination di sini --}}
                        <div class="summary">
                            Showing 1 to 1 of
                             results
                        </div>
                        <div class="pagination-sm">
                            {{-- Panggil view pagination kustom kita --}}
                            {{-- {{ $rencanaAksi->appends(['tahun' => $selectedYear])->onEachSide(1)->links('vendor.pagination.buttons-only') }}
                         --}}
                          </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
