<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
class AuthController extends Controller
{
    public function handleLogin(Request $request) {
        $arrLogin = [
            'username' => $request->username,
            'password' => $request->password];
        // dd(Auth::guard('quantri')->attempt($arrLogin));
        if (Auth::guard('giaovien')->attempt($arrLogin)||Auth::guard('sinhvien')->attempt($arrLogin)
            || Auth::guard('quantri')->attempt($arrLogin)
            ) {
            return redirect()->route('info');
        }else{
            toastr()->error('Không đúng tài khoản hoặc mật khẩu');
            return redirect()->back();
        }

    }

    public function logout() {
        Auth::guard('sinhvien')->logout();
        Auth::guard('giaovien')->logout();
        Auth::guard('quantri')->logout();
        return redirect()->route('signIn');
    }
}
