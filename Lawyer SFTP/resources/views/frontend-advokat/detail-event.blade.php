@extends('frontend-advokat.layouts.app')

@section('css')
@endsection

@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/event3.jpg)" data-section="home">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Event Malam Tahun Baru 2021</h1>
            </div>
        </div>
    </div>
</section>
<!-- deskripsi event -->
<section class="ftco-section bg-light" id="section-counter ">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3 pt-5">Event Tahun Baru 2021</h2>
                <p class="text-danger "><span class="far fa-calendar-alt"><strong> 10 juli 2020 </strong> </span> &nbsp;<span class="fas fa-map-marker-alt"><strong> Gedung Merdeka</strong></span></span>
                </p>
                <p>Beberapa event besar yang kami rekomendasikan di antaranya The Romantic Breeze with Kahitna yang akan berikan nuansa romantis. Yovie Widianto yang piawai melantunkan remantisme melalui musik dan syair lagu. akan menemani para penggemarnya
                    selama malam tahun baru di Hilton Doubletree, Cikini. Ada juga event ‘BigBang Jakarta yang akan menampilkan musisi ternama, seperti Ras Muhammad dan Steven Jam dan juga pesta kembang api, pertunjukkan laser, serta festival drone
                    saat malam tahun baru.</p>
                <p>Selain itu, Pemprov DKI berencana akan menyebar pusat hiburan tahun baru ke wilayah kota administratif. Tiga lokasi tersebut di antaranya, Pantai Ancol, Taman Mini Indonesia Indah, dan Jalan MH Thamrin. Khusus di Ancol, akan ditampilkan
                    sejumlah hiburan dengan tema Ancol Gempita Festival dan Pesona Indonesiaku.
                </p>
            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3 class="heading-sidebar">Event lainya</h3>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/img/event/img-event-1.jpg)"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Event Marketing Summer 2020</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> March 12, 2019</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/event2.jpg)"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even Konggres Lawyer di Malaysia</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> March 12, 2019</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/event5.jpg)"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Event Panasonic Global Award</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> March 12, 2019</a></div>
                            </div>
                        </div>
                    </div>
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