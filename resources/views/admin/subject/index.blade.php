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
                    <h2>
                        <a href="{{ route('admin.subject.add', ['id' => 'add']) }}" class="btn btn-raised btn-primary waves-effect">Thêm môn học</a>
                    </h2>
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
                                <th>Gíao viên giảng dạy</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monHoc as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->mh_ma }}</td>
                                <td>{{ $value->mh_ten }}</td>
                                <td>{{ $value->namhoc->nh_ten }}</td>
                                <td>{{ $value->hocky->hk_ten }}</td>
                                <td>{{ $value->giao_vien->gv_ten }}</td>
                                <td>
                                    <a href="{{ route('admin.subject.add', ['id'=>$value->mh_id]) }}" class="btn btn-raised btn-warning waves-effect">Sửa</a>
                                    {{-- <button type="button" class="btn btn-raised btn-danger waves-effect">Xóa</button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
