<?php

namespace App\Http\Requests\Petugas\Spp;

use Illuminate\Foundation\Http\FormRequest;

class StoreSppRequest extends FormRequest
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
            'tahun' => 'required|unique:spps,tahun|min:4',
            'nominal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Tidak Boleh Sama',
            'min' => ':attribute Harus Menggunakan Format Tahun 4 Digit Angka Yang Valid',
        ];
    }

    public function attributes()
    {
        return [
            'tahun' => 'Tahun',
            'nominal' => 'Nominal',
        ];
    }
}
