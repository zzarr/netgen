@extends('admin.layouts.app')
@section('content')
                <div class="page-header">
                    <div class="page-title">
                        <h3>Manajemen Admin</h3>
                    </div>

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kits</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Admin</span></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12 col-md-12 mt-3 layout-spacing">
        <div class="d-flex justify-content-start mb-3">
            {{-- <a href="{{route('add_admin')}}" class="btn btn-primary" ><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Data
            </a> --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg> Tambah Data
              </button>
              <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createForm">
                @csrf
                <div class="modal-body">
                    <!-- Form input untuk Admin -->
                    <div class="form-group">
                        <label for="nama">Nama Admin</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="pass" name="pass" required>
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="togglePassword()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- <form id="editForm">
                        <input type="hidden" id="adminId" name="id">
                        <div class="modal-body">
                            <!-- Form Edit untuk Admin -->
                            <div class="form-group">
                                <label for="nama">Nama Admin</label>
                                <input type="text" class="form-control" id="editNama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP</label>
                                <input type="text" class="form-control" id="editNo_hp" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="editPass" name="pass" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePassword()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form> --}}
                    <form id="editForm">
                        <input type="hidden" id="adminId" name="id">
                        <div class="modal-body">
                            <!-- Form Edit untuk Admin -->
                            <div class="form-group">
                                <label for="nama">Nama Admin</label>
                                <input type="text" class="form-control" id="editNama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP</label>
                                <input type="text" class="form-control" id="editNo_hp" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email" required>
                            </div>
                            <!-- Tombol Ubah Password -->
                            <div class="form-group">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#passwordModal">Ubah Password</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="passwordForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="passwordModalLabel">Ubah Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="newPass">Password Baru</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="newPass" name="new_pass" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="toggleNewPassword()">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
            

        @if (session('success'))
            <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                        xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x close">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-check">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        @endif

<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="datatable" id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="no-content">Action</th>
                            <th>Nama Admin</th>
                            <th>No.HP</th>
                            <th>Email</th>
                           
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

@endsection

@push('script')
<script>
    //Tambah Data
    $('#createForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: "{{ route('admin.store') }}",  // Ganti dengan route yang sesuai
        method: 'POST',
        data: $(this).serialize(),  // Mengirim data dari form
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
        url: '/admin/edit/' + id,
        method: 'GET',
        success: function(data) {
            $('#adminId').val(data.id);
            $('#editNama').val(data.nama);
            $('#editNo_hp').val(data.no_hp);
            $('#editEmail').val(data.email);
            $('#editPass').val(data.password);
            


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

    var id = $('#adminId').val();
    var formData = $(this).serialize();

    $.ajax({
        url: '/admin/update/' + id,
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
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
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
    function togglePassword() {
        var passInput = document.getElementById("pass");
        var icon = document.getElementById("toggle-eye");
        
        if (passInput.type === "password") {
            passInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<script>
    function toggleNewPassword() {
        const newPassField = document.getElementById("newPass");
        newPassField.type = newPassField.type === "password" ? "text" : "password";
    }

    // Fungsi untuk update password saja
    function updatePassword(id, newPassword) {
        $.ajax({
            url: '/admin/update-password/' + id, // Pastikan endpoint ini sesuai dengan rute untuk mengupdate password saja
            method: 'PUT',
            data: { pass: newPassword },
            success: function(response) {
                console.log('Password berhasil diubah:', response); // Debugging log
                $('#passwordModal').modal('hide'); // Menutup modal
                Notiflix.Notify.success('Password berhasil diubah!'); // Notifikasi berhasil
            },
            error: function(xhr) {
                console.log('Error:', xhr); // Debugging log
                if (xhr.status === 422) { // Validasi gagal
                    var errors = xhr.responseJSON.errors;
                    if (errors.pass) {
                        Notiflix.Notify.failure('Password harus memiliki minimal 8 karakter.');
                    }
                } else {
                    Notiflix.Notify.failure('Terjadi kesalahan saat mengubah password.');
                }
            }
        });
    }

    // Event listener untuk submit form password
    document.getElementById("passwordForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah reload halaman
        const id = document.getElementById("adminId").value; // Pastikan id sudah diset
        const newPassword = document.getElementById("newPass").value;
        updatePassword(id, newPassword);
    });
</script>



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
            ajax: "{{ route('admin.data') }}", 
            columnDefs: [
                {
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
            columns: [
                { data: 'id' }, 
                { data: 'id' }, // Kolom aksi
                { data: 'nama' },
                { data: 'no_hp' }, 
                { data: 'email' },
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
                    url: '/admin/delete/' + dataId, 
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

