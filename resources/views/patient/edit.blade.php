@extends('layouts.app')

@php($pageTitle = 'Edit Pasien')

@section('title', $pageTitle)

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $pageTitle }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $pageTitle }}</li>
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
                <h3 class="card-title">Data Pasien {{ $patient->first_name }} {{ $patient->last_name }}</h3>
            </div>

            <form action="{{ route('patient-management.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body" style="padding-bottom: 0.5rem">
                    <div class="row">

                        {{-- LEFT --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>No. Rekam Medis</label>
                                <input type="text" class="form-control"
                                    value="{{ $patient->medical_record_number }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>NIK <strong class="text-danger">*</strong></label>
                                <input name="identity_number" type="text" class="form-control"
                                    placeholder="Masukkan NIK"
                                    value="{{ old('identity_number', $patient->identity_number) }}" required>
                                @error('identity_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Depan <strong class="text-danger">*</strong></label>
                                <input name="first_name" type="text" class="form-control"
                                    placeholder="Masukkan nama depan"
                                    value="{{ old('first_name', $patient->first_name) }}" required>
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Belakang <strong class="text-danger">*</strong></label>
                                <input name="last_name" type="text" class="form-control"
                                    placeholder="Masukkan nama belakang"
                                    value="{{ old('last_name', $patient->last_name) }}" required>
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir <strong class="text-danger">*</strong></label>
                                <input name="birth_date" type="date" class="form-control"
                                    value="{{ old('birth_date', $patient->birth_date) }}" required>
                                @error('birth_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin <strong class="text-danger">*</strong></label>
                                <select name="gender" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="L" {{ old('gender', $patient->gender) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ old('gender', $patient->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon <strong class="text-danger">*</strong></label>
                                <input name="phone_number" type="text" class="form-control"
                                    placeholder="Masukkan nomor telepon"
                                    value="{{ old('phone_number', $patient->phone_number) }}" required>
                                @error('phone_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat Surel <strong class="text-danger">*</strong></label>
                                <input name="email" type="email" class="form-control"
                                    placeholder="Masukkan alamat surel"
                                    value="{{ old('email', $patient->email) }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        {{-- RIGHT --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Alamat Tinggal <strong class="text-danger">*</strong></label>
                                <textarea name="address" class="form-control" rows="3"
                                    placeholder="Masukkan alamat tinggal" required>{{ old('address', $patient->address) }}</textarea>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Golongan Darah <strong class="text-danger">*</strong></label>
                                <select name="blood_type" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="A" {{ old('blood_type', $patient->blood_type) == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ old('blood_type', $patient->blood_type) == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ old('blood_type', $patient->blood_type) == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ old('blood_type', $patient->blood_type) == 'O' ? 'selected' : '' }}>O</option>
                                    <option value="Lainnya" {{ old('blood_type', $patient->blood_type) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('blood_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alergi</label>
                                <textarea name="allergies" class="form-control" rows="3"
                                    placeholder="Sebutkan alergi jika ada: Makanan, Obat">{{ old('allergies', $patient->allergies) }}</textarea>
                                @error('allergies')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Obat yang Sedang Dikonsumsi</label>
                                <textarea name="current_medicines" class="form-control" rows="3"
                                    placeholder="Sebutkan obat yang sedang dikonsumsi: Bodrex, Amlodipine">{{ old('current_medicines', $patient->current_medicines) }}</textarea>
                                @error('current_medicines')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Riwayat Penyakit</label>
                                <textarea name="medical_history" class="form-control" rows="3"
                                    placeholder="Sebutkan riwayat penyakit: Jantung, Diabetes">{{ old('medical_history', $patient->medical_history) }}</textarea>
                                @error('medical_history')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>

                <span class="text-muted float-start ml-4">
                    <strong class="text-danger">*</strong> Wajib Diisi
                </span>

                <div class="card-footer mt-2">
                    <button type="button" class="btn btn-primary" onclick="history.back()">Kembali</button>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}",
        });
    });
</script>
@endif
@endpush