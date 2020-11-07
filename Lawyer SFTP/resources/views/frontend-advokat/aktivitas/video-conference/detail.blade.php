@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10  text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">Detail Video Conference</h2>
            </div>
        </div>
        <div class="card">
            <div class="row p-3">
                <div class="card-body m-3">
                    <div class="col pb-3">
                        <div class="row">
                            <div class="col-sm p-5">
                                @if($vicon_detail->client->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle " style="height: 125px; width:125px;" > 
                                @else
                                <img src="{{asset($vicon_detail->client->avatar)}}" class="rounded-circle " style="height: 125px; width:125px;" alt="...">
                                @endif
                            </div>
                            <div class="col-sm-10  my-auto">
                                <div class="card-text">
                                    <h5 class="font-weight-bold m-0">{{$vicon_detail->nama}}</h5>
                                <small class="text-muted"> {{date(' d F Y  H:i', strtotime($vicon_detail->created_at))}} WIB </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-text">
                        <div class="col mb-2">
                            <h5 class="font-weight-bold mb-0">Detail Pengajuan</h5>
                        </div>
                        <div class="col mb-2">
                            <small class="row  font-weight-bold justify-content-end mx-auto " style="color: #FF2424;">#PNSF24356OP89JK</small>
                            <p class="my-auto">Bidang Hukum</p>
                            <h6 class="font-weight-bold mx-auto mb-3">
                                {{$vicon_detail->konsultasi->service->nama }}
                            </h6>

                        </div>
                        <div class="col mb-2">
                            <p class="my-auto"> Durasi</p>
                            <h6 class="font-weight-bold mx-auto  mb-3 ">
                                {{$vicon_detail->durasi}} jam
                            </h6>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto"> Tanggal dan Waktu Video Conference</p>
                            <h6 class="font-weight-bold mx-auto  mb-3 ">
                                {{date('l, d F Y  H:i', strtotime($vicon_detail->tgl_pengajuan))}} WIB 
                            </h6>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto">Status</p>
                            <h6 class="font-weight-bold mx-auto">
                                    @if($vicon_detail->status== 'WAITING')
                                    Menunggu Advokat
                                    @elseif($vicon_detail->status =='CONFRIM')
                                    Disetujui Advokat
                                    @elseif($vicon_detail->status =='TOLAK')
                                    Ditolak Advokat 
                                    @elseif($vicon_detail->status =='PAID')
                                    Sudah Dibayar
                                    @elseif($vicon_detail->status ==  'WAITING_PAYMENT')
                                    Menunggu Pembayaran
                                    @else
                                    {{$vicon_detail->status}}
                                    @endif
                            </h6>
                        </div>
                        @if($vicon_detail->status== 'WAITING')
                         <div class="col mt-4">
                            <div class="alert alert-danger " style="color: #FF2424;" role="alert">
                                <i class="icon-info-circle my-auto mr-2" style="float:left;font-size:25px ;"></i> Link Pertemuan Akan dikirimkan Admin setelah Client melakukan Pembayaran
                            </div>
                        </div> 
                         <div class="col mt-4 ">
                            <div class="row">
                                <div class="col-sm mb-2 ">
                                    <button class=" btn btn-lg btn-outline-danger btn-block font-weight-bold " data-toggle="modal" data-target="#modal-tolak">Tolak</button>
                                </div>
                                <div class="col-sm mb-2 ">
                                    <button class=" btn btn-lg btn-primary btn-block font-weight-bold " data-toggle="modal" data-target="#modal-setuju">Setuju</button>
                                </div>
                            </div>
                        </div>
                        @elseif($vicon_detail->status =='PAID')
                        <div class="col mt-4">
                            <div class="alert alert-danger " style="color: #FF2424; text-align: center;" role="alert">
                                Url Video Conference Selama 2 jam
                                <p class="text-danger" style="font-size: 2vw;"><strong>{{$vicon_detail->link}}</strong></p>
                                <button class="btn btn-outline-danger">Salin URL</button>
                            </div>
                        </div>
                        @elseif($vicon_detail->status =='TOLAK')
                        <div class="col mb-2">
                            <p class="my-auto">Alasan Ditolak</p>
                            <h6 class="font-weight-bold mx-auto  mb-3 ">
                                {{$vicon_detail->alasan_tolak}} 
                            </h6>
                        </div>
                        @endif    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
    <!-- Modal setuju -->
    <div class="modal fade" id="modal-setuju" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document ">
            <div class="modal-content ">
                <div class="modal-body mx-3 ">
                    <div class="row justify-content-center ">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/setuju.png " style="width: 40%; ">
                    </div>
                    <div class="row justify-content-center ">
                        <p class="font-weight-bold my-3 ">Apakah Anda Bersedia Melakukan Video Conference?</p>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-sm ">
                            <button type="button " class="btn btn-outline-danger btn-block font-weight-bold my-2 " data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-sm ">
                        <a type="button " class="btn btn-primary btn-block font-weight-bold my-2 " href="{{url('advokat/buat-tagihan')}}"> Setujui</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal tolak -->
    <div class="modal fade" id="modal-tolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document ">
            <div class="modal-content ">
                <div class="modal-body mx-3 ">
                    <div class="row justify-content-center pt-3">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/ic-lawyer-batal.png" style="width: 40%; ">
                    </div>
                    <div class="row justify-content-center ">
                        <p class="font-weight-bold ">Apakah Anda Ingin Menolaknya?</p>
                    </div>
                    <div class="form-group ">
                        <label for="appointment_message " class="text-black ">ALASAN PENOLAKAN</label>
                        <textarea name=" " id="appointment_message " class="form-control " cols="30 " rows="5 "></textarea>
                    </div>
                    <div class=" form-group ">
                        <div class="row ">
                            <div class="col-sm ">
                                <button type="button " class="btn btn-outline-danger btn-block font-weight-bold my-2 " data-dismiss="modal">Batal</button>
                            </div>
                            <div class="col-sm ">
                                <button type="button " class="btn btn-primary btn-block font-weight-bold my-2 ">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
@endsection