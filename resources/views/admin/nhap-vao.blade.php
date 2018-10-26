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
                <a id="result">{!!$result!!}</a>
                @endif
            </div>
            <br>

            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>NHẬP MỚI</strong> <small> Thêm vào danh sách</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('add-nhap-vao')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label class=" form-control-label">Tên Sản Phẩm</label>
                                        <select id="ten-san-pham" class="form-control" name="id_san_pham">
                                            <option>...</option>
                                            @foreach($san_pham as $value)
                                            <option value="{{$value->id}}">{{$value->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class=" form-control-label">Giá nhập vào <b style="color:  green">(<b id="dv-gia"></b>)</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="gia-nhap-vao" name="gia_nhap_vao">
                                            <div class="input-group-append">
                                                <span class="input-group-text">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class=" form-control-label">Số lượng <b style="color: green" >(<b id="dv-sl"></b>)</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="so-luong" name="so_luong">
                                            <div class="input-group-append">
                                                <span class="input-group-text">VNĐ</span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <div class="form-group">
                                        <label class=" form-control-label  ">Thành tiền</label>
                                        <input type="number" class="form-control " aria-label="Amount (to the nearest dollar)" id="thanh-tien" name="thanh_tien" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Thanh toán</legend>
                                            <div class="col-sm-10" id="thanh-toan-radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="thanh_toan" id="gridRadios1" value="1" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Thanh toán hoàn tất
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="thanh_toan" id="gridRadios2" value="0">
                                                      <label class="form-check-label" for="gridRadios2">
                                                        Thanh toán chưa hoàn tất
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset> 
                               </div>
                                <div class="col-xs-12 col-sm-4 form-thanh-toan">
                                        <div class="form-group">
                                            <label class=" form-control-label">Tiền trả trước</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="tra-truoc" name="tra_truoc" value="0">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 form-thanh-toan">
                                        <div class="form-group">
                                            <label class=" form-control-label">Tiền còn nợ</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="tien-no" name="tien_no" disabled>
                                                <div class="input-group-append" >
                                                    <span class="input-group-text">VNĐ</span>
                                                </div>
                                            </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">DANH SÁCH NHẬP HÀNG</strong>
                        <small></small>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered header-fixed" >
                            <thead>
                                <tr style="color: blue; font-weight: bold;">
                                    <th>Mã số</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá nhập vào</th>
                                    <th>Số lượng</th>
                                    <th>Thanh tóan</th>
                                    <th>Tiền nợ</th>
                                    <th>Ghi Chú</th>
                                    <th>Chinh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nhap_vao as $value)
                                <tr>
                                    <td>NV/{{$value->id}}</td>
                                    <td>{{$value->ten}}</td>
                                    <td>{{$value->gia}}</td>
                                    <td>
                                        @if($value->so_luong)
                                        {{$value->so_luong}}
                                        @else
                                        <div style="color: red">{{$value->so_luong}}</div>
                                        @endif
                                    </td>
                                    <td>{{$value->tra_truoc}}</td>
                                    <td>
                                        @if(!$value->thanh_toan)
                                        <div style="color: red">
                                            {{($value->so_luong*$value->gia) - $value->tra_truoc}}
                                        </div>
                                        
                                        @else 
                                        <div style="color: green">Hoàn tất</div>
                                        @endif
                                    </td>
                                    <td>{{$value->ghi_chu}}</td>

                                    <td style="text-align: center;">
                                        <div class="row">
                                          <div class="col-sm-6 col-xs-6">
                                            <button id="{{$value->id}}" type="button" class="btn btn-primary btn-edit"   data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" value="{{$value}}" >Sửa</button>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <button id="del-{{$value->id}}" value="{{$value}}" class="btn btn-danger btn-del" data-toggle="modal" data-target="#delNhapVao" type="button">
                                                  Xóa
                                              </button>
                                            </div>  
                                        </div>    
                                    </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
</div><!-- .content -->
 
@include('admin.edit-nv')
@include('admin.del-nv')

@endsection


@section('script')
 <script type="text/javascript">
    var thanh_tien = 0;         // TIEN CAN THANH TOAN
    var tt_thanh_toan = 10;         // TRANG THAI THANH TOAN:  HOAN_TAT(1) ; CHUA_HOAN_TAT(0)
    var gia_nhap_vao = 0;       
    var so_luong = 0;           
    var tra_truoc = 0          
    var tien_no = thanh_tien;

    function tinhtoan(){
        thanh_tien = so_luong * gia_nhap_vao;

        // Thanh toan hoan tat
        if (tt_thanh_toan == 1){      
            tra_truoc = thanh_tien;
            tien_no = 0;
            // Thanh toan chua hoan tat
        } else {
            tien_no = thanh_tien - tra_truoc;
        }
    }

    $(document).ready(function(){
        // INIT
        $('#tra-truoc').val(tra_truoc);
        $('#tien-no').val(tien_no);
        
        var thanh_toan = $("input[name='thanh_toan']:checked").val();
        if (thanh_toan == 1) {
            $('.form-thanh-toan').hide();
            tt_thanh_toan = 1;
        } else {
           $('.form-thanh-toan').show();
           tt_thanh_toan = 0;
       }
        ///////////////////////////////////////
        $('#gia-nhap-vao').change(function(){
            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh-tien');
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });
        $('#so-luong').change(function(){
            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh-tien');
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });


        $('#thanh-toan-radio input').on('change', function() {
            thanh_toan = $("input[name='thanh_toan']:checked").val();

            // THANH TOAN CHUA HOAN TAT
            if (thanh_toan == 0){
                tra_truoc = 0;
                tien_no = thanh_tien;
                tt_thanh_toan = 0;
                $('.form-thanh-toan').show();
                
                gia_nhap_vao = $('#gia-nhap-vao').val() 
                so_luong = $('#so-luong').val();
                tinhtoan();
                $('#thanh-tien').val(thanh_tien);
                $('#tra-truoc').val(tra_truoc);
                $('#tien-no').val(tien_no);
            }
            // THANH TOAN HOAN TAT
            else{
                tt_thanh_toan = 1;
                $('.form-thanh-toan').hide();

                gia_nhap_vao = $('#gia-nhap-vao').val() 
                so_luong = $('#so-luong').val();
                tra_truoc = $('#tra-truoc').val();
                tinhtoan();
                $('#thanh-tien').val(thanh_tien);
                $('#tra-truoc').val(tra_truoc);
                $('#tien-no').val(tien_no);
            } 
            
        });

        $('#tra-truoc').change(function(){
            gia_nhap_vao = $('#gia-nhap-vao').val() 
            so_luong = $('#so-luong').val();
            tra_truoc = $('#tra-truoc').val();
            thanh_tien = $('#thanh_tien').val();
            tinhtoan();
            $('#thanh-tien').val(thanh_tien);
            $('#tra-truoc').val(tra_truoc);
            $('#tien-no').val(tien_no);
        });    

        // THAY DOI GIA THEO TEN
        $('#ten-san-pham').change(function(){
            var id_san_pham = $(this).val();
            $.ajax({
                url: "{{route('get-gia-nhap-vao')}}", 
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_san_pham': id_san_pham
                },
                success: function(result){
                    //result = JSON.prase(result);
                    //console.log(result);
                    $('#gia-nhap-vao').val(result.gia);
                    $('#dv-gia').html('Giá/1'+result.don_vi);
                    $('#dv-sl').html(result.don_vi);
                    gia_nhap_vao = $('#gia-nhap-vao').val() 
                    so_luong = $('#so-luong').val();
                    tra_truoc = $('#tra-truoc').val();
                    thanh_tien = $('#thanh_tien').val();
                    tinhtoan();
                    $('#thanh-tien').val(thanh_tien);
                    $('#tra-truoc').val(tra_truoc);
                    $('#tien-no').val(tien_no);
                    $('#so-luong').val(0);
                }
            });

        });
    })

    function deleteNV(data){
        $(document).ready(function(){
            $.ajax({
                url: "{{route('del-nhap-vao')}}", 
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': data
                },
                success: function(result){

                }
            });
        
        });
    }
 </script>
@endsection

