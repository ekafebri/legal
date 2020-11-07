@extends('frontend-client.layouts.app-putih')

@section('css')
<style>
    hr {
        border-top: 1px solid #007bff;
        width: 70%;
    }

    a {
        color: #000;
    }

    .card {
        background-color: #ffffff;
        padding: 0;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
    }

    .card:hover {
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
        color: black;
    }

    address {
        margin-bottom: 0px;
    }
</style>
@endsection

@section('content')
<section class="ftco-section block-23" style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-2">Legalitas Perusahaan</h2>
            </div>
        </div>

        <div class="row">
            @foreach($legalitas as $a)
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                    <a href="{{url('client/pembuatan_PT')}}">
                        <img class="card-img-top" src="{{asset($a->image)}}" alt="">
                        <div class="card-body" id="card">
                            <h5 class="card-title"><a href="{{url('client/pembuatan_PT')}}">{{$a->nama}}</a></h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- <div class="row">
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                    <a href="{{url('client/pembuatan_PT')}}">
                        <img class="card-img-top" src="{{url('public/plugins/frontend')}}/images/bg-6.png"
                            alt="Card image cap" />
                        <div class="card-body" id="card">
                            <h5 class="card-title">Pembuatan PT / CV / Firma</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                    <a href="{{url('client/pembuatan_PT')}}">
                        <img class="card-img-top" src="{{url('public/plugins/frontend')}}/images/bg-6.png"
                            alt="Card image cap" />
                        <div class="card-body" id="card">
                            <h5 class="card-title">Perizinan</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                    <a href="{{url('client/pembuatan_PT')}}">
                        <img class="card-img-top" src="{{url('public/plugins/frontend')}}/images/bg-6.png"
                            alt="Card image cap" />
                        <div class="card-body" id="card">
                            <h5 class="card-title">Pembuatan Akta</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                    <a href="{{url('client/pembuatan_PT')}}">
                        <img class="card-img-top" src="{{url('public/plugins/frontend')}}/images/bg-6.png"
                            alt="Card image cap" />
                        <div class="card-body" id="card">
                            <h5 class="card-title">Virtual Office</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                    <a href="{{url('client/pembuatan_PT')}}">
                        <img class="card-img-top" src="{{url('public/plugins/frontend')}}/images/bg-6.png"
                            alt="Card image cap" />
                        <div class="card-body" id="card">
                            <h5 class="card-title">Translator</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->
    </div>
</section>
@endsection