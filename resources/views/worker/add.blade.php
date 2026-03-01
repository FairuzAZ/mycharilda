@extends('layouts.app')

@php($pageTitle = 'Tambah Pegawai')

@section('title', $pageTitle)

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pageTitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main-content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Pegawai</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('worker.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nomor Induk Pegawai (NIP)</label>
                            <input name="nip" type="text" class="form-control" placeholder="Masukkan NIP"
                                value="{{ old('nip') }}" required>
                            @error('nip')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" type="text" class="form-control" placeholder="Masukkan nama"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input name="password" type="password" class="form-control" placeholder="Masukkan kata sandi" required>
                            @error('password')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Kata Sandi</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="Konfirmasi kata sandi" required>
                        </div>
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Semua Wajib Diisi
                        </span>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="history.back()">Kembali</button>
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                });
            });
        </script>
    @endif
@endpush
