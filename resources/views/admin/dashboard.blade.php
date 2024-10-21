@extends('admin.layouts.app')

@section('content')
<style>
    .container {
        width: 100%;
        padding: 20px;
    }
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .card {
        width: 30%;
        background-color: #f1f1f1;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .card h3 {
        font-size: 24px;
        margin: 0;
    }
    .card p {
        margin-top: 10px;
        font-size: 16px;
        color: #080707;
    }
    .tables-section {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    .table-wrapper {
        width: 48%;
    }
    .table-wrapper h2 {
        font-size: 20px;
        margin-bottom: 15px;
        color: rgb(230, 230, 230); /* Menambahkan warna hitam untuk judul tabel */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        color: white
    }
    table th, table td {
        padding: 10px;
        border: 1px solid #110f0f;
        text-align: left;
    }
    table th {
        background-color: #070606;
        color: rgb(0, 0, 0); /* Mengubah warna teks header tabel menjadi hitam */
    }
</style>

<div class="container">
    <h1>Dashboard</h1>

    <!-- Dashboard Summary Cards -->
    <div class="dashboard-header">
        <div class="card">
            <h3>Rp. 1.500.000</h3>
            <p>Jumlah Saldo</p>
        </div>
        <div class="card">
            <h3>200</h3>
            <p>Total Tagihan</p>
        </div>
        <div class="card">
            <h3>Rp. 1.000.000</h3>
            <p>Operasional</p>
        </div>
    </div>

    <div class="dashboard-header">
        <div class="card">
            <h3>10</h3>
            <p>Antena</p>
        </div>
        <div class="card">
            <h3>20</h3>
            <p>Hub & HTB</p>
        </div>
    </div>

    <!-- Tables Section -->
    <div class="tables-section">
        <!-- Pelanggan Baru Table -->
        <div class="table-wrapper">
            <h2>Pelanggan Baru</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Paket</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data pelanggan baru di sini -->
                </tbody>
            </table>
        </div>

        <!-- Tagihan Terbaru Table -->
        <div class="table-wrapper">
            <h2>Tagihan Terbaru</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data tagihan terbaru di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
