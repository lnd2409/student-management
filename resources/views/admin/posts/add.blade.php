@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thêm bài viết</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.list') }}">Bài viết</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Input -->
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Tên sản phẩm</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tenSanPham" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <h2 class="card-inside-title">Giá bán</h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="giaBan" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h2 class="card-inside-title">Số lượng</h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="soLuong" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Select -->
                        <h2 class="card-inside-title">Loại sản phẩm</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <select class="theLoai form-control show-tick " name="theLoai">
                                    <option value="">-- Chọn loại --</option>
                                    @foreach ($theLoai as $item)
                                    <option value="{{ $item->tl_id }}">{{ $item->tl_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Thuộc tính</h2>
                        <div class="row clearfix thuocTinh">
                            {{-- <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email_address_2" class="form-control" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                </div> --}}
                        </div>
                        <h2 class="card-inside-title">Nhà cung cấp</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">

                                <select class="form-control show-tick" name="nhaCungCap">
                                    <option value="">-- Chọn nhà cung cấp --</option>
                                    @foreach ($nhaCungCap as $item)
                                    <option value="{{ $item->ncc_id }}">{{ $item->ncc_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Mô tả</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="moTa" class="form-control no-resize"
                                            placeholder="Nhập mô tả sản phẩm..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Thêm sản
                            phẩm</button>
                        <!-- #END# Select -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('script')

@endpush
