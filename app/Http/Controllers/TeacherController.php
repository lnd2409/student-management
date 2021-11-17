<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use App\Models\MonHocSinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function stat(Request $request)
    {
        $monhoc=Auth::guard('giaovien')->user()->mon_hocs;
        $chitiet='';
        if($monhoc->isNotEmpty()){
            $request->mh_id??$request->merge(['mh_id'=>$monhoc[0]->mh_id]);
            $chitiet=MonHocSinhVien::whereHas('mon_hoc', function($q) use ($request){
                $q->where('gv_id',Auth::guard('giaovien')->id())
                ->where('mh_id',$request->mh_id)
                ->where('hk_id',1)
                ->where('nh_id',1);
            })
            ->get();
        }
        return view('admin.stat.index',compact('monhoc','chitiet','request'));
    }
}