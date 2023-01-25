<?php

namespace App\Http\Requests\Petugas\Pembayaran;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembayaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'siswa_id' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'spp_id' => 'required',
            'jumlah_dibayar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
        ];
    }

    public function attributes()
    {
        return [
            'siswa_id' => 'Siswa',
            'tgl_bayar' => 'Tanggal Bayar',
            'bulan_dibayar' => 'Bulan Dibayar',
            'tahun_dibayar' => 'Tahun Dibayar',
            'spp_id' => 'SPP',
            'jumlah_dibayar' => 'Jumlah Dibayar',
        ];
    }
}
