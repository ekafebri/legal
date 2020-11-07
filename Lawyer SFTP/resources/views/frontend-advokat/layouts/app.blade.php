<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bursa Legal</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/animate.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/magnific-popup.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/aos.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/ionicons.min.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/jquery.timepicker.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/flaticon.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/icomoon.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/style.css" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/dropzone.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  @yield('css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  @include('frontend-advokat.layouts.navbar')

  @yield('content')
  @include('frontend-advokat.layouts.modal')
  @yield('modal')
  @yield('js')

  @include('frontend-advokat.layouts.footer')
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/popper.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/bootstrap.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.stellar.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/owl.carousel.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/aos.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/jquery.timepicker.min.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
       <script src="{{url('public/plugins/fronted-advokat')}}/js/dropzone.js"></script>
  <script src="{{url('public/plugins/fronted-advokat')}}/js/google-map.js"></script>
<script src="{{url('public/plugins/fronted-advokat')}}/js/main.js"></script>
</body>

</html>