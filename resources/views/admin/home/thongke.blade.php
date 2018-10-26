<div class="row">
    <div class="col-lg-12">
        <div class="card">  
            {{-- ========HEADER============== --}}
            <div class="card-header bg-flat-color-5">
                    <div class="row">
                        <div class="col-lg-2">
                            <h3 class="box-title text-white"><b>THỐNG KÊ</b></h3>
                        </div>
                        <div class="col-lg-2">
                            <input  class="form-control" id="datepicker-from" width="150" placeholder="Từ ngày"/>
                        </div>
                        <div class="col-lg-2">
                            <input class="form-control" id="datepicker-to" width="150" placeholder="Đến ngày"/>
                        </div>
                        <div class="col-lg-3">
                            <button id="btn-xuat-du-lieu" class="btn btn-success">Xuất dữ liệu</button>
                        </div>
                    </div>    
            </div>
            {{-- ========HEADER============== --}}

            <div class="card-body">
                <div class="row">
                    <div class=" col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-1">
                                                <i class="pe-7f-cash"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count" id="tong-thu">0 </span> Đ</div>
                                                    <div class="stat-heading">Tổng thu</div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-2">
                                                <i class="pe-7f-cash"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count" id="tong-chi">0 </span> Đ</div>
                                                    <div class="stat-heading">Tổng chi</div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-3">
                                                <i class="pe-7f-cash"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span id="loi-nhuan" class="count">0 </span> Đ</div>
                                                    <div class="stat-heading">Lợi nhuận</div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" >
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-4">
                                                <i class="pe-7f-cash"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span id="thiet-hai" class="count">0 </span> Đ</div>
                                                    <div class="stat-heading">Thiệt hại (hàng hỏng)</div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-3">
                                                <i class="pe-7f-browser"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib"> 
                                                    <div class="stat-text"><span class="count" id="no-thu"></span> Đ</div>
                                                    <div class="stat-heading">Nợ cần thu</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                              
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-4">
                                                <i class="pe-7f-browser"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib"> 
                                                    <div class="stat-text"><span class="count" id="no-tra"></span> Đ</div>
                                                    <div class="stat-heading">Nợ cần trả</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card ov-h">
                            <div class="card-header bg-flat-color-2"> 
                                <div id="flotBarChart" class="float-chart ml-4 mr-4">
                                    <h5><b>Sản phẩm bán chạy</b></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr style="color: green">
                                                <th>#</th>
                                                <th>Sản Phẩm</th>
                                                <th>Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody id=max>

                                        </tbody>
                                    </table> 
                                </div>

                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div><!-- /# column -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#datepicker-to').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('#datepicker-from').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('#datepicker').change(function(){
            var date = $('#datepicker').val();
            console.log(date);
        });

        $('#btn-xuat-du-lieu').click(function(){
            var date_from = $('#datepicker-from').val();
            var date_to   = $('#datepicker-to').val();
            if (date_to.length < 9||date_from.length < 9 ){
                alert("Bạn chưa nhập ngày thống kê");
            } else{
                    $.ajax({
                        url:"{{route('get-thong-ke')}}",
                        type: "POST",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'date_from':date_from,
                            'date_to':date_to
                        },
                        success: function(result){
                            //result = JSON.prase(result);
                            //console.log(result);
                                $('#tong-chi').html(result.tien_nhap);
                                $('#tong-thu').html(result.tien_xuat);
                                $('#loi-nhuan').html(result.loi_nhuan);
                                $('#thiet-hai').html(result.thiet_hai);
                                $('#no-tra').html(result.tien_no_nhap);
                                $('#no-thu').html(result.tien_no_xuat);

                                
                                var text = '';
                               
                                var count1 = 1;
                                //var len = result.max.length;
                                //console.log(len);
                                for (var i = 0; i <5; i++) {
                                    console.log(result.max[i].ten);
                                    text = text + "<tr><th>"+count1+"</th><th scope='row'>"+result.max[i].ten+"</th><th>"+result.max[i].so_luong+"</th></tr>";

                                    ++count1;
                                     
                                }
                                //console.log("So ten: " + result.max);
                                //console.log("So sl: " + result.max1_ten[0].ten);
                                

                                $('#max').html(text);
                                $('#max').load(); 
                               
                                //$("#max").load(location.href + " #max");

                                
                            }
                    });
            }
        });

    });
</script>