
<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- 404 Error Text -->
<div class="text-center">
  <div class="error mx-auto" data-text="500">500</div>
  <p class="lead text-gray-800 mb-5">Our Website is under construction</p>
  <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
  <a href="<?php echo e(route('home')); ?>">&larr; Back to Dashboard</a>
</div>

</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/under.blade.php ENDPATH**/ ?>