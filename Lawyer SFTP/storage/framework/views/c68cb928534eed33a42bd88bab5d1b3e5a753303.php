
<?php $__env->startSection('title'); ?>
User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Detail User</h6>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span onclick="history.back(-1)">×</span>
        </button>
  </div>
    <div class="modal-body">
    <div class="form-group">
        <label>Email</label><br>
        <label class="form-control"><?php echo e($user->email); ?></label></div>
    <div class="form-group">
        <label>Telepon</label><br>
        <label class="form-control"><?php echo e($user->telp); ?></label></div>
    <div class="form-group">
        <label>Nama Lengkap</label><br>
        <label class="form-control"><?php echo e($user->nama_lengkap); ?></label></div>
    <div class="form-group">
        <label>Alamat</label><br>
        <label class="form-control"><?php echo e($user->alamat); ?></label></div>
    <div class="form-group">
        <label>Status</label><br>
        <label class="form-control">
        <div><?php if($user->status == '1'): ?>
                  Aktif
                  <?php else: ?>
                  Non Aktif
                  <?php endif; ?></div>
            </label></div>
    <div class="form-group">
        <label>Jenis Kelamin</label><br>
        <label class="form-control">
            <div><?php if($user->jenis_kelamin == 'PR'): ?>
                  Perempuan
                  <?php else: ?>
                  Laki-laki
                  <?php endif; ?></div>
            </label></div>
            
    <div class="form-group">
    <img src="<?php echo e(asset($user->avatar)); ?>" alt="Avatar" width="200px" class="img-thumbnail">
    </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/lawyer/show.blade.php ENDPATH**/ ?>