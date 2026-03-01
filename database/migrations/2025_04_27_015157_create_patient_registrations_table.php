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
        Schema::create('patient_registrations', function (Blueprint $table) {
            $table->id();
            $table->date('registration_date')->comment('Tanggal registrasi');
            $table->string('insurance_number', 20)->unique()->comment('No. Asuransi');
            $table->string('responsible_person_name')->comment('Nama orang yang bertanggung jawab');
            $table->string('responsible_person_phone', 15)->comment('No. HP orang yang bertanggung jawab');
            $table->string('responsible_email')->comment('Email orang yang bertanggung jawab');
            $table->string('responsible_person_relationship')->comment('Hubungan dengan Pasien');
            $table->string('responsible_person_address')->comment('Alamat orang yang bertanggung jawab');

            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade')->comment('Foreign key of the patients table');
            $table->foreignId('insurance_id')->constrained('insurances')->onDelete('cascade')->comment('Foreign key of the insurances table');
            $table->foreignId('service_room_id')->constrained('service_rooms')->onDelete('cascade')->comment('Foreign key of the service rooms table');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('Foreign key of the users table');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_registrations');
    }
};
