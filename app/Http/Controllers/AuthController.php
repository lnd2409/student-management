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
        if (Auth::guard('giaovien')->attempt($arrLogin)) {
            return redirect()->route('admin.index');

        }else if(Auth::guard('sinhvien')->attempt($arrLogin)) {
            return redirect()->route('admin.index');
        }else{
            toastr()->error('Không đúng tài khoản hoặc mật khẩu');
            return redirect()->back();
        }

    }

    public function logout() {
        Auth::guard('sinhvien')->logout();
        Auth::guard('giaovien')->logout();
        return redirect()->route('signIn');
    }
}