@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Tra cứu thông tin sinh viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <!-- <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
            </ul> -->
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <form action="" method="get">
                        <input type="text" name="code" value="{{$request->code}}">
                    </form>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>MSSV</th>
                                <th>Họ Tên</th>
                                <th>Lớp</th>
                                <th>Các môn đang học</th>
                                <th>Giáo viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if($sinhVien!='')
                                <td>{{ $sinhVien->sv_ma }}</td>
                                <td>{{ $sinhVien->sv_ten }}</td>
                                <td>{{ $sinhVien->lop->l_ma }}</td>
                                <td>{{ $sinhVien->mon_hocs }}</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
