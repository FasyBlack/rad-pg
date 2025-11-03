@extends('components.layout')

@section('content')
    <div class="container-fluid py-4">
        {{-- Navbar --}}
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Strategi</li>
                    </ol>
                </nav>

                <div class="ms-md-auto pe-md-1 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Cari...">
                    </div>
                </div>
            </div>
        </nav>

        {{-- Konten --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4 shadow">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Daftar Strategi</h6>

                        {{-- ✅ Tombol Tambah Data pakai Modal --}}
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Program</th>
                                        <th class="text-center">Strategi</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($strategi as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->program }}</td>
                                            <td class="text-center">{{ $data->strategi }}</td>
                                            <td class="text-center">{{ $data->keterangan }}</td>
                                            <td class="text-center ">
                                                {{-- ✅ Tombol Edit Data --}}
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $data->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>

                                                <form id="formDelete-{{ $data->id }}"
                                                    action="{{ route('strategi.destroy', $data->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDeleteSub('{{ $data->id }}')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>


                                            </td>
                                        </tr>

                                        {{-- ✅ Modal Edit Data --}}
                                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-custom">

                                                <div class="modal-content border-0 shadow-lg">
                                                    <div class="modal-header bg-gradient-primary text-white">
                                                        <h6 class="modal-title" id="editModalLabel{{ $data->id }}">
                                                            <i class="fas fa-edit me-2"></i> Edit Strategi
                                                        </h6>
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('strategi.update', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="program{{ $data->id }}"
                                                                    class="form-label">Program</label>
                                                                <select name="e_program" id="program{{ $data->id }}"
                                                                    class="form-select" required>
                                                                    <option value="">Pilih</option>
                                                                    <option value="Program 1"
                                                                        {{ $data->program == 'Program 1' ? 'selected' : '' }}>
                                                                        Program 1</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="strategi{{ $data->id }}"
                                                                    class="form-label">Strategi</label>
                                                                <textarea name="e_strategi" id="strategi{{ $data->id }}" class="form-control" rows="3" required>{{ $data->strategi }}</textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="e_keterangan{{ $data->id }}"
                                                                    class="form-label">Keterangan</label>
                                                                <textarea name="e_keterangan" id="keterangan{{ $data->id }}" class="form-control" rows="2">{{ $data->keterangan }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer border-top">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fas fa-save me-1"></i> Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ✅ Modal Tambah Data --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-gradient-primary text-white">
                    <h6 class="modal-title" id="createModalLabel"><i class="fas fa-plus-circle me-2"></i> Tambah Strategi
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('strategi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="program" class="form-label">Program</label>
                            <select name="program" class="form-select" required>
                                <option value="">Pilih</option>
                                <option value="Program 1">Program 1</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="strategi" class="form-label">Strategi</label>
                            <textarea name="strategi" id="strategi" class="form-control" rows="3" placeholder="Masukkan strategi..."
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="2"
                                placeholder="Tambahkan keterangan jika ada..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Animasi buka modal yang halus
        const modal = document.getElementById('createModal');
        modal.addEventListener('shown.bs.modal', () => {
            document.getElementById('program').focus();
        });

        document.querySelectorAll('[id^="editModal"]').forEach(modal => {
            modal.addEventListener('shown.bs.modal', e => {
                const textarea = modal.querySelector('textarea');
                if (textarea) textarea.focus();
            });
        });
    </script>
@endpush
