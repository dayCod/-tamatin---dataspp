<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\Validation;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FormatHelper;

class AuthController extends Controller
{

    use Validation;

    public function register(Request $request)
    {
        // Form Validation
        $this->validasiForm($request->all(),
        ['username' => 'required|min:3|unique:petugas,username', 'password' => 'required|min:6', 'nama_petugas' => 'required|min:3']);

        // Register
        $requested = $request->all();
        $requested['username'] = FormatHelper::usernameFormat($request->username);
        $requested['password'] = bcrypt($request->password);
        $requested['level'] = "petugas";
        Petugas::create($requested);

        return redirect(route('view.login'))->withSuccess('Akun Anda Berhasil Dibuat');
    }

    public function login(Request $request)
    {
        $data = $this->validasiForm($request->all(),
        ['username' => 'required', 'password' => 'required']);

        if(Auth::guard('web')->attempt($data)) {
            $request->session()->regenerate();

            return redirect(route('petugas.dashboard'))->withSuccess('Selamat Anda Berhasil Login');
        }

        return back()->withErrors('Terdapat Kesalahan Pada Input / Akun Tidak Ditemukan')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('view.login'))->withSuccess('Selamat Anda Berhasil Logout!');
    }
}
