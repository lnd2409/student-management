@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
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
                        <button type="button" class="btn btn-raised btn-primary waves-effect">Thêm sản phẩm</button>
                    </h2>
                    {{-- <ul class="header-dropdown">
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tình trạng</th>
                                <th>Loại</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sanPham as $item)
                            <tr>
                                <td>{{ $item->sp_ten }}</td>
                                <td>{{ number_format($item->sp_gia) }}</td>
                                <td>{{ $item->sp_soluong }}</td>
                                <td>{{ $item->sp_tinhtrang }}</td>
                                <td>{{ $item->theloai->tl_ten }}</td>
                                <td>
                                    <button type="button" class="btn  btn-raised btn-warning waves-effect">Sửa</button>
                                    <button type="button" class="btn  btn-raised btn-danger waves-effect">Xóa</button>
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
