@extends('admin.layouts.app')

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
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Data
            </a>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Operasional</h5>
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
                            <input type="hidden" id="operasionalId" name="id">
                            <div class="form-group">
                                <label for="editTanggal">Tanggal</label>
                                <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="editKeterangan">Keterangan</label>
                                <textarea class="form-control" id="editKeterangan" name="keterangan" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editKategori">Kategori</label>
                                <input type="text" class="form-control" id="editKategori" name="kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="editJumlah">Jumlah</label>
                                <input type="number" class="form-control" id="editJumlah" name="jumlah" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('manajemen_operasional.datatable') }}",
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id' },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-warning edit-button" data-id="${row.id}">Edit</button>
                            <button class="btn btn-danger delete-button" data-id="${row.id}">Hapus</button>
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

        // Tambah Data
        $('#createForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('manajemen_operasional.store') }}",
                data: $(this).serialize(),
                success: function(response) {
                    $('#exampleModal').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Edit Data
        $(document).on('click', '.edit-button', function() {
            const id = $(this).data('id');
            $.get(`/admin/operasional/edit/${id}`, function(data) {
                $('#operasionalId').val(data.id);
                $('#editTanggal').val(data.tanggal);
                $('#editKeterangan').val(data.keterangan);
                $('#editKategori').val(data.kategori);
                $('#editJumlah').val(data.jumlah);
                $('#editModal').modal('show');
            });
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            const id = $('#operasionalId').val();
            $.ajax({
                type: 'PUT',
                url: `/admin/operasional/update/${id}`,
                data: $(this).serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Hapus Data
        $(document).on('click', '.delete-button', function() {
            const id = $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    type: 'DELETE',
                    url: `/admin/operasional/destroy/${id}`,
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

@endpush
