<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.article.index')); ?>"> Bài Viết</a></li>
            <li class="active"> Tạo</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <?php echo $__env->make('admin.article.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\THE CIINDYS\resources\views/admin/article/create.blade.php ENDPATH**/ ?>