@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<!-- content -->
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10  text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">Video Conference</h2>
            </div>
        </div>
        @if ($vicon->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_live_chat.png" alt=""
                    class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($vicon as $v)
        <a href="{{url('advokat/video-conference/'.$v->id)}}">
            <div class="card mx-auto  p-3 mt-4 mb-5 " style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm">
                            <div class="row justify-content-center">
                                @if($v->client->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid"
                                    style="height: 5rem; width: 5rem;">
                                @else
                                <img src="{{asset($v->client->avatar)}}" class="rounded-circle img-fluid"
                                    style="height: 5rem; width: 5rem;" alt="...">
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">{{$v->nama}}</h5>
                                <p class="text-info">
                                    @if($v->status== 'WAITING')
                                    Menunggu Advokat
                                    @elseif($v->status =='CONFRIM')
                                    Disetujui Advokat
                                    @elseif($v->status =='TOLAK')
                                    Ditolak Advokat Dengan Alasan "{{$v->alasan_tolak}}"
                                    @elseif($v->status =='PAID')
                                    Sudah Dibayar
                                    @elseif($v->status ==  'WAITING_PAYMENT')
                                    Menunggu Pembayaran
                                    @else
                                    {{$v->status}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 my-auto ">
                            <small
                                class="text-muted d-flex justify-content-end ">{{date('d F Y ', strtotime($v->created_at))}}</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Video conference {{$v->konsultasi->service->nama }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </a>
       
        @endforeach
        @endif
        {{-- <a href="{{url('advokat/video-conference/detail')}}">
        <div class="card mx-auto  p-3 mt-4 mb-5" style="max-width: auto;">
            <div class="row no-gutters">
                <div class="row card-body py-0">
                    <div class="col-lg col-md col-sm">
                        <div class="row justify-content-center">
                            <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg"
                                class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                        <div class="card-body pb-0">
                            <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                            <p class="text-info">Sudah Bayar</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3  my-auto ">
                        <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                    </div>
                    <div class="row card-body pb-0">
                        <p class="m-0 text-dark pl-2">Video Conference Pertanahan</p>
                    </div>
                </div>
            </div>

        </div>
        </a>
        <a href="video-detail-sudah.html">
            <div class="card mx-auto  p-3 mt-4 mb-5" style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm">
                            <div class="row justify-content-center">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg"
                                    class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6  pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                <p class="text-info">Sudah Bayar</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3  my-auto ">
                            <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Video Conference Pertanahan</p>
                        </div>
                    </div>
                </div>
            </div>
        </a> --}}
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection