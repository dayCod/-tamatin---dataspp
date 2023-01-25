<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Petugas\Siswa\{
    StoreSiswaRequest,
    UpdateSiswaRequest,
};
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();

        return view('petugas.panel.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::whereYear('created_at', Carbon::now()->format('Y'))->first();

        return view('petugas.panel.siswa.form', compact('kelas', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
        Siswa::create($request->validated());

        return redirect(route('siswa.index'))->withSuccess('Data Berhasil Disimpan');
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
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $spp = Spp::whereYear('created_at', Carbon::now()->format('Y'))->first();

        return view('petugas.panel.siswa.form', compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, $id)
    {
        Siswa::find($id)->update($request->validated());

        return redirect(route('siswa.index'))->withSuccess('Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Dihapus'], 200);
    }
}
