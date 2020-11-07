@extends('frontend-client.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Kebijakan Privasi</h2>
            </div>
        </div>
        <div class="row p-2">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    {!!$privacy->content!!}
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