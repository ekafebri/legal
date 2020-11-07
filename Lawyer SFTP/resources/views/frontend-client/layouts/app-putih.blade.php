<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bursa Hukum</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet" /> --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/animate.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/aos.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/jquery.timepicker.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/flaticon.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/icomoon.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/main.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/dropzone.css" />
    <link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/chat.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @yield('css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @include('frontend-client.layouts.navbar-putih')

    @yield('content')

    @yield('modal')

    @yield('js')
    @include('frontend-client.layouts.modal')
    @include('frontend-client.layouts.loader')
    @include('frontend-client.layouts.footer')
    <script src="{{url('public/plugins/frontend')}}/js/main.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/dropzone/dropzone.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/aktivitas/main.js"></script>

    <script src="{{url('public/plugins/frontend')}}/js/jquery.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/popper.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery.easing.1.3.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery.stellar.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/aos.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery.animateNumber.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/jquery.timepicker.min.js"></script>
    <script src="{{url('public/plugins/frontend')}}/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{url('public/plugins/frontend')}}/js/google-map.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/js/main.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        var fotoDropzone = new Dropzone("div#foto-preview", {
            url: "{{url('client/profil')}}",
            method: "POST",
            success: function(file, res) {

            }
        })
        var selfieDropzone = new Dropzone("div#selfie-preview", {
            url: "{{url('client/profil')}}",
            method: "POST",
            success: function(file, res) {

            }
        })
    </script>
    <script>
        Dropzone.autoDiscover = false;
        var ktpDropzone = new Dropzone("div#ktp-preview", {
            url: "{{url('client/detail_pembuatan_PT')}}",
            method: "POST",
            success: function(file, res) {},
        });
        var npwpDropzone = new Dropzone("div#npwp-preview", {
            url: "{{url('client/detail_pembuatan_PT')}}",
            method: "POST",
            success: function(file, res) {},
        });
        var aktaDropzone = new Dropzone("div#akta-preview", {
            url: "{{url('client/detail_pembuatan_PT')}}",
            method: "POST",
            success: function(file, res) {},
        });
    </script>
    <script>
        // $('#dropdown-menu').toggle();
        $('#btn-konsultasi').on("click", function() {
            $('#div-konsultasi').show();
            $('#btn-konsultasi').attr('style', 'background-color: #dc3545');
            $('#btn-konsultasi').addClass("text-white");

            $('#div-pertanyaan').hide();
            $('#btn-pertanyaan').attr('style', false);
            $('#btn-pertanyaan').removeClass("text-white");

            $('#div-pembayaran').hide();
            $('#btn-pembayaran').attr('style', false);
            $('#btn-pembayaran').removeClass("text-white");

        });
        $('#btn-pertanyaan').on("click", function() {
            $('#div-konsultasi').hide();
            $('#btn-konsultasi').attr('style', false);
            $('#btn-konsultasi').removeClass("text-white");

            $('#div-pertanyaan').show();
            $('#btn-pertanyaan').attr('style', 'background-color: #dc3545');
            $('#btn-pertanyaan').addClass("text-white");

            $('#div-pembayaran').hide();
            $('#btn-pembayaran').attr('style', false);
            $('#btn-pembayaran').removeClass("text-white");
        });
        $('#btn-pembayaran').on("click", function() {
            $('#div-konsultasi').hide();
            $('#btn-konsultasi').attr('style', false);
            $('#btn-konsultasi').removeClass("text-white");

            $('#div-pertanyaan').hide();
            $('#btn-pertanyaan').attr('style', false);
            $('#btn-pertanyaan').removeClass("text-white");

            $('#div-pembayaran').show();
            $('#btn-pembayaran').attr('style', 'background-color: #dc3545');
            $('#btn-pembayaran').addClass("text-white");
        });
        $('#dropdownMenuButton').on("click", function() {
            $('#dropdown-menu').toggle();
            // $('#dropdownMenuButton').dropdown();
        })
    </script>
</body>

</html>