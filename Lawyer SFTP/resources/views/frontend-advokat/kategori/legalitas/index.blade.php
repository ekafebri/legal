@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        @foreach ($legalitas as $l)
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
               
                    
                
            <h2 class="pb-3 font-weight-bold">{{$l->nama}}</h2>
            </div>
           
        </div>
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{ asset($l->image)}}" alt="" class="rounded d-block mx-auto" style="width: 15rem;height: 15rem; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold" style="text-align: center;">Selamat Datang </h5>
                        <h5 class="font-weight-bold" style="text-align: center;">di {{ $l->nama}}</h5>
                        <small class="text-muted d-flex justify-content-center">Fitur ini Hanya tersedia dengan akun tipe Notaris</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection