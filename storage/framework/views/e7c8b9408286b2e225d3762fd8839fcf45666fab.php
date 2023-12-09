<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới từ khoá</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.keyword.index')); ?>"> Từ khóa</a></li>
            <li class="active"> Tạo</a></li>
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
                            <div class="form-group <?php echo e($errors->first('k_name') ? 'has-error' : ''); ?>">
                                <label for="name">Tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="k_name"  placeholder="Tên...">
                                <?php if($errors->first('k_name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('k_name')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <label for="name">Mô tả </label>
                            <textarea class="form-control" name="k_description" placeholder="Mô tả..."></textarea>
                            <?php if($errors->first('k_description')): ?>
                                <span class="text-danger"><?php echo e($errors->first('k_description')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="<?php echo e(route('admin.keyword.index')); ?>" class="btn btn-danger">
                                 Đóng <i class="fa fa-close"></i></a>
                                <button type="submit" class="btn btn-success">Lưu <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\THE CIINDYS\THE CIINDYS\resources\views/admin/keyword/create.blade.php ENDPATH**/ ?>