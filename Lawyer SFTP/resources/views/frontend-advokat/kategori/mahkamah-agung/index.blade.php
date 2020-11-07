@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
    <!-- content -->
    <section class="ftco-section ">
        <div class="container">
            <div class="row justify-content-center my-4">
                <div class="col-md-10 text-center ftco-animate">
                    <h2 class="pb-3 font-weight-bold">Mahkamah Agung</h2>
                </div>
            </div>
            @foreach ($mahkamah_agung as $m)
            <div class="row justify-content-center  mb-3 ftco-animate">
                <div class="col-sm mx-5 my-3 alert alert-danger">
                <img src="{{asset($m->gambar)}}" alt="" class="rounded d-block mx-auto mt-3 " style="width: 15%;">
                    <div class="row justify-content-center">
                    <a href="{{$m->link}}" target="_blank" class="mx-auto d-block mb-3">{{$m->judul}}</a>
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