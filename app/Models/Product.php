<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "id",
        "user_id",
        "nama_barang",
        "harga_beli",
        "harga_jual",
        "keuntungan",
        "tanggal",
        "kondisi",
        "category",
        "transaksi_status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
