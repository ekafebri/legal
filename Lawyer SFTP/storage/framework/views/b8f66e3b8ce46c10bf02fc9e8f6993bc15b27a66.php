<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bursa Hukum</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/animate.css" />

  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/magnific-popup.css" />

  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/aos.css" />

  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/ionicons.min.css" />

  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/jquery.timepicker.css" />

  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/flaticon.css" />
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/icomoon.css" />
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/style.css" />
  
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/frontend')); ?>/css/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php echo $__env->yieldContent('css'); ?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<?php echo $__env->make('frontend-client.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldContent('modal'); ?>
<?php echo $__env->yieldContent('js'); ?>

<?php echo $__env->make('frontend-client.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/popper.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.stellar.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/aos.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/jquery.timepicker.min.js"></script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/google-map.js"></script>

<script src="<?php echo e(url('public/plugins/frontend')); ?>/js/main.js"></script>
</body>
</html><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/frontend-client/layouts/app.blade.php ENDPATH**/ ?>