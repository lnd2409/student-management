@extends('admin.template.master')
@push('css')
<style>
    .white {
        background: #fff;
        border-radius: 8 px;
        border: none;
        transition: all 0.4s ease-in-out;
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
    <div class=" clearfix white">
        <!-- sv -->
        <div class="body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã môn</th>
                        <th>Tên môn</th>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Nội dung phúc khảo</th>
                        <th>Phúc khảo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->mon_hoc->mh_ma}}</td>
                        <td>{{$item->mon_hoc->mh_ten}}</td>
                        <td>{{$item->sinh_vien->sv_ma}}</td>
                        <td>{{$item->sinh_vien->sv_ten}}</td>
                        <td>{{$item->phuc_khao->pk_noidung}}</td>
                        <!-- Button trigger modal -->
                        <td>
                                        <a href="{{ route('mon-hoc.danh-sach-sinh-vien', ['idMonHoc'=>$item->mon_hoc->mh_id]) }}" class="btn btn-raised btn-info waves-effect">Nhập điểm</a>
                            </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
