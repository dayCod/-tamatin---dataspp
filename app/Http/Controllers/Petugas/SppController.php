<?php

namespace App\Http\Controllers\Petugas;

use App\Helpers\FormatHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Petugas\Spp\{
    StoreSppRequest,
    UpdateSppRequest,
};
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();

        return view('petugas.panel.spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.panel.spp.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSppRequest $request)
    {
        $data = $request->validated();
        $data['nominal'] = FormatHelper::rupiahPost($request->nominal);
        Spp::create($data);

        return redirect(route('spp.index'))->withSuccess('Data Berhasil Di Simpan');
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
        $edit = Spp::find($id);

        return view('petugas.panel.spp.form', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSppRequest $request, $id)
    {
        $data = $request->validated();
        $data['nominal'] = FormatHelper::rupiahPost($request->nominal);
        Spp::find($id)->update($data);

        return redirect(route('spp.index'))->withSuccess('Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Spp::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Di Hapus'], 200);
    }
}
