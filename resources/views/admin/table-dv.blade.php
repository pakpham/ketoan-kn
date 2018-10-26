@extends ('admin.index')

@section('content')
<div class="content">
    <div class="animated fadeIn">

        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Masked Input</strong> <small> Small Text Mask</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('add-dv')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label class=" form-control-label">Đơn vị</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-cubes"></i></div>
                                            <input class="form-control" name="don_vi">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-3">
                                   
                                </div>
                            </div>                     
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>     
                        <div style="color: green">
                            @if(isset($result))
                            <div>{{$result}}</div>
                            @endif
                        </div>
                        
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
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Đơn vị</th>
                                    <th>Người tạo</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($don_vi as $value)
                                <tr>
                                    <td>{{$value->ten}}</td>
                                    <td>{{$value->user->name}}</td>
                                    <td>{{$value->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection