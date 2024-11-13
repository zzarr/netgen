<!DOCTYPE html>
<html>
<head>
    <title>Data Operasional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .filter-info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Operasional</h1>
    
    {{-- <div class="filter-info">
        <p><strong>Filter:</strong></p>
        @if($startDate && $endDate)
            <p>Tanggal: {{ $startDate }} - {{ $endDate }}</p>
        @else
            <p>Tidak ada filter tanggal</p>
        @endif
    </div> --}}

    <table>
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
