<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="colorlib.com">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet" />
  <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="css/dropzone.css">
  <!-- Main css -->
  <link rel="stylesheet" href="css/style-daftar.css">
  <link rel="stylesheet" href="css/style.css">
  @yield('css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  @include('frontend-advokat.layouts.navbar_putih')

  @yield('content')

  @yield('modal')
  @yield('js')

  @include('frontend-advokat.layouts.footer')
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="vendor/minimalist-picker/dobpicker.js"></script>
    <script src="vendor/jquery.pwstrength/jquery.pwstrength.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/daftar.js"></script>
    <script src="js/dropzone.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
</body>

</html>