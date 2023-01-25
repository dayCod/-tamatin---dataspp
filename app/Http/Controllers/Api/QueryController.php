<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{
    Pembayaran,
    Siswa,
    Spp,
};
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function getDataSpp($siswa)
    {
        $dataSiswa = Siswa::find($siswa);
        $dataSpp = Spp::find($dataSiswa->spp_id);
        $data = [
            'tanggal_dibayar' => [
                'tahun' => [
                    $dataSpp->tahun + 2,
                    $dataSpp->tahun + 1,
                    (int)$dataSpp->tahun,
                ],
                'bulan' => [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ],

            ],
            'spp' => $dataSpp,
        ];

        return response()->json($data, 200);
    }

    public function getBulanBelumBayar($tahun)
    {
        $data = Pembayaran::where('tahun_dibayar', $tahun)->get();
        $dataBulan = array();

        foreach($data as $i => $val) {
            $dataBulan[] = $val->bulan_dibayar;
        }

        dd($dataBulan);
    }

    public function getPembayaranSiswa(Request $request)
    {
        try {
            $siswa = Siswa::where('nisn', $request->nisn)->where('nis', $request->nis)->first();
            $pembayaran = Pembayaran::with('siswa', 'siswa.kelas')->where('siswa_id', $siswa->id)->get();
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Siswa Tidak Ada']);
        }

        return response()->json($pembayaran);
    }
}
