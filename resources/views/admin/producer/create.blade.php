@extends("layouts.app_master_admin")
@section("content")
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Thêm mới nhà cung cấp</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
			<li><a href="{{ route("admin.producer.index") }}"> Nhà cung cấp</a></li>
			<li class="active"> Tạo</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<div class="box-body">
					<form role="form" action="" method="POST">
						@csrf
						<div class="form-group {{ $errors->first("pdr_name") ? "has-error" : "" }}">
							<label for="pdr_name">Tên <span class="text-danger">(*)</span></label>
							<input class="form-control" name="pdr_name" type="text" value="{{ old("pdr_name") }}" placeholder="Tên...">
							@if ($errors->first("pdr_name"))
								<span class="text-danger">{{ $errors->first("pdr_name") }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->first("pdr_email") ? "has-error" : "" }}">
							<label for="pdr_email">Email <span class="text-danger">(*)</span></label>
							<input class="form-control" name="pdr_email" type="text" value="{{ old("pdr_email") }}"
								placeholder="Email ...">
							@if ($errors->first("pdr_email"))
								<span class="text-danger">{{ $errors->first("pdr_email") }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->first("pdr_phone") ? "has-error" : "" }}">
							<label for="pdr_phone">Số diện thoại<span class="text-danger">(*)</span></label>
							<input class="form-control" name="pdr_phone" type="text" value="{{ old("pdr_phone") }}"
								placeholder="Số điện thoại...">
							@if ($errors->first("pdr_phone"))
								<span class="text-danger">{{ $errors->first("pdr_phone") }}</span>
							@endif
						</div>

						<div class="col-sm-12">
							<div class="box-footer text-center" style="margin-top: 20px;">
								<a class="btn btn-danger" href="{{ route("admin.producer.index") }}">
									Đóng <i class="fa fa-close"></i></a>
								<button class="btn btn-success" type="submit">Lưu <i class="fa fa-save"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- /.box -->
	</section>
	<!-- /.content -->
@stop
