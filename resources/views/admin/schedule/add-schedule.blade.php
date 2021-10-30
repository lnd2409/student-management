@extends('admin.template.master')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Tạo thời khóa biểu</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Thời khóa biểu</a></li>
                    <li class="breadcrumb-item active">Thêm thời khóa biểu</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <form action="{{ route('admin.handle.schedule.add') }}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Ngày bắt đầu</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="day" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Chọn môn học</button>
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
