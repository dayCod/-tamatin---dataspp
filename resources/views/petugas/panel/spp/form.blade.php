@extends('petugas.layout.master')

@section('title', 'Panel Data SPP')

@section('breadcrumb', 'Form Data SPP')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">Form Data SPP</h3>
                    <a href="{{ route('spp.index') }}" class="btn btn-secondary btn-sm ml-auto">Kembali</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(!@$edit->exists)
                <form action="{{ route('spp.store') }}" method="POST">
                @else
                <form action="{{ route('spp.update', @$edit->id) }}" method="POST">
                    @method('PUT')
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun</label>
                            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Tahun SPP" value="{{ old('tahun', @$edit->tahun) }}">
                            @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nominal</label>
                            <input type="text" name="nominal" class="form-control @error('nominal') is-invalid @enderror" id="nominal" placeholder="Masukkan Nominal SPP" value="{{ old('nominal', @$edit->nominal) }}">
                            @error('nominal')
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

    let rupiahFormatting = document.getElementById('nominal')
    rupiahFormatting.addEventListener('keyup', function() {
        rupiahFormatting.value = formatRupiah(this.value)
    })

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@endsection
