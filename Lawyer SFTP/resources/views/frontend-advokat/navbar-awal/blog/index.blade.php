@extends('frontend-advokat.layouts.app-register')

@section('css')
@endsection

@section('content')

<!-- artikel -->
<body class="bg-light">
    <section class="ftco-section mt-5" id="blog-section ">
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
</body>

@endsection


@section('js')
@endsection