@extends('frontend-advokat.layouts.app-putih')

@section('css')
<style>
.badge-danger {
    background: #FFD6D6;
    color: #FF2424;
    font-size: 20px
}


</style>

@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Update Peraturan</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($peraturan as $p)
            <div class="col-lg-12 py-3" style="width: 100%; border: none">
                <a href="{{url('advokat/peraturan/'.$p->id)}}"> 
                    <div class="card">
                        <div class="card-body">
                        <div class="row no-gutters d-flex justify-content-between">
                            <h5 class="px-4 py-2 my-auto">{{$p->nama_peraturan}}</h5>
                            <h5 class="px-4 py-2  my-auto">
                                <span class=" badge badge-danger px-3 py-2">{{$p->detail_count}}</span>
                            </h5>
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
@endsection


@section('js')
@endsection