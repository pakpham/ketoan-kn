@extends ('admin.index')

@section('content')
<script type="text/javascript">
    $(document).ready(function(){
        $('#result').hide();
    });
</script>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div id="result" class="col-md-12 alert alert-primary" role="alert" style="color: green">
                @if(isset($result))
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#result').show();
                    });
                </script>
                <b>{{$result}}</b>
                @endif
            </div>
            <br>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">BẢNG SẢN PHẨM ĐANG CÓ</strong>
                        <small>Bảng giá nêm yết</small>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá nhập vào</th>
                                    <th>Giá xuất ra</th>
                                    <th>Đơn vị</th>
                                    <th>Người thêm</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($san_pham as $value)
                                <tr>
                                    <td>{{$value->ten}}</td>
                                    <td>{{$value->gia_nhap_vao}}</td>
                                    <td>{{$value->gia_xuat_ra}}</td>
                                    <td>{{$value->donvi->ten}}</td>
                                    <td>{{$value->user->name}}</td>
                                    <td style="text-align: center;"><button id="{{$value->id}}" type="button" class="btn btn-primary btn-edit"   data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" value="{{$value}}" >Sửa</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->


        <div class="animated fadeIn">

        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Masked Input</strong> <small> Small Text Mask</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('add-sp')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label class=" form-control-label">Tên Sản Phẩm</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-cubes"></i></div>
                                            <input class="form-control" name="ten">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class=" form-control-label">Giá nhập vào</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="gia_nhap_vao">
                                            <div class="input-group-append">
                                                <span class="input-group-text">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class=" form-control-label">Giá xuất ra</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="gia_xuat_ra">
                                            <div class="input-group-append">
                                                <span class="input-group-text">VNĐ</span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <div class="form-group">
                                        <label class=" form-control-label">Đơn vị</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="id_don_vi">
                                            <option selected></option>
                                            @foreach($don_vi as $value)
                                            <option value="{{$value->id}}">{{$value->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                   <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Ghi Chú</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ghi_chu"></textarea>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>     
                        
                        <div> <div style="color: red"><b>LƯU Ý</b></div>
                                <ul>
                                    <li>Các mục <b>"Tên Sản Phẩm"</b> và <b>"Đơn Vị"</b> chỉ có thể nhập một lần và không thể sửa đổi.</li>
                                    <li>Nếu có sai sót trong quá trình nhập sản phẩm, vui lòng liên hệ ngay đến quản trị viên để được chỉnh sửa.</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@include('admin.edit-sp')

@endsection


@section('script')

@endsection

