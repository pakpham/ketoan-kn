<div class="row">
    <div class="col-lg-12">
        <div class="card">  
            <div class="card-body">
                <h4 class="box-title">Traffic </h4>
            </div>
            <div class="row"> 
                <div class="col-lg-8">
                    <div class="card-body"> 
                        <!-- <canvas id="TrafficChart"></canvas>   -->
                        <div id="traffic-chart" class="traffic-chart"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title">Tăng trưởng</h4>
                            <div class="por-txt">Lợi nhuận so tuần trước (25%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
        
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Định mức chi tiêu (tuần)</h4>
                            <div class="por-txt">6,5/10tr (65%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 65%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div> <!-- /.card-body -->
                </div>
            </div> <!-- /.row --> 
            <div class="card-body"></div>
        </div> 
    </div><!-- /# column -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).ready(function(){
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('#datepicker').change(function(){
            var date = $('#datepicker').val();
            console.log(date);
        });

        // Traffic Chart using chartist  [traffic-chart]
        if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [
                    [0, 18000, 35000,  25000,  22000,  100],
                    [0, 33000, 15000,  20000,  15000,  300]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                        showGrid: true
                    }
                });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
        }
        // Traffic Chart using chartist End

        //Traffic chart chart-js  [TrafficChart]
        // if ($('#TrafficChart').length) {
        //         var ctx = document.getElementById( "TrafficChart" );
        //         ctx.height = 150;
        //         var myChart = new Chart( ctx, {
        //             type: 'line',
        //             data: {
        //                 labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
        //                 datasets: [
        //                 {
        //                     label: "Visit",
        //                     borderColor: "rgba(4, 73, 203,.09)",
        //                     borderWidth: "1",
        //                     backgroundColor: "rgba(4, 73, 203,.5)",
        //                     data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
        //                 },
        //                 {
        //                     label: "Bounce",
        //                     borderColor: "rgba(245, 23, 66, 0.9)",
        //                     borderWidth: "1",
        //                     backgroundColor: "rgba(245, 23, 66,.5)",
        //                     pointHighlightStroke: "rgba(245, 23, 66,.5)",
        //                     data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
        //                 },
                        
        //                 {
        //                     label: "Targeted",
        //                     borderColor: "rgba(40, 169, 46, 0.9)",
        //                     borderWidth: "1",
        //                     backgroundColor: "rgba(40, 169, 46, .5)",
        //                     pointHighlightStroke: "rgba(40, 169, 46,.5)",
        //                     data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
        //                 } 
        //                 ]
        //             },
        //             options: {
        //                 responsive: true,
        //                 tooltips: {
        //                     mode: 'index',
        //                     intersect: false
        //                 },
        //                 hover: {
        //                     mode: 'nearest',
        //                     intersect: true
        //                 }

        //             }
        //         } );
        // }
        //Traffic chart chart-js  End 
    })
    });
</script>