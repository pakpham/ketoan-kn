@extends('admin.index')
@section('content')

        <div class="content pb-0">

            <!-- Widgets  -->
          	@include('admin.home.widgets')

            <!-- Widgets End -->


            <!--  Traffic  -->
            @include('admin.home.thongke')
            <!--  Traffic  End -->


            @include('admin.home.counter')


            @include('admin.home.tienno')
            <!-- To Do and Live Chat --> 
            {{-- <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title box-title">To Do List</h4>
                            <div class="card-content">
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i class="check-box"></i><span>Conveniently fabricate interactive technology for ....</span> 
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-check"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i class="check-box"></i><span>Creating component page</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-check"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i class="check-box"></i><span>Follow back those who follow you</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-check"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i class="check-box"></i><span>Design One page theme</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-check"></a>
                                                    </label>
                                                </li>

                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i class="check-box"></i><span>Creating component page</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-check"></a>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div> 
                                    </div>
                                </div> <!-- /.todo-list -->
                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title box-title">Live Chat</h4>
                            <div class="card-content">
                                <div class="messenger-box">
                                    <ul>
                                        <li>
                                            <div class="msg-received msg-container">
                                                <div class="avatar">
                                                   <img src="images/avatar/64-1.jpg" alt="">
                                                   <div class="send-time">11.11 am</div>
                                                </div> 
                                                <div class="msg-box">
                                                    <div class="inner-box">
                                                        <div class="name">
                                                            John Doe
                                                        </div>
                                                        <div class="meg">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis sunt placeat velit ad reiciendis ipsam   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.msg-received -->
                                        </li>
                                        <li> 
                                            <div class="msg-sent msg-container">
                                                <div class="avatar">
                                                   <img src="images/avatar/64-2.jpg" alt="">
                                                   <div class="send-time">11.11 am</div>
                                                </div> 
                                                <div class="msg-box">
                                                    <div class="inner-box">
                                                        <div class="name">
                                                            John Doe
                                                        </div>
                                                        <div class="meg">
                                                            Hay how are you doing?  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.msg-sent -->
                                        </li>
                                    </ul>
                                    <div class="send-mgs">
                                        <div class="yourmsg">
                                            <input class="form-control" type="text">
                                        </div>
                                        <button class="btn msg-send-btn">
                                            <i class="pe-7f-paper-plane"></i>
                                        </button>
                                    </div>
                                </div><!-- /.messenger-box -->
                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>

            </div>  --}}
            <!-- To Do and Live Chat End --> 





            <!-- Calender Chart Weather  -->
           {{--  <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">  
                            <!-- <h4 class="box-title">Chandler</h4> -->
                            <div class="calender-cont widget-calender">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card ov-h">
                        <div class="card-body bg-flat-color-2"> 
                            <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                        </div>
                        <div id="cellPaiChart" class="float-chart"></div> 
                    </div><!-- /.card -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card weather-box">
                        <h4 class="weather-title box-title"></h4>
                        <div class="card-body">  
                            <div class="weather-widget">
                                <div id="weather-one" class="weather-one"></div>
                            </div> 
                        </div>
                    </div><!-- /.card -->
                </div>
            </div><!-- /.row --> --}}
            <!-- Calender Chart Weather  End -->







            <div class="modal fade none-border" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add New Event</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Add Category -->
            <div class="modal fade none-border" id="add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add a category </strong></h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Category Name</label>
                                        <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose Category Color</label>
                                        <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                            <option value="success">Success</option>
                                            <option value="danger">Danger</option>
                                            <option value="info">Info</option>
                                            <option value="pink">Pink</option>
                                            <option value="primary">Primary</option>
                                            <option value="warning">Warning</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->
        </div> <!-- .content -->


@endsection

@section('script')

<script>

   
    jQuery(document).ready(function($) {
        "use strict"; 

            // Pie chart flotPie1 
            var piedata = [
            { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
            { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
            { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: { 
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });

            // Pie chart flotPie1  End


            var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'} 
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: { 
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });



            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });

             // Line Chart  #flotLine5 End




            


            



            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End

        });  // End of Document Ready 

	
</script>

@endsection

