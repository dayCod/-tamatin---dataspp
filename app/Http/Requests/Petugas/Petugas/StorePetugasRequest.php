<?php

namespace App\Http\Requests\Petugas\Petugas;

use Illuminate\Foundation\Http\FormRequest;

class StorePetugasRequest extends FormRequest
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
            'username' => 'required|min:3|unique:petugas,username',
            'password' => 'required|min:6',
            'nama_petugas' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Tidak Boleh Sama',
            'password.min' => ':attribute Minimal 6 Karakter',
            'nama_petugas.min' => ':attribute Minimal 3 Karakter',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'nama_petugas' => 'Nama Petugas',
        ];
    }
}
