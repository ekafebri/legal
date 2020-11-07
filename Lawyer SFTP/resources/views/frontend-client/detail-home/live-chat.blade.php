@extends('frontend-client.layouts.app-putih')

@section('css')
{{-- <style>
    .stats {
        border-top: 1px solid #ebeff2;
        background: #f7f8fa;
        overflow: auto;
        padding: 15px 0;
        font-size: 16px;
        color: #000;
        font-weight: 600;
        border-radius: 0 0 5px 5px;
    }

    .stats div {
        /* border-right: 1px solid #ebeff2; */
        width: 33.33333%;
        float: left;
        /* text-align: center */
    }

    .stats div:nth-of-type(3) {
        border: none;
    }
</style> --}}
@endsection

@section('content')
<section class="ftco-section block-23"
    style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                @if(request()->is('client/cari*'))
                    @if ($search=='')
                       <h2 class="mb-2">tidak ada</h2> 
                    @else
                    <h2 class="mb-2">Hasil Pencarian {{$search}}</h2>
                    @endif
                @else
                <h2 class="mb-2">ADVOKAT ONLINE</h2>
                @endif
            </div>
        </div>
        @foreach($advokat_online as $m)
        @if($m->status_app == true)
        <div class="card mb-3" style="
                    width: 100%;
                    border: none;
                    -webkit-box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
                    -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2);
                    box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
                  ">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        @if($m->avatar == '')
                        <img src="{{url('public/plugins/frontend')}}/images/img_profil_default.png" alt="Avatar"
                            width="120px" height="120px;" style="border-radius: 50%;">
                        @else
                        <img src="{{asset($m->avatar)}}" alt=""
                            style="border-radius: 50%; width: 120px; height:120px;" />
                        @endif
                    </div>
                    <div class="col-lg-8 align-self-center">
                        <h3>{{ $m->nama_lengkap }}</h3>
                        <p style="color: #ff2424">{{ $m->lawyer_detail->gelar }}</p>
                    </div>
                    <div class="col-lg-2 align-self-center">
                        <a href="{{url('client/detail_lawyer_online/'.$m->id)}}"
                            class="btn btn-primary btn-lg">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="stats mb-3">
            <div class="text-center align-self-center">
                @if($m->avatar == '')
                <img src="{{url('public/plugins/frontend')}}/images/img_profil_default.png" alt="Avatar" width="120px"
        height="120px;" style="border-radius: 50%;">
        @else
        <img src="{{asset($m->avatar)}}" alt="" style="border-radius: 50%; width: 120px; height:120px;" />
        @endif
    </div>
    <div class="mt-4">
        <h3>{{ $m->nama_lengkap }}</h3>
        <p style="color: #ff2424">S.H.,LL.M, M.Hum.</p>
    </div>
    <div class="text-center mt-4">
        <a href="{{url('client/detail_lawyer_online/'.$m->id)}}" class="btn btn-primary btn-lg">Detail</a>
    </div>
    </div> --}}
    @endif
    @endforeach

    </div>
</section>
@endsection