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
        <form action="" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Tên môn</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tenMon" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Mã môn</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="maMon" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Giáo viên</h2>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <select class="form-control show-tick" data-live-search="true">
                                        <option value="">Chọn giáo viên</option>
                                        @foreach ($giaoVien as $item)
                                            <option value="{{ $item->gv_id }}">{{ $item->gv_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Thêm môn h</button>
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
