@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Quản lý giáo viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý giáo viên</li>
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
                        <a href="{{ route('admin.teacher.add', ['id' => 'add']) }}" class="btn btn-raised btn-primary waves-effect">Thêm giáo viên</a>
                    </h2>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã giáo viên</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->gv_id }}</td>
                                    <td>{{ $value->gv_ten }}</td>
                                    <td>{{ $value->gv_sdt }}</td>
                                    <td>{{ $value->gv_email }}</td>
                                    <td>
                                        <a href="{{ route('admin.teacher.add', ['id' => $value->gv_id]) }}" class="btn btn-raised btn-warning waves-effect">Sửa</a>
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
