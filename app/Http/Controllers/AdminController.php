<?php

namespace App\Http\Controllers;

use App\Models\HocKy;
use App\Models\NamHoc;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function schooYear()
    {
        $year=NamHoc::all();
        $sem=HocKy::all();

        return view('admin.school_year.index',compact('year','sem'));
    }
    public function changeSchoolYear(Request $request)
    {
        NamHoc::where('nh_trangthai',1)->update(['nh_trangthai'=>0]);
        HocKy::where('hk_trangthai',1)->update(['hk_trangthai'=>0]);

        NamHoc::where('nh_id',$request->nh_id)->update(['nh_trangthai'=>1]);
        HocKy::where('hk_id',$request->hk_id)->update(['hk_trangthai'=>1]);

        return back();
    }
}
