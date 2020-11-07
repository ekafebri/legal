@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
{{-- detail pertanyaan --}}
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Detail Pertanyaan</h2>
            </div>
        </div>
        <div class="card">
            <div class="row p-5">
                <div class="card-body m-3">
                    <div class="col pb-3">
                        <div class="row">
                            <div class="col-sm p-5">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle "
                                    style="height: 100px; width:100px;" alt="...">
                            </div>
                            <div class="col-sm-10  my-auto">
                                <div class="card-text">
                                    <h5 class="font-weight-bold m-0">Freza Ade</h5>
                                    <small class="text-muted">1 Agustus 2020 15.00 WIB</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-text">
                        <div class="col mb-2">
                            <h5 class="font-weight-bold mb-0">Sengketa Tanah Desa</h5>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto">Bidang Hukum</p>
                            <h6 class="font-weight-bold mx-auto mb-3">
                                Pertanahan
                            </h6>

                        </div>
                        <div class="col mb-2">
                            <p class="my-auto">Budget</p>
                            <h6 class="font-weight-bold mx-auto  mb-3  text-danger">
                                Rp. 800.000
                            </h6>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto">Jawaban Lawyer</p>
                            <h6 class="font-weight-bold mx-auto  mb-3 ">
                                2 / 3 Lawyer Menjawab
                            </h6>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto text-danger">Pertanyaan</p>
                            <p style="line-height: 1.5;">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                has
                            </p>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto text-danger">Penjelasan</p>
                            <p class="p-0 " style="line-height: 1.5;">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised
                            </p>
                            <p class="p-0 m-0" style="line-height: 1.5;">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived
                            </p>
                        </div>
                        <div class="col mt-4 ">
                            <div class="row">
                                <div class="col-sm mb-2 ">
                                    <button class=" btn btn-lg btn-primary btn-block font-weight-bold "
                                        data-toggle="modal" data-target="#modal-pertanyaan">Kirim Jawaban</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
  <!-- Modal pertanyaan -->
  <div class="modal fade" id="modal-pertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Jawab Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="form-group">
                    <label for="exampleInputPassword1">Judul</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" style="line-height: 1.5;"></textarea>
                </div>
                <button type="button" class="btn btn-primary btn-block ">
                    Kirim Jawaban
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection