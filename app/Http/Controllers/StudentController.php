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
        Auth::guard('sinhvien')->check()?$info=Auth::guard('sinhvien')->user():$info=Auth::guard('giaovien')->user();
        return view('admin.index',compact('info'));
    }

    
}