@extends('admin.layouts.app')
@section('title', 'Manajemen Pelanggan')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Manajemen Pelanggan</h3>
        </div>
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg></a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Manajemen Pelanggan</span></li>
            </ol>
        </nav>
    </div>

    <div class="row" id="cancel-row">
        <div class="col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModal">
                    Tambah Pelanggan
                </button>


                <!-- Tabel Data Pelanggan -->
                <div class="table-responsive mb-4 mt-4">
                    <table id="pelanggan-table" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Paket</th>
                                <th>Tagihan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Paket</th>
                                <th>Tagihan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add -->
    @include('admin.pelanggan.modal-add')
    <!-- end modal -->

    <!-- Modal Edit -->
    @include('admin.pelanggan.modal-edit')
    <!-- end modal -->


    <!-- Modal tagihan -->
    @include('admin.pelanggan.modal-tagihan')
    <!-- end modal -->

    <!-- Modal bayar -->
    @include('admin.pelanggan.bayar')
    <!-- end modal -->

    <!-- Modal detail -->
    @include('admin.pelanggan.detail-pelanggan')
    <!-- end modal -->
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('demo1/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('demo1/plugins/table/datatable/dt-global_style.css') }}">
    <style>
        .paginate-button {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }

        .paginate-button svg {
            margin-right: 5px;
        }
    </style>
    <link href="{{ asset('demo1/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('demo1/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('js')
    <script src="{{ asset('demo1/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        var table = $('#pelanggan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pelanggan.data') }}", // URL untuk mengambil data pelanggan
            columns: [{
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_pelanggan',
                    name: 'nama_pelanggan'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'paket',
                    name: 'paket'
                },
                {
                    data: 'tagihan',
                    name: 'tagian',
                    orderable: false,
                    searchable: false
                }

            ],

            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });

        $('#createForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('pelanggan.store') }}", // Ganti dengan route yang sesuai
                method: 'POST',
                data: $(this).serialize(), // Mengirim data dari form
                success: function(response) {
                    $('#exampleModal').modal('hide');
                    $('#createForm')[0].reset();
                    table.ajax.reload();
                    Notiflix.Notify.success('Data berhasil ditambahkan!');
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.password) {
                            Notiflix.Notify.failure('Password harus memiliki minimal 8 karakter.');
                        }

                    } else {
                        Notiflix.Notify.failure('Terjadi kesalahan saat menambah data.');
                    }
                }
            });
        });




        $(document).on('click', '.tagihan', function() {
            var pelangganId = $(this).data('id'); // Ambil ID pelanggan dari atribut data-id

            // Panggil AJAX untuk mengambil data tagihan berdasarkan ID pelanggan
            $.ajax({
                url: '/pelanggan/tagihan/' + pelangganId, // Sesuaikan URL dengan rute Anda
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    // Bersihkan modal sebelum memuat data baru
                    $('#tagihanModalBody').empty();

                    // Buat tabel tagihan dari data yang diterima
                    var table =
                        '<table class="table table-striped"><thead><tr><th>Bulan</th><th>Nominal</th></tr></thead><tbody>';

                    $.each(response, function(index, tagihan) {
                        table += '<tr><td>' + tagihan.bulan + '</td>';

                        if (tagihan.nominal !== null) {
                            // Tampilkan nominal jika sudah ada pembayaran
                            table += '<td>' + tagihan.nominal + '</td>';
                        } else {
                            // Tampilkan tombol Bayar jika belum ada pembayaran
                            table +=
                                '<td><button type="button" class="btn btn-sm btn-primary bayar" data-bulan="' +
                                tagihan.bulan + '" data-id="' + pelangganId +
                                '" data-dismiss="modal" data-toggle="modal" data-target="#bayarModal">Bayar</button></td>';
                        }

                        table += '</tr>';
                    });

                    table += '</tbody></table>';

                    // Tampilkan tabel di modal
                    $('#tagihanModalBody').append(table);

                    // Tampilkan modal
                    $('#tagihanModal').modal('show');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan dalam memuat data tagihan.');
                }
            });
        });


        // Tangkap event klik pada tombol Bayar
        $(document).on('click', '.bayar', function() {
            var bulan = $(this).data('bulan'); // Ambil data bulan dari tombol yang diklik
            var pelangganId = $(this).data('id'); // Ambil ID pelanggan

            // Isi input hidden untuk bulan dan ID pelanggan di modal bayar
            $('#bayarModal input[name="bulan"]').val(bulan);
            $('#bayarModal input[name="pelanggan_id"]').val(pelangganId);
            // Update judul modal dengan nama bulan
            $('#bayarModal .modal-title').text('Bayar Tagihan ' + bulan);

            // Buka modal bayar
            $('#bayarModal').modal('show');
        });


        $('#formBayar').on('submit', function(e) {
            e.preventDefault(); // Mencegah reload halaman

            // Ambil data dari form
            var formData = $(this).serialize();

            // Kirim data melalui AJAX
            $.ajax({
                type: 'POST',
                url: '/pelanggan/bayar', // Pastikan URL endpoint di server sudah benar
                data: formData,
                success: function(response) {
                    // Notifikasi sukses menggunakan Notiflix
                    Notiflix.Notify.success("Pembayaran berhasil!");
                    $('#bayarModal').modal('hide'); // Tutup modal setelah submit
                    $('#formBayar')[0].reset(); // Reset form setelah submit

                    // Tambahkan kode untuk reload tabel atau update data jika perlu
                    // Contoh: table.ajax.reload(); jika menggunakan DataTables
                },
                error: function(xhr, status, error) {
                    // Notifikasi error menggunakan Notiflix
                    Notiflix.Notify.failure("Terjadi kesalahan saat melakukan pembayaran");
                    console.error(xhr.responseText); // Debugging error
                }
            });
        });




        $(document).on('click', '.edit', function() {
            var pelangganId = $(this).data('id');
            $.ajax({
                url: '/pelanggan/edit/' + pelangganId,
                method: 'GET',
                success: function(response) {
                    // Isi value pada input field form edit dengan data yang diterima
                    $('#editModal input[name="nama"]').val(response.nama_pelanggan);
                    $('#editModal input[name="no_hp"]').val(response.no_hp);
                    $('#editModal input[name="alamat"]').val(response.alamat);
                    $('#editModal input[name="paket"]').val(response.paket);
                    $('#editModal input[name="id"]').val(response.id);

                    // Tampilkan modal edit
                    $('#editModal').modal('show');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengambil data pelanggan.');
                }
            });
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            var id = $('#id_pelanggan').val(); // Pastikan input ini memiliki ID yang benar

            $.ajax({
                url: "{{ route('pelanggan.update', ':id') }}".replace(':id',
                    id), // Gunakan replace untuk mengisi :id dengan nilai variabel
                method: 'POST', // Metode tetap POST karena ada _method PUT
                data: $(this).serialize() + '&_method=PUT', // Menggunakan _method=PUT
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#editForm')[0].reset();
                    table.ajax.reload();
                    Notiflix.Notify.success('Data berhasil diperbarui!');
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Logging detail error untuk debugging
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.password) {
                            Notiflix.Notify.failure('Password harus memiliki minimal 8 karakter.');
                        }
                    } else {
                        Notiflix.Notify.failure('Terjadi kesalahan saat memperbarui data.');
                    }
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).data('id'); // Dapatkan id pelanggan dari button delete

            Notiflix.Confirm.show(
                'Konfirmasi Hapus',
                'Apakah Anda yakin ingin menghapus data ini?',
                'Ya, Hapus',
                'Batal',
                function() { // Jika pengguna mengonfirmasi penghapusan
                    $.ajax({
                        url: "{{ route('pelanggan.destroy', ':id') }}".replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Mengirimkan CSRF token
                        },
                        success: function(response) {
                            Notiflix.Notify.success(response.success || 'Data berhasil dihapus');
                            table.ajax.reload(); // Reload DataTable setelah hapus data
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            Notiflix.Notify.failure(xhr.responseJSON.error ||
                                'Gagal menghapus data');
                        }
                    });
                },
                function() { // Fungsi ini untuk aksi batal
                    Notiflix.Notify.info('Penghapusan dibatalkan');
                }
            );
        });

        $(document).on('click', '.show-detail', function() {
            var pelangganId = $(this).data('id');

            $.ajax({
                url: '/pelanggan/' + pelangganId + '/detail',
                method: 'GET',
                success: function(response) {
                    console.log(response);

                    // Isi detail pelanggan di modal
                    $('#pelangganNama').text(response.pelanggan.nama_pelanggan);
                    $('#pelangganPaket').text(response.pelanggan.paket);
                    $('#pelangganAlamat').text(response.pelanggan.alamat);
                    $('#pelangganNoHp').text(response.pelanggan.no_hp);

                    var tagihanHtml = '';
                    response.pelanggan.laporan_tagihan.forEach(function(tagihan) {
                        var pembayaranDetails = '';
                        if (tagihan.pembayaran.length > 0) {
                            tagihan.pembayaran.forEach(function(pembayaran) {
                                // Ambil nama petugas dari objek utama "response.pembayaran"
                                var petugasNama = response.pembayaran.find(p => p.id ===
                                    pembayaran.id).petugas.nama || '-';
                                pembayaranDetails += `
                <tr>
                    <td>${tagihan.bulan}</td>
                    <td>${pembayaran.created_at}</td>
                    <td>Rp.${pembayaran.jumlah_pembayaran}</td>
                    <td>Rp.${tagihan.kurang}</td>
                    <td>${petugasNama}</td>
                    <td><button class="btn btn-primary">Edit</button></td>
                </tr>
            `;
                            });
                        } else {
                            pembayaranDetails += `
            <tr>
                <td>${tagihan.bulan}</td>
                <td>${tagihan.created_at}</td>
                <td>-</td>
                <td>Rp.${tagihan.kurang}</td>
                <td>-</td>
                <td><button class="btn btn-primary">Edit</button></td>
            </tr>
        `;
                        }
                        tagihanHtml += pembayaranDetails;
                    });
                    $('#tagihanTableBody').html(tagihanHtml);


                    // Tampilkan modal
                    $('#detailPelangganModal').modal('show');
                },
                error: function() {
                    alert('Gagal mengambil detail pelanggan');
                }
            });
        });
    </script>
@endpush
