@extends('admin.layouts.app')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Laporan Tagihan</h3>
        </div>
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg></a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Laporan Tagihan</span></li>
            </ol>
        </nav>
    </div>

    <div class="row" id="cancel-row">
        <div class="col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">



                <!-- Tabel Data Pelanggan -->
                <div class="table-responsive mb-4 mt-4">
                    <table id="tagihan-table" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Bulan</th>
                                <th>Paket</th>
                                <th>Nominal</th>
                                <th>Kurang</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Bulan</th>
                                <th>Paket</th>
                                <th>Nominal</th>
                                <th>Kurang</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            var table = $('#tagihan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tagihan.data') }}", // URL untuk mengambil data laporan tagihan
                columns: [{
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'nama_pelanggan',
                        name: 'nama_pelanggan'
                    },
                    {
                        data: 'bulan',
                        name: 'bulan'
                    },
                    {
                        data: 'paket',
                        name: 'paket'
                    },
                    {
                        data: 'jumlah_pembayaran',
                        name: 'jumlah_pembayaran'
                    },
                    {
                        data: 'kurang',
                        name: 'kurang'
                    },
                ],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" ...></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" ...></svg>'
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
        });
    </script>
@endpush
