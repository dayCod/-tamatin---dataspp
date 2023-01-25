@extends('petugas.layout.master')

@section('title', 'Panel Data Kelas')

@section('breadcrumb', 'Form Data Kelas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">Form Data Kelas</h3>
                    <a href="{{ route('kelas.index') }}" class="btn btn-secondary btn-sm ml-auto">Kembali</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(!@$edit->exists)
                <form action="{{ route('kelas.store') }}" method="POST">
                @else
                <form action="{{ route('kelas.update', @$edit->id) }}" method="POST">
                    @method('PUT')
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Nama Kelas" value="{{ old('nama_kelas', @$edit->nama_kelas) }}">
                            @error('nama_kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kompetensi</label>
                            <input type="text" name="kompetensi" class="form-control @error('kompetensi') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan Kompetensi" value="{{ old('kompetensi', @$edit->kompetensi) }}">
                            @error('kompetensi')
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
