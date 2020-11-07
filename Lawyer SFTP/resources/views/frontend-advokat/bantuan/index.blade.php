@extends('frontend-advokat.layouts.app-putih')

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
                @if ($h->id==4)
                   <a  data-toggle="modal" data-target="#modal-youtube" >
                @else
                   <a href="{{$h->contact}}">
                @endif
                    <div class="alert alert-danger rounded" role="alert">
                        <div class="row no-gutters text-dark">
                        
                            <div class="col-2 d-flex justify-content-center my-auto">
                                @if ($h->id==2)
                                <i class="far fa-envelope" style="font-size: 40px"></i>
                                @elseif($h->id==1)
                                <i class="fas fa-phone-alt"style="font-size: 40px"></i>
                                @elseif($h->id==3)
                                <i class="fab fa-whatsapp"style="font-size: 40px"></i>
                                @elseif($h->id==4)
                                <i class="fab fa-youtube"style="font-size: 40px; color:#ff2424;"></i>
                                @endif
                            </div>
                            <div class="col my-auto d-flex align-items-center ">
                                <h2 class="text-weight-bold py-auto">{{$h->name_contact}}</h2>
                            </div>
                            <div class="col-2  d-flex justify-content-center my-auto">
                                <i class="fas fa-angle-right" style="font-size: 38px"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</section>
@endsection


@section('modal')
<div class="modal fade" id="modal-youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tutorial Youtube</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @foreach ($link as $k => $l)
                <div class="alert alert-danger rounded" role="alert">
                    <div class="row no-gutters text-dark">
                        <div class="col-2 d-flex justify-content-center my-auto">
                            <i class="fab fa-youtube"style="font-size: 40px; color:#ff2424;"></i>
                        </div>
                       
                        <div class="col my-auto d-flex align-items-center ">
                            <a class="text-weight-bold py-auto text-dark" href="  {{asset($l)}}">   {{$k}} </a>
                        </div>
                        <div class="col-2  d-flex justify-content-center my-auto">
                            <i class="fas fa-angle-right" style="font-size: 40px"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection


@section('js')
@endsection