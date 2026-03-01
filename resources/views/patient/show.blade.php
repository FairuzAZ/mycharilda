@extends('layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Pasien</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
            </div>

            <div class="card-body" style="padding-bottom: 0.5rem">
                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-6">
                        <p><strong>No. Rekam Medis:</strong> {{ $patient->medical_record_number ?? '-' }}</p>
                        <p><strong>NIK:</strong> {{ $patient->identity_number ?? '-' }}</p>
                        <p><strong>Nama Depan:</strong> {{ $patient->first_name ?? '-' }}</p>
                        <p><strong>Nama Belakang:</strong> {{ $patient->last_name ?? '-' }}</p>
                        <p>
                            <strong>Tanggal Lahir:</strong>
                            {{ $patient->birth_date ? \Carbon\Carbon::parse($patient->birth_date)->format('d M Y') : '-' }}
                        </p>
                        <p>
                            <strong>Jenis Kelamin:</strong>
                            {{ $patient->gender == 'L' ? 'Laki-Laki' : ($patient->gender == 'P' ? 'Perempuan' : '-') }}
                        </p>
                        <p><strong>Nomor Telepon:</strong> {{ $patient->phone_number ?? '-' }}</p>
                        <p><strong>Alamat Surel:</strong> {{ $patient->email ?? '-' }}</p>
                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-6">
                        <p><strong>Golongan Darah:</strong> {{ $patient->blood_type ?? '-' }}</p>
                        <p><strong>Alamat Tinggal:</strong> {{ $patient->address ?? '-' }}</p>
                        <p><strong>Alergi:</strong> {{ $patient->allergies ?? '-' }}</p>
                        <p><strong>Obat yang Sedang Dikonsumsi:</strong> {{ $patient->current_medicines ?? '-' }}</p>
                        <p><strong>Riwayat Penyakit:</strong> {{ $patient->medical_history ?? '-' }}</p>
                    </div>

                </div>
            </div>

            <div class="card-footer mt-2">
                <button type="button" class="btn btn-primary" onclick="history.back()">Kembali</button>
            </div>

        </div>
    </div>
</div>
@endsection