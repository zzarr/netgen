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
                <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kits</a></li> -->
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput2"
                                            placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                        Discard</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- end modal -->

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover dataTable" style="width:100%">
                        <thead>
                            <tr>

                                <th>Action</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Paket</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $customer)
                                <tr>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </td>
                                    <td>{{ $customer->nama_pelanggan }}</td>
                                    <td>{{ $customer->alamat }}</td>
                                    <td>{{ $customer->paket }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Paket</th>
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
        $('#zero-config').DataTable({
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
    </script>
@endpush
