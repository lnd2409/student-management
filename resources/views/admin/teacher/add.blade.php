@extends('admin.template.master')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Thêm môn học</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Môn học</a></li>
                    <li class="breadcrumb-item active">Thêm môn học</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <form action="{{ route('admin.teacher.handle.add') }}" method="GET">
            {{-- @csrf --}}
            <input type="text" name="gv_id" value="{{ $giaoVien != null ? $giaoVien->gv_id : '' }}" hidden />
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Họ tên</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $giaoVien != null ? $giaoVien->gv_ten : '' }}" name="gv_ten" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Số điện thoại</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $giaoVien != null ? $giaoVien->gv_sdt : '' }}" name="gv_sdt" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @if ($giaoVien != null)
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Sửa</button>
                            @else
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Thêm</button>
                            @endif
                            <!-- #END# Select -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- @push('ajax.product')

    @endpush --}}
@endsection
