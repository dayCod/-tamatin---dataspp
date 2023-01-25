<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\{
    Kelas,
    Petugas,
    Siswa,
};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data_collection = [
            'jumlah_siswa' => Siswa::count(),
            'jumlah_petugas' => Petugas::whereLevel('petugas')->count(),
            'jumlah_kelas' => Kelas::count(),
        ];

        return view('petugas.panel.dashboard.index', compact('data_collection'));
    }
}
