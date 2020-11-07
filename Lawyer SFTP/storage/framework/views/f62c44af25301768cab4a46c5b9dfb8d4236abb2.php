
<?php $__env->startSection('title'); ?>
Tertulis
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Tertulis</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Tertulis</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalTertulis">
        Tambah Tertulis
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Client ID</th>
            <th>Konsultasi ID</th>
            <th>Lawyer ID</th>
            <th>Option</th>
            <th>Status</th>
            <th>Alasan Tolak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>No</th>
            <th>Client ID</th>
            <th>Konsultasi ID</th>
            <th>Lawyer ID</th>
            <th>Option</th>
            <th>Status</th>
            <th>Alasan Tolak</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          <?php $__currentLoopData = $tertulis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $no++ ;?>
          <tr>
          <td><?php echo e($no); ?></td>
            <td><?php echo e($m->client_id); ?></td>
            <td><?php echo e($m->konsultasi_id); ?></td>
            <td><?php echo e($m->lawyer_id); ?></td>
            <td><?php echo e($m->option); ?></td>
            <td>
            <?php if($m->status == true): ?>
            Aktif
            <?php else: ?>
            Tidak Aktif
            <?php endif; ?>
            </td>
            <td><?php echo e($m->alasan_tolak); ?></td>
            
            <td>
                <a class="activation btn btn-warning" data-value="<?php echo e($m->status); ?>" id="<?php echo e($m->id); ?>" name="kategori/status/">Test</a>
                <a href="#" name="tertulis" style="color:white" class="btn btn-info editTertulis" id="<?php echo e($m->id); ?>" data-toggle="modal" data-target="#modalTertulisEdit">Edit</a>
                <a href="#" name="tertulis" class="delete btn btn-danger" style="color:white" id="<?php echo e($m->id); ?>" >Hapus</a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<!-- Modal Pertanyaan-->
<div class="modal fade" id="modalTertulis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tertulis</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(url('tertulis')); ?>" method="post" enctype="multipart/form-data" class='form'>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Client ID</label>
            <input type="text" class="form-control form-control-tertulis" name="client_id" id="client_id" placeholder="Client ID" required>
        </div>
        <div class="form-group">
            <label>Konsultasi ID</label>
            <input type="text" class="form-control form-control-tertulis" name="konsultasi_id" id="konsultasi_id" placeholder="Konsultasi ID" required>
        </div>
        <div class="form-group">
            <label>Lawyer ID</label>
            <input type="text" class="form-control form-control-tertulis" name="lawyer_id" id="lawyer_id" placeholder="Lawyer ID" required>
        </div>
        <div class="form-group">
            <label>Option</label>
            <input type="text" class="form-control form-control-tertulis" name="option" id="option" placeholder="Option" required>
        </div>
        <div class="form-group">
            <label>Alasan Tolak</label>
            <input type="text" class="form-control form-control-tertulis" name="alasan_tolak" id="alasan_tolak" placeholder="Alasan Tolak" >
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

<!-- Modal Pertanyaan Edit-->
<div class="modal fade" id="modalTertulisEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(url('tertulis')); ?>" method="post" enctype="multipart/form-data" class='form-tertulis'>
        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Client ID</label>
            <input type="text" class="form-control form-control-tertulis" name="client_id" id="client_id" placeholder="Client ID" required>
        </div>
        <div class="form-group">
            <label>Konsultasi ID</label>
            <input type="text" class="form-control form-control-tertulis" name="konsultasi_id" id="konsultasi_id" placeholder="Konsultasi ID" required>
        </div>
        <div class="form-group">
            <label>Lawyer ID</label>
            <input type="text" class="form-control form-control-tertulis" name="lawyer_id" id="lawyer_id" placeholder="Lawyer ID" required>
        </div>
        <div class="form-group">
            <label>Option</label>
            <input type="text" class="form-control form-control-tertulis" name="option" id="option" placeholder="Option" required>
        </div>
        <div class="form-group">
            <label>Alasan Tolak</label>
            <input type="text" class="form-control form-control-tertulis" name="alasan_tolak" id="alasan_tolak" placeholder="Alasan Tolak" >
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
  // $('.editPertanyaan').on('click', function(){
    $('table tbody').on( 'click', '.editTertulis', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "<?php echo e(url('tertulis')); ?>/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/tertulis/" + id + "/edit",
            success:function(data){
              $('.form-tertulis').attr( 'action', url)
              $('.form-tertulis #client_id').val(data.client_id)
              $('.form-tertulis #konsultasi_id').val(data.konsultasi_id)
              $('.form-tertulis #lawyer_id').val(data.lawyer_id)
              $('.form-tertulis #option').val(data.option)
              $('.form-tertulis #status').val(data.status)
              $('.form-tertulis #alasan_tolak').val(data.alasan_tolak);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

<script>
    $('table tbody').on( 'click', '.statusaktif',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        console.log(method);
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Status akan di Non-Aktifkan?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Non-Aktifkan!',
        focusCancel: true,
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url:"http://idaman.org/lawyer/user/" + id,
            data:{_method:'GET'},
            success:function(data){
        console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Status Berhasil Di ubah",
                type:"success",
                showConfirmButton:false,
                timer: 5000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
  
  <script>
    $('table tbody').on( 'click', '.statusnon',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        console.log(method);
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Status akan di Aktifkan?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Aktifkan!',
        focusCancel: true,
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url:"http://idaman.org/lawyer/user/" + id,
            data:{_method:'GET'},
            success:function(data){
        console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Status Berhasil Di ubah",
                type:"success",
                showConfirmButton:false,
                timer: 5000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/tertulis/index.blade.php ENDPATH**/ ?>