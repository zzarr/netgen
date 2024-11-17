@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="page-header">
        <h3>DASHBOARD ADMIN</h3>
    </div>

    <div class="row layout-top-spacing">
        <!-- Widget untuk Jumlah Saldo -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four shadow-sm">
                <div class="widget-content d-flex justify-content-between align-items-center p-3">
                    <div class="w-content">
                        <h6 class="value text-primary">
                            <i class="fas fa-dollar-sign"></i> 
                            Rp. {{ number_format($totalBalance, 0, ',', '.') }}
                        </h6>
                        <p class="text-muted mb-0">Jumlah Saldo</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget untuk Total Tagihan -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four shadow-sm">
                <a href="{{ route('pelanggan') }}">
                    <div class="widget-content d-flex justify-content-between align-items-center p-3">
                        <div class="w-content">
                            <h6 class="value text-primary">
                                <i class="fas fa-file-invoice-dollar"></i> 
                                {{ $totalBills }} <!-- Menampilkan jumlah tagihan -->
                            </h6>
                            <p class="text-muted mb-0">Total Tagihan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar fa-2x text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        

        <!-- Widget untuk Jumlah Operasional -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four shadow-sm">
                <a href="{{ route('manajemen_operasional.index') }}">
                <div class="widget-content d-flex justify-content-between align-items-center p-3">
                    <div class="w-content">
                        <h6 class="value text-primary">
                            <i class="fas fa-cogs"></i> 
                            Rp. {{ number_format($operationalAmount, 0, ',', '.') }}
                        </h6>
                        <p class="text-muted mb-0">Jumlah Operasional</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget untuk Jumlah Antena -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four shadow-sm">
                <a href="{{ route('antena_admin') }}">
                <div class="widget-content d-flex justify-content-between align-items-center p-3">
                    <div class="w-content">
                        <h6 class="value text-primary">
                            <i class="fas fa-signal"></i> 
                            {{ $antenaCount }}
                        </h6>
                        <p class="text-muted mb-0">Jumlah Antena</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-signal fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget untuk Jumlah Hub HTB -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four shadow-sm">
                <a href="{{ route('manajemen_hubhtb') }}">
                <div class="widget-content d-flex justify-content-between align-items-center p-3">
                    <div class="w-content">
                        <h6 class="value text-primary">
                            <i class="fas fa-network-wired"></i> 
                            {{ $hubHtbCount }}
                        </h6>
                        <p class="text-muted mb-0">Jumlah Hub HTB</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-network-wired fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilkan Data Pelanggan -->
    <div class="table-responsive mt-4">
        <h4>Data Pelanggan</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Petugas</th>
                    <th>Paket</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggan as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->petugas->nama ?? 'N/A' }}</td>
                    <td>{{ $item->paket }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tampilkan Data Tagihan -->
    <div class="table-responsive mt-4">
        <h4>Data Tagihan</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Bulan</th>
                    <th>Paket</th>
                    <th>Kurang</th>
                    <th>Status Lunas</th>
                    <th>Tanggal</th> <!-- Kolom Tanggal Pembayaran -->
                </tr>
            </thead>
            <tbody>
                @foreach($tagihan as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->pelanggan->nama_pelanggan ?? 'N/A' }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->paket }}</td>
                    <td>{{ number_format($item->kurang, 0, ',', '.') }}</td>
                    <td>{{ $item->is_lunas ? 'Lunas' : 'Belum Lunas' }}</td>
                    <td>{{ $item->pembayaran->last()?->created_at?->format('d-m-Y') ?? 'Belum Ada Pembayaran' }}</td> <!-- Menampilkan tanggal pembayaran terakhir -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
