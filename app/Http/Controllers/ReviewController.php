<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use App\Models\MonHocSinhVien;
use App\Models\PhucKhao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HocKy;
use App\Models\NamHoc;
class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $namhoc = NamHoc::where('nh_trangthai',1)->first();
        $hocki = HocKy::where('hk_trangthai',1)->first();
        $hk = $hocki->hk_id;
        $nh = $namhoc->nh_id;
        // dd($nh);
        $monhoc = MonHocSinhVien::whereHas('mon_hoc', function ($q) use ($hk,$nh) {
            $q->where('sv_id', Auth::guard('sinhvien')->id())
                ->where('hk_id',$hk )
                ->where('nh_id',$nh);
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
