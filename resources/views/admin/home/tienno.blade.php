<div class="clearfix"></div>
<div class="orders">
    <div class="row">
        <div class="col-xl-6"> 
            <div class="card">
                <div class="card text-white bg-primary mb-3" >
                    <div class="card-body">
                        <h4 class="box-title">NỢ CẦN THU <small>Nợ xuất hàng</small></h4>
                    </div>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>

                                    <th>Mã Số</th>
                                    <th>Sản phẩm</th>
                                    <th>Thành tiền</th>
                                    <th>Còn nợ</th>
                                    <th>Thay đổi</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($no_xuat as $value)
                                <tr class=" pb-0">
                                    <td style="color: blue">XR/{{$value->id}}</td>
                                    <td>  <span style="font-weight: bold; class="name">{{$value->ten}}</span> </td> 
                                    <td>
                                        <span style="color: green">
                                            <?php
                                            $thanh_tien = $value->so_luong * $value->gia;
                                            echo $thanh_tien;
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="name" style="color: red">
                                            {{$thanh_tien - $value->tra_truoc}}
                                        </span>
                                    </td>
                                    <td> 
                                        <button id="XR-{{$value->id}}" value={{$value->id}} type="button" class="btn btn-danger xoa-no-xuat " data-toggle="modal" data-target="#xac-nhap-hoan-thanh">
                                          Thanh toán
                                      </button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-8 -->


        {{-- BẢNG SỐ LƯỢNG HÀNG HỎNG TRONG TUẦN --}}
        <div class="col-xl-6"> 
            <div class="card">
                <div class="card text-white bg-danger mb-3" >
                    <div class="card-body">
                        <h4 class="box-title">NỢ CẦN TRẢ <small>Nợ nhập hàng</small> </h4>
                    </div>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>

                                    <th>Mã Số</th>
                                    <th>Sản phẩm</th>
                                    <th>Thành tiền</th>
                                    <th>Còn nợ</th>
                                    <th>Ngày</th>
                                    <th>Thay đổi</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($no_nhap as $value)
                                <tr class=" pb-0" id="">
                                    <td style="color: blue">NV/{{$value->id}}</td>
                                    <td>  <span style="font-weight: bold; class="name">{{$value->ten}}</span> </td> 
                                    <td>
                                        <span style="color: green">
                                            <?php
                                            $thanh_tien = $value->so_luong * $value->gia;
                                            echo $thanh_tien;
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="name" style="color: red">
                                            {{$thanh_tien - $value->tra_truoc}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="date">
                                            <?php

                                            ?>
                                        </span>
                                    </td>
                                    <td> 
                                        <button id="NV-{{$value->id}}" value={{$value->id}} type="button" class="btn btn-danger xoa-no-nhap" data-toggle="modal" data-target="#xac-nhap-hoan-thanh">
                                          Thanh toán
                                        </button>
                                   </td>
                               </tr>
                               @endforeach

                           </tbody>

                       </table>
                   </div> <!-- /.table-stats -->
               </div>
           </div> <!-- /.card -->
       </div>

   </div> 
</div> <!-- /.order -->



<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="xac-nhap-hoan-thanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Xác nhận thanh toán đơn hàng</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <b>Mã số: <b id="del-content" style="color: green" ></b></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
        <button id="xac-nhan" type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var loai = '';
        $('.xoa-no-xuat').click(function(){
            var content = $(this).val();
            loai = 'no-xuat';
            $('#del-content').html(content);
            $('#xac-nhan').val(content);
        });

        $('.xoa-no-nhap').click(function(){
            var content = $(this).val();
            loai = 'no-nhap';
            $('#del-content').html(content);
            $('#xac-nhan').val(content);
        });

        $('#xac-nhan').click(function(){
            var content = $(this).val();
            console.log();
            $.ajax({
                url:"{{route('delete-no')}}",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': content,
                    'loai' : loai
                }, 
                success: function(result){
                    console.log(result);
                    if (result==1) {
                        id = '';
                        if(loai == "no-xuat"){
                          var id = '#XR-'+content;  
                        }
                        if(loai == "no-nhap"){
                          var id = '#NV-'+content;  
                        }
                        $(id).text("Đã hoàn tất");
                        $(id).attr("disabled", true);
                        $(id).removeClass("btn-danger");
                        $(id).addClass("btn-success");

                    }
                }  
            });
        });

    });
</script>