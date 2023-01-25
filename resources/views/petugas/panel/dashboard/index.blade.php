@extends('petugas.layout.master')

@section('title', 'Panel Dashboard')

@section('breadcrumb', 'Panel Dashboard')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $data_collection['jumlah_siswa'] }}</h3>

                    <p>Jumlah Siswa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('siswa.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data_collection['jumlah_petugas'] }}</h3>

                    <p>Jumlah Petugas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="@role('admin') {{ route('operator.index') }} @endrole " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $data_collection['jumlah_kelas'] }}</h3>

                    <p>Jumlah Kelas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('kelas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

@endsection
