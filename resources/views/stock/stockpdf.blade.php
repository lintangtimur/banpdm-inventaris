<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Stock Barang - BAN-PDM Papua Barat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            margin: 40px;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 5px;
        }
        .subheading {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .periode {
            margin-top: 10px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 6px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .signature {
            margin-top: 80px;
            text-align: right;
        }
        .signature p {
            margin: 0;
        }
    </style>
</head>
<body>

    <h1>Laporan Stock Barang</h1>
    <div class="subheading">Sistem Inventaris Barang BAN-PDM Papua Barat</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $i => $trx)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $trx->name}}</td>
                    <td>{{ $trx->qty }} pcs</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>Manokwari, {{ $tanggalCetak }}</p>
        <br><br><br>
        <p>(......................................)</p>
        <p>Penanggung Jawab</p>
    </div>

</body>
</html>
