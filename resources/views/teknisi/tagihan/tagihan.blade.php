@extends('admin.layouts.app')
@section('title', 'Laporan Tagihan')

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
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
            <div class="widget-content widget-content-area br-6" style="cursor: pointer;">


                <div class="row">
                    <div class="col-6"><button class="btn btn-outline-danger" onclick="generatePDF()">Cetak PDF</button>

                    </div>
                    <div class="col-6 text-end">
                        <p class="acc-amount">Total: Rp.{{ number_format($total, 0, ',', '.') }}</p>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <div class="row" id="cancel-row">
        <div class="col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex mb-3">
                    <input type="date" id="startDate" class="form-control mr-2" placeholder="Tanggal Mulai">
                    <input type="date" id="endDate" class="form-control mr-2" placeholder="Tanggal Selesai">
                    <button id="filterDateBtn" class="btn btn-primary">Filter</button>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

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
                    url: "{{ route('teknisi.tagihan.data') }}",
                    data: function(d) {
                        d.startDate = $('#startDate').val();
                        d.endDate = $('#endDate').val();
                    }
                },
                columns: [{
                        data: 'created_at',
                        render: function(data, type, row) {
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

            // Filter berdasarkan tanggal ketika tombol Filter diklik
            $('#filterDateBtn').on('click', function() {
                table.ajax.reload();
            });
        });

        function generatePDF() {
            // Import jsPDF
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Tambahkan judul dokumen
            doc.text("Laporan Tagihan", 14, 10);

            // Ambil data dari DataTable
            const data = [];
            $('#tagihan-table tbody tr').each(function() {
                const row = [];
                $(this).find('td').each(function() {
                    row.push($(this).text());
                });
                data.push(row);
            });

            // Set kolom untuk AutoTable
            const columns = [
                "Tanggal",
                "Nama Pelanggan",
                "Bulan",
                "Paket",
                "Jumlah Pembayaran",
                "Kurang"
            ];

            // Buat tabel menggunakan jsPDF AutoTable
            doc.autoTable({
                head: [columns],
                body: data,
                startY: 20,
            });

            // Unduh PDF
            doc.save("laporan_tagihan.pdf");
        }
    </script>
@endpush
