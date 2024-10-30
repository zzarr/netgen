@extends('admin.layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Manajemen Antena</h3>
    </div>

    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg></a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Antena</span></li>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Antena</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createForm">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="namaAntena">Nama Antena</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Antena" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="ip">IP</label>
                                <input type="text" class="form-control" id="IP" name="IP" placeholder="Masukkan IP" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Antena</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        <input type="hidden" id="antenaId" name="id">
                        <div class="form-group">
                            <label for="editNama">Nama Antena</label>
                            <input type="text" class="form-control" id="editNama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="editIP">IP</label>
                            <input type="text" class="form-control" id="editIP" name="IP" required>
                        </div>
                        <div class="form-group">
                            <label for="editAlamat">Alamat</label>
                            <input type="text" class="form-control" id="editAlamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="editUsername">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="editPassword">Password</label>
                            <input type="text" class="form-control" id="editPassword" name="password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="datatable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="no-content">Action</th>
                                <th>Nama Antena</th>
                                <th>IP</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th class="column-pw">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @push('script')
    <script>
        //Tambah Data
        $('#createForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.antena.store') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#exampleModal').modal('hide');
                    $('#createForm')[0].reset();
                    $('#datatable').DataTable().ajax.reload();
                    Notiflix.Notify.success('Data berhasil ditambahkan!');
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.password) {
                            Notiflix.Notify.failure('Password harus memiliki minimal 6 karakter.');
                        }

                    } else {
                        Notiflix.Notify.failure('Terjadi kesalahan saat menambah data.');
                    }
                }
            });
        });

        //Edit data
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/admin/antena/edit/' + id,
                method: 'GET',
                success: function(data) {
                    $('#antenaId').val(data.id);
                    $('#editNama').val(data.nama);
                    $('#editIP').val(data.IP);
                    $('#editAlamat').val(data.alamat);
                    $('#editUsername').val(data.username);
                    $('#editPassword').val(data.password);


                    $('#editModal').modal('show');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });

        //Update Data
        $('#editForm').submit(function(e) {
            e.preventDefault();

            var id = $('#antenaId').val();
            var formData = $(this).serialize();

            $.ajax({
                url: '/admin/antena/update/' + id,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');

                    $('#datatable').DataTable().ajax.reload();

                    Notiflix.Notify.success('Data berhasil ditambahkan!');

                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.password) {
                            Notiflix.Notify.failure('Password harus memiliki minimal 6 karakter.');
                        }

                    } else {
                        Notiflix.Notify.failure('Terjadi kesalahan saat menambah data.');
                    }
                }
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let table = $("#datatable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.antena.datatable') }}",
                columnDefs: [{
                        targets: 0,
                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        },
                    },
                    {
                        targets: 1,
                        render: function(data, type, full, meta) {
                            let btn = `
                        <div class="btn-list">
                            <button class="btn btn-outline-info btn-edit mr-1 rounded-circle" data-id="${data}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                            </button>
                            <button class="btn btn-outline-danger btn-delete rounded-circle" data-id="${data}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    `;
                            return btn;
                        },

                    },
                    {
                        //Membatasi konten agar rapih
                        targets: 4,
                        render: function(data, type, full, meta) {
                            let maxLength = 30;
                            return data.length > maxLength ? data.substr(0, maxLength) + '...' : data;
                        },
                    },
                    {
                        //Membatasi konten agar rapih
                        targets: 6,
                        render: function(data, type, full, meta) {
                            let maxLength = 10;
                            return data.length > maxLength ? data.substr(0, maxLength) + '...' : data;
                        },
                    },
                ],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'IP'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: 'password'
                    },
                ],
                language: {
                    searchPlaceholder: 'Cari...',
                    sSearch: '',
                    oPaginate: {
                        sPrevious: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        sNext: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    }
                }

            });

            // Event listener untuk tombol delete
            $(document).on('click', '.btn-delete', function() {
                let dataId = $(this).data('id');

                Notiflix.Confirm.show(
                    'Konfirmasi Hapus',
                    'Apakah Anda yakin ingin menghapus data ini?',
                    'Ya, Hapus',
                    'Tidak',
                    function() {
                        $.ajax({
                            url: '/admin/antena/delete/' + dataId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Notiflix.Notify.success('Data berhasil dihapus');
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Notiflix.Notify.failure('Terjadi kesalahan');
                            }
                        });
                    },
                    function() {
                        Notiflix.Notify.info('Aksi dibatalkan');
                    }
                );
            });
        });
    </script>
    @endpush