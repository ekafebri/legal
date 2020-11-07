@extends('landing.layouts.app')
@section('css')
@endsection
@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url({{url('public/storage/'.$event->gambar)}})" data-section="home">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$event->nama}}</h1>
        </div>
    </div>
    </div>
</section>

<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="ftco-counter-wrap">
            <div class="row no-gutters d-md-flex align-items-center align-items-stretch">
            <div class="col d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-calendar"></span>
                    </div>
                    <span>Tanggal</span>
                    <strong>{{date('d-M-Y', strtotime($event->tanggal))}}</strong>
                </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-map-marker"></span>
                    </div>
                    <span>Lokasi</span>
                    <strong>{{$event->lokasi}}</strong>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="ftco-about ftco-no-pt ftco-no-pb img ftco-section bg-light">
    <div class="container">
    <div class="row d-flex">
        <div class="col-md-6 col-lg-6 d-flex order-md-last">
        <div class="row justify-content-start py-3 py-lg-5">
            <div class="col-md-12 heading-section ftco-animate">
            <span class="subheading">Event</span>
            <h2 class="mb-4" style="font-size: 44px; text-transform: capitalize">{{$event->nama}}</h2>
            <p>
                {{$event->deskripsi}}
            </p>
            </div>
        </div>
        </div>

        <div class="col-lg-5 sidebar ftco-animate">
        <div class="sidebar-box mt-3">
            <form action="{{url('blog/event').'/'.$event->id}}" class="search-form" method="get">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" name="search" class="form-control" placeholder="Cari Event Disini" />
            </div>
            </form>
        </div>

        <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Event Lainnya</h3>
            @foreach($allevent as $m)
            <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{url('public/storage/'.$m->gambar)}})"></a>
            <div class="text">
                <h3 class="heading"><a href="{{url('blog/event/'.$m->id)}}">{{$m->nama}}</a></h3>
                <div class="meta">
                <div>
                    <span class="icon-calendar"> {{date('d-M-Y', strtotime($event->tanggal))}}</span>
                </div>
                <div>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{$m->lokasi}}
                </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>

@endsection
@section('js')
@endsection
