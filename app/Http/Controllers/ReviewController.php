<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use App\Models\MonHocSinhVien;
use App\Models\PhucKhao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $monhoc = MonHocSinhVien::whereHas('mon_hoc', function ($q) {
            $q->where('sv_id', Auth::guard('sinhvien')->id())
                ->where('hk_id', 1)
                ->where('nh_id', 1);
        })->get();
        return view('admin.reviews.review', compact('monhoc'));
    }

    public function reviewStore(Request $request, MonHocSinhVien $monhocsinhvien)
    {

        $idpk = PhucKhao::create($request->all());
        $monhocsinhvien->update(['pk_id' => $idpk->pk_id]);
        return back();
    }

    public function listReview(Request $request)
    {
        $list = MonHocSinhVien::where('pk_id', '!=', null)->whereHas('mon_hoc', function ($q) {
            $q->where('gv_id', Auth::guard('giaovien')->id())
                ->where('hk_id', 1)
                ->where('nh_id', 1);
        })->get();
        return view('admin.reviews.list', compact('list'));
    }
}
