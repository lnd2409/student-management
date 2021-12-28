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
            <h2>Phúc khảo 
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
                        <th>Điểm giữa kỳ</th>
                        <th>Điểm cuối kỳ</th>
                        <th>Tên giáo viên</th>
                        <th>Email giáo viên</th>
                        <th>Phúc khảo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monhoc as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->mon_hoc->mh_ma}}</td>
                        <td>{{$item->mon_hoc->mh_ten}}</td>
                        <td>{{$item->mhsv_diem_1}}</td>
                        <td>{{$item->mhsv_diem_2}}</td>
                        <td>{{$item->mon_hoc->giao_vien->gv_ten??''}}</td>
                        <td>{{$item->mon_hoc->giao_vien->gv_email??''}}</td>
                        <!-- Button trigger modal -->
                        <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#exampleModal{{$item->mh_id}}">Phúc khảo</button></td>

                    </tr>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$item->mh_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Phúc khảo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('review.store',$item)}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="">
                                            <label for="my-input">Lý do phúc khảo</label>
                                            <input id="my-input" class="form-control" type="text" name="pk_noidung" value="{{$item->phuc_khao->pk_noidung??''}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Huỷ</button>
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
