<?php

namespace App\Http\Controllers\Petugas;

use App\Helpers\FormatHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Petugas\Petugas\{
    StorePetugasRequest,
    UpdatePetugasRequest,
};
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Petugas::all();

        return view('petugas.panel.petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.panel.petugas.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetugasRequest $request)
    {
        $data = $request->validated();
        $data['username'] = FormatHelper::usernameFormat($request->username);
        $data['password'] = bcrypt($request->password);
        $data['level'] = "petugas";

        Petugas::create($data);

        return redirect(route('operator.index'))->withSuccess('Data Berhasil Dibuat');
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
        $petugas = Petugas::find($id);

        return view('petugas.panel.petugas.form', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, $id)
    {
        $ids = Petugas::find($id);
        $data = $request->validated();
        $data['password'] = bcrypt($request->password) ?? $ids->password;
        $ids->update($data);

        return redirect(route('operator.index'))->withSuccess('Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Dihapus'], 200);
    }
}
