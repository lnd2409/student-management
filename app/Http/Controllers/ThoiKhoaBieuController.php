<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\GiaoVien;
use App\Models\ThoiKhoaBieu;
use App\Models\ThoiKhoaBieuChiTiet;
use Carbon\Carbon;
class ThoiKhoaBieuController extends Controller
{
    public function add() {
        // $now = Carbon::now();
        // $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        // dd($weekStartDate);
        return view('admin.schedule.add-schedule');
    }

    public function createShedule(Request $request) {
        $dayGet = Carbon::parse($request->day);
        $now = Carbon::parse($request->day);
        $weekStartDate = $now->startOfWeek();
        $weekEndDate = Carbon::parse($request->day)->addDays(4);
        //dd($dayGet); //2021-10-25 00:00:00.0 UTC
        //dd($weekEndDate); //2021-10-31 23:59:59.999999 UTC
        if($dayGet != $weekStartDate) {
            dd('đây không phải đầu tuần');
            //return error
            return redirect()->back();
        }else{
            // dd('đây là đầu tuần');
            //success
            $scheduleGetId = ThoiKhoaBieu::insertGetId(
                [
                    'tkb_ngaybatdau' => $weekStartDate,
                    'tkb_ngayketthuc' => $weekEndDate
                ]
            );
            // for ($i=1; $i <=5 ; $i++) {
            //     # code...
            //     $addDetail = ThoiKhoaBieuChiTiet::insert(
            //         [
            //             'tkb_ngay'
            //         ]
            //     );
            // }
            return redirect()->route('admin.subject.add', ['idSchedule' => $scheduleGetId]);
        }
    }

    public function addSubject($idSchedule) {
        $schedule = ThoiKhoaBieu::find($idSchedule);
        $detailSchedult = ThoiKhoaBieuChiTiet::where('tkb_id',$idSchedule)->get();
        $subject = MonHoc::all();
        // dd($subject);
        return view('admin.schedule.add-subject', compact('schedule', 'subject'));
    }
}
