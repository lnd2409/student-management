<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function search(Request $request)
    {
        $sinhVien='';
        $request->code && $sinhVien=SinhVien::where('sv_ma',$request->code)->first();

        return view('admin.search.student_info',compact('sinhVien','request'));
    }

    public function info()
    {
        $info='';
        if (Auth::guard('sinhvien')->check()) {
            # code...
            $info=Auth::guard('sinhvien')->user();
        } else if(Auth::guard('giaovien')->check()) {
            # code...
            $info=Auth::guard('giaovien')->user();
        }else {
            $info=Auth::guard('quantri')->user();
        }
        return view('admin.index',compact('info'));
    }


}
