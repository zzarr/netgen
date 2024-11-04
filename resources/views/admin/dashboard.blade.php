@extends('admin.layouts.app')

@section('content')
    <div class="page-header">
        <h3>DASHBOARD</h3>
    </div>

    <div class="row layout-top-spacing">
        <!-- Widget untuk Jumlah Saldo -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content d-flex justify-content-between align-items-center">
                    <div class="w-content">
                        <h6 class="value">${{ number_format($totalBalance, 2) }}</h6>
                        <p class="">Jumlah Saldo</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget untuk Total Tagihan -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content d-flex justify-content-between align-items-center">
                    <div class="w-content">
                        <h6 class="value">${{ number_format($totalBills, 2) }}</h6>
                        <p class="">Total Tagihan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget untuk Operasional -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content d-flex justify-content-between align-items-center">
                    <div class="w-content">
                        <h6 class="value">${{ number_format($operationalAmount, 2) }}</h6>
                        <p class="">Operasional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
