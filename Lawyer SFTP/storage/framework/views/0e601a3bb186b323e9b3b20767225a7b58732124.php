
<?php $__env->startSection('title'); ?>
Pertanyaan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Pertanyaan</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Pertanyaan</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalPertanyaan">
        Tambah Pertanyaan
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Judul Pertanyaan</th>
            <th>Pertanyaan</th>
            <th>Budget</th>
            <th>Penjelasan</th>
            <th>Kategori Layanan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Judul Pertanyaan</th>
            <th>Pertanyaan</th>
            <th>Budget</th>
            <th>Penjelasan</th>
            <th>Kategori Layanan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          <?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $no++ ;?>
          <tr>
          <td><?php echo e($no); ?></td>
            <td><?php echo e($m->user_id); ?></td>
            <td><?php echo e($m->judul_pertanyaan); ?></td>
            <td><?php echo e($m->pertanyaan); ?></td>
            <td><?php echo e($m->budget); ?></td>
            <td><?php echo e($m->penjelasan); ?></td>
            <td><?php echo e($m->kategori_layanan); ?></td>
            <td>
            <?php if($m->status == true): ?>
            Aktif
            <?php else: ?>
            Tidak Aktif
            <?php endif; ?>
            </td>
            <td>
                <a class="activation btn btn-warning" data-value="<?php echo e($m->status); ?>" id="<?php echo e($m->id); ?>" name="kategori/status/">Test</a>
                <a href="#" name="pertanyaan" style="color:white" class="btn btn-info editPertanyaan" id="<?php echo e($m->id); ?>" data-toggle="modal" data-target="#modalPertanyaanEdit">Edit</a>
                <a href="#" name="pertanyaan" class="delete btn btn-danger" style="color:white" id="<?php echo e($m->id); ?>" >Hapus</a>
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
<div class="modal fade" id="modalPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(url('pertanyaan')); ?>" method="post" enctype="multipart/form-data" class='form'>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-pertanyaan" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Judul Pertanyaan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="judul_pertanyaan" id="judul_pertanyaan" placeholder="Judul Pertanyaan" required>
        </div>
        <div class="form-group">
            <label>Pertanyaan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan" required>
        </div>
        <div class="form-group">
            <label>Budget</label>
            <input type="text" class="form-control form-control-pertanyaan" name="budget" id="budget" placeholder="Budget" required>
        </div>
        <div class="form-group">
            <label>Penjelasan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="penjelasan" id="penjelasan" placeholder="Penjelasan" required>
        </div>
        <div class="form-group">
            <label>Kategori Layanan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="kategori_layanan" id="kategori_layanan" placeholder="Kategori Layanan" required>
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
<div class="modal fade" id="modalPertanyaanEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(url('pertanyaan')); ?>" method="post" enctype="multipart/form-data" class='form-pertanyaan'>
        <?php echo method_field('put'); ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-pertanyaan" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Judul Pertanyaan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="judul_pertanyaan" id="judul_pertanyaan" placeholder="Judul Pertanyaan" required>
        </div>
        <div class="form-group">
            <label>Pertanyaan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan" required>
        </div>
        <div class="form-group">
            <label>Budget</label>
            <input type="text" class="form-control form-control-pertanyaan" name="budget" id="budget" placeholder="Budget" required>
        </div>
        <div class="form-group">
            <label>Penjelasan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="penjelasan" id="penjelasan" placeholder="Penjelasan" required>
        </div>
        <div class="form-group">
            <label>Kategori Layanan</label>
            <input type="text" class="form-control form-control-pertanyaan" name="kategori_layanan" id="kategori_layanan" placeholder="Kategori Layanan" required>
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
    $('table tbody').on( 'click', '.editPertanyaan', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "<?php echo e(url('pertanyaan')); ?>/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/pertanyaan/" + id + "/edit",
            success:function(data){
              $('.form-pertanyaan').attr( 'action', url)
              $('.form-pertanyaan #user_id').val(data.user_id)
              $('.form-pertanyaan #judul_pertanyaan').val(data.judul_pertanyaan)
              $('.form-pertanyaan #pertanyaan').val(data.pertanyaan)
              $('.form-pertanyaan #budget').val(data.budget)
              $('.form-pertanyaan #penjelasan').val(data.penjelasan)
              $('.form-pertanyaan #status').val(data.status)
              $('.form-pertanyaan #kategori_layanan').val(data.kategori_layanan);
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/pertanyaan/index.blade.php ENDPATH**/ ?>