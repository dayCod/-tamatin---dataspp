<div class="row justify-content-center align-items-center" style="height: 60vh">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-body">
              <h5 class="card-title">Silahkan Cari Data SPP Anda Berdasarkan NISN :</h5>
                <form action="{{ route('siswa.pembayaran') }}" method="GET" id="formSiswa">
                    @csrf
                    <div class="my-3">
                        <label for="exampleFormControlInput1" class="form-label">Masukan Nomor NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Silahkan Masukan Nomor NISN Anda">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Masukan Nomor NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Silahkan Masukan Nomor NIS Anda">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4" id="dataSiswa">
    </div>
</div>
