@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách môn học</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Môn học</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Năm học</th>
                                <th>Học kỳ</th>
                                <th>Số lượng sinh viên</th>
                                <th>Gíao viên giảng dạy</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($monHoc) > 0)
                                @foreach ($monHoc as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->mh_ma }}</td>
                                    <td>{{ $value->mh_ten }}</td>
                                    <td>{{ $value->namhoc->nh_ten }}</td>
                                    <td>{{ $value->hocky->hk_ten }}</td>
                                    <td>{{ count($value->sinh_viens) }}</td>
                                    <td>{{ $value->giao_vien->gv_ten }}</td>
                                    <td>
                                        <a href="{{ route('mon-hoc.danh-sach-sinh-vien', ['idMonHoc'=>$value->mh_id]) }}" class="btn btn-raised btn-info waves-effect">Nhập điểm</a>
                                    </td>
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
