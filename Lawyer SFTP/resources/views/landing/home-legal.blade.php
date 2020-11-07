@extends('landing.layouts.app')
@section('css')
<style>
.videowrapper { float: none; clear: both; width: 100%; position: relative; padding-bottom: 56.25%; padding-top: 25px; height: 0; } .videowrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; } .tagihan:hover{ transform: scale(1.2);}
</style>
@endsection
@section('content')
 <!-- Start Desc -->
<section class="ftco-section block-23 " style="background-image: url({{URL('/')}}/public/plugins/frontend/images/bg-5.png); background-size: cover;max-height: max-content;">
    <!-- <div class="desc-overlay"></div> -->
    <div class="container">
        <div class="row logo2">
            <div class="logo p-2 ftco-animate">
                <img src="{{url('public/plugins/frontend')}}/images/logo-bursa-advokat.png" alt="logo-bursa-hukum" height="125px" width="125px" style="border-radius: 50%" />
            </div>
        </div>

        <div class="row  align-items-end">
            <div class="col-xl-7 col-lg-8 animated  fadeInLeft ">
                <div class="desc">
                    <p>
                        Selamat datang di <strong>Bursa Legal</strong>. Layanan ini dikhususkan kepada anda yang memiliki profesi sebagai pengacara atau memiliki kantor hukum. Dengan <strong>Aplikasi Bursa
                            Legal</strong>, anda sebagai Pengacara atau sedang atau akan menjalakan Kantor Hukum sangat dimudahkan dalam berinteraksi dengan Klien dan memberikan layanan hukum yang dibutuhkan oleh Klien dari seluruh Indonesia, dengan
                        difasilitasi 42 Room Layanan Hukum khusus dengan persyaratan khusus. segera daftarkan diri anda dengan cara mendownload aplikasi dibawah ini secara <strong>GRATIS</strong>, atau mendaftar pada bagian <strong>Masuk & Daftar</strong>                            dibawah ini secara <strong>GRATIS. Aplikasi Bursa Legal</strong> tehubung dengan
                        <strong>Aplikasi Bursa Hukum</strong>. Anda dapat menjangkau Klien anda dimanapun dan kapanpun selama 24 jam penuh, melalui fitur live chat dan video conference, atau video call, semuanya mudah dengan <strong>Aplikasi Bursa Legal</strong>
                    </p>
                    <div class="row align-items-center d-flex justify-content-center">
                        <div class="col">
                            <img src="{{url('public/plugins/frontend')}}/images/aset-google-play.png" alt="" width="100px" height="45px" class="py-1" />
                            <img src="{{url('public/plugins/frontend')}}/images/aset-app-store.png" alt="" width="100px" height="45px" class="py-1 " />
                        </div>
                        <div class="col my-auto">
                            <a href="{{url('advokat')}}" class="btn button-line-nav my-2 my-sm-0 py-2 px-4" style="border-radius: 30px">Masuk</a>
                            <a href="register.html" class="btn button-round-nav m-2 py-2 px-4" style="border-radius: 30px">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 text-center animated  fadeInRight" style="margin-top: 60px">
                <img src="{{url('public/plugins/frontend')}}/images/homea.png" alt="" class="mobile" style="border-radius: 35px; width: 275px;" />
            </div>
        </div>
    </div>
</section>
<!-- Video -->
<section class="ftco-section ftco-animate" style="padding-top: 0; padding-bottom: 0px; z-index: 2">
    <div class="container">
    <div class="row">
        <div class="col-md-12 p-4" style="background-color: #fff"></div>
    </div>
    <div class="row">
        <div class="col-md-12 pb-3">
        <div class="videowrapper"> <iframe width="854" height="480" src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" gesture="media" allowfullscreen > </iframe> </div>
        </div>
    </div>
    </div>
</section>
<!-- Start Slider Iklan -->
<section class="ftco-section ftco-animate" style="padding-top: 0; padding-bottom: 0px; z-index: 2">
    <div class="container">
    <div class="row">
        <div class="col-md-12 p-4" style="background-color: #fff"></div>
    </div>
    <div class="row">
        <div class="col-md-12 pb-3">
        <div class="owl-carousel carousel-iklan">
            @foreach($slider_iklan as $m)
                <a href="#"><img src="{{asset($m->image)}}" style="border-radius: 10px" /></a>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>

<!-- Start tagihan -->
<section class="ftco-section " style="padding-top: 20px; padding-bottom: 40px">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 ">
                <div class="desc2">
                    <h3 class="animated  fadeInLeft"><strong>Tagihan</strong></h3>
                    <p class="py-3 animated  fadeInLeft">
                        Terdapat fitur Tagihan yang dapat anda gunakan untuk membuat <strong>Tagihan</strong> kepada Klien anda berdasarkan biaya jasa yang anda sepakati dengan Klien anda. Setiap tagihan yang ada kirimkan kepada Kliem anda, akan dimunculkan
                        notifikasi atau pemberitahuan di aplikasi Klien Anda yaitu <strong>Aplikasi Bursa
                            Hukum</strong>
                    </p>
                    <button class="btn button-round m-2 py-2 px-5 ftco-animate"> <a href="{{url('kontak')}}"> Learn More </a></button>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 pt-4 text-center my-auto foto animated foto fadeInRight">
                <img src="{{url('public/plugins/frontend')}}/images/homeAdvokat.png" class="tagihan" style="border-radius: 35px; height: 200px;  transition: transform .1s;   " />
            </div>

        </div>
    </div>
</section>
<!-- Legalitas -->
<section class="ftco-section" style=" padding-top: 20px;padding-bottom: 40px">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 ">
                <div class="desc2">
                    <h3 class="animated  fadeInRight"><strong>Legalitas</strong></h3>
                    <p class="py-3 animated  fadeInRight">
                        Terdapat layanan <strong>Legalitas</strong> yang dapat anda gunakan untuk mencari
                        <strong>Virtual Office</strong>. <strong>Pembuatan Perusahaan, Pembuatan Akta Perizinan
                        </strong> dan lain sebagainya untuk menunjang pekerjaan profesi anda. Seluruh Layanan Tersebut bisa menggunakan sistem pembayaran secara online melalui <strong>Aplikasi Bursa Legal</strong>.
                    </p>
                    <button class="btn button-round m-2 py-2 px-5 ftco-animate"><a href="{{url('kontak')}}"> Learn More </a></button>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 pt-4 text-center my-auto foto animated  fadeInLeft">
                <img src="{{url('public/plugins/frontend')}}/images/legal.png" alt="" class="mobile" style="border-radius: 35px; width: 250px;" />
            </div>

        </div>
    </div>
</section>
<!-- Live Chat -->
<section class="ftco-section " style="padding-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8">
                <div class="desc2">
                    <h3 class="animated  fadeInLeft"><strong>Live Chat</strong></h3>
                    <p class="py-3 animated  fadeInLeft">
                        Terdapat fitur <strong>Live Chat</strong> pada <strong>Aplikasi Bursa Legal</strong>. Setiap Klien diberikan kesempatan untuk mengajuka pertanyaan atau Konsultasi kepada anda melalui layanan konsultasi chat. waktu yang diberikan
                        untuk berkomunikasi adalah 1 jam. waktu tersebut diberikan secara <strong>Gratis</strong> untuk klien menanyakan atau menjelaskan permasalahan yang sedang dihadapi. Layanan ini dapat digunakan selama 24 jam setiap harinya.
                        Jika Anda memiliki pertanyaan lebih lanjut terkai penggunaanya, maka anda dapat menggunakan Layanan Bantuan atau menghubungi Kami.
                    </p>
                    <button class="btn button-round m-2 py-2 px-5 ftco-animate"><a href="{{url('kontak')}}"> Learn More </a></button>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 pt-4 text-center my-auto foto animated  fadeInRight">
                <img src="{{url('public/plugins/frontend')}}/images/cht.jpg" alt="" class="live" style="border-radius: 35px; width: 250px;" />
            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
@endsection


