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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama Pengguna');
            $table->string('nip')->unique()->comment('Nomor Induk Pegawai');
            $table->string('password')->comment('Kata Sandi Pengguna');
            $table->enum('role', ['admin', 'worker', 'patient'])->default('patient')->comment('Peran Pengguna');
            $table->boolean('is_active')->default(true)->comment('Status Pengguna');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Revert the migrations.
     *
     * @return void
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
