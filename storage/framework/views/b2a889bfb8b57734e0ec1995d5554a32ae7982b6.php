<?php $__env->startSection("content"); ?>
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Quản lý từ khoá</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
			<li><a href="<?php echo e(route("admin.keyword.index")); ?>"> Từ khóa</a></li>
			<li class="active">Danh sách </li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<div class="box-header">
					<h3 class="box-title"><a class="btn btn-primary" href="<?php echo e(route("admin.keyword.create")); ?>">Thêm mới <i
								class="fa fa-plus"></i></a></h3>
				</div>
				<div class="box-body">
					<div class="col-md-12">
						<table class="table">
							<tbody>
								<tr>
									<th style="width: 70px; text-align:center;">Thứ tự</th>
									<th>Tiêu đề</th>
									<th>Mô tả</th>
									<th>Hot</th>
									<th>Ngày tạo</th>
									<th>Hành động</th>
								</tr>
								<?php if(isset($keywords)): ?>
									<?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($keyword->id); ?></td>
											<td><?php echo e($keyword->k_name); ?></td>
											<td><?php echo e($keyword->k_description); ?></td>
											<td>
												<?php if($keyword->k_hot == 1): ?>
													<a class="label label-info" href="<?php echo e(route("admin.keyword.hot", $keyword->id)); ?>">Hot</a>
												<?php else: ?>
													<a class="label label-default" href="<?php echo e(route("admin.keyword.hot", $keyword->id)); ?>">Không có</a>
												<?php endif; ?>
											</td>
											<td><?php echo e($keyword->created_at); ?></td>
											<td>
												<div class="row">
													<div class="col-md-2">
														<a class="btn btn-xs"style="background-color: #3c8dbc;color: white;    margin: 5px 45px 5px 10px;"
															href="<?php echo e(route("admin.keyword.update", $keyword->id)); ?>"></i>Chỉnh sữa</a>
													</div>
													<div class="col-md-2">
														<a class="btn btn-xs js-delete-confirm" href="<?php echo e(route("admin.keyword.delete", $keyword->id)); ?>"
															style="background-color: #dd4b39;border-color: #d73925;margin:5px;color: white"><i
																class="fa fa-trash"></i>
															Xóa</a>
													</div>
												</div>

											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<?php echo $keywords->links(); ?>

				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->
	</section>
	<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app_master_admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\THE CIINDYS\THE CIINDYS\resources\views/admin/keyword/index.blade.php ENDPATH**/ ?>