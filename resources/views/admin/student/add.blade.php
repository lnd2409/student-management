@extends('admin.template.master')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>@if ($temp1 ==1)
                    Thêm
                @else 
                    Sửa
                @endif sinh viên</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Môn học</a></li>
                    <li class="breadcrumb-item active">Thêm sinh viên</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <form action="{{ route('admin.student.handle.add') }}" method="GET">
            {{-- @csrf --}}
            <input type="text" name="sv_id" value="{{ $sinhVien != null ? $sinhVien->sv_id : '' }}" hidden />
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Họ tên</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $sinhVien != null ? $sinhVien->sv_ten : '' }}" name="sv_ten" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Năm sinh</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $sinhVien != null ? $sinhVien->sv_namsinh : '' }}" name="sv_namsinh" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">

                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <h2 class="card-inside-title">Lớp học</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="l_id" class="form-control show-tick">
                                                @foreach ($lop as $item)
                                                    <option
                                                    @if ($sinhVien != null && $sinhVien->l_id == $item->l_id)
                                                        selected
                                                    @endif
                                                    value="{{ $item->l_id }}">{{ $item->l_ma }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($sinhVien != null)
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
