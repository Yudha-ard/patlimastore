@extends('layout.main')
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga Beli</label>
                                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keuntungan</label>
                                        <input type="text" class="form-control" id="keuntungan" name="keuntungan" readonly>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kondisi</label>
                                        <select name="kondisi" class="selectpicker form-control" data-style="py-0">
                                            <option value="new">NEW</option>
                                            <option value="second">SECOND</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" class="selectpicker form-control" data-style="py-0">
                                            <option value="fashion">Fashion</option>
                                            <option value="gadget">Gadget</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Transaksi Status</label>
                                        <select name="transaksi_status" id="transaksi_status" class="selectpicker form-control" data-style="py-0">
                                            <option value="online">Online</option>
                                            <option value="offline">Offline</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary">Add Sale</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hargaBeli = document.getElementById('harga_beli');
        const hargaJual = document.getElementById('harga_jual');
        const keuntungan = document.getElementById('keuntungan');

        // Format angka ke format ribuan
        const formatRupiah = (angka) => {
            let number_string = angka.toString();
            let split = number_string.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        };

        // Mengubah nilai input menjadi format ribuan saat kehilangan fokus
        const addRupiahFormat = (element) => {
            element.addEventListener('blur', function () {
                let number = parseFloat(element.value.replace(/[^\d]/g, ''));
                element.value = formatRupiah(number);
            });
        };

        // Event listener untuk setiap input harga
        addRupiahFormat(hargaBeli);
        addRupiahFormat(hargaJual);

        // Menghitung dan menampilkan keuntungan
        hargaJual.addEventListener('input', function () {
            const beli = parseFloat(hargaBeli.value.replace(/[^\d]/g, '')) || 0;
            const jual = parseFloat(hargaJual.value.replace(/[^\d]/g, '')) || 0;
            keuntungan.value = formatRupiah(jual - beli);
        });
    });
</script>
@endsection
