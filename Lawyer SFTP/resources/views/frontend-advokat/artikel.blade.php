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
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Artikel Saya</h2>
            </div>
        </div>
      <div class="row d-flex ">
          <div class="owl-carousel carousel-artikel ">
              <div class="item col-md-4 d-flex ftco-animate ">
                  <div class="card rounded mb-3">
                      <a href="artikel-detail.html">
                          <img class="card-img-top rounded-top " src="{{url('public/plugins/fronted-advokat')}}/images/img/artikel/img-artikel-2.jpg" alt="Card image cap " style="height: 300px;">
                          <div class="card-body">
                              <h5 class="artikel font-weight-bold">5 Langkah Law Firm dalam Membangun Konten yang Tepat Untuk Bertahan di Era New Normal</h5>
                              <small class="text-danger font-weight-bold">Dipublish Admin</small>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="item col-md-4 d-flex ftco-animate ">
                  <div class="card rounded mb-3">
                      <a href="artikel-detail.html">
                          <img class="card-img-top rounded-top " src="{{url('public/plugins/fronted-advokat')}}/images/img/artikel/img-artikel-4.jpg" alt="Card image cap " style="height: 300px;">
                          <div class="card-body">
                              <h5 class="artikel font-weight-bold">Trip dan Trik menjadi lawyer sukses dengan penghasilan puluhan juta</h5>
                              <small class="text-danger font-weight-bold">Dipublish Admin</small>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="item col-md-4 d-flex ftco-animate ">
                  <div class="card rounded mb-3">
                      <a href="artikel-detail.html">
                          <img class="card-img-top rounded-top " src="{{url('public/plugins/fronted-advokat')}}/images/img/artikel/img-artikel-1.jpg" alt="Card image cap " style="height: 300px;">
                          <div class="card-body">
                              <h5 class="artikel font-weight-bold">Cara Jitu menanggani Menjadi Kasus Perceraian</h5>
                              <small class="text-danger font-weight-bold">Dipublish Admin</small>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
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
                          <label for="appointment_name" class="text-black">Judul</label>
                          <input type="text" class="form-control" id="appointment_name">
                      </div>
                      <div class="form-group">
                          <label for="appointment_email" class="text-black">Sumber</label>
                          <input type="text" class="form-control" id="appointment_email">
                      </div>
                      <div class="form-group">
                          <label for="appointment_message" class="text-black">Deskripsi</label>
                          <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
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
                      <div class="form-group">
                          <input type="submit" value="Simpan Draf" class="btn" style="color:#FF2424 ;">
                          <input type="submit" value="Post" class="btn btn-primary" style="float: right;">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

@endsection


@section('js')
@endsection