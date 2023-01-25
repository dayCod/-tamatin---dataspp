<?php

namespace App\Http\Requests\Petugas\Kelas;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelasRequest extends FormRequest
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
            'nama_kelas' => 'required|min:5|unique:kelas,nama_kelas',
            'kompetensi' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Tidak Boleh Sama',
            'nama_kelas.min' => ':attribute Minimal 5 Karakter',
            'kompetensi.min' => ':attribute Minimal 2 Karakter',
        ];
    }

    public function attributes()
    {
        return [
            'nama_kelas' => 'Nama Kelas',
            'kompetensi' => 'Kompetensi',
        ];
    }
}
