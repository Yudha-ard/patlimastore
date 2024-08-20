<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .rupiah {
            font-family: Arial, sans-serif;
            text-align: right;
        }

        .rupiah:before {
            content: "Rp ";
        }

        .rupiah:after {
            content: ",00";
        }

        .thousand-sep {
            font-family: Arial, sans-serif;
            text-align: right;
        }

        .thousand-sep::after {
            content: "";
        }

        .thousand-sep[data-value]::after {
            content: attr(data-value);
            font-size: 80%;
            vertical-align: super;
            margin-left: 0.2em;
        }
    </style>

<body>
    @php
        $months = [];
        foreach ($products as $p) {
            $month = date('F Y', strtotime($p->tanggal));
            if (!isset($months[$month])) {
                $months[$month] = [];
            }
            $months[$month][] = $p;
        }
    @endphp

    @foreach ($months as $month => $products)
        <h2>{{ $month }}</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Profit</th>
            </tr>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords(strtolower($p->nama_barang)) }}</td>
                    <td>Rp {{ number_format($p->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($p->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->category }}</td>
                    <td>Rp {{ number_format($p->keuntungan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach
</body>

</html>