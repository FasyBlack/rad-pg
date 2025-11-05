@extends('components.layout')

@section('content')
    <div class="container-fluid py-4">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Rencana Kerja</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Rencana Kerja</li>
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
                        <h6>Form Tambah Rencana Kerja</h6>
                        <a href="{{ route('rencanakerja') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                    </div>
                    <div class="card-body">
                        {{-- ✅ Menampilkan error validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- ✅ Form Tambah Data --}}
                        <form action="{{ route('rencana_kerja.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="id_strategi" class="form-label">Strategi</label>
                                    <select name="id_strategi" id="id_strategi" class="form-select" required>
                                        <option value="">-- Pilih Strategi --</option>
                                        @foreach ($strategis as $data)
                                            <option value="{{ $data->id }}">{{ $data->strategi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Perangkat Daerah</label>
                                    {{-- @php $user = Auth::guard('pengguna')->user(); @endphp --}}
                                    {{-- @if ($user && $user->level == 'Admin')
                                            <input type="hidden" name="id_opd" value="{{ $user->id_opd }}">
                                            <input type="text" class="form-control bg-light" value="{{ $user->opd->nama ?? '-' }}" required>
                                        @else --}}
                                    <select name="id_opd" class="form-select" required>
                                        <option value="">-- Pilih OPD --</option>
                                        @foreach ($opd as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('id_opd') == $data->id ? 'selected' : '' }}>
                                                {{ $data->opd }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- @endif --}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="rencana_aksi" class="form-label">Rencana Aksi / Aktivitas</label>
                                <textarea name="rencana_aksi" id="rencana_aksi" rows="3" class="form-control" required>{{ old('rencana_aksi') }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kegiatan" class="form-label">Kegiatan</label>
                                    <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                                        value="{{ old('kegiatan') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="sub_kegiatan" class="form-label">Sub Kegiatan</label>
                                    <input type="text" name="sub_kegiatan" id="sub_kegiatan" class="form-control"
                                        value="{{ old('sub_kegiatan') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nama_program" class="form-label">Program</label>
                                <input type="text" name="nama_program" id="nama_program" class="form-control"
                                    value="{{ old('nama_program') }}" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control"
                                        value="{{ old('lokasi') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="volume" class="form-label">Volume Target</label>
                                    <input type="text" name="volume" id="volume" class="form-control"
                                        value="{{ old('volume') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" name="satuan" id="satuan" class="form-control"
                                        value="{{ old('satuan') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="text" name="tahun" id="tahun" class="form-control"
                                        value="{{ old('tahun') }}" required>
                                </div>
                            </div>

                            <fieldset class="border p-3 rounded-3 mb-3">
                                <legend class="float-none w-auto px-2 h6">Detail Pendanaan</legend>

                                {{-- Tombol untuk memicu Modal --}}
                                <button type="button" class="btn btn-primary  mb-3" data-bs-toggle="modal"
                                    data-bs-target="#anggaranModal">
                                    <i class="bi bi-plus-circle"></i> Tambah Anggaran & Sumber Dana
                                </button>

                                {{-- Tabel untuk menampilkan data anggaran --}}
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">Anggaran</th>
                                                <th class="text-center" scope="col">Sumber Dana</th>
                                                <th class="text-center" scope="col" style="width: 10%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="anggaran-table-body">
                                            {{-- Data anggaran akan muncul di sini via JavaScript --}}
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Container untuk menyimpan hidden input yang akan dikirim ke server --}}
                                <div id="hidden-inputs-container" style="display: none;"></div>

                                <div class="mt-2">
                                    <label class="form-label">Keterangan (Opsional)</label>
                                    <textarea name="keterangan" class="form-control" rows="3" >{{ old('keterangan') }}</textarea>
                                </div>

                            </fieldset>



                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                                <a href="{{ route('rencanakerja') }}" class="btn btn-secondary">
                                    Batal
                                </a>
                            </div>
                        </form>
                        <div class="modal fade" id="anggaranModal" tabindex="-1" aria-labelledby="anggaranModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered"> {{-- <<<<<<<<<<<<<< TAMBAHKAN KELAS DI SINI --}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="anggaranModalLabel">Tambah Anggaran Dan Sumber Dana
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="modal-anggaran-form">
                                            <div class="mb-3">
                                                <label for="modal-anggaran" class="form-label">Anggaran</label>
                                                <input type="text" id="modal-anggaran" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="modal-sumberdana" class="form-label">Sumber Dana</label>
                                                <select id="modal-sumberdana" class="form-select" required>
                                                    <option value="">-- Pilih Sumber Dana --</option>
                                                    <option value="APBN">APBN</option>
                                                    <option value="DAK">DAK</option>
                                                    <option value="APBD Kab">APBD Kab</option>
                                                    <option value="APBD Prov">APBD Prov</option>
                                                    <option value="BK Prov">BK Prov</option>
                                                    <option value="DBHCHT">DBHCHT</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="mb-3" id="modal-sumberdana-lainnya-container"
                                                style="display: none;">
                                                <label for="modal-sumberdana-lainnya" class="form-label">Sumber Dana
                                                    Lainnya</label>
                                                <input type="text" id="modal-sumberdana-lainnya" class="form-control"
                                                    placeholder="Masukkan sumber dana lainnya">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary" id="tambah-ke-tabel">Tambah ke
                                            Tabel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @push('scripts')
            {{-- Memanggil file JavaScript eksternal --}}
            <script src="{{ asset('js/AnggaranSumberdana.js') }}"></script>
        @endpush
