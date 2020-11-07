@extends('frontend-client.layouts.app')

@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url('{{ asset($event->gambar) }}')"
    data-section="home">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight justify-content-center text-center"
            data-scrollax-parent="true">
            <div class="col-md ftco-animate" style="margin-top: 200px;"
                data-scrollax=" properties: { translateY: '70%' }">
                <h2 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$event->nama}}</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ftco-counter-wrap" style="margin-top: -200px;">
                    <div class="row no-gutters d-md-flex align-items-center align-items-stretch">
                        <div class="col d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                    <span>Tanggal</span>
                                    <strong>{{date(' d M Y', strtotime($event->tanggal))}}</strong>
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
                                    <strong>{{ $event->lokasi }}</strong>
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
                        <h2 class="mb-4" style="font-size: 36px; text-transform: capitalize">{{$event->nama}}</h2>
                        <p>
                            {{$event->deskripsi}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 sidebar ftco-animate">

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading-sidebar">Event Lainnya</h3>
                    @foreach ($events as $m)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image:url('{{ asset($m->gambar) }}')"></a>
                        <div class="text">
                            <h3 class="heading"><a href="{{url('client/detail_event/'.$m->id)}}">{{ $m->nama }}</a></h3>
                            <div class="meta">
                                <div>
                                    <a href="#"><span
                                            class="icon-calendar">&nbsp;</span>{{ date('d M Y', strtotime($m->tanggal)) }}</a>
                                </div>
                                <div>
                                    <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$m->lokasi}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4"
                            style="background-image:url({{URL('/')}}/public/plugins/frontend/images/event_festival.jpg)"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Event Festival Kebangsaan</a></h3>
                        <div class="meta">
                            <div>
                                <a href="#"><span class="icon-calendar"></span> March 12, 2019</a>
                            </div>
                            <div>
                                <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Jalan Soekarno
                                    Hatta</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4"
                        style="background-image:url({{URL('/')}}/public/plugins/frontend/images/event_dinner.jpg)"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Event Gala Dinner</a></h3>
                        <div class="meta">
                            <div>
                                <a href="#"><span class="icon-calendar"></span> March 12, 2019</a>
                            </div>
                            <div>
                                <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Hotel Srikandi</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
</section>
@endsection