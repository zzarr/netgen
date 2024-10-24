@extends('admin.layouts.app')
@section('content')
                <div class="page-header">
                    <div class="page-title">
                        <h3>Manajemen Teknisi</h3>
                    </div>

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kits</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Teknisi</span></li>
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
                Tambah Data
              </button>
              <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form id="tambahDataForm" action="submit_data.php" method="POST">
                <div class="modal-body">
                    <!-- Form Tambah Data -->
                    <div class="form-group">
                        <label for="nama">Nama Teknisi</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nomorhp">No.HP</label>
                        <input type="text" class="form-control" id="nomorhp" name="nomor hp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div></div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password:</label>
                        <div class="input-group">
                            <input type="password" name="cpass" id="cpass" class="form-control" required>
                            <span class="input-group-addon"><i class="icon-user"></i></span> 
                        </div>
                    </div>

                    <!-- Tambahkan input lain sesuai kebutuhan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form> --}}

            <form id="teknisiForm" action="{{ route('teknisi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Form input untuk Teknisi -->
                    <div class="form-group">
                        <label for="nama">Nama Teknisi</label>
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
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="form-group">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" class="form-control" id="cpass" name="pass_confirmation" required>
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
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="no-content">Action</th>
                            <th>Nama Teknisi</th>
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
    $(document).ready(function() {
        $('#zero-config').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('teknisi.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'nama', name: 'nama' },
                { data: 'no_hp', name: 'no_hp' },
                { data: 'email', name: 'email' },
            ]
        });
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
            ajax: "", 
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
                            <a href="" class="btn btn-info mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                            </a>
                            <button class="btn btn-danger btn-delete" data-id=":id">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    `;
                        btn = btn.replaceAll(':id', data);
                        return btn;
                    },
                },
                // {
                //     targets: 3, 
                //     render: function(data, type, full, meta) {
                //         return full.gudang ? full.gudang.nama : '-'; 
                //     },
                // },
                
            ],
            columns: [
                { data: 'id' }, 
                { data: 'id' } // Kolom aksi
                { data: 'nomor_dokumen' },
                { data: 'tanggal_opname' }, 
                { data: 'nama' },
            ],
            language: {
                searchPlaceholder: 'Cari...', 
                sSearch: '', 
            }
        });

        // Event listener untuk tombol delete
        $(document).on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // AJAX request untuk delete
                $.ajax({
                    url: ``, // Sesuaikan URL dengan rute Anda
                    type: 'DELETE',
                    success: function(result) {
                        // Refresh tabel setelah berhasil delete
                        table.ajax.reload();
                    }
                });
            }
        });
    });
</script>
@endpush

