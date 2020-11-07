
<!DOCTYPE html>
<html lang="en">
<!-- Start Header -->

<head>
  <title>Bursa Advokat</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <style>
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      content: "";
      opacity: 0.9;
      background: #fff;
      width: 100%;
      height: 100%;
    }

    .card {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>
<!-- End Header -->

<body style="background-image: url('public/plugins/frontend/images/bg-5.png')" class="hero-wrap js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="mx-auto">
      <div class="card shadow p-0 mb-5 bg-white rounded my-auto mx-auto p-2" style="border-radius: 10%;">
        <div class="card-body">
          <h3 class="text-center mb-2"><b> LOGIN </b></h3>
          <h5 class="mb-0"><b>Masukan Email dan Password Anda</b></h5>
          <p><small>Masukan email dan password anda untuk masuk ke aplikasi Bursa Hukum Berbasis Website</small> </p>
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
            <?php endif; ?>
          <form action="<?php echo e(url('advokat/login')); ?>" method="post">
          <?php echo csrf_field(); ?>
            <div class="form-group">
                <input type="email" class="form-control form-control-sm" id="" name="email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-sm" id="" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block" role="button">MASUK</button>
          </form>
          <h6 class="text-center mt-2" style="color: black;">Belum Punya Akun?<a href="register.html"> Daftar</a> </h6>
          <h6 class="text-center mt-2" style="color: black;"><a href="register.html">Lupa Password ?</a> </h6>
        </div>
      </div>
    </div>
  </div>
  </div>
  
</body>
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

</html><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/frontend-advokat/login.blade.php ENDPATH**/ ?>