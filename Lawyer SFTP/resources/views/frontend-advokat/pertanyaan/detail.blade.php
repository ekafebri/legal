@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
{{-- detail pertanyaan --}}
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Detail Pertanyaan</h2>
            </div>
        </div>
        <div class="card ">
            <div class="row px-4 py-2">
                <div class="card-body  ">
                    <div class="col pb-3">
                        <div class="row">
                            <div class="col-sm p-5">
                                @if($pertanyaan_detail->user->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle "
                                    style="height: 125px; width:125px;">
                                @else
                                <img src="{{asset($pertanyaan_detail->user->avatar)}}" class="rounded-circle "
                                    style="height: 125px; width:125px;" alt="...">
                                @endif
                            </div>
                            <div class="col-sm-10  my-auto">
                                <div class="card-text">
                                    <h5 class="font-weight-bold m-0">{{$pertanyaan_detail->user->nama_lengkap}}</h5>
                                    <small
                                        class="text-muted">{{date('d F Y  H:i ', strtotime($pertanyaan_detail->created_at))}}WIB
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-text">
                        <div class="col mb-2">
                            <h5 class="font-weight-bold mb-0"> {{$pertanyaan_detail->kategori_layanan}}</h5>
                        </div>
                        <div class="col mb-2">
                            <h6 class="font-weight-bold mx-auto  mb-3  text-info">
                                @rupiah($pertanyaan_detail->budget)
                            </h6>
                        </div>
                    </div>

                    <div class="col mb-2">
                        <p class="my-auto font-weight-bold">Pertanyaan</p>
                        <p style="line-height: 1.5;">
                            {{$pertanyaan_detail->judul_pertanyaan}}
                        </p>
                    </div>
                    <div class="col mb-2">
                        <p class="my-auto font-weight-bold">Penjelasan</p>
                        <p class="p-0 " style="line-height: 1.5;">
                            {{$pertanyaan_detail->penjelasan}}
                        </p>
                    </div>
                    <?php
                         $jawab = json_decode($pertanyaan_detail->jawaban);
                    ?>
                    @if ($jawab==[])
                    <div class="col mt-4 ">
                        <div class="row">
                            <div class="col-sm mb-2 ">
                                <button class=" btn btn-lg btn-primary btn-block font-weight-bold " data-toggle="modal"
                                    data-target="#modal-pertanyaan">Kirim Jawaban</button>
                            </div>
                        </div>
                    </div>
                    @else
 
                    <div class="col mb-2 ">
                        <p class="my-auto font-weight-bold  mb-2">Jawaban</p>
                                           @foreach ($jawab as $j)
                        <div class="row justify-content-center pb-3 ftco-animate">
                            <div class="col-md-12 col-lg-12">
                                <div class="card mx-auto  shadow-none mb-5 bg-white" style="max-width: auto;">
                                    @foreach ($akun as $item)
                                    <div class="row ">
                                        <div class="row  card-body pt-3 mx-2">
                                            <div class="col-lg-1 col-md col-sm mx-auto my-auto pr-0">
                                                <div class="row justify-content-center">
                                                            @if($item->avatar == '')
                                                <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid "
                                                    style="height: 4rem; width: 4rem;">
                                                @else
                                                            <img src="{{asset($item->avatar)}}"
                                                class="rounded-circle img-fluid  " style="height: 5rem; width: 5rem;"
                                                alt="...">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-11 col-md-10 col-sm-9 px-4 py-auto d-flex text-align-center">
                                            
                                            <div class="row no-gutters">  <h5 class="card-title mb-0 font-weight-bold my-auto">{{$item->nama_lengkap}}</h5>
                                          

                                          </div>
                                          
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                               
                                <div class="row no-gutters ">
                                   
                                    <div class="col-sm-12 pt-2 mx-2">
                                        <p class="m-0 text-dark pl-2">Kategori : {{$j->judul_jawaban}}</p>
                                    </div>
                                    <div class="col bg-light m-2">
                                        <p class="text-dark p-3 m-0">
                                          {{$j->deskripsi_jawaban}}
                                        </p>
                                    </div>
                                </div>
                            
                        </div>
                        @endforeach
                    </div>
                    
                    @endif
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
<!-- Modal pertanyaan -->
<div class="modal fade" id="modal-pertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Jawab Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="form-group">
                    <label for="exampleInputPassword1">Judul</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"
                        style="line-height: 1.5;"></textarea>
                </div>
                <div class="form-group pt-3">
                    <button type="button" class="btn btn-primary btn-block ">
                        Kirim Jawaban
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection