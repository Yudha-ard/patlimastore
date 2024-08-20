<table id="datatable" class="table data-tables table-striped">
    @foreach($products as $month => $productsPerMonth)
        <thead>
            <tr>
                <td colspan="8" class="text-center"><strong>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</strong></td>
            </tr>
            <tr class="light">
                <th class="text-success">Nama Barang</th>
                <th class="text-success">Harga Beli</th>
                <th class="text-success">Harga Jual</th>
                <th class="text-success">Profit</th>
                <th class="text-success">Date</th>
                <th class="text-success">Kondisi</th>
                <th class="text-success">Category</th>
                <th class="text-success">Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productsPerMonth as $product)
                <tr>
                    <td>{{ $product->nama_barang }}</td>
                    <td>{{ 'Rp ' . number_format($product->harga_beli, 0, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($product->harga_jual, 0, ',', '.') }}</td>
                    <td>
                        <span class="{{ $product->keuntungan < 0 ? 'badge bg-red' : 'badge bg-success' }}">
                            {{ 'Rp ' . number_format($product->keuntungan, 0, ',', '.') }}
                        </span>
                    </td>
                    <td>{{ $product->tanggal }}</td>
                    <td>
                        <span class="{{ $product->kondisi == 'new' ? 'badge bg-success' : 'badge bg-danger' }}">
                            {{ ucfirst($product->kondisi) }}
                        </span>
                    </td>
                    <td>
                        <span class="{{ $product->category == 'fashion' ? 'badge bg-secondary' : 'badge bg-gray-dark' }}">
                            {{ ucfirst($product->category) }}
                        </span>
                    </td>
                    <td>
                        <span class="{{ $product->transaksi_status == 'online' ? 'badge bg-success' : 'badge bg-red' }}">
                            {{ ucfirst($product->transaksi_status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="1"><strong>{{ count($productsPerMonth) }}</strong></td>
                <td colspan="2"><strong></strong></td>
                <td><strong>{{ 'Rp ' . number_format($totalProfits[$month], 0, ',', '.') }}</strong></td>
                <td colspan="4"><strong></strong></td>
            </tr>
        </tbody>
    @endforeach
    <tfoot>
        <tr>
            <td colspan="3" class="text-center"><strong>Total Profit Tahun {{ $year }}</strong></td>
            <td><strong>{{ 'Rp ' . number_format($annualProfit, 0, ',', '.') }}</strong></td>
            <td colspan="4"></td>
        </tr>
    </tfoot>
</table>
