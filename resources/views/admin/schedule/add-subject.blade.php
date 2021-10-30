@extends('admin.template.master')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Thêm môn học từ ngày {{ $schedule->tkb_ngaybatdau->format('d-m-Y') }} đến {{ $schedule->tkb_ngayketthuc->format('d-m-Y') }}</h2>
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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tiết</th>
                                    @for ($i = 0; $i < 5; $i++)
                                        <th>{{ Carbon\Carbon::parse($schedule->tkb_ngaybatdau)->addDays($i)->format('d-m-Y') }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        {{-- <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#smallModal">MODAL - SMALL SIZE</button> --}}
                                        <form action="">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12">
                                                    <form action="{{ route('routeName', ['id'=>1]) }}">
                                                        <select class="form-control show-tick" data-live-search="true">
                                                            @foreach ($subject as $item)
                                                                <option value="{{ $item->mh_id }}">{{ $item->mh_ten }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Cập nhật</button>
                                        </form>

                                        {{-- Môn tiết 1 ngày {{ Carbon\Carbon::parse($schedule->tkb_ngaybatdau)->addDays(0)->format('d-m-Y') }} --}}
                                    </td>
                                    <td>
                                        Môn tiết 1 ngày {{ Carbon\Carbon::parse($schedule->tkb_ngaybatdau)->addDays(1)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        Môn tiết 1 ngày {{ Carbon\Carbon::parse($schedule->tkb_ngaybatdau)->addDays(2)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        Môn tiết 1 ngày {{ Carbon\Carbon::parse($schedule->tkb_ngaybatdau)->addDays(3)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        Môn tiết 1 ngày {{ Carbon\Carbon::parse($schedule->tkb_ngaybatdau)->addDays(4)->format('d-m-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Size -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Modal title</h4>
                </div>
                <div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                    vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                    Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                    nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                    Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc. </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
@endsection
