@extends('landing.layouts.app')
@section('css')
<style>
.videowrapper { float: none; clear: both; width: 100%; position: relative; padding-bottom: 56.25%; padding-top: 25px; height: 0; } .videowrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
</style>
@endsection
@section('content')
<!-- Start Desc -->
<section class="ftco-section block-23" style="background-image: url({{URL('/')}}/public/plugins/frontend/images/bg-5.png); background-size: cover;max-height: max-content;">
    <!-- <div class="desc-overlay"></div> -->
    <div class="container">
        <div class="row logo2">
            <div class="logo p-2 ftco-animate">
                <img src="{{url('public/plugins/frontend')}}/images/logo-bursa-hukum.png" alt="logo-bursa-hukum" height="125px" width="125px" style="border-radius: 50%" />
            </div>
        </div>
        <div class="row  align-items-end">
            <div class="col-xl-7 col-lg-8 ">
            <div class="desc">
                <p>
                Selamat datang di Smart Digital Hukum. Satu - satunya Platform Marketplace Hukum pertama di Indonesia yang berbasis Mobile
                Application. Memberikan kemudahan bagi masyarakat maupun pelaku usaha untuk mencari Kantor Hukum, Pengacara, Notaris, Konsultan
                Perusahaan pembuatan Akta, Pembuatan Badan Hukum (Perusahaan, CV, Yayasan, dll), Konsultan Perizinan, Penerjemah Tersumpah, seluruhnya
                dengan biaya yang terjangkau, termasuk Jasa Bantuan Hukum Gratis bagi masyarakat tidak mampu, semuanya dapat ditemukan hanya dalam
                satu aplikasi, yaitu Bursa Hukum
                </p>
            </div>
            </div>
            <div class="col-xl-5 col-lg-4 text-center" style="margin-top: 60px">
                <img src="{{url('public/plugins/frontend')}}/images/bursa-hukum-web_mockup.png" alt="" class="mobile" style="border-radius: 35px; width: 275px;" />
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

<!-- Start Pengacara/Konsultan -->
<section class="ftco-section ftco-animate" style="padding-top: 0px; padding-bottom: 20px">
    <div class="container">
    <div class="row">
        <div class="col-xl-7 col-lg-8">
        <div class="desc2">
            <h3><strong>Daftar Pengacara/Konsultan</strong></h3>
            <p class="py-3">
            Anda dapat mencari Jasa Pengacara, Kantor Hukum, atau Konsultan Hukum lainnya sesuai dengan Lokasi yang anda inginkan. Layanan Live
            Chat memudahkan anda dalam berkomunikasi dengan para Pengacara ataupun Kantor Hukum maupun Konsultan Perusahaan yang ada dalam
            aplikasi ini, secara Gratis untuk 1 jam awal
            </p>
            <button class="btn button-round m-2 py-2 px-5"><a href="{{url('kontak')}}"> Learn More </a></button>
        </div>
        </div>
        <div class="col-xl-5 col-lg-4 pt-4">
        <img src="{{url('public/plugins/frontend')}}/images/home.PNG" alt="" width="250px" style="border-radius: 30px" />
        </div>
    </div>
    </div>
</section>

<!-- Start Budget -->
<section class="ftco-section ftco-animate" style="padding-top: 0px; padding-bottom: 40px">
    <div class="container">
    <div class="row">
        <div class="col-xl-7 col-lg-8">
        <div class="desc2">
            <h3><strong>Budget</strong></h3>
            <p class="py-3">
            Seiring dengan perekonomian yang menurun, permasalahan hukum yang dihadapi masyarakat dan pengusaha semakin meningkat. Kebutuhan akan
            informasi hukum dan bantuan hukum semakin meningkat, namun situasi saat ini membuat masyarakat maupun pengusaha kesulitan keuangan
            untuk membayar Jasa Hukum. Bursa Hukum hadir membantu anda. Dengan budget yang anda miliki, anda tetap dimudahkan untuk mendapatkan
            bantuan hukum dengan kualitas dan tingkat profesionalitas
            </p>
            <button class="btn button-round m-2 py-2 px-5"><a href="{{url('kontak')}}"> Learn More </a></button>
        </div>
        </div>
        <div class="col-xl-5 col-lg-4 pt-4 text-center">
        <img src="{{url('public/plugins/frontend')}}/images/budget.png" alt="" width="250px" style="padding-top: 60px" />
        </div>
    </div>
    </div>
</section>

<!-- Start Payment Gateway -->
<section class="ftco-section ftco-animate" style="padding-top: 0px; padding-bottom: 40px">
    <div class="container">
    <div class="row">
        <div class="col-xl-5 col-lg-4 pt-4 text-center">
        <img src="{{url('public/plugins/frontend')}}/images/payment.PNG" alt="" width="250px" style="border-radius: 30px" />
        </div>
        <div class="col-xl-7 col-lg-8">
        <div class="desc2">
            <h3><strong>Pembayaran Online</strong></h3>
            <p class="py-3">
            Pembayaran seluruh Layanan didalam Applikasi Bursa Hukum dapat dilakukan secara mudah, yaitu melalui Payment Gateway. Pilihan
            pembayaran yang dapat memudahkan anda dalam bertransaksi. Bursa Hukum merupakan satu-satunya platform hukum yang menggunakan payment
            gateway.
            </p>
            <button class="btn button-round m-2 py-2 px-5"><a href="{{url('kontak')}}"> Learn More </a></button>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- Start Keamanan -->
<section class="ftco-section ftco-animate" style="padding-top: 0px; padding-bottom: 40px">
    <div class="container">
    <div class="row">
        <div class="col-xl-7 col-lg-8">
        <div class="desc2">
            <h3><strong>Money Back Guarantee atau Deposit</strong></h3>
            <p class="py-3">Sistem Money Back Guarantee atau Deposit merupakan kelebihan dalam applikasi ini. Setiap layanan Hukum yang anda gunakan akan menggunakan sistem Rekening Bersama dengan cara Deposit. Jika layanan hukum tidak anda dapatkan, Uang anda akan dikembalikan</p>
            <button class="btn button-round m-2 py-2 px-5"><a href="{{url('kontak')}}"> Learn More </a></button>
        </div>
        </div>
        <div class="col-xl-5 col-lg-4 pt-4 text-center">
        <img src="{{url('public/plugins/frontend')}}/images/security.png" alt="" width="250px" style="padding-top: 60px" />
        </div>
    </div>
    </div>
</section>
@endsection
@section('js')
@endsection


