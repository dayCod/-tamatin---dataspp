@extends('petugas.layout.master')

@section('title', 'Panel Data Pembayaran')

@section('breadcrumb', 'Data Pembayaran')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card p-3 shadow">
            <div class="row d=flex justify-content-end mb-3">
                <div class="col-4 text-right">
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-sm btn-info">Tambah</a>
                </div>
            </div>
            <table class="table table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th class="text-center align-middle">#</th>
                        <th class="text-center align-middle">Petugas</th>
                        <th class="text-center align-middle">Siswa</th>
                        <th class="text-center align-middle">Bulan Dibayar</th>
                        <th class="text-center align-middle">Tahun Dibayar</th>
                        <th class="text-center align-middle">Jumlah Dibayar</th>
                        <th class="text-center align-middle">Dibuat Pada</th>
                        <th class="text-center align-middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $v)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">{{ $v->petugas->nama_petugas }}</td>
                        <td class="text-center align-middle">{{ $v->siswa->nama }}</td>
                        <td class="text-center align-middle">{{ $v->bulan_dibayar }}</td>
                        <td class="text-center align-middle">{{ $v->tahun_dibayar }}</td>
                        <td class="text-center align-middle">{{ 'Rp '.Format::rupiahFormat($v->jumlah_dibayar) }}</td>
                        <td class="text-center align-middle">{{ Format::tanggalIndo($v->created_at) }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('pembayaran.edit', $v->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('pembayaran.destroy', $v->id) }}" class="btn btn-danger btn-sm btn-delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center align-middle" colspan="8" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function(e) {
                e.preventDefault()

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('div').parent('div').parent('td').parent('tr').remove();
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload()
                                })
                            }
                        })
                    }
                })
            })
        })
    </script>

@endsection
