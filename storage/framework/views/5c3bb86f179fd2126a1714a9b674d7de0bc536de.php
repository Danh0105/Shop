<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật nhà sản xuất</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.producer.index')); ?>">Nhà sản xuất</a></li>
            <li class="active">Cập nhật</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                         <?php echo csrf_field(); ?>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('pdr_name') ? 'has-error' : ''); ?>">
                                <label for="pdr_name">Tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('pdr_name', isset($producer->pdr_name) ? $producer->pdr_name : '')); ?>" name="pdr_name"  placeholder="Tên...">
                                <?php if($errors->first('pdr_name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('pdr_name')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php echo e($errors->first('pdr_email') ? 'has-error' : ''); ?>">
                                <label for="pdr_name">Email <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('pdr_email', isset($producer->pdr_email) ? $producer->pdr_email : '')); ?>" name="pdr_email"  placeholder="Email ...">
                                <?php if($errors->first('pdr_email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('pdr_email')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php echo e($errors->first('pdr_phone') ? 'has-error' : ''); ?>">
                                <label for="pdr_name">Số điện thoại<span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('pdr_phone', isset($producer->pdr_phone) ? $producer->pdr_phone : '')); ?>" name="pdr_phone"  placeholder="Số điện thoại...">
                                <?php if($errors->first('pdr_phone')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('pdr_email')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="<?php echo e(route('admin.producer.index')); ?>" class="btn btn-danger">
                                 Đóng <i class="fa fa-close"></i></a>
                                <button type="submit" class="btn btn-success">Cập nhật Nhà sản xuất <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\THE CIINDYS\THE CIINDYS\resources\views/admin/producer/update.blade.php ENDPATH**/ ?>