<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function stat(Request $request)
    {
        $monhoc=Auth::guard('giaovien')->user()->mon_hocs;
        $chitiet='';
        if($monhoc->isNotEmpty()){

            $request->mh_id?$chitiet=MonHoc::where('mh_id',$request->mh_id)->first():$chitiet=$monhoc[0];
        }
        return view('admin.stat.index',compact('monhoc','chitiet','request'));
    }
}