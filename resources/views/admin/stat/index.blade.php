@extends('admin.template.master')
@push('css')
<style>
    .white {
        background: #fff;
        border-radius: 8 px;
        border: none;
        transition: all 0.4s ease-in-out;
    }

    label {

        float: right;
    }

    .form-control-custom {
        width: 15% !important
    }

</style>
@endpush
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thông tin cá nhân
            </h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                <li class="breadcrumb-item active">Dashboard 1</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="header">
                    <form action="" method="get">
                        <select name="mh_id" id="" class="form-control show-tick form-control-custom">
                            @foreach($monhoc as $item)
                            <option value="{{$item->mh_id}}" @if($item->mh_id==$request->mh_id) selected
                                @endif>{{$item->mh_ten}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Thống kê</button>
                    </form>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="db">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Lớp</th>
                                <th>Môn học</th>
                                <th>Điểm trung bình</th>
                                <th>Xếp loại</th>
                                <th>Học kỳ</th>
                            </tr>
                        </thead>
                        @if($chitiet->sinh_viens->isNotEmpty())
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Lớp</th>
                                <th>Môn học</th>
                                <th>Điểm trung bình</th>
                                <th>Xếp loại</th>
                                <th>Học kỳ</th>
                            </tr>
                        </tfoot>
                        @endif
                        <tbody>
                            @if($chitiet!='')
                            @foreach($chitiet->sinh_viens as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->sv_ma}}</td>
                                <td>{{$item->sv_ten}}</td>
                                <td>{{$item->lop->l_ma}}</td>
                                <td>{{$chitiet->mh_ten}}</td>
                                <td>trung bình</td>
                                <td>Xếp loại</td>
                                <td>{{$chitiet->hocky->hk_ten??''}} - {{$chitiet->namhoc->nh_ten??''}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
@endpush
