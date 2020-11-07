
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

  <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(url('public/plugins/sb-admin')); ?>/css/sb-admin-2.min.css" rel="stylesheet">
  <?php echo $__env->yieldContent('css'); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        
        </div>
        <!-- End of Main Content -->
        
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php echo $__env->make('layouts.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('modal'); ?>
 


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/js/demo/datatables-demo.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo e(url('public/plugins/sb-admin')); ?>/js/demo/chart-pie-demo.js"></script> -->
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  <script>
    $('table tbody').on( 'click', '.delete',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        console.log(method);
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus Data!',
        focusCancel: true,
        
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url:"<?php echo e(url('')); ?>/"+ method + '/' + id,
            data:{_method:'delete'},
            success:function(data){
        console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Data Berhasil Dihapus",
                type:"success",
                showConfirmButton:false,
                timer: 3000}),
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
    $('table tbody').on( 'click', '.activation',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        var value = $(this).data('value')
        if(value == 1){
          var message = 'Aktifkan?';
        }else{
          var message = 'Non-Aktifkan?';
        }
        console.log(method)
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Status akan di"+ message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: message,
        focusCancel: true,
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url: "<?php echo e(url('')); ?>/"+ method + id,
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
    $('.changePassword').on('click', function(){
      var id = $(this).data('id');
      console.log(id)
      var url = "<?php echo e(url('change')); ?>/"+id
      $('.form-changepassword').attr( 'action', url)
    })
  </script>

   <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/layouts/app.blade.php ENDPATH**/ ?>