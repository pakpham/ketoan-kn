@extends('admin.index')
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
						<form action="{{route('add-sp')}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class=" form-control-label">Tên Sản Phẩm</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
									<input class="form-control" name="ten">
								</div>
							</div>
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
							<div class="form-group">
								<label class=" form-control-label">Loại sản phẩm</label>
								<select class="custom-select" id="inputGroupSelect01" name="id_loai_san_pham">
									<option selected>Choose...</option>
									@foreach($data as $value)
									<option value="{{$value->id}}">{{$value->ten}}</option>
									@endforeach
								</select>
							</div>						
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Thêm</button>
							</div>
						</form>		
						<div style="color: green">
							@if(isset($result))
							<div>Đã thêm thành công sản phẩm: {{$result}}</div>
							@endif
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('script')
<script type="text/javascript">
	
</script>
@endsection