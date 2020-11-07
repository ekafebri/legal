@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Tertulis</h2>
            </div>
        </div>
        @if ($tertulis->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_report_kosong.png" alt=""
                    class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($tertulis as $t)
        <a href="{{url('advokat/tertulis/'.$t->id)}}">
            <div class="card mx-auto  p-3 mt-4 mb-5 " style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm ">
                            <div class="row justify-content-center">
                                @if($t->client->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" > 
                                @else
                                <img src="{{asset($t->client->avatar)}}"
                                class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">{{$t->client->nama_lengkap}}</h5>
                                <p class="text-info">
                                    @if($t->status== 'WAITING')
                                    Menunggu Advokat
                                    @elseif($t->status =='CONFRIM')
                                    Disetujui Advokat
                                    @elseif($t->status =='TOLAK')
                                    Ditolak Advokat
                                    @elseif($t->status =='PAID')
                                    Sudah Dibayar
                                    @elseif($t->status ==  'WAITING_PAYMENT')
                                    Menunggu Pembayaran
                                    @else
                                    {{$t->status}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 my-auto ">
                            <small class="text-muted d-flex justify-content-end ">{{date('d F Y', strtotime($t->created_at))}}</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Pengajuan Somasi {{$t->konsultasi->service->nama }}</p>
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