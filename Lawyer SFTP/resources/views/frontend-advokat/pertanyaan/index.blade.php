@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
{{-- pertanyaan --}}
<section class="ftco-section ">
        <div class="container">
            <div class="row justify-content-center my-4">
                <div class="col-md-10 text-center ftco-animate">
                    <h2 class="pb-3 font-weight-bold">Pertanyaan</h2>
                </div>
            </div>
          
            @if ($pertanyaan->isEmpty())
            <div class="row justify-content-center  ftco-animate">
                <div class="col-sm m-5 ">
                    <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_pertanyaan_kosong.png"
                        alt="" class="d-block mx-auto" style="width: 30%; ">
                    <div class="row justify-content-center">
                        <div class="col-sm-5 my-3">
                            <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @foreach ($pertanyaan as $p)
            <div class="row justify-content-center pb-3 ftco-animate">
                <div class="col-md-12 col-lg-12">
                    <a href="{{url('advokat/pertanyaan/'.$p->id)}}">
                        <div class="card mx-auto  p-3 mb-5 bg-white" style="max-width: auto;">
                            <div class="row ">
                                <div class="row  card-body py-0">
                                    <div class="col mx-auto my-auto pr-0">
                                        <div class="row justify-content-center">
                                            @if($p->user->avatar == '')
                                            <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" > 
                                            @else
                                            <img src="{{asset($p->user->avatar)}}" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0">
                                        <div class="card-body pb-0 mx-2">
                                            <h5 class="card-title mb-0 font-weight-bold">{{$p->user->nama_lengkap}}</h5>
                                            <p class="text-muted">{{date(' d M Y  H:i', strtotime($p->created_at))}} WIB</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 my-auto ">
                                        <h2 class="text-danger d-flex justify-content-end ">@rupiah($p->budget)</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters ">
                                <div class="col-sm-12 pt-2">
                                <p class="m-0 text-dark pl-2">Kategori : {{$p->kategori_layanan}}</p>
                                </div>
                                <div class="col bg-light m-2">
                                    <p class="text-dark p-3 m-0">
                                      {{$p->judul_pertanyaan}}
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <small class="text-info font-weight-bold d-flex justify-content-end"> {{count($p->jawaban)}} Lawyer
                                    Menjawab</small>
                            </div> --}}
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