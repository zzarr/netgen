@extends('admin.layouts.app')
@section('title', 'Manajemen Operasional')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Manajemen Operasional</h3>
        </div>

        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Operasional</span></li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-12 col-md-12 mt-3 layout-spacing">
        <div class="d-flex justify-content-start mb-3">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Data
            </a>
        </div>
        <a href="{{ route('manajemen_operasional.export_pdf') }}" class="btn btn-danger">Export PDF</a>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Data Operasional</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createForm">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" required></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 mt-3 layout-spacing">
            <div class="total-saldo">
                <h4>Total Saldo: Rp {{ number_format($totalSaldo, 2, ',', '.') }}</h4>
            </div>

            
        <!-- Tabel Data -->
        <div class="row" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="datatable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="no-content">Aksi</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Operasional</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group mb-4">
                            <label for="edit_tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="edit_keterangan">Keterangan</label>
                            <textarea class="form-control" id="edit_keterangan" name="keterangan" placeholder="Masukkan Keterangan" required></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="edit_kategori">Kategori</label>
                            <input type="text" class="form-control" id="edit_kategori" name="kategori" placeholder="Masukkan Kategori" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="edit_jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="edit_jumlah" name="jumlah" placeholder="Masukkan Jumlah" required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<!-- Sertakan CSRF Token di Meta Tag -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        const table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('manajemen_operasional.datatable') }}",
                type: 'GET'
            },
            columns: [
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1; // Menghitung nomor urut
                    },
                    orderable: false,
                    searchable: false
                },
                {
    data: null,
    render: function(data, type, row) {
        return `
            <button class="btn btn-warning edit-button" data-id="${row.id}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
        <circle cx="12" cy="12" r="3"></circle>
        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
    </svg>
</button>
<button class="btn btn-danger delete-button" data-id="${row.id}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        <line x1="10" y1="11" x2="10" y2="17"></line>
        <line x1="14" y1="11" x2="14" y2="17"></line>
    </svg>
</button>
        `;
    },
    orderable: false,
    searchable: false
},

                { data: 'tanggal', name: 'tanggal' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'kategori', name: 'kategori' },
                { 
                    data: 'jumlah', 
                    name: 'jumlah',
                    render: function(data, type, row) {
                        return parseFloat(data) % 1 === 0 ? parseInt(data) : data;
                    }
                },
            ]
        });

        // Edit Data
        $(document).on('click', '.edit-button', function() {
            const id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: `/admin/operasional/edit/${id}`, // Use the edit route to get data
                success: function(response) {
                    $('#edit_id').val(response.id);
                    $('#edit_tanggal').val(response.tanggal);
                    $('#edit_keterangan').val(response.keterangan);
                    $('#edit_kategori').val(response.kategori);
                    $('#edit_jumlah').val(response.jumlah);
                    $('#editModal').modal('show');
                },
                error: function(xhr) {
                    alert('Data tidak ditemukan');
                }
            });
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();
            const id = $('#edit_id').val();
            $.ajax({
                type: 'PUT',
                url: `/admin/operasional/update/${id}`, // Update the URL to use the update route
                data: $(this).serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    table.ajax.reload(); // Reload DataTable
                    alert(response.success); // Notify success
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat memperbarui data.');
                }
            });
        });

        // Hapus Data
        $(document).on('click', '.delete-button', function() {
            const id = $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    type: 'DELETE',
                    url: `/admin/operasional/delete/${id}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        alert(response.success);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });

        // Tambah Data
        $('#createForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('manajemen_operasional.store') }}", // Ganti dengan URL untuk menambah data
                data: $(this).serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    table.ajax.reload();
                }
            });
        });
    });
</script>
@endpush
