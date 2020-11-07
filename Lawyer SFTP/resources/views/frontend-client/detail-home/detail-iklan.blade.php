@extends('frontend-client.layouts.app')

@section('css')
@endsection
@section('content')
<section class="hero-wrap js-fullheight" style="background-image:url('{{ asset($slider_iklan->image) }}')"
    data-section="home">

    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">

        </div>
    </div>
</section>

<section class="ftco-about ftco-no-pt ftco-no-pb img ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col d-flex order-md-last">
                <div class="row justify-content-start py-3 py-lg-5">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-5 text-center" style="font-size: 40px; text-transform: capitalize">
                            {{ $slider_iklan->judul }}</h2>
                        <div class="row">
                            <div class="col-lg-12 ftco-animate">
                                <p>{{ $slider_iklan->deskripsi }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection