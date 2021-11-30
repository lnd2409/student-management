<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GiaoVien;
use Hash;
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

    public function index() {
        $data = GiaoVien::all();

        return view('admin.teacher.index',compact('data'));
    }

    public function add($id) {
        $giaoVien = GiaoVien::find($id);
        // dd($lop);
        if ($id == 'add') {
            return view('admin.teacher.add', compact('giaoVien'));
        }else {
            return view('admin.teacher.add', compact('giaoVien'));
        }
        return "error";
    }

    public function handleAdd (Request $request) {
        $getCode = GiaoVien::select('gv_id')->max('gv_id');
        $studentCode = 'gv'.($getCode+1);
        $parse = $this->convert_name($request->gv_ten);
        $arrName = explode("-",$parse);
        // dd($request->all());
        if($request->gv_id == null) {

            $request->merge(
                [
                    'gv_email' => end($arrName).$studentCode.'@gmail.com',
                    'username' => end($arrName).$studentCode,
                    'password' => Hash::make("123")
                ]
            );
            GiaoVien::create($request->all());
        }else {
            $request->merge(
                [
                    'gv_email' => end($arrName).$studentCode.'@gmail.com',
                    'username' => end($arrName).$studentCode,
                ]
            );
            GiaoVien::find($request->gv_id)->update($request->all());
        }
        return redirect()->route('admin.teacher.index');
    }


    function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
		$str = preg_replace("/(Đ)/", 'd', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return strtolower($str);
	}
}
