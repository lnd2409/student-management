@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Quản lý sinh viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý sinh viên</li>
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
                        <a href="{{ route('admin.student.add', ['id' => 'add']) }}" class="btn btn-raised btn-primary waves-effect">Thêm sinh viên</a>
                    </h2>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>MSSV</th>
                                <th>Họ tên</th>
                                <th>Năm sinh</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->sv_ma }}</td>
                                    <td>{{ $value->sv_ten }}</td>
                                    <td>{{ $value->sv_namsinh }}</td>
                                    <td>{{ $value->sv_email }}</td>
                                    <td>{{ $value->lop->l_ma }}</td>
                                    <td>
                                        <a href="{{ route('admin.student.add', ['id' => $value->sv_id]) }}" class="btn btn-raised btn-warning waves-effect">Sửa</a>
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
