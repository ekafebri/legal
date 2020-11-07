@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
  <div class="container">
    <div class="row justify-content-center my-4">
      <div class="col-md-10 text-center ftco-animate">
        <h2 class="pb-3 font-weight-bold">FAQ</h2>
      </div>
    </div>
    <div class="row p-5">
     
      <div id="accordion">
         @foreach ($faq as $f)
        <div class="card">
          <div class="card-header" id="headingOne">
            <h3 class="mb-0">
              <button class="btn btn-link text-danger font-weight-bold" style="width: auto" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{$f->pertanyaan}}
              </button>
            </h3>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              {{$f->jawaban}}
            </div>
          </div>
        </div>
        
      @endforeach
      </div>
    </div>
  </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection

