@extends('frontend-advokat.layouts.app')

@section('css')
@endsection

@section('content')

{{-- gambar --}}
<section>
    <img src="{{asset($slider_iklan->image)}}" class="slider-detail" alt="">
</section>

{{-- keterangan --}}
<section class="ftco-section  pt-3 bg-light">
    <div class="container  ">
        <div class="row justify-content-center my-5">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">{{$slider_iklan->judul}}</h2>
            </div>
        </div>
        <p>
            {{$slider_iklan->deskripsi}}
        </p>

    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection