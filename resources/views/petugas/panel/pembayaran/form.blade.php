@extends('petugas.layout.master')

@section('title', 'Panel Data Pembayaran')

@section('breadcrumb', 'Form Data Pembayaran')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">Form Data Pembayaran</h3>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary btn-sm ml-auto">Kembali</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if (!@$edit->exists)
                    <form action="{{ route('pembayaran.store') }}" method="POST">
                    @else
                        <form action="{{ route('pembayaran.update', @$edit->id) }}" method="POST">
                            @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Siswa</label>
                        <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror">
                            <option value="" selected hidden>Silahkan Pilih Siswa Berikut</option>
                            @foreach ($siswa as $v)
                                <option value="{{ $v->id }}" @selected(old('siswa_id', @$edit->siswa_id) == $v->id)>{{ $v->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun Dibayar</label>
                        <select name="tahun_dibayar" class="form-control @error('tahun_dibayar') is-invalid @enderror">
                            <option value="" selected hidden>Silahkan Pilih Terlebih Dulu Data Siswa</option>
                        </select>
                        @error('tahun_dibayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulan Dibayar</label>
                        <select name="bulan_dibayar" class="form-control @error('bulan_dibayar') is-invalid @enderror">
                            <option value="" selected hidden>Silahkan Pilih Terlebih Dahulu Data Siswa</option>
                        </select>
                        @error('bulan_dibayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">SPP ID</label>
                        <select name="spp_id" class="form-control @error('spp_id') is-invalid @enderror">
                            <option value="" selected hidden>Kolom SPP Akan Otomatis Terisi Ketika Semua Data Diatas
                                Diisi</option>
                        </select>
                        @error('spp_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Dibayar</label>
                        <input type="text" name="jumlah_dibayar"
                            class="form-control @error('jumlah_dibayar') is-invalid @enderror" placeholder="Jumlah Dibayar"
                            value="{{ old('jumlah_dibayar', @$edit->jumlah_dibayar) }}" id="jumlahDibayar" readonly>
                        @error('jumlah_dibayar')
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


@section('script')


    <script>
        $(document).ready(function() {
            @if (@$edit->exists)
                let ids = $('select[name="siswa_id"]').val()
                let route = "{{ route('pembayaran.getSpp', [':siswa']) }}"
                route = route.replace(':siswa', ids)

                $.ajax({
                    url: route,
                    method: 'GET',
                    success: function(data) {
                        tahunDibayar(data.tanggal_dibayar)
                        bulanDibayar(data.tanggal_dibayar)
                        $('select[name="spp_id"]').empty()
                        $('select[name="spp_id"]').append(`
                    <option value="${data.spp.id}" selected>${data.spp.nominal} - ${data.spp.tahun}</option>
                    `)
                        $('#jumlahDibayar').val(`${data.spp.nominal}`)
                    }
                })
            @endif

            $('select[name="siswa_id"]').change(function() {
                let id = $(this).val();
                let routeSpp = "{{ route('pembayaran.getSpp', [':siswa']) }}"
                routeSpp = routeSpp.replace(':siswa', id)

                $.ajax({
                    url: routeSpp,
                    method: 'GET',
                    success: function(data) {
                        tahunDibayar(data.tanggal_dibayar)
                        bulanDibayar(data.tanggal_dibayar)
                        $('select[name="spp_id"]').empty()
                        $('select[name="spp_id"]').append(`
                    <option value="${data.spp.id}" selected>${data.spp.nominal} - ${data.spp.tahun}</option>
                    `)
                        $('#jumlahDibayar').val(`${data.spp.nominal}`)
                    }
                })
            })

            function tahunDibayar(data) {
                let html
                $('select[name="tahun_dibayar"]').empty()
                $('select[name="tahun_dibayar"]').append(`
                <option value="" selected hidden>Silahkan Pilih Tahun Berikut</option>
            `)
                let tahun = data.tahun
                for (let i = 0; i < tahun.length; i++) {
                    $('select[name="tahun_dibayar"]').append(`
                    <option value="${tahun[i]}" @if(@$edit->exists) @selected(old('tahun_dibayar', @$edit->tahun_dibayar) == @$edit->tahun_dibayar) @endif>${tahun[i]}</option>
                `)
                }
            }

            function bulanDibayar(data) {
                let html
                $('select[name="bulan_dibayar"]').empty()
                $('select[name="bulan_dibayar"]').append(`
                <option value="" selected hidden>Silahkan Pilih Bulan Berikut</option>
            `)
                let bulan = data.bulan
                for (let i = 0; i < bulan.length; i++) {
                    $('select[name="bulan_dibayar"]').append(`
                    <option value="${bulan[i]}" @if(@$edit->exists) @selected(old('bulan_dibayar', @$edit->bulan_dibayar) == @$edit->bulan_dibayar) @endif>${bulan[i]}</option>
                `)
                }
            }

            $('select[name="tahun_dibayar"]').change(function() {
                let id = $(this).val()
                let routeBulan = "{{ route('pembayaran.getBulan', [':tahun']) }}"
                routeBulan = routeBulan.replace(':tahun', id)

                console.log(routeBulan)
            })
        })
    </script>

@endsection
