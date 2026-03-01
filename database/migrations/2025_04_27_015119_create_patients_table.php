<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->string('identity_number', 16)->unique()->comment('Nomor Induk Kependudukan');
            $table->string('medical_record_number', 16)->unique()->comment('Nomor Rekam Medis');
            $table->string('first_name')->comment('Nama Depan');
            $table->string('last_name')->comment('Nama Belakang');
            $table->date('birth_date')->comment('Tanggal Lahir');
            $table->enum('gender', ['L', 'P'])->comment('L: Laki-Laki, P: Perempuan');
            $table->string('phone_number', 15)->comment('Nomor Telepon');
            $table->string('email')->comment('Alamat Email');
            $table->string('address')->comment('Alamat');

            $table->string('blood_type', 10)->comment('Golongan Darah');
            $table->string('allergies')->nullable()->comment('Alergi');
            $table->string('current_medicines')->nullable()->comment('Obat yang Sedang Dikonsumsi');
            $table->text('medical_history')->nullable()->comment('Riwayat Penyakit'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
