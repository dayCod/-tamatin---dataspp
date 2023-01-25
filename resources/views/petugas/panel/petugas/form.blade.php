@extends('petugas.layout.master')

@section('title', 'Panel Data Petugas')

@section('breadcrumb', 'Form Data Petugas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">Form Data Petugas</h3>
                    <a href="{{ route('operator.index') }}" class="btn btn-secondary btn-sm ml-auto">Kembali</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(!@$petugas->exists)
                <form action="{{ route('operator.store') }}" method="POST">
                @else
                <form action="{{ route('operator.update', @$petugas->id) }}" method="POST">
                    @method('PUT')
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Username" value="{{ old('username', @$petugas->username) }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="{{ !@$petugas->exists ? 'Masukkan Password' : 'Isi Jika Ingin Mengganti Password' }}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control @error('nama_petugas') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan Nama Petugas" value="{{ old('nama_petugas', @$petugas->nama_petugas) }}">
                            @error('nama_petugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
