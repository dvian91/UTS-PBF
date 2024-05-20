<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus tabel jika sudah ada
        Schema::dropIfExists('users');

        // Buat tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key, auto increment
            $table->string('name', 255)->notNullable(); // Nama pengguna
            $table->string('email', 255)->notNullable()->unique(); // Email pengguna, harus unik
            $table->string('password', 255)->notNullable(); // Password pengguna
            $table->enum('role', ['admin', 'user'])->default('user')->notNullable(); // Role pengguna
            $table->timestamps(); // Timestamps, created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
