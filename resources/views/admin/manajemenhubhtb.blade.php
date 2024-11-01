@extends('admin.layouts.app')
@section('content')

<div class="page-header">
    <div class="page-title">
        <h3>Manajemen Hub Htb</h3>
    </div>
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg></a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Hub Htb</span></li>
        </ol>
    </nav>
</div>

<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Hub Htb</span></li>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createForm">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="nama_alat">Nama Alat</label>
                                <input type="text" class="form-control" id="nama_alat" name="nama_alat" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Hub Htb</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="hubhtbId" name="id">
                    <div class="modal-body">
                        <!-- Form Edit untuk Admin -->
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" class="form-control" id="edit_nama_alat" name="edit_nama_alat" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="edit_alamat" name="edit_alamat" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                <table id="datatable" id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="no-content">Action</th>
                            <th>Nama Alat</th>
                            <th>Alamat</th>

                        </tr>
                    </thead>
                    <tbody>

                        <!-- Data akan dimasukkan melalui Yajra DataTables -->
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

@endsection

@push('script')
{{-- <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $("#datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('hubhtb.data') }}",
columnDefs: [
{ targets: 0, render: function(data, type, full, meta) { return meta.row + 1; } },
{
targets: 1,
render: function(data, type, full, meta) {
return `
<div class="btn-list">
    <button class="btn btn-info btn-edit mr-1 rounded-circle" data-id="${data}">Edit</button>
    <button class="btn btn-danger btn-delete rounded-circle" data-id="${data}">Delete</button>
</div>`;
},
},
],
columns: [
{ data: 'id' },
{ data: 'id' },
{ data: 'nama_alat' },
{ data: 'alamat' },
],
language: { searchPlaceholder: 'Cari...', sSearch: '' }
});

// Tambah/Edit Data
$('#formHubHtb').on('submit', function(e) {
e.preventDefault();
let id = $('#dataId').val();
let url = id ? {{ url('/admin/hubhtb') }}/${id} : "{{ route('manajemen_hubhtb.store') }}";
let method = id ? 'PUT' : 'POST';

$.ajax({
url: url,
type: method,
data: $('#formHubHtb').serialize(),
success: function(response) {
$('#modalForm').modal('hide');
table.ajax.reload();
alert(id ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan');
}
});
});

// Show Modal for Adding Data
$('#btnTambah').on('click', function() {
$('#dataId').val('');
$('#nama_alat').val('');
$('#alamat').val('');
$('#modalFormLabel').text('Tambah Data');
$('#modalForm').modal('show');
});

// Edit Button Click
$(document).on('click', '.btn-edit', function() {
let id = $(this).data('id');
$.get({{ url('/admin/hubhtb') }}/${id}/edit, function(data) {
$('#dataId').val(data.id);
$('#nama_alat').val(data.nama_alat);
$('#alamat').val(data.alamat);
$('#modalFormLabel').text('Edit Data');
$('#modalForm').modal('show');
});
});

// Delete Button Click
$(document).on('click', '.btn-delete', function() {
let id = $(this).data('id');
if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
$.ajax({
url: {{ url('/admin/hubhtb') }}/${id},
type: 'DELETE',
success: function(response) {
table.ajax.reload();
alert('Data berhasil dihapus');
}
});
}
});
});
</script> --}}
<script>
    $(document).ready(function() {
        // Setup token CSRF untuk request Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Inisialisasi DataTables
        let table = $("#datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('hubhtb.data') }}",
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
                            <button class="btn btn-info btn-edit mr-1 rounded-circle" data-id="${data}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                            </button>
                            <button class="btn btn-danger btn-delete rounded-circle" data-id="${data}">
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


            ],
            columns: [{
                    data: 'id'
                },
                {
                    data: 'id'
                }, // Kolom aksi
                {
                    data: 'nama_alat'
                },
                {
                    data: 'alamat'
                },
            ],
            language: {
                searchPlaceholder: 'Cari...',
                sSearch: '',
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
                        url: '/admin/hubhtb/' + dataId,
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

<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Cari...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>

<script>
    //Tambah Data
    $('#createForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('manajemen_hubhtb.store') }}", // Ganti dengan route yang sesuai
            method: 'POST',
            data: $(this).serialize(), // Mengirim data dari form
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
            url: '/admin/hubhtb/edit/' + id,
            method: 'GET',
            success: function(data) {
                $('#hubhtbId').val(data.id);
                $('#edit_nama_alat').val(data.nama_alat);
                $('#edit_alamat').val(data.alamat);



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

        var id = $('#hubhtbId').val();
        var formData = $(this).serialize();

        $.ajax({
            url: '/admin/hubhtb/update/' + id,
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

@endpush
