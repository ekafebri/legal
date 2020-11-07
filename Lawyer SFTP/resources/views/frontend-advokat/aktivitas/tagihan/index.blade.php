@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">Tagihan</h2>
            </div>
        </div>
        @if ($tagihan->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_invoice_kosong.png"
                    alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($tagihan as $t)
        
        <div class="row justify-content-center pb-3">
             <div class=" col-lg-12">
                <a href="#" data-toggle="modal" data-target="#modal-tagihan">
                    <div class="card mx-auto shadow p-3 mb-5 " style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col-lg col-md mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                    @if($t->client->avatar == '')
                                        <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    @else
                                        <img src="{{asset($t->client->avatar)}}"
                                        class="rounded-circle img-fluid" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    @endif
                                       
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7  pl-0">
                                    <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{$t->client->nama_lengkap}}</h5>
                                        <h6 class="text-info">
                                            @if ($t->status =='PAID')
                                            Sudah Dibayar           
                                            @else
                                            Menunggu Pembayaran 
                                            @endif
                                          
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3  my-auto">
                                    <p class="card-text text-muted">{{date('d F Y', strtotime($t->created_at))}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body">
                                <div class="col mx-auto my-auto">
                                    <h2>@rupiah($t->amount) </h2>
                                    <p class="card-title mb-0">Pengajuan Layanan
                                    @if ($t->type == 'VICON')
                                        Video Conference
                                    @elseif($t->type == 'LIVE_CHAT')
                                        Konsultasi
                                     @elseif($t->type == 'PENDAMPINGAN')
                                        Pendampingan
                                     @elseif($t->type == 'TERTULIS')
                                        somasi
                                     @elseif($t->type == 'PERTEMUAN')
                                        pertemuan
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
      
          @endforeach
          @endif
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection