<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Siswa Landing Page</title>
</head>

<body>

    <div id="main">

        {{-- Navbar --}}
        @include('layout.navbar')

        {{-- Content --}}
        <div class="container">
            @include('layout.hero')
        </div>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#formSiswa').submit(function(event) {
                var formData = {
                    nisn: $("#nisn").val(),
                    nis: $("#nis").val(),
                };

                $.ajax({
                    url: $(this).attr('action'),
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    if(data.length == undefined) {
                        alert(`${data.error}`)
                    } else {
                        $('div#dataSiswa').empty()
                        $.each(data, function(i, v) {
                            $('div#dataSiswa').append(`
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Berikut Adalah Hasil Pencarian Anda : </h5>
                                    <table class="table table-responsive">
                                        <tr>
                                            <th>NISN</th>
                                            <th>:</th>
                                            <td>${v.siswa.nisn}</td>
                                        </tr>
                                        <tr>
                                            <th>NIS</th>
                                            <th>:</th>
                                            <td>${v.siswa.nis}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td>${v.siswa.nama}</td>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>:</th>
                                            <td>${v.siswa.kelas.nama_kelas}</td>
                                        </tr>
                                        <tr>
                                            <th>Kompetensi</th>
                                            <th>:</th>
                                            <td>${v.siswa.kelas.kompetensi}</td>
                                        </tr>
                                    </table>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">#</th>
                                                <th class="text-center align-middle">Bulan Dibayar</th>
                                                <th class="text-center align-middle">Tahun Dibayar</th>
                                                <th class="text-center align-middle">Jumlah Dibayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">${i + 1}</td>
                                                <td class="text-center align-middle">${v.bulan_dibayar}</td>
                                                <td class="text-center align-middle">${v.tahun_dibayar}</td>
                                                <td class="text-center align-middle">${v.jumlah_dibayar}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            `)
                        })
                    }
                });

                event.preventDefault();
            })
        })
    </script>

</body>

</html>
