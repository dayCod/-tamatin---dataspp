@extends('petugas.layout.master')

@section('title', 'Panel Data Siswa')

@section('breadcrumb', 'Form Data Siswa')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">Form Data Siswa</h3>
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm ml-auto">Kembali</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(!@$siswa->exists)
                <form action="{{ route('siswa.store') }}" method="POST">
                @else
                <form action="{{ route('siswa.update', @$siswa->id) }}" method="POST">
                    @method('PUT')
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NISN</label>
                            <input type="number" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan NISN" value="{{ old('nisn', @$siswa->nisn) }}">
                            @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIS</label>
                            <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan NIS" value="{{ old('nis', @$siswa->nis) }}">
                            @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan Nama Siswa" value="{{ old('nama', @$siswa->nama) }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kelas</label>
                            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                <option value="" selected hidden>Silahkan Pilih Kelas Berikut</option>
                                @foreach($kelas as $v)
                                <option value="{{ $v->id }}" @selected(old('kelas_id', @$siswa->kelas_id) == $v->id)>{{ $v->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <textarea name="alamat" id="" rows="5" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat">{{ old('alamat', @$siswa->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telp</label>
                            <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan Nomor Telp" value="{{ old('telp', @$siswa->telp) }}">
                            @error('telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">SPP</label>
                            <select name="spp_id" class="form-control @error('spp_id') is-invalid @enderror">
                                <option value="{{ $spp->id }}" selected>{{ 'Rp '.Format::rupiahFormat($spp->nominal). ' - ' .$spp->tahun }}</option>
                            </select>
                            @error('spp_id')
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


