<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_barang');
            $table->decimal('harga_beli', 15, 2);
            $table->decimal('harga_jual', 15, 2);
            $table->decimal('keuntungan', 15, 2)->storedAs('harga_jual - harga_beli');
            $table->date('tanggal');
            $table->enum('kondisi', ['new', 'second']);
            $table->enum('transaksi_status', ['offline', 'online']);
            $table->timestamps();
            $table->enum('category', ['fashion', 'gadget']);

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
