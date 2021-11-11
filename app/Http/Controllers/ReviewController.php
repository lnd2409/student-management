<?php

namespace App\Http\Controllers;

use App\Models\MonHocSinhVien;
use App\Models\PhucKhao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $monhoc=Auth::guard('sinhvien')->user()->mon_hocs;
        return view('admin.reviews.review',compact('monhoc'));
    }

    public function reviewStore(Request $request,MonHocSinhVien $monhocsinhvien)
    {
        $idpk=PhucKhao::create($request->all());
        $monhocsinhvien->update(['pk_id'=>$idpk->pk_id]);
        return back();
    }
}