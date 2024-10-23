@extends('admin.layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>DASHBOARD</h3>
    </div>

    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>home</span></li>
        </ol>
    </nav>
</div>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="row layout-top-spacing">
                <!-- Widget untuk Jumlah Saldo -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four" style="cursor: pointer;">
                        <div class="widget-content d-flex justify-content-between align-items-center">
                            <div class="w-content">
                                <h6 class="value">$ 12,000</h6>
                                <p class="">Jumlah Saldo</p>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wallet"><path d="M20 7v-2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v2m0 0h16m-16 0l-1 10h18l-1-10m-16 0a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H4z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Widget untuk Total Tagihan -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four" style="cursor: pointer;">
                        <div class="widget-content d-flex justify-content-between align-items-center">
                            <div class="w-content">
                                <h6 class="value">$ 8,500</h6>
                                <p class="">Total Tagihan</p>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><path d="M12 1v22m-4-3h8c1.38 0 2.5-1.12 2.5-2.5S17.38 15 16 15H8c-1.38 0-2.5 1.12-2.5 2.5S6.62 20 8 20h8"></path><path d="M11 5h2c1.38 0 2.5 1.12 2.5 2.5S14.38 10 13 10h-2c-1.38 0-2.5-1.12-2.5-2.5S9.62 5 11 5z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Widget untuk Operasional -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four" style="cursor: pointer;">
                        <div class="widget-content d-flex justify-content-between align-items-center">
                            <div class="w-content">
                                <h6 class="value">$ 3,500</h6>
                                <p class="">Operasional</p>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><path d="M12 2l10 7-10 7-10-7 10-7zm0 18l10-7-10-7-10 7 10 7z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Widget untuk Antena -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four" style="cursor: pointer;">
                        <div class="widget-content d-flex justify-content-between align-items-center">
                            <div class="w-content">
                                <h6 class="value">$ 2,200</h6>
                                <p class="">Antena</p>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-signal"><path d="M2 12a10 10 0 0 1 10-10m0 0a10 10 0 0 1 10 10m-10-10v20"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Widget untuk Hub dan HTB -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four" style="cursor: pointer;">
                        <div class="widget-content d-flex justify-content-between align-items-center">
                            <div class="w-content">
                                <h6 class="value">$ 3,000</h6>
                                <p class="">Hub & HTB</p>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><path d="M3 3h6v6H3V3zm0 8h6v6H3v-6zm8-8h6v6h-6V3zm0 8h6v6h-6v-6zm-8 8h6v-6H3v6zm8 0h6v-6h-6v6z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <h4>Pelanggan Baru</h4>
                    <table class="table table-bordered table-hover table-striped mb-4 table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Paket</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10/08/2023</td>
                                <td>Andi</td>
                                <td>Paket 100 Mbps</td>
                                <td>Jl. Buntu No. 12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>12/08/2023</td>
                                <td>Budi</td>
                                <td>Paket 50 Mbps</td>
                                <td>Jl. Baru No. 24</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Tagihan Terbaru</h4>
                    <table class="table table-bordered table-hover table-striped mb-4 table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>15/08/2023</td>
                                <td>Andi</td>
                                <td>Rp 500,000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>17/08/2023</td>
                                <td>Budi</td>
                                <td>Rp 300,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- End Table Responsive -->
            </div> <!-- End Col-12 -->
        </div> <!-- End Row Layout Spacing -->
    </div> <!-- End Layout-px-spacing -->
</div>
@endsection


