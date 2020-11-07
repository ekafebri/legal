@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10  text-center ftco-animate">
                <h2 class="pb-4">Buat Tagihan</h2>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-6  bg-light px-4 py-4 align-items-center">
                <div class="form-group mx-2">
                    <label for="exampleFormControlInput1">Nama Client</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                </div>
                <div class="form-group  mx-2">
                    <label for="exampleFormControlInput1">Layanan</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                </div>
                <div class="form-group  mx-2">
                    <label for="exampleFormControlInput1">Harga Layanan</label>
                    <input type="" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                </div>
                <div class="form-group  mx-2">
                    <label for="exampleFormControlInput1">Catatan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                <div class="form-group  mt-4 mx-2">
                    <button class="btn btn-lg btn-primary btn-block font-weight-bold">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection