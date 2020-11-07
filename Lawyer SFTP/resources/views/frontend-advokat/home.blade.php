@extends('frontend-advokat.layouts.app')

@section('css')
@endsection

@section('content')
<section class="hero-wrap js-fullheight"
    style="background-image:url({{URL('/')}}/public/plugins/fronted-advokat/images/bg_1.jpg)" data-section="home">
    <div class="overlay "> </div>
    <div class="container ">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end "
            data-scrollax-parent="true ">
            <div class="col-md-6 ftco-animate " data-scrollax=" properties: { translateY: '70%' } ">
                <h1 class="mb-4 text-white " data-scrollax="properties: { translateY: '30%', opacity: 1.6 } ">
                    Hello, {{session()->get('user')->nama_lengkap}}
                </h1>
                <p class="mb-4 " data-scrollax="properties: { translateY: '30%', opacity: 1.6 } ">Selamat datang di
                    website Advokat</p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img  ftco-animate" id="section-counter ">
    <div class="container ">
        <div class="row  d-md-flex align-items-center justify-content-end ">
            <div class=" col-lg-12 ">
                <div class="ftco-counter-wrap card  rounded">
                    <div class="row no-gutters   d-md-flex align-items-center align-items-stretch ">
                        <div
                            class="col-md-3 col-sm-3 col-6 d-flex  justify-content-center counter-wrap mb-0 rounded-left">
                            <div class="block-18 ">
                                <div class="text ">
                                    <div class="icon d-flex justify-content-center align-items-center ">
                                        <span class="flaticon-shield"></span>
                                    </div>
                                    <h2 class="number m-0">{{$allkonsultasi}}</h2>
                                    <span>Konsultasi selesai</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-6 d-flex  justify-content-center counter-wrap  mb-0">
                            <div class="block-18 ">
                                <div class="text ">
                                    <div class="icon d-flex justify-content-center align-items-center ">
                                        <span class="flaticon-employee"></span>
                                    </div>
                                    <h2 class="number m-0">{{$cancelkonsultasi}}</h2>
                                    <span>*Kasus yang dibatalkan</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-6 d-flex justify-content-center counter-wrap mb-0">
                            <div class="block-18 ">
                                <div class="text ">
                                    <div class="icon d-flex justify-content-center align-items-center ">
                                        <span class="flaticon-medal"></span>
                                    </div>
                                    <h2 class="number m-0">5</h2>
                                    <span>Rating</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-3 col-sm-3 col-6 d-flex justify-content-center counter-wrap  mb-0 rounded-right ">
                            <div class="block-18 ">
                                <div class="text ">
                                    <div class="icon d-flex justify-content-center align-items-center ">
                                        <span class="flaticon-handshake"></span>
                                    </div>
                                    <h2 class="number m-0">{{$ongoingkonsultasi}}</h2>
                                    <span>Live chat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($statusharga['status'] == false)
<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img " id="section-counter ">
    <div class="container ">
        <div class="row d-md-flex  mt-5 d-flex ftco-animate">
            <div class="col-lg-12">
                <a href="{{url('advokat/bidang-hukum')}}">
                    <div class="alert alert-light rounded" role="alert"
                        style="background-color: #FF2424; color: white;">
                        <div class="row p-2">
                            <div class="col-lg-11 col-md-10 col-sm-10 col-10   my-auto mx-auto">
                                <h5 class="font-weight-bold mb-0" style="color: white;">Anda Belum Melengkapi Deskripsi
                                    dan Harga Setiap Layanan</h5>
                            </div>
                            <div class="col-lg col-md-2 col-sm-2  col-2 my-auto mx-auto">
                                <span class=" badge badge-pill badge-light "
                                    style="font-size: 1.25rem; color: white; background-color: rgba(255, 255, 255, 0.301); ">{{$statusharga['count_not_filled']}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- kategory -->
<section class="ftco-section " id="blog-section ">
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-5 ">
            <div class="col-md-10 text-center ftco-animate ">
                <h2 class="mb-4 font-weight-bold">Rekomendasi Kategori</h2>
            </div>
        </div>
        <div class="row d-flex mx-5 mb-3 px-2">
            @foreach ($kategori as $k)
            <div class="col-lg-4 col-md-4 d-flex justify-content-center ftco-animate pb-3">
                @if($k->id == 7)
                <a href="{{url('advokat/peraturan/')}}">
                    @elseif($k->id == 9)
                    <a href="{{url('advokat/legalitas/')}}">
                        @elseif($k->id == 12)
                        <a href="{{url('advokat/mahkamah-agung/')}}">
                            @endif
                            <div class="card rounded">
                                <img src="{{asset($k->image)}}" class="rounded d-block m-2 "
                                    style="width: 15rem;height: 15rem; " alt="... ">
                                <h5 class="card-title p-3 " style="text-align: center; "><strong>{{$k->nama}}</strong>
                                </h5>
                            </div>
                        </a>
            </div>
            @endforeach
        </div>
        <div class="row d-flex   pt-3">
            <div class="col-xl-10  col-lg-10 col-md-10 mx-auto">
                <div class="card rounded d-flex ftco-animate" style="max-width: auto;">
                    <div class="card-body row no-gutters my-auto ">
                        <div class="col-lg-2 mx-auto my-auto ">
                            <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/logo-bursa-hukum.png"
                                class="rounded-circle img-fluid mx-auto  my-auto d-block"
                                style="width: 5rem;height: 5rem; " alt="... ">
                        </div>
                        <div class="col my-auto ">
                            <h3><strong>Bursa Hukum</strong> </h3>
                        </div>
                        <div class="col my-auto ">
                            <a href="#" class="btn btn-primary " style="float: right; ">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- aktivitas -->
<section class="ftco-section aktivitas-section ftco-no-pb pt-0" id="aktivitas-section ">
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-5 ">
            <div class="col-md-10  text-center ftco-animate ">
                <h2 class="mb-4 font-weight-bold">Aktivitas</h2>
            </div>
        </div>
        <div class="row d-flex ">
            <div class="owl-carousel carousel-aktivitas">

                <div class="col-sm ftco-animate">
                    <div class="item  mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/video-conference')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-video-confrence.png"
                                class="mb-2 " alt=" ">Video conference
                        </a>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item  mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/pertemuan')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-pertemuan.png"
                                class="mb-2 " alt=" ">Pertemuan
                        </a>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item  mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/artikel')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-artikel.png"
                                class="mb-2 " alt=" ">Artikel</a>
                    </div>
                </div>
                <div class="col-sm ftco-animate ">
                    <div class="item  mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/report')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-laporan.png"
                                class="mb-2 " alt=" ">Report</a>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item  mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/pendampingan')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-pendampingan.png"
                                class="mb-2 " alt=" ">Pendampingan</a>
                    </div>
                </div>
                <div class="col-sm  ftco-animate">
                    <div class="item   mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/tertulis')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-legal (1).png"
                                class="mb-2 " alt=" ">Tertulis</a>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/liveChat')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-live-chat.png"
                                class="mb-2 " alt=" ">Live Chat
                        </a>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item  mx-auto" style="width: 70%;text-align: center; ">
                        <a href="{{url('advokat/tagihan')}}"><img
                                src="{{url('public/plugins/fronted-advokat')}}/images/aktivitas/icon-lawyer-invoice-08.png"
                                class="mb-2 " alt=" ">Tagihan</a>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- slider lawyer -->
<section class="ftco-section ftco-no-pb ">
    <div class="container ">
        <div class="owl-carousel carousel-slideriklan ftco-animate ">
            @foreach ($slider_lawyer as $l)
            <a href="{{url('advokat/sliderLawyer/'.$l->id)}}">
                <div class="item-slider  col-lg-12 col-md-12 col-sm-12 p-0">
                    <img src="{{asset($l->image)}}" alt=" " class="rounded">
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- artikel -->
<section class="ftco-section " id="blog-section ">
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-5 ">
            <div class="col-md-10  text-center ftco-animate ">
                <h2 class="mb-4 font-weight-bold">Artikel Terbaru</h2>
            </div>
        </div>
        <div class="row  ">
            <div class="owl-carousel carousel-artikel ">
                @foreach ($artikel as $a)
                <div class="item  ftco-animate  mx-3">
                    <div class="card rounded mb-3">
                        <a href="{{url('advokat/detailArtikel/'.$a->id)}}">
                            <img class="card-img-top rounded-top " src="{{asset($a->image)}}" alt="Card image cap "
                                style="height: 300px;">
                            <div class="card-body">
                                <div class="card-text ">
                                    <h5 class=" font-weight-bold artikel">{{$a->judul}}
                                    </h5>
                                    <p class="text-muted  "><span
                                            class="far fa-calendar-alt "></span>{{date(' d F Y', strtotime($a->release_date))}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- event -->
<section class="ftco-section ftco-no-pt " id="section-event ">
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-5 ">
            <div class="col-md-10  text-center ftco-animate ">
                <h2 class="mb-4 font-weight-bold">Event</h2>
            </div>
        </div>

        <div class="row ">

            <div class="owl-carousel  carousel-event">
                @foreach($event as $m)
                <div class="item mx-3">

                    <div class="card rounded mb-3  ftco-animate ">
                        <a href="{{url('advokat/event/'.$m->id)}}">
                            <img class="card-img-top rounded-top " src="{{asset($m->gambar)}}" alt="Card image cap "
                                style="height: 250px;">
                            <div class="card-body">
                                <div class="card-text ">
                                    <h5 class=" text-weight-bold event"><strong>{{$m->nama}}</strong>
                                    </h5>
                                    <p class="text-muted m-0 "><span
                                            class="far fa-calendar-alt"></span>{{date(' d F Y', strtotime($m->tanggal))}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- slider iklan -->
<section class="ftco-section ftco-no-pt " id="section-event ">
    <div class="container ftco-animate ">
        {{-- <div class="row">
         <div class="owl-carousel  carousel-promosi">
                 @foreach($slider_iklan as $m)
                <div class="item ">
                
                    <div class="card rounded   ftco-animate ">
                        <a href="{{url('advokat/sliderIklan/'.$m->id)}}">
        <img class="card-img-top rounded-top " src="{{asset($m->image)}}" alt="Card image cap ">

        </a>
    </div>
    </div>
    @endforeach
    </div> --}}

    <div class=" owl-carousel carousel-slideriklan ">
        @foreach ($slider_iklan as $s)
        <a href="{{url('advokat/sliderIklan/'.$s->id)}}">
            <div class="item-slider  col-lg-12 col-md-12 col-sm-12 p-0">
                <img src="{{asset($s->image)}}" alt=" " class="rounded">
            </div>
        </a>
        @endforeach
    </div>
    </div>
</section>
@endsection


@section('modal')

@endsection


@section('js')
@endsection