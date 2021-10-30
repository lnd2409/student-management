<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\GiaoVien;
class MonHocController extends Controller
{
    pubLic function index() {
        $monHoc = MonHoc::all();
        // ret
        return view('admin.subject.index', compact('monHoc'));
    }

    public function add() {
        $giaoVien = GiaoVien::all();
        return view('admin.subject.add', compact('giaoVien'));
    }
}
