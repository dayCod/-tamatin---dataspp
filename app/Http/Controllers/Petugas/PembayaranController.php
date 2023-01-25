<?php

namespace App\Http\Controllers\Petugas;

use App\Helpers\FormatHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Petugas\Pembayaran\{
    StorePembayaranRequest,
    UpdatePembayaranRequest,
};
use App\Models\{
    Pembayaran,
    Siswa,
};
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembayaran::all();

        return view('petugas.panel.pembayaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('petugas.panel.pembayaran.form', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembayaranRequest $request)
    {
        $data = $request->validated();
        $data['petugas_id'] = auth()->id();
        $data['tgl_bayar'] = Carbon::now();
        $data['jumlah_dibayar'] = FormatHelper::rupiahPost($request->jumlah_dibayar);

        // dd($data);

        Pembayaran::create($data);

        return redirect(route('pembayaran.index'))->withSuccess('Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Pembayaran::find($id);
        $siswa = Siswa::all();

        return view('petugas.panel.pembayaran.form', compact('edit', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembayaranRequest $request, $id)
    {
        $data = $request->validated();
        $data['petugas_id'] = auth()->id();
        $data['tgl_bayar'] = Carbon::now();
        $data['jumlah_dibayar'] = FormatHelper::rupiahPost($request->jumlah_dibayar);

        Pembayaran::find($id)->update($data);

        return redirect(route('pembayaran.index'))->withSuccess('Data Berhasil Di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Di Hapus'], 200);
    }
}
