<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key, auto increment
            $table->string('name', 255)->notNullable(); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk, boleh null
            $table->decimal('price', 10, 2)->notNullable(); // Harga produk, tipe decimal untuk menyimpan nilai uang
            $table->string('image', 255)->nullable(); // URL gambar produk, boleh null
            $table->unsignedBigInteger('category_id')->notNullable(); // ID kategori produk, unsigned big integer
            $table->date('expired_at')->notNullable(); // Tanggal kedaluwarsa produk
            $table->string('modified_by', 255)->notNullable()->comment('email user'); // Email pengguna yang terakhir memodifikasi produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
