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
        <form action="{{ route('admin.subject.store') }}" method="POST">
            @csrf
            <input type="text" name="mh_id" value="{{ $monHoc != null ? $monHoc->mh_id : '' }}" hidden />
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Tên môn</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $monHoc != null ? $monHoc->mh_ten : '' }}" name="mh_ten" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Mã môn</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $monHoc != null ? $monHoc->mh_ma : '' }}" name="mh_ma" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Năm học</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="nh_id" class="form-control show-tick" data-live-search="true" id="">
                                                @foreach ($namHoc as $item)
                                                    <option
                                                    @if ($monHoc != null && $monHoc->nh_id == $item->nh_id)
                                                        selected
                                                    @endif
                                                    value="{{ $item->nh_id }}">{{ $item->nh_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Học kỳ</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="hk_id" class="form-control show-tick" data-live-search="true" id="">
                                                @foreach ($hocKy as $item)
                                                    <option
                                                    @if ($monHoc != null && $monHoc->hk_id == $item->hk_id)
                                                        selected
                                                    @endif
                                                    value="{{ $item->hk_id }}">{{ $item->hk_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Giáo viên</h2>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <select class="form-control show-tick" name="gv_id" data-live-search="true">
                                        <option value="">Chọn giáo viên</option>
                                        @foreach ($giaoVien as $item)
                                            <option
                                            @if ($monHoc != null && $monHoc->gv_id == $item->gv_id)
                                                selected
                                            @endif
                                            value="{{ $item->gv_id }}">{{ $item->gv_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if ($monHoc != null)
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
