
<?php $__env->startSection('css'); ?>

    <style>
      .post-slide {
        overflow: hidden;
        margin-right: 15px;
        background-color: #fff !important;
      }
      .post-slide .post-img {
        float: left;
        width: 100%;
        position: relative;
        margin-right: 30px;
      }
      .post-slide .post-img img {
        width: 100%;
        height: 400px;
      }
      .post-slide .post-date {
        background: #ec3c6a;
        color: #fff;
        position: absolute;
        top: 0;
        right: 0;
        display: block;
        padding: 2% 3%;
        width: 60px;
        height: 60px;
        text-align: center;
        transition: all 0.5s ease;
      }
      .post-slide .date {
        display: block;
        font-size: 20px;
        font-weight: 700;
      }
      .post-slide .month {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
      }
      .post-slide .post-review {
        padding: 5% 3% 1% 0;
        border-top: 3px solid #38cfd8;
      }
      .post-slide:hover .post-review {
        border-top-color: #ec3c6a;
      }
      .post-slide .post-title {
        margin: 0 0 10px 0;
      }
      .post-slide .post-title a {
        font-size: 14px;
        color: #333;
        text-transform: uppercase;
      }
      .post-slide .post-title a:hover {
        text-decoration: none;
        font-weight: 700;
      }
      .post-slide .post-bar {
        padding: 0;
        list-style: none;
        text-transform: uppercase;
        position: relative;
        margin-bottom: 20px;
      }
      .post-slide .post-bar:after,
      .post-slide .post-bar:before {
        border: 1px solid #38cfd8;
        bottom: -10px;
        content: "";
        display: block;
        position: absolute;
        right: 36%;
        width: 25px;
      }
      .post-slide .post-bar:before {
        border: 1px solid #ec3c6a;
        right: 32%;
      }
      .post-slide .post-bar li {
        color: #555;
        font-size: 10px;
        margin-right: 10px;
        display: inline-block;
      }
      .post-slide .post-bar li a {
        font-size: 13px;
        text-decoration: none;
        text-transform: uppercase;
        color: #ec3c6a;
      }
      .post-slide .post-bar li a:hover {
        color: #ec3c6a;
      }
      .post-slide .post-bar li i {
        color: #777;
        margin-right: 5px;
      }
      .post-slide .post-description {
        font-size: 12px;
        line-height: 21px;
        color: #444454;
      }
      .owl-theme .owl-controls {
        margin-top: 30px;
      }
      .owl-theme .owl-controls .owl-page span {
        background: #fff;
        border: 2px solid #37a6a4;
      }
      .owl-theme .owl-controls .owl-page.active span,
      .owl-theme .owl-controls.clickable .owl-page:hover span {
        background: #37a6a4;
      }
      @media  only screen and (max-width: 990px) {
        .post-slide .post-img {
          width: 100%;
        }
        .post-slide .post-review {
          width: 100%;
          border-bottom: 4px solid #ec3c6a;
        }
        .post-slide .post-bar:before {
          left: 0;
        }
        .post-slide .post-bar:after {
          left: 25px;
        }
      }
    </style>
    <!-- Start Style Slider Iklan -->
    <style>
      .report-module {
        position: relative;
        margin: 30px 0;
        z-index: 1;
        display: block;
        background: #ffffff;
        border-radius: 8px;
        min-width: 270px;
        width: 300px\9;
        height: auto;
        -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
        -webkit-transition: all 0.3s linear 0s;
        -moz-transition: all 0.3s linear 0s;
        -ms-transition: all 0.3s linear 0s;
        -o-transition: all 0.3s linear 0s;
        transition: all 0.3s linear 0s;
      }
      .report-module .thumbnail {
        background: #fff8f8fa;
        border-radius: 8px;
        height: 500px;
        overflow: hidden;
      }
      .thumbnail {
        padding: 0;
      }

      .report-module:hover {
        -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
      }
      .report-module:hover .thumbnail img {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        transform: scale(1.1);
        opacity: 0.9;
        border-radius: 8px;
      }
      .report-module .thumbnail img {
        display: block;
        width: 120%;
        border-radius: 8px;
        -webkit-transition: all 0.3s linear 0s;
        -moz-transition: all 0.3s linear 0s;
        -ms-transition: all 0.3s linear 0s;
        -o-transition: all 0.3s linear 0s;
        transition: all 0.3s linear 0s;
        opacity: 0.6;
      }
      .report-module .post-content {
        position: absolute;
        bottom: 0;
        background: #ffffff;
        width: 100%;
        padding: 20px;
        -webkti-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
        -moz-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
        -ms-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
        -o-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
        transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
      }
      .report-module .post-content .category {
        position: absolute;
        top: -34px;
        left: 0;
        background: #333;
        padding: 10px 15px;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
      }
      .report-module .post-content .title {
        margin: 0;
        padding: 0 0 10px;
        color: #333333;
        font-size: 26px;
        font-weight: 700;
      }

      .report-module .post-content .description {
        display: block;
        color: #666666;
        font-size: 14px;
        line-height: 1.8em;
      }
      .report-module .post-content .post-meta {
        margin: 30px 0 0;
        color: #999999;
      }
      .report-module .post-content .post-meta .timestamp {
        margin: 0 16px 0 0;
      }
    </style>
    <!-- End Style Slider Iklan -->

    <!-- Start Style Slider Bidang Hukum -->
    <style>
      .post-slide4 {
        margin: 0 10px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 2px rgba(43, 59, 93, 0.3);
        margin-bottom: 2em;
      }
      .post-slide4 .post-info {
        padding: 5px 10px;
        margin: 0;
        list-style: none;
      }
      .post-slide4 .post-info li {
        display: inline-block;
        margin: 0 5px;
      }
      .post-slide4 .post-info li i {
        margin-right: 8px;
      }
      .post-slide4 .post-info li a {
        font-size: 11px;
        font-weight: 700;
        color: #7e828a;
        text-transform: uppercase;
      }
      .post-slide4 .post-info li a:hover {
        color: #ff3903;
        text-decoration: none;
      }
      .post-slide4 .post-img {
        position: relative;
      }
      .post-slide4 .post-img:before {
        content: "";
        width: 100%;
        height: 100%;
        position: absolute;
        border-radius: 10px;
        top: 0;
        left: 0;
        opacity: 0;
        background: rgba(0, 0, 0, 0.6);
        transition: opacity 0.4s linear 0s;
      }
      .post-slide4:hover .post-img:before {
        opacity: 1;
      }
      .post-slide4 .post-img img {
        width: 100%;
        border-radius: 10px;
        height: auto;
      }
      .post-slide4 .read {
        position: absolute;
        bottom: 30px;
        border-radius: 10px;
        left: 50px;
        font-size: 14px;
        color: #fff;
        text-transform: capitalize;
        opacity: 0;
        transition: all 0.4s linear 0s;
      }
      .post-slide4:hover .read {
        opacity: 1;
      }
      .post-slide4 .read:hover {
        text-decoration: none;
        color: #ff3903;
        border-radius: 10px;
      }
      .post-slide4 .post-content {
        padding: 40px 15px;
        position: relative;
      }
      .post-slide4 .post-author {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        position: absolute;
        top: -45px;
        right: 10px;
        overflow: hidden;
        border: 4px solid #fff;
      }
      .post-slide4 .post-author img {
        width: 100%;
        height: auto;
      }
      .post-slide4 .post-title {
        font-size: 18px;
        font-weight: 700;
        text-align: center;
        color: #ff2424;
        margin: 0 0 10px 0;
        text-transform: uppercase;
        transition: all 0.3s linear 0s;
      }
      .post-slide4 .post-title:after {
        content: "";
        width: 25px;
        display: block;
        margin-top: 10px;
        border-bottom: 7px solid #333 center;
      }
      .post-slide4 .post-description {
        font-size: 13px;
        color: #555;
        margin-bottom: 20px;
      }
    </style>
    <!-- End Style Slider Bidang Hukum -->

    <!-- Start Style Slider Event -->
    <style>
      .post-slide2 {
        margin: 0 15px;

        box-shadow: 0 1px 2px rgba(43, 59, 93, 0.3);
        margin-bottom: 2em;
      }
      .post-slide2 .post-img {
        overflow: hidden;
      }
      .post-slide2 .post-img img {
        width: 100%;
        height: auto;
        transform: scale(1);
        transition: all 1s ease-in-out 0s;
      }
      .post-slide2:hover .post-img img {
        transform: scale(1.08);
      }
      .post-slide2 .post-content {
        background: #fff;
        padding: 20px;
      }
      .post-slide2 .post-title {
        font-size: 17px;
        font-weight: 600;
        margin-top: 0;
        text-transform: capitalize;
      }
      .post-slide2 .post-title a {
        display: inline-block;
        color: grey;
        transition: all 0.3s ease 0s;
      }
      .post-slide2 .post-title a:hover {
        color: #3d3030;
        text-decoration: none;
      }
      .post-slide2 .post-description {
        font-size: 15px;
        color: #676767;
        line-height: 24px;
        margin-bottom: 14px;
      }
      .post-slide2 .post-bar {
        padding: 0;
        margin-bottom: 15px;
        list-style: none;
      }
      .post-slide2 .post-bar li {
        color: #676767;
        padding: 2px 0;
      }
      .post-slide2 .post-bar li i {
        margin-right: 5px;
      }
      .post-slide2 .post-bar li a {
        display: inline-block;
        font-size: 12px;
        color: grey;
        transition: all 0.3s ease 0s;
      }
      .post-slide2 .post-bar li a:after {
        content: ",";
      }
      .post-slide2 .post-bar li a:last-child:after {
        content: "";
      }
      .post-slide2 .post-bar li a:hover {
        color: #3d3030;
        text-decoration: none;
      }
      .post-slide2 .read-more {
        display: inline-block;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        background: #ff2424;
        border-bottom-right-radius: 10px;
        text-transform: capitalize;
        transition: all 0.3s linear;
      }
      .post-slide2 .read-more:hover {
        background: #333;
        text-decoration: none;
      }
    </style>
    <!-- End Style Slider Event -->

    <style>
      .alert {
        padding: 10px;
        background-color: #f2bcb8;
        color: #ff2424;
        font-size: 16px;
      }
      .alert2 {
        padding: 10px;
        background-color: #ffeeec;
        color: #000;
        font-size: 16px;
      }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="hero-wrap js-fullheight" style="background-image: url('images/bg-5.png')" data-section="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" style="margin-left: 15px" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hallo Freza</h1>
            <p class="mb-4" style="margin-left: 15px" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              Selamat Datang di My Pocket Legal
            </p>
            <div class="s130">
              <form>
                <div class="inner-form">
                  <div class="input-field first-wrap">
                    <div class="svg-wrapper">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                          d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                        ></path>
                      </svg>
                    </div>
                    <input id="search" type="text" placeholder="Cari Advokat, Bidang Hukum..." />
                  </div>
                  <div class="input-field second-wrap">
                    <button class="btn-search" type="button">CARI</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Start Slider Iklan -->
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel carousel-iklan">
              <div class="report-module">
                <div class="thumbnail">
                  <a href="detail_iklan.html"><img src="images/iklan1.jpg" /></a>
                </div>
              </div>
              <div class="report-module">
                <div class="thumbnail">
                  <a href="detail_iklan.html"><img src="images/iklan2.jpg" /></a>
                </div>
              </div>
              <div class="report-module">
                <div class="thumbnail">
                  <a href="#"><img src="images/iklan3.jpg" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="report-module">
              <div class="thumbnail">
                <a href="detail_iklan.html"><img src="images/iklan_2.jpg" /></a>
              </div>
            </div>
            <div class="report-module">
              <div class="thumbnail">
                <a href="detail_iklan.html"><img src="images/iklan_1.jpg" /></a>
              </div>
            </div>
            <div class="report-module">
              <div class="thumbnail">
                <a href="#"><img src="images/iklan_3.jpg" /></a>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div> -->
    </section>
    <!-- End Slider Iklan -->

    <!-- Start Pemberitahuan -->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Pemberitahuan</h2>
          </div>
        </div>

        <div class="alert">
          <div class="d-flex">
            <div class="p-2">Tagihan Pengajuan Somasi Dikirimkan Oleh Advokat Andira Pramanta</div>
            <div class="ml-auto p-2"><i class="fa fa-bell" style="font-size: 22px" aria-hidden="true"></i></div>
          </div>
        </div>
        <div class="alert">
          <div class="d-flex">
            <div class="p-2">Tagihan Pengajuan Somasi Dikirimkan Oleh Advokat Andira Pramanta</div>
            <div class="ml-auto p-2"><i class="fa fa-bell" style="font-size: 22px" aria-hidden="true"></i></div>
          </div>
        </div>
        <div class="alert2">
          <div class="d-flex">
            <div class="p-2">Tagihan Pengajuan Somasi Dikirimkan Oleh Advokat Andira Pramanta</div>
            <div class="ml-auto p-2" style="color: #ff2424"><i class="fa fa-bell" style="font-size: 22px" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Pemberitahuan -->

    <!-- Start Layanan Favorite -->
    <section class="ftco-section ftco-no-pb ftco-services bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Layanan Favorit</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel carousel-bidang mb-5">
              <div
                class="post-slide4"
                style="
                  -webkit-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  -moz-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                "
              >
                <a href="detail_probono.html">
                  <div class="post-img">
                    <img src="images/layanan_probono.png" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Pro Bono</h3>
                </div>
              </div>
              <div
                class="post-slide4"
                style="
                  -webkit-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  -moz-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                "
              >
                <a href="legalitas.html">
                  <div class="post-img">
                    <img src="images/layanan_legalitas.png" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Legalitas</h3>
                </div>
              </div>
              <div
                class="post-slide4"
                style="
                  -webkit-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  -moz-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                "
              >
                <a href="#modal-invoice" data-toggle="modal" data-target="#modal-invoice">
                  <div class="post-img">
                    <img src="images/layanan_penawaran.png" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Ruang Penawaran</h3>
                </div>
              </div>
              <div
                class="post-slide4"
                style="
                  -webkit-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  -moz-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                "
              >
                <a href="#">
                  <div class="post-img">
                    <img src="images/layanan_kantorhukum.png" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Kantor Hukum</h3>
                </div>
              </div>
              <div
                class="post-slide4"
                style="
                  -webkit-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  -moz-box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                  box-shadow: 1px 9px 13px -1px rgba(204, 202, 204, 1);
                "
              >
                <a href="peraturan.html">
                  <div class="post-img">
                    <img src="images/image_4.jpg" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Update Peraturan</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Layanan Favorite -->

    <!-- Start Live Chat -->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Advokat Online</h2>
          </div>
        </div>
        <div class="row">
          <div class="card" style="width: 100%; padding: 20px">
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-1.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Andira Pramanta</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-2.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Eko Renaldi</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-3.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Banu Nugra</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-4.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Baim Paris</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="owl-carousel carousel-chat">
                <div class="item">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-1.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Andira Pramanta</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-2.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Eko Renaldi</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-3.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Banu Nugra</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-4.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Baim Paris</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-1.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Andira Pramanta</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(images/staff-2.jpg)"></div>
                      </div>
                      <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                          <h3 class="mb-2">Eko Renaldi</h3>
                          <span class="position mb-4" style="font-size: 14px">S.H.,LL.M, M.Hum.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <a href="detail_lawyer_online.html" class="btn btn-primary btn-lg btn-block">Live Chat</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Live Chat -->

    <!-- Start App -->
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div
            class="card"
            style="
              width: 100%;
              border: none;
              -webkit-box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
              -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2);
              box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
            "
          >
            <div class="card-body">
              <div class="row">
                <div class="col-2">
                  <img src="images/logoapp.png" alt="" style="border-radius: 50%; width: 150px; height: 150px" />
                </div>
                <div class="col-8 align-self-center">
                  <h3><strong>Bursa Advokat</strong></h3>
                </div>
                <div class="col-2 align-self-center">
                  <a href="#" class="btn btn-primary">Download</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End App -->

    <!-- Start Bidang Hukum -->
    <section class="ftco-section ftco-no-pb ftco-services">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Layanan Hukum</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel carousel-bidang mb-5">
              <div class="post-slide4">
                <a href="detail_hukum2.html">
                  <div class="post-img">
                    <img src="images/bidang_kontrak.jpg" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Kontrak</h3>
                </div>
              </div>
              <div class="post-slide4">
                <a href="detail_hukum2.html">
                  <div class="post-img">
                    <img src="images/bidang_hutang.jpg" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Hutang Piutang</h3>
                </div>
              </div>
              <div class="post-slide4">
                <a href="detail_hukum2.html">
                  <div class="post-img">
                    <img src="images/bidang_pajak.jpg" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Pajak</h3>
                </div>
              </div>
              <div class="post-slide4">
                <a href="detail_hukum2.html">
                  <div class="post-img">
                    <img src="images/bidang_perceraian.jpg" alt="" />
                  </div>
                </a>

                <div class="post-content">
                  <h3 class="post-title">Perceraian</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Bidang Hukum -->

    <!-- Start Artikel Terbaru -->
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3s pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Artikel Terbaru</h2>
          </div>
        </div>
        <div class="col-md-12 testimony-section">
          <div class="owl-carousel carousel-testimony">
            <div class="item">
              <div class="col d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <!-- <img class="block-20" src="images/image_1.jpg" alt="image 1" /> -->
                  <a href="detail_artikel.html" class="block-20" style="background-image: url('images/image_1.jpg')"> </a>

                  <div class="text mt-3 float-right d-block">
                    <div class="text">
                      <h3 class="heading">
                        <a href="detail_artikel.html">Bantuan Hukum Keliling Mendekatkan Upaya Akses Bantuan</a>
                      </h3>
                    </div>
                    <p>12 Agustus 2020</p>
                    <div class="d-flex align-items-center mt-4 meta">
                      <p class="mb-0">
                        <a href="detail_artikel.html" class="btn btn-primary">Baca Selengkapnya <span class="ion-ios-arrow-round-forward"></span></a>
                      </p>
                      <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <!-- <img class="block-20" src="images/image_1.jpg" alt="image 1" /> -->
                  <a href="detail_artikel.html" class="block-20" style="background-image: url('images/image_2.jpg')"> </a>

                  <div class="text mt-3 float-right d-block">
                    <div class="text">
                      <h3 class="heading">
                        <a href="detail_artikel.html">Bantuan Hukum Keliling Mendekatkan Upaya Akses Bantuan</a>
                      </h3>
                    </div>
                    <p>12 Agustus 2020</p>
                    <div class="d-flex align-items-center mt-4 meta">
                      <p class="mb-0">
                        <a href="detail_artikel.html" class="btn btn-primary">Baca Selengkapnya <span class="ion-ios-arrow-round-forward"></span></a>
                      </p>
                      <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <!-- <img class="block-20" src="images/image_1.jpg" alt="image 1" /> -->
                  <a href="detail_artikel.html" class="block-20" style="background-image: url('images/image_3.jpg')"> </a>

                  <div class="text mt-3 float-right d-block">
                    <div class="text">
                      <h3 class="heading">
                        <a href="detail_artikel.html">Bantuan Hukum Keliling Mendekatkan Upaya Akses Bantuan</a>
                      </h3>
                    </div>
                    <p>12 Agustus 2020</p>
                    <div class="d-flex align-items-center mt-4 meta">
                      <p class="mb-0">
                        <a href="detail_artikel.html" class="btn btn-primary">Baca Selengkapnya <span class="ion-ios-arrow-round-forward"></span></a>
                      </p>
                      <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <!-- <img class="block-20" src="images/image_1.jpg" alt="image 1" /> -->
                  <a href="detail_artikel.html" class="block-20" style="background-image: url('images/image_4.jpg')"> </a>

                  <div class="text mt-3 float-right d-block">
                    <div class="text">
                      <h3 class="heading">
                        <a href="detail_artikel.html">Bantuan Hukum Keliling Mendekatkan Upaya Akses Bantuan</a>
                      </h3>
                    </div>
                    <p>12 Agustus 2020</p>
                    <div class="d-flex align-items-center mt-4 meta">
                      <p class="mb-0">
                        <a href="detail_artikel.html" class="btn btn-primary">Baca Selengkapnya <span class="ion-ios-arrow-round-forward"></span></a>
                      </p>
                      <p class="ml-auto mb-0">
                        <a href="#" class="mr-2">Admin</a>
                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Artikel Terbaru -->

    <!-- Start Event -->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3s pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Event</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel carousel-event">
              <div class="post-slide2">
                <div class="post-img">
                  <a href="detail_event.html"><img src="images/event_tahunbaru.jpg" alt="" /></a>
                </div>
                <div class="post-content">
                  <h3 class="post-title"><a href="detail_event.html">Event Malam Tahun Baru 2021</a></h3>
                  <ul class="post-bar">
                    <li style="font-size: 14px"><i class="icon-calendar"></i> Dec 31, 2020</li>
                  </ul>
                  <!-- <a href="detail_event.html" class="read-more">Selengkapnya</a> -->
                </div>
              </div>

              <div class="post-slide2">
                <div class="post-img">
                  <a href="detail_event.html"><img src="images/event_festival.jpg" alt="" /></a>
                </div>
                <div class="post-content">
                  <h3 class="post-title"><a href="detail_event.html">Event Festival Tahunan</a></h3>
                  <ul class="post-bar">
                    <li style="font-size: 14px"><i class="icon-calendar"></i> Nov 12, 2020</li>
                  </ul>
                  <!-- <a href="detail_event.html" class="read-more">Selengkapnya</a> -->
                </div>
              </div>

              <div class="post-slide2">
                <div class="post-img">
                  <a href="detail_event.html"><img src="images/event_ulangtahun.jpg" alt="" /></a>
                </div>
                <div class="post-content">
                  <h3 class="post-title"><a href="detail_event.html">Event Ulang Tahun Perusahaan</a></h3>
                  <ul class="post-bar">
                    <li style="font-size: 14px"><i class="icon-calendar"></i> Sept 08, 2020</li>
                  </ul>
                  <!-- <a href="detail_event.html" class="read-more">Selengkapnya</a> -->
                </div>
              </div>

              <div class="post-slide2">
                <div class="post-img">
                  <a href="detail_event.html"><img src="images/event_dinner.jpg" alt="" /></a>
                </div>
                <div class="post-content">
                  <h3 class="post-title"><a href="detail_event.html">Event Gala Dinner</a></h3>
                  <ul class="post-bar">
                    <li style="font-size: 14px"><i class="icon-calendar"></i> Aug 31, 2020</li>
                  </ul>
                  <!-- <a href="detail_event.html" class="read-more">Selengkapnya</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Artikel Terbaru -->

    <!-- Start Slider Iklan -->
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel carousel-iklan">
              <div class="report-module">
                <div class="thumbnail">
                  <a href="detail_iklan.html"><img src="images/iklan_2.jpg" /></a>
                </div>
                <!-- <div class="post-content">
                  <div class="post-meta">
                    <span class="comments">
                      <a class="btn btn-primary" href="detail_iklan.html">Selanjutnya</a>
                    </span>
                  </div>
                </div> -->
              </div>
              <div class="report-module">
                <div class="thumbnail">
                  <a href="detail_iklan.html"><img src="images/iklan_1.jpg" /></a>
                </div>
                <!-- <div class="post-content">
                  <div class="post-meta">
                    <span class="comments">
                      <a class="btn btn-primary" href="detail_iklan.html">Selanjutnya</a>
                    </span>
                  </div>
                </div> -->
              </div>
              <div class="report-module">
                <div class="thumbnail">
                  <a href="#"><img src="images/iklan_3.jpg" /></a>
                </div>
                <!-- <div class="post-content">
                  <div class="post-meta">
                    <span class="comments">
                      <a class="btn btn-primary" href="#">Selanjutnya</a>
                    </span>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Slider Iklan -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <!-- modal  -->
    <div class="modal fade" id="modal-invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajukan Pertanyaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 20px">
            <div class="card mb-3" style="max-width: auto">
              <div class="card-body" style="font-size: 14px; padding: 20px">
                <form class="needs-validation" novalidate>
                  <div class="form-group" style="color: black">
                    <label for="validationTooltip01">JUDUL BANTUAN</label>
                    <input type="text" class="form-control" style="font-size: 14px" id="validationTooltip01" placeholder="Judul Bantuan" required />
                    <div class="valid-tooltip">Field ini harus diisi</div>
                  </div>
                  <div class="form-group" style="color: black">
                    <label for="validationTooltip01">LAYANAN HUKUM YANG DICARI</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbKontrak" id="rbKontrak" value="option1" checked />
                      <label class="form-check-label" for="rbKontrak"> Pembuatan Kontrak </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbOpinion" id="rbOpinion" value="option2" />
                      <label class="form-check-label" for="rbOpinion"> Legal Opinion </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbPerceraian" id="rbPerceraian" value="option2" />
                      <label class="form-check-label" for="rbPerceraian"> Perceraian </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbKepolisian" id="rbKepolisian" value="option2" />
                      <label class="form-check-label" for="rbKepolisian"> Pendampingan Kepolisian </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbSomasi" id="rbSomasi" value="option2" />
                      <label class="form-check-label" for="rbSomasi"> Somasi </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbHutang" id="rbHutang" value="option2" />
                      <label class="form-check-label" for="rbHutang"> Hutang Piutang </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbKepailitan" id="rbKepailitan" value="option2" />
                      <label class="form-check-label" for="rbKepailitan"> Kepailitan </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbPertanahan" id="rbPertanahan" value="option2" />
                      <label class="form-check-label" for="rbPertanahan"> Sengketa Pertanahan </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbPengadilan" id="rbPengadilan" value="option2" />
                      <label class="form-check-label" for="rbPengadilan"> Penanganan Perkara di Pengadilan </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="rbLainnya" id="rbLainnya" value="option2" />
                      <label class="form-check-label" for="rbLainnya"> Lainnya </label>
                    </div>
                  </div>
                  <div class="form-group" style="color: black">
                    <label for="validationTooltip02">BUDGET</label>
                    <input
                      type="text"
                      class="form-control"
                      style="font-size: 14px"
                      id="validationTooltip01"
                      placeholder="Budget Penanganan Kasus"
                      required
                    />
                    <div class="valid-tooltip">Field ini harus diisi</div>
                  </div>
                  <div class="form-group" style="color: black">
                    <label for="validationTooltip03">PERTANYAAN</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="valid-tooltip">Field ini harus diisi</div>
                  </div>
                  <div class="form-group" style="color: black">
                    <label for="validationTooltip03">PENJELASAN</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="valid-tooltip">Field ini harus diisi</div>
                  </div>
                  <button class="btn btn-primary btn-block" type="submit">Kirim</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('public/plugins/frontend')); ?>/js/main.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#test-car").owlCarousel();
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend-advokat.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/frontend-advokat/home.blade.php ENDPATH**/ ?>