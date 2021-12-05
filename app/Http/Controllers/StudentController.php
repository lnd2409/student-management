<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lop;
use Hash;
class StudentController extends Controller
{
    public function search(Request $request)
    {
        $sinhVien='';
        $request->code && $sinhVien=SinhVien::where('sv_ma',$request->code)->first();

        return view('admin.search.student_info',compact('sinhVien','request'));
    }

    public function info()
    {
        $info='';
        if (Auth::guard('sinhvien')->check()) {
            # code...
            $info=Auth::guard('sinhvien')->user();
        } else if(Auth::guard('giaovien')->check()) {
            # code...
            $info=Auth::guard('giaovien')->user();
        }else {
            $info=Auth::guard('quantri')->user();
        }
        return view('admin.index',compact('info'));
    }


    public function index() {
        $data = SinhVien::all();

        return view('admin.student.index',compact('data'));
    }


    public function add($id) {
        $lop = Lop::all();
        $sinhVien = SinhVien::find($id);
        $temp1 = 0;
        // dd($lop);
        if ($id == 'add') {
            $temp1 = 1;
            return view('admin.student.add', compact('lop','sinhVien', 'temp1'));
        }else {
            return view('admin.student.add', compact('lop','sinhVien', 'temp1'));
        }
        return "error";
    }

    public function handleAdd (Request $request) {
        $getCode = SinhVien::select('sv_id')->max('sv_id');
        $studentCode = 'sv'.($getCode+1);
        $parse = $this->convert_name($request->sv_ten);
        $arrName = explode("-",$parse);
        // dd($request->all());
        if($request->sv_id == null) {

            $request->merge(
                [
                    'sv_ma' => $studentCode,
                    'sv_email' => end($arrName).$studentCode.'@gmail.com',
                    'username' => end($arrName).$studentCode,
                    'password' => Hash::make("123")
                ]
            );
            SinhVien::create($request->all());
        }else {
            $request->merge(
                [
                    'sv_email' => end($arrName).$studentCode.'@gmail.com',
                    'username' => end($arrName).$studentCode,
                ]
            );
            SinhVien::find($request->sv_id)->update($request->all());
        }
        return redirect()->route('admin.student.index');
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
