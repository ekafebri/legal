@extends('frontend-client.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Bantuan</h2>
            </div>
        </div>
        <div class="row d-md-flex  mt-5 d-flex ftco-animate">
            @foreach ($help as $h)
            <div class="col-lg-12 pb-3">
                <a href="{{url('client/help/'.$h->id)}}">
                    <div class="alert alert-danger rounded" role="alert">
                        <div class="row no-gutters text-dark">

                            <div class="col-2 d-flex justify-content-center my-auto">
                                @if ($h->id==2)
                                <i class="far fa-envelope" style="font-size: 40px"></i>
                                @elseif($h->id==1)
                                <i class="fas fa-phone-alt" style="font-size: 40px"></i>
                                @elseif($h->id==3)
                                <i class="fab fa-whatsapp" style="font-size: 40px"></i>
                                @elseif($h->id==4)
                                <i class="fab fa-youtube" style="font-size: 40px"></i>
                                @endif

                            </div>
                            <div class="col my-auto d-flex align-items-center ">
                                <h2 class="text-weight-bold py-auto">{{$h->name_contact}}</h2>
                            </div>
                            <div class="col-2  d-flex justify-content-center my-auto">
                                <i class="fas fa-angle-right" style="font-size: 40px"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- <div class="col-lg-12 pb-3">
                <a href="{{url('client/email')}}">
                    <div class="alert alert-danger rounded" role="alert">
                        <div class="row no-gutters text-dark">
                            <div class="col-2 d-flex justify-content-center my-auto">
                                <i class="fas fa-phone-alt" style="font-size: 40px"></i>
                            </div>
                            <div class="col my-auto d-flex align-items-center ">
                                <h2 class="text-weight-bold py-auto">Telepon</h2>
                            </div>
                            <div class="col-2  d-flex justify-content-center my-auto">
                                <i class="fas fa-angle-right" style="font-size: 40px"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-12 pb-3">
                <a href="{{url('client/email')}}">
                    <div class="alert alert-danger rounded" role="alert">
                        <div class="row no-gutters text-dark">
                            <div class="col-2 d-flex justify-content-center my-auto">
                                <i class="fab fa-whatsapp" style="font-size: 40px"></i>
                            </div>
                            <div class="col my-auto d-flex align-items-center ">
                                <h2 class="text-weight-bold py-auto">WhatsApp</h2>
                            </div>
                            <div class="col-2  d-flex justify-content-center my-auto">
                                <i class="fas fa-angle-right" style="font-size: 40px"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>
    </div>

</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection