<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\GiaoVien;
use App\Models\HocKy;
use App\Models\NamHoc;
class MonHocController extends Controller
{
    pubLic function index() {
        $monHoc = MonHoc::all();
        // ret
        return view('admin.subject.index', compact('monHoc'));
    }

    public function add($id) {
        if ($id == 'add') {
            $giaoVien = GiaoVien::all();
            $hocKy = HocKy::all();
            $namHoc = NamHoc::all();
            $monHoc = null;
            return view('admin.subject.add', compact('monHoc','giaoVien','hocKy','namHoc'));
        }else {
            $giaoVien = GiaoVien::all();
            $hocKy = HocKy::all();
            $namHoc = NamHoc::all();
            $monHoc = MonHoc::find($id);
            return view('admin.subject.add', compact('monHoc','giaoVien','hocKy','namHoc'));
        }
        return "error";
    }

    public function handleCRUD (Request $request) {
        $data = $request->all();
        try {
            //code...
            if ($request->mh_id == '') {
                # code...
                MonHoc::create($data);
                return redirect()->route('admin.subject.index');
            }else {
                $update = MonHoc::find($request->mh_id)->update($request->all());
                return redirect()->route('admin.subject.index');
            }


        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }


    }
}
