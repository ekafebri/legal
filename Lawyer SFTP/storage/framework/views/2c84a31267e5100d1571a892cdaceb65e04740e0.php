<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mypocketlawyer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/animate.css">

  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/magnific-popup.css">

  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/aos.css">

  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/jquery.timepicker.css">

  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/icomoon.css">
  <link rel="stylesheet" href="<?php echo e(url('public/assets')); ?>/css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php echo $__env->make('user.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('user.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('user.partials.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('user.partials.kategori', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('user.artikel.artikel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('user.kontak.kontak', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('user.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" /></svg></div>


  <!-- Modal -->

  <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAppointmentLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <label for="email" class="text-black">Email</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="password" class="text-black">Password</label>
              <input type="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" value="Login" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/popper.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.stellar.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/aos.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.animateNumber.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/jquery.timepicker.min.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="<?php echo e(url('public/assets')); ?>/js/google-map.js"></script>
    <script src="<?php echo e(url('public/assets')); ?>/js/main.js"></script>

</body>

</html><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/user/layout.blade.php ENDPATH**/ ?>