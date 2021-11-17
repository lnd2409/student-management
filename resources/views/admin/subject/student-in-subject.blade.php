@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách sinh viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách sinh viên</li>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MSSV</th>
                                    <th>Họ tên</th>
                                    <th>Điểm giữa kỳ</th>
                                    <th>Điểm cuối kỳ</th>
                                    <th>Điểm phúc khảo 1</th>
                                    <th>Điểm phúc khảo 2</th>
                                    <th>Điểm tổng</th>
                                    <th>Điểm chữ</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data) > 0)
                                @foreach ($data as $key => $value)
                                <tr>
                                        <form
                                            action="{{ route('mon-hoc.nhap-diem', ['idMonHoc'=>$value->mh_id, 'idSinhVien' => $value->sv_id]) }}"
                                            method="GET">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->sv_ma }}</td>
                                        <td>{{ $value->sv_ten }}</td>
                                        <td>
                                            <input type="number" name="mhsv_diem_1" value="{{ $value->mhsv_diem_1 }}">
                                        </td>
                                        <td>
                                            <input type="number" name="mhsv_diem_2" value="{{ $value->mhsv_diem_2 }}">
                                        </td>
                                        <td>
                                            <input type="number" name="mhsv_diem_phuc_khao_1"
                                                value="{{ $value->mhsv_diem_phuc_khao_1 }}">
                                        </td>
                                        <td>
                                            <input type="number" name="mhsv_diem_phuc_khao_2"
                                                value="{{ $value->mhsv_diem_phuc_khao_2 }}">
                                        </td>
                                        <td>
                                            <input type="number" name="mhsv_diemtong" readonly
                                                value="{{ $value->mhsv_diemtong }}"></td>
                                        <td>
                                            <input type="text" name="mhsv_diemchu" readonly
                                                value="{{ $value->mhsv_diemchu }}">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-raised btn-info waves-effect">Xác
                                                nhận</button>
                                        </td>
                                    </form>
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
</div>
@endsection
