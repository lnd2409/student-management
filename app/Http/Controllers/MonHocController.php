<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use App\Models\HocKy;
use App\Models\NamHoc;
use Auth;
use DB;
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

    public function registerSubject() {
        $monHoc = MonHoc::all();
        $sinhVien = SinhVien::find(Auth::guard('sinhvien')->id());
        return view('admin.subject.add-student-to-subject', compact('monHoc','sinhVien'));
    }

    public function handleRegister($idMonHoc) {
        DB::table('mon_hoc_sinh_vien')->insert([
            'sv_id' => Auth::guard('sinhvien')->id(),
            'mh_id' => $idMonHoc
        ]);
        return redirect()->back();
    }

    public function subjectByTeacher($id) {
        $monHoc = MonHoc::where('gv_id', $id)->get();
        return view('admin.subject.subject-by-teacher', compact('monHoc'));
    }

    public function getStudentBySubject($idMonHoc) {
        $data = DB::table('mon_hoc_sinh_vien')
                ->join('sinh_vien','sinh_vien.sv_id', 'mon_hoc_sinh_vien.sv_id')
                ->join('mon_hoc','mon_hoc.mh_id', 'mon_hoc_sinh_vien.mh_id')
                ->where('mon_hoc_sinh_vien.mh_id',$idMonHoc)
                ->get();
        $monHoc = MonHoc::find($idMonHoc);
        return view('admin.subject.student-in-subject', compact('data','monHoc'));
    }

    public function handleScore(Request $request, $idSinhVien, $idMonHoc) {
        $request->merge(
            [
                'mhsv_diemtong' => (($request->mhsv_diem_1 + $request->mhsv_diem_2) / 2),
            ]
        );
        if ($request->mhsv_diemtong >= 0 && $request->mhsv_diemtong <= 3.9) {
            # code...
            $request->merge(
                [
                    'mhsv_diemchu' => 'F',
                ]
            );
        }
        if ($request->mhsv_diemtong >= 4 && $request->mhsv_diemtong <= 4.9) {
            # code...
            $request->merge(
                [
                    'mhsv_diemchu' => 'D',
                ]
            );
        }
        if ($request->mhsv_diemtong >= 5 && $request->mhsv_diemtong <= 6.9) {
            # code...
            $request->merge(
                [
                    'mhsv_diemchu' => 'C',
                ]
            );
        }
        if ($request->mhsv_diemtong >= 7 && $request->mhsv_diemtong <= 8.9) {
            # code...
            $request->merge(
                [
                    'mhsv_diemchu' => 'B',
                ]
            );
        }
        if ($request->mhsv_diemtong >= 9 && $request->mhsv_diemtong <= 10) {
            # code...
            $request->merge(
                [
                    'mhsv_diemchu' => 'A',
                ]
            );
        }
        DB::table('mon_hoc_sinh_vien')
                ->where('mon_hoc_sinh_vien.mh_id',$idMonHoc)
                ->where('mon_hoc_sinh_vien.sv_id',$idSinhVien)
                ->update($request->all());
        return redirect()->back();
    }
}
