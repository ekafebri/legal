<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(session()->has('login')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-grin-alt"></i> Selamat datang <?php echo e(session()->get('login')); ?></h4>
	</div>
<?php endif; ?>
<?php if(session()->has('success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Berhasil!</h4>
		<?php echo e(session()->get('success')); ?>

	</div>
<?php endif; ?>
<?php if(session()->has('cancel')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Gagal!</h4>
		<?php echo e(session()->get('cancel')); ?>

	</div>
<?php endif; ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/layouts/alert.blade.php ENDPATH**/ ?>