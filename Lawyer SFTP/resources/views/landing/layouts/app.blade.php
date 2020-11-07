
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bursa {{request()->is('legal*')?'Legal':'Hukum'}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />


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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- style floating button -->
    @yield('css')
    <style>
    .mobile:hover {
        animation: shake 0.82s cubic-bezier(.36, .07, .19, .97);
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
    }
    @keyframes shake {
        0% {
            transform: translate(1px, 1px) rotate(0deg);
        }
        10% {
            transform: translate(-1px, -2px) rotate(-1deg);
        }
        20% {
            transform: translate(-3px, 0px) rotate(1deg);
        }
        30% {
            transform: translate(3px, 2px) rotate(0deg);
        }
        40% {
            transform: translate(1px, -1px) rotate(1deg);
        }
        50% {
            transform: translate(-1px, 2px) rotate(-1deg);
        }
        60% {
            transform: translate(-3px, 1px) rotate(0deg);
        }
        70% {
            transform: translate(3px, 1px) rotate(-1deg);
        }
        80% {
            transform: translate(-1px, -1px) rotate(1deg);
        }
        90% {
            transform: translate(1px, 2px) rotate(0deg);
        }
        100% {
            transform: translate(1px, -2px) rotate(-1deg);
        }
    }
    .live:hover {
        transform: scale(1.1);
    }
    </style>
    <style>
    /* button daftar dn masuk */

    .button-round {
        border-radius: 30px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        /* background-color: #1fc0ae; */
        background-color: #edb5ab;
        color: #fff;
    }

    .button-round-nav {
        border-radius: 30px;
        text-align: center;
        background-color: #ff2424;
        /* background-color: #1fc0ae; */
        color: #fff;
    }

    .button-line-nav {
        border-radius: 30px;
        text-align: center;
        /* border: solid 1px #1fc0ae; */
        border: solid 1px #ff2424;
        background-color: #fff;
        /* color: #1fc0ae; */
        color: #ff2424;
    }


    /* css floating button chat */

    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #14a823;
        z-index: 2;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }

    .text-float {
        position: fixed;
        width: 150px;
        height: 30px;
        bottom: 110px;
        right: 40px;
        padding: 4px;
        background-color: #fff;
        z-index: 2;
        color: #636362;
        border-radius: 5px;
        text-align: center;
        font-size: 12px;
    }

    .my-float {
        margin-top: 22px;
    }

    .float:hover {
        color: white;
    }


    /* css produk kami */

    .produk {
        height: 250px;
    }

    @media only screen and (max-width: 768px) {
        .dropdown-nav {
            width: 300px;
            height: 50px;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
    }

    @media only screen and (max-width: 360px) {
        .dropdown-menu {
            width: 320px !important;
        }
    }

    @media only screen and (max-width: 416px) {
        .dropdown-menu {
            width: 380px !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .dropdown-menu {
            width: 320px !important;
        }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
        .dropdown-menu {
            width: 650px !important;
        }
    }

    @media (max-width: 575.98px) {
        .dropdown-menu {
            width: 320px !important;
            margin-right: 8px;
        }
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
        .dropdown-menu {
            width: 480px !important;
        }
        .dropdown-nav {
            width: 450px !important;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .dropdown-menu {
            width: 650px !important;
        }
        .dropdown-nav {
            width: 620px !important;
        }
    }


    /* 
    @media only screen and (max-width: 768px) {
        .dropdown-nav {
            width: 300px;
            height: 50px;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
    }

    @media only screen and (max-width: 360px) {
        .dropdown-menu {
            width: 320px !important;
        }
    }

    @media only screen and (max-width: 416px) {
        .dropdown-menu {
            width: 380px !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .dropdown-menu {
            width: 320px !important;
        }
    } */
    </style>
    <style>
      .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #14a823;
        z-index: 2;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
      }

      .text-float {
        position: fixed;
        width: 150px;
        height: 30px;
        bottom: 110px;
        right: 40px;
        padding: 4px;
        background-color: #fff;
        z-index: 2;
        color: #636362;
        border-radius: 5px;
        text-align: center;
        font-size: 12px;
      }

      .my-float {
        margin-top: 22px;
      }

      .float:hover {
        color: white;
      }
    </style>

    <!-- style navbar -->
    <style>
      .button-round {
        border-radius: 30px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        /* background-color: #1fc0ae; */
        background-color: #edb5ab;
        color: #fff;
      }
      .button-round-nav {
        border-radius: 30px;
        text-align: center;
        background-color: #ff2424;
        /* background-color: #1fc0ae; */
        color: #fff;
      }
      .button-line-nav {
        border-radius: 30px;
        text-align: center;
        /* border: solid 1px #1fc0ae; */
        border: solid 1px #ff2424;
        background-color: #fff;
        /* color: #1fc0ae; */
        color: #ff2424;
      }
    </style>
    <!-- style desc -->
    <style>
      .desc-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        content: "";
        opacity: 0.7;
        background: #184978;
      }
      .desc {
        margin-top: 100px;
        margin-left: 10px;
        padding: 70px 81px 68px 90px;
        background: #fef2ed;
      }
      .desc2 {
        margin-left: 10px;
        padding: 70px 81px 0px 0px;
      }
      .logo {
        position: absolute;
        margin-top: 40px;
        margin-left: -70px;
        z-index: 2;
        border: solid 4px #fff;
        border-radius: 50%;
      }
    </style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

      @include('landing.layouts.navbar')
      @yield('content')

    <div class="card text-float  animated infinite wobble">
      <p>Bingung? Yuk tanya!&nbsp; <i class="fa fa-smile-o fa-lg" style="background-color: #f7e9c1" aria-hidden="true"></i></p>
    </div>

    <a href="#" class="float" data-toggle="modal" data-target="#">
      <i class="fa fa-comments my-float fa-lg" style="color: #fff;"></i>
    </a>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 text-center ftco-animate">
            <img src="{{url('public/plugins/frontend')}}/images/home.PNG" alt="" width="120px" style="border-radius: 20px" />
            <img src="{{url('public/plugins/frontend')}}/images/home.PNG" alt="" width="120px" style="border-radius: 20px" class="p-2" />
          </div>
          <div class="col-lg-8 mt-5 ftco-animate">
            <h4 class="text-light">Download GRATIS Aplikasi Bursa Hukum sekarang juga!</h4>
            <img src="{{url('public/plugins/frontend')}}/images/aset-google-play.png" alt="" width="120px" height="40px" class="p-1 mt-3" />
            <img src="{{url('public/plugins/frontend')}}/images/aset-app-store.png" alt="" width="120px" height="40px" class="p-1 mt-3" />
          </div>
        </div>
        <hr style="background-color: white; margin: 0px" />
        <div class="row pt-4">
          <div class="col-lg-3">
              <div style="margin-left: 35px">
                  <a href="#" style="font-size: 20px">Tentang Bursa Hukum</a>
              </div>
              <ul>
                  <li></li>
                  <li><a href="#">Tentang Kami</a></li>
                  <li><a href="#">Karir</a></li>
                  <li><a href="#">Bantuan</a></li>
                  <li><a href="{{url('kontak')}}">Kontak Kami</a></li>
              </ul>
          </div>
          <div class="col-lg-5">
              <div style="margin-left: 35px">
                  <a href="#" style="font-size: 20px">Lainnya</a>
              </div>
              <ul>
                  <li></li>
                  <li><a href="{{url('legal')}}">Bursa Legal</a></li>
                  <li><a href="{{url('blog')}}">Blog</a></li>
                  <li><a href="{{url('berita')}}">Berita</a></li>
              </ul>
          </div>
          <div class="col-lg-4">
            <div>
              <p>IKUTI KAMI DI</p>
            </div>
            <ul class="ftco-footer-social mt-3" style="padding-inline-start: 0px">
              <li class="ftco-animate">
                <a href="#"><span class="fa fa-facebook"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="fa fa-twitter"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="fa fa-instagram"></span></a>
              </li>
            </ul>
            <ul class="ftco-footer-social mt-3" style="padding-inline-start: 0px">
              <li class="ftco-animate">
                <a href="#"><span class="fa fa-youtube-play"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="fa fa-wechat"></span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
      </svg>
    </div>

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
    @yield('js')
  </body>
</html>
