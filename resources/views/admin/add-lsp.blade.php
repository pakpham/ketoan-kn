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
						<form action="{{route('add-lsp')}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class=" form-control-label">Tên Loại Sản Phẩm</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
									<input class="form-control" name="ten">
								</div>
							</div>
							<div class="form-group">
								<label class=" form-control-label">Ghi Chú</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-edit"></i></div>
									<input class="form-control" name="ghi_chu">
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
</div><!-- .content -->

@endsection