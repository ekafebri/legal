@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">Pendampingan</h2>
            </div>
        </div>
        @if ($pendampingan->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_belum_ada_pendampingan.png"
                    alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($pendampingan as $p)
        <a href="{{url('advokat/pendampingan/'.$p->id)}}">
            <div class="card mx-auto  p-3 mt-4 mb-5 bg-white " style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm ">
                            <div class="row justify-content-center">
                                @if($p->client->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid"
                                    style="height: 5rem; width: 5rem;">
                                @else
                                <img src="{{asset($p->client->avatar)}}" class="rounded-circle img-fluid"
                                    style="height: 5rem; width: 5rem;" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">{{$p->client->nama_lengkap}}</h5>
                                <p class="text-info">
                                    @if($p->status== 'WAITING')
                                    Menunggu Advokat
                                    @elseif($p->status =='CONFRIM')
                                    Disetujui Advokat
                                    @elseif($p->status =='TOLAK')
                                    Ditolak Advokat 
                                    @elseif($p->status =='PAID')
                                    Sudah Dibayar
                                    @elseif($p->status ==  'WAITING_PAYMENT')
                                      Menunggu Pembayaran
                                    @else
                                    {{$p->status}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4  my-auto ">
                            <small
                                class="text-muted d-flex justify-content-end ">{{date('d F Y ', strtotime($p->created_at))}}</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Pendampingan {{$p->konsultasi->service->nama }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    
        @endforeach
        @endif
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection