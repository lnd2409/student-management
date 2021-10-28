<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function search(Request $request)
    {
        $sinhVien='';
        $request->code && $sinhVien=SinhVien::where('sv_ma',$request->code)->first();

        return view('admin.search.student_info',compact('sinhVien','request'));
    }
}