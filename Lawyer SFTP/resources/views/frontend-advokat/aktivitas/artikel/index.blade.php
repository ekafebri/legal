@extends('frontend-advokat.layouts.app-putih')

@section('css')
<style>
  .float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 40px;
      right: 40px;
      background-color: #FF2424;
      z-index: 2;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 2px 2px 3px #999;
  }
  
  .my-float {
      margin-top: 22px;
  }
</style>
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10  text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">Artikel Saya</h2>
            </div>
        </div>
        @if ($artikelsaya->isEmpty())
            <div class="row justify-content-center  ftco-animate">
                <div class="col-sm m-5 ">
                    <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_artikel_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                    <div class="row justify-content-center">
                        <div class="col-sm-5 my-3">
                            <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                        </div>
                    </div>
                </div>
            </div>
             @else
        <div class="row d-flex ">
            <div class="owl-carousel carousel-artikelsaya d-flex justify-content-center">
                @foreach ($artikelsaya as $a)
                <div class="item col-md-4 d-flex ftco-animate ">
                    <div class="card rounded mb-3">
                        @if ($a->mode=='DRAF')
                        <a data-toggle="modal" data-target="#modal-edit-artikel-{{$a->id}}">
                        @else()
                        <a href="{{url('advokat/artikel/'.$a->id)}}">
                        @endif
                      
                        <img class="card-img-top rounded-top " src="{{asset($a->image)}}" alt="Card image cap " style="height: 300px;">
                            <div class="card-body">
                                <h5 class="artikel font-weight-bold">{{$a->judul}}</h5>
                                @if ($a->mode == 'DRAF')
                                    Draf
                                @else
                                <small class="text-danger font-weight-bold">Dipublish {{$a->user->nama_lengkap}}</small>   
                                @endif

                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
        @endif
  </div>
</section>

<a href="#" class="float" data-toggle="modal" data-target="#modal-artikel">
  <i class="fa fa-plus my-float"></i>
</a>
@endsection


@section('modal')
    <!-- Modal Buat Artikel -->
    <div class="modal fade" id="modal-artikel" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalAppointmentLabel">Tambah Artikel Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="#">
                      <div class="form-group">
                          <label for="appointment_name" class="text-black mb-1">Judul</label>
                          <input type="text" class="form-control" id="appointment_name">
                      </div>
                      <div class="form-group">
                          <label for="appointment_email" class="text-black mb-1">Sumber</label>
                          <input type="text" class="form-control" id="appointment_email">
                      </div>
                      <div class="form-group">
                          <label for="appointment_message" class="text-black mb-1">Deskripsi</label>
                          <textarea name="" id="appointment_message" class="form-control" cols="30" rows="7"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="">Gambar</label>
                         
                          <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01">
                                  <label class="custom-file-label" for="inputGroupFile01">pilih gambar</label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group pt-2">
                          <input type="submit" value="Simpan Draf" class="btn btn-outline-danger " style="color:#FF2424 ;">
                          <input type="submit" value="Post" class="btn btn-primary" style="float: right;">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

     <!-- Modal Edit Artikel -->
     @foreach ($artikelsaya as $a)
     <div class="modal fade" id="modal-edit-artikel-{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAppointmentLabel">Edit Artikel Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="appointment_name" class="text-black mb-1">Judul</label>
                        <input type="text" class="form-control" id="appointment_name" value="{{$a->judul}}">
                        </div>
                        <div class="form-group">
                            <label for="appointment_email" class="text-black mb-1">Sumber</label>
                            <input type="text" class="form-control" id="appointment_email" value="{{$a->sumber}}">
                        </div>
                        <div class="form-group">
                            <label for="appointment_message" class="text-black mb-1">Deskripsi</label>
                            <textarea name="" id="appointment_message" class="form-control" cols="30" rows="7">{{$a->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <p><img class="card-img-top rounded-top " src="{{asset($a->image)}}" alt="Card image cap " style="width:100% ;height:300px" ></p>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" value="">
                                    <label class="custom-file-label" for="inputGroupFile01">pilih gambar</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <input type="submit" value="Simpan Draf" class="btn btn-outline-danger " style="color:#FF2424 ;">
                            <input type="submit" value="Post" class="btn btn-primary" style="float: right;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection


@section('js')

@endsection