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
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Bulan</th>
                                <th>Paket</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Kurang</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Bulan</th>
                                <th>Paket</th>
                                <th>Jumlah Pembayaran</th>
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let table = $('#tagihan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pelanggan.tagihan.data') }}", // URL endpoint untuk mengambil data

                },
                columns: [{
                        data: 'created_at',
                        render: function(data, type, row) {
                            // Mengonversi format tanggal jika diperlukan
                            return new Date(data).toLocaleDateString();
                        },
                        title: 'Tanggal'
                    },
                    {
                        data: 'laporantagihan.pelanggan.nama_pelanggan',
                        title: 'Nama Pelanggan'
                    },
                    {
                        data: 'laporantagihan.bulan',
                        title: 'Bulan'
                    },
                    {
                        data: 'laporantagihan.paket',
                        title: 'Paket'
                    },
                    {
                        data: 'jumlah_pembayaran',
                        title: 'Jumlah Pembayaran'
                    },
                    {
                        data: 'laporantagihan.kurang',
                        title: 'Kurang'
                    }
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
        });
    </script>
@endpush
