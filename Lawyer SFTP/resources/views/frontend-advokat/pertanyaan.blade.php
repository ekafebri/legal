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
        <div class="row justify-content-center pb-3 ftco-animate">
            <div class="col-md-12 col-lg-12">
                <a href="{{url('advokat/pertanyaan/detail')}}">
                    <div class="card mx-auto  p-3 mb-5 bg-white" style="max-width: auto;">
                        <div class="row ">
                            <div class="row  card-body py-0">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-8 pl-0">
                                    <div class="card-body pb-0 mx-2">
                                        <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                        <p class="text-muted">29 Jul 2020</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 my-auto ">
                                    <h2 class="text-danger d-flex justify-content-end ">Rp. 800.000</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters ">
                            <div class="col-sm-12 pt-2">
                                <p class="m-0 text-dark pl-2">Kategori : Pertanahan</p>
                            </div>
                            <div class="col bg-light m-2">
                                <p class="text-dark p-3 m-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. It was popularised with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
                                    of Lorem Ipsum
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="text-info font-weight-bold d-flex justify-content-end"> 2 / 3 Lawyer
                                Menjawab</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-center pb-3 ftco-animate">
            <div class="col-md-12 col-lg-12">
                <a href="{{url('advokat/pertanyaan/detail')}}">
                    <div class="card mx-auto  p-3 mb-5 bg-white " style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body py-0">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-8 pl-0">
                                    <div class="card-body pb-0 mx-2">
                                        <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                        <p class="text-muted">29 Jul 2020</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 my-auto ">
                                    <h2 class="text-danger d-flex justify-content-end ">Rp. 800.000</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters ">
                            <div class="col-sm-12 pt-2">
                                <p class="m-0 text-dark pl-2">Kategori : Pertanahan</p>
                            </div>
                            <div class="col bg-light m-2">
                                <p class="text-dark p-3 m-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. It was popularised with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
                                    of Lorem Ipsum
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="text-info font-weight-bold d-flex justify-content-end"> 2 / 3 Lawyer
                                Menjawab</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection