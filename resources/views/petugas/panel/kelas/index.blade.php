@extends('petugas.layout.master')

@section('title', 'Panel Data Kelas')

@section('breadcrumb', 'Data Kelas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card p-3 shadow">
                <div class="row d=flex justify-content-end mb-3">
                    <div class="col-4 text-right">
                        <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-info">Tambah</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">#</th>
                            <th class="text-center align-middle">Nama Kelas</th>
                            <th class="text-center align-middle">Kompetensi</th>
                            <th class="text-center align-middle">Dibuat Pada</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kelas as $val)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $val->nama_kelas }}</td>
                                <td class="text-center align-middle">{{ $val->kompetensi }}</td>
                                <td class="text-center align-middle">{{ Format::tanggalIndo($val->created_at) }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('kelas.edit', $val->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('kelas.destroy', $val->id) }}"
                                        class="btn btn-danger btn-sm btn-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
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
