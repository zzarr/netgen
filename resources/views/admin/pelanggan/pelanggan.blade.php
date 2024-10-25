@extends('admin.layouts.app')

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
    <!-- Modal tagihan -->
    @include('admin.pelanggan.modal-tagihan')
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
        $('#pelanggan-table').DataTable({
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

        $(document).on('click', '.tagihan', function() {
            var pelangganId = $(this).data('id'); // Ambil ID pelanggan dari atribut data-id

            // Panggil AJAX untuk mengambil data tagihan berdasarkan ID pelanggan
            $.ajax({
                url: '/pelanggan/tagihan/' + pelangganId, // Sesuaikan URL dengan rute Anda
                method: 'GET',
                success: function(response) {
                    // Bersihkan modal sebelum memuat data baru
                    $('#tagihanModalBody').empty();

                    // Buat tabel tagihan dari data yang diterima
                    var table =
                        '<table class="table table-striped"><thead><tr><th>Bulan</th><th>Nominal</th></tr></thead><tbody>';

                    $.each(response, function(index, tagihan) {
                        table += '<tr><td>' + tagihan.bulan + '</td>';

                        if (tagihan.nominal !== null) {
                            table += '<td>' + tagihan.nominal + '</td>';
                        } else {
                            table +=
                                '<td><button class="btn btn-sm btn-primary bayar" data-bulan="' +
                                tagihan.bulan + '" data-id="' + pelangganId +
                                '">Bayar</button></td>';
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
    </script>
@endpush
