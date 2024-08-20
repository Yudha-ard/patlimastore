@extends('layout.main')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="namabarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="namabarang" name="nama_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="date" name="tanggal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hargabeli">Harga Beli</label>
                                    <input type="number" class="form-control" id="hargabeli" name="harga_beli" required>
                                </div>
                                <div class="form-group">
                                    <label for="hargajual">Harga Jual</label>
                                    <input type="number" class="form-control" id="hargajual" name="harga_jual" required>
                                </div>
                                <div class="form-group">
                                    <label for="profit">Keuntungan</label>
                                    <input type="text" class="form-control" id="profit" name="keuntungan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="category" required>
                                        <option value="fashion">Fashion</option>
                                        <option value="gadget">Gadget</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="condition">Kondisi</label>
                                    <select class="form-control" id="condition" name="kondisi">
                                        <option value="new">Baru</option>
                                        <option value="second">Bekas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transaksi">Status Transaksi</label>
                                    <select class="form-control" id="transaksi" name="transaksi_status">
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this item?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="confirmDeleteBtn">Delete</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Product List</h4>
                        </div>
                        <a href="{{ url('/product/add') }}" class="btn btn-primary add-list"><i
                                class="las la-plus mr-3"></i>Add Product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Date</th>
                                        <th>Kondisi</th>
                                        <th>Category</th>
                                        <th>Transaksi</th>
                                        <th>Profit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="text-align: left;">{{ $product->nama_barang }}</td>
                                            <td>{{ 'Rp ' . number_format($product->harga_beli, 0, ',', '.') }}</td>
                                            <td>{{ 'Rp ' . number_format($product->harga_jual, 0, ',', '.') }}</td>
                                            <td>{{ $product->tanggal }}</td>
                                            <td>
                                                <span
                                                    class="{{ $product->kondisi == 'new' ? 'badge bg-success' : 'badge bg-danger' }}">
                                                    {{ ucfirst($product->kondisi) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="{{ $product->category == 'fashion' ? 'badge bg-secondary' : 'badge bg-gray-dark' }}">
                                                    {{ ucfirst($product->category) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="{{ $product->transaksi_status == 'online' ? 'badge bg-success' : 'badge bg-red' }}">
                                                    {{ ucfirst($product->transaksi_status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="{{ $product->keuntungan < 0 ? 'badge bg-red' : 'badge bg-success' }}">
                                                    {{ 'Rp ' . number_format($product->keuntungan, 0, ',', '.') }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex align-items-center list-action"
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <button type="button" class="badge bg-success edit-button mr-2"
                                                        data-toggle="modal" data-target="#editProductModal"
                                                        data-id="{{ $product->id }}"><i
                                                            class="ri-pencil-line mr-0"></i></button>
                                                    <form class='d-inline'
                                                        action="{{ route('product.destroy', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="badge bg-warning delete-button mr-2"
                                                            data-toggle="modal" data-target="#deleteModal"
                                                            data-form="{{ $product->id }}"><i
                                                                class="ri-delete-bin-line mr-0"></i></button>
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Date</th>
                                        <th>Kondisi</th>
                                        <th>Category</th>
                                        <th>Transaksi</th>
                                        <th>Profit</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    document.getElementById('hargabeli').addEventListener('input', calculateProfit);
    document.getElementById('hargajual').addEventListener('input', calculateProfit);

    function calculateProfit() {
        const hargabeli = parseFloat(document.getElementById('hargabeli').value) || 0;
        const hargajual = parseFloat(document.getElementById('hargajual').value) || 0;
        const profit = hargajual - hargabeli;
        document.getElementById('profit').value = 'Rp ' + number_format(profit, 0, ',', '.');
    }

    function number_format(number, decimals, decPoint, thousandsSep) {
        decimals = decimals || 0;
        number = parseFloat(number);
        if (!number) return '0';
        number = number.toFixed(decimals);
        decPoint = typeof decPoint === 'undefined' ? '.' : decPoint;
        thousandsSep = typeof thousandsSep === 'undefined' ? ',' : thousandsSep;

        var parts = number.split('.');
        var fnums = parts[0];
        var decimals = parts[1] ? (decPoint + parts[1]) : '';
        return fnums.replace(/(\d)(?=(?:\d{3})+$)/g, '$1' + thousandsSep) + decimals;
    }

    $(document).on('click', '.edit-button', function () {
        var id = $(this).data('id');
        $.ajax({
            url: '/products/' + id + '/edit',
            method: 'GET',
            success: function (data) {
                $('#editProductModal').modal('show');
                $('#id').val(data.id);
                $('#namabarang').val(data.nama_barang);
                $('#date').val(data.tanggal);
                $('#hargabeli').val(data.harga_beli);
                $('#hargajual').val(data.harga_jual);
                $('#profit').val(data.keuntungan);
                $('#kategori').val(data.category);
                $('#condition').val(data.kondisi);
                $('#transaksi').val(data.transaksi_status);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('Gagal memuat data. Silakan coba lagi.');
            }
        });
    });

    $('#editProductForm').on('submit', function (e) {
        e.preventDefault();
        var id = $('#id').val();
        $.ajax({
            url: '/products/' + id,
            method: 'PUT',
            data: $(this).serialize(),
            success: function (response) {
                console.log('Response:', response);
                $('#editProductModal').modal('hide');
                alert('Data berhasil diperbarui');
                window.location.reload();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('Gagal memperbarui data. Silakan coba lagi.');
            }
        });
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var formId = button.data('form');
        var form = $('form[action*="' + formId + '"]');
        var modal = $(this);
        modal.find('#confirmDeleteBtn').on('click', function () {
            form.submit();
        });
    });

</script>
@endsection
