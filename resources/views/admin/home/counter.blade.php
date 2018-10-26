<div class="clearfix"></div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-8"> 
                        <div class="card">
                            <div class="card text-white bg-primary mb-3" >
                            <div class="card-body">
                                <h4 class="box-title">LƯỢNG SẢN PHẨM CÒN TẠI KHO </h4>
                            </div>
                        </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
    
                                                <th>ID</th>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn vị</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($san_pham as $value)
                                            <tr class=" pb-0">
                                                <td>#{{$value->id}}</td>
                                                <td>  <span style="font-weight: bold; class="name">{{$value->ten}}</span> </td> 
                                                <td>
                                                    @if($value->ton_kho<1)
                                                    <span style="color: red" class="count">{{$value->ton_kho}}</span>
                                                    @else
                                                    <span style="color: green" class="count">{{$value->ton_kho}}</span>
                                                    @endif
                                                </td>
                                                <td><span class="name">{{$value->donvi->ten}}</span></td>
                                                <td> 
                                                    <span class="badge badge-complete">Complete</span>
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
                    <div class="col-xl-4"> 
                        <div class="card">
                            <div class="card text-white bg-danger mb-3" >
                                <div class="card-body">
                                    <h4 class="box-title">HÀNG HỎNG TUẦN QUA </h4>
                                </div>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
    
                                                <th>ID</th>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn vị</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($hang_hong as $value)
                                            <tr class=" pb-0">
                                                <td>#{{$value->id}}</td>
                                                <td>  <span style="font-weight: bold;" class="name">{{$value->ten}}</span> </td> 
                                                <td>
                                                 @if($value->so_luong_hong<5)
                                                 <span style="color: green" class="count">{{$value->so_luong_hong}}</span>
                                                 @else
                                                 <span style="color: red" class="count">{{$value->so_luong_hong}}</span>
                                                 @endif
                                                </td>
                                                <td><span class="name">{{$value->donvi->ten}}</span></td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>


                    {{-- <div class="col-xl-4">
                        <div class="row"> 
                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0"> 
                                    <div class="card-body">
                                        <div class="chart-container ov-h">
                                            <div id="flotPie1" class="float-chart"></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-12">
                                <div class="card bg-flat-color-3  ">
                                    <div class="card-body">
                                        <h4 class="card-title m-0  white-color ">August 2018</h4>
                                    </div>
                                     <div class="card-body">
                                         <div id="flotLine5" class="flot-line"></div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}


                </div> 
            </div> <!-- /.order -->