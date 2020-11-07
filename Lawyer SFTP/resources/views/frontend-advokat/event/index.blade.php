@extends('frontend-advokat.layouts.app')

@section('css')
@endsection

@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url('{{ asset($event->gambar) }}')" data-section="home">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $event->nama}}</h1>
            </div>
        </div>
    </div>
</section>
<!-- deskripsi event -->
<section class="ftco-section bg-light" id="section-counter ">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3 pt-5">{{$event->nama}}</h2>
                <p class="text-danger "><span class="far fa-calendar-alt"><strong>{{date(' d M Y', strtotime($event->tanggal))}}</strong> </span> &nbsp;<span class="fas fa-map-marker-alt"><strong> Gedung Merdeka</strong></span></span>
                </p>
                <p>{{$event->deskripsi}}</p>
            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3 class="heading-sidebar">Event lainya</h3>
                    @foreach ($events as $e)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('{{ asset($e->gambar) }}')"></a>
                        <div class="text">
                        <h3 class="heading artikel"><a href="{{url('advokat/event/'.$e->id)}}">{{$e->nama}}</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> {{date('d M Y', strtotime($e->tanggal))}}</a></div>
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


@section('modal')
@endsection


@section('js')
@endsection