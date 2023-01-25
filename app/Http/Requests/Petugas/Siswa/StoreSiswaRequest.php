<?php

namespace App\Http\Requests\Petugas\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
            'nisn' => 'required|max:10|unique:siswas,nisn',
            'nis' => 'required|max:8|unique:siswas,nis',
            'nama' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'telp' => 'required|min:9|max:13',
            'spp_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
            'nisn.max' => ':attribute Harus Menggunakan 10 Digit Angka',
            'nis.max' => ':attribute Harus Menggunakan 8 Digit Angka',
            'numeric' => ':attribute Harus Menggunakan Format Angka',
            'telp.min' => ':attribute Harus Menggunakan Minimal 9 Digit Angka',
            'telp.max' => ':attribute Harus Menggunakan Maksimal 13 Digit Angka',
            'unique' => ':attribute Tidak Boleh Sama',
        ];
    }

    public function attributes()
    {
        return [
            'nisn' => 'NISN',
            'nis' => 'NIS',
            'nama' => 'Nama',
            'kelas_id' => 'Kelas',
            'alamat' => 'Alamat',
            'telp' => 'No Telp',
            'spp_id' => 'SPP',
        ];
    }
}
