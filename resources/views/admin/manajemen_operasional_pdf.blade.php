<!DOCTYPE html>
<html>
<head>
    <title>Data Operasional</title>
    <style>
        /* Tambahkan CSS jika perlu untuk menata tampilan PDF */
    </style>
</head>
<body>
    <h1>Data Operasional</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Kategori</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataOperasional as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
