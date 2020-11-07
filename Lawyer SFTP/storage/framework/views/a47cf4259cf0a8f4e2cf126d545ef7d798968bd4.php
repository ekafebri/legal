
<?php $__env->startSection('title'); ?>
Servis
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Servis</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Servis</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalService">
        Tambah Servis
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($m->nama); ?></td>
            <td><img src="<?php echo e(asset($m->gambar)); ?>" alt="Gambar" width="200px" class="img-thumbnail"></td>
            <td width="30%"><?php echo e($m->deskripsi); ?></td>
            <td><?php echo e(($m->status == true)?'Aktif':'Tidak Aktif'); ?></td>
            <td>
                <a href="#" name="service" style="color:white" class="btn btn-<?php echo e(($m->status == true)?'success':'danger'); ?>" id="<?php echo e($m->id); ?>"><?php echo e(($m->status == true)?'Aktif':'Tidak Aktif'); ?></a>
                <a href="#" name="service" style="color:white" class="btn btn-info editService" id="<?php echo e($m->id); ?>" data-toggle="modal" data-target="#modalServiceEdit">Edit</a>
                <!-- <a href="#" name="service" class="delete btn btn-danger" style="color:white" id="<?php echo e($m->id); ?>" >Hapus</a> -->
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
        <?php echo e($service->links()); ?>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<!-- Modal Service-->

<div class="modal fade" id="modalService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Servis</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(url('service')); ?>" method="post" enctype="multipart/form-data" class='form'>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Nama</label>
            <input type="nama" class="form-control form-control-service" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-service" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-service" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
</div>

<!-- Modal Service Edit-->
<div class="modal fade" id="modalServiceEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Servis</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(url('kategori')); ?>" method="post" enctype="multipart/form-data" class='form-service'>
        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Nama</label>
            <input type="nama" class="form-control form-control-service" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-service" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-service" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
  // $('.editService').on('click', function(){
    $('table tbody').on('click', '.editService', function(e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    // console.log(data);
    var url = "<?php echo e(url('service')); ?>/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/service/" + id + "/edit",
            success:function(data){
              $('.form-service').attr( 'action', url)
              $('.form-service #nama').val(data.nama)
              $('.form-service #deskripsi').val(data.deskripsi)
              $(".form-service .image").attr('src', "<?php echo e(asset('/')); ?>"+ data.gambar )
              $('.form-service #status').val(data.status);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/service/index.blade.php ENDPATH**/ ?>