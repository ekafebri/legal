@extends('frontend-client.layouts.app')

@section('css')
<style>
  body {
    font-family: 'Roboto', sans-serif;
  }
</style>
@endsection
@section('content')
<section class="hero-wrap js-fullheight"
  style="background-image:url({{URL('/')}}/public/plugins/frontend/images/bg-5.png)" data-section="home">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end"
      data-scrollax-parent="true">
      <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" style="margin-left: 15px" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Halo
          {{ session()->get('user')->nama_lengkap }}</h1>
        <p class="mb-4" style="margin-left: 15px" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
          Selamat Datang di My Pocket Legal
        </p>
        <div class="s130">
          <form action="{{url('client/cari')}}" method="GET">
            <div class="inner-form">
              <div class="input-field first-wrap">
                <div class="svg-wrapper">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                      d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                    </path>
                  </svg>
                </div>
                <input type="text" name="search" placeholder="Cari Advokat" />
              </div>
              <div class="input-field second-wrap">
                <button class="btn-search" type="submit">CARI</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Start Slider Iklan -->
<section class="ftco-section" style="padding-top: 20px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel carousel-iklan">
          @foreach($slider_client as $a)
          <div class="report-module">
            <div class="thumbnail" style="height: 500px">
              <a href="{{url('client/detail_client/'.$a->id)}}"><img src="{{asset($a->image)}}" /></a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</section>
<!-- End Slider Iklan -->

<!-- Start Pemberitahuan -->
<section class="ftco-section" style="padding-top: 15px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row justify-content-center pb-4">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Pemberitahuan</h2>
      </div>
    </div>

    <div class="ftco-animate">
      @foreach($notifikasi as $m)
      @if($m->status == true)
      <div class="alert">
        @else
        <div class="alert" style="background-color:white;color:black;">
          @endif
          <div class="d-flex">
            <div class="p-2">{{$m->message}}</div>
            <div class="ml-auto p-2"><i class="fa fa-bell" style="font-size: 22px" aria-hidden="true"></i></div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row justify-content-end mt-4">
        <div class="col-2">
          <a href="#" data-toggle="modal" data-target="#modalPemberitahuan">
            <p class="text-right">Lihat Semua &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
          </a>
        </div>
      </div>
    </div>
</section>
<!-- End Pemberitahuan -->

<!-- Start Layanan Favorite -->
<section class="ftco-section ftco-no-pb ftco-services" style="padding-top: 25px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row justify-content-center pb-4">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Layanan Favorit</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel carousel-bidang mb-5">
          @foreach ($layanan as $l)
          <div class="post-slide4">
            @if($l->id == 4)
            <a href="{{url('client/detail_probono/')}}">
              @elseif($l->id == 5)
              <a href="{{url('client/legalitas/')}}">
                @elseif($l->id == 6)
                <a href="#modal-invoice" data-toggle="modal" data-target="#modal-invoice">
                  @elseif($l->id == 8)
                  <a href="{{url('client/peraturan/')}}">
                    @elseif($l->id == 7)
                    <a href="#modal-kantor" data-toggle="modal" data-target="#modal-kantor">
                      <!-- <a href="{{url('client/kantor/')}}"> -->

                      @endif

                      <div class="post-img">
                        <img src="{{asset($l->image)}}" alt="" />
                      </div>
                    </a>
                    <div class="post-content">
                      <h3 class="post-title">{{$l->nama}}</h3>
                    </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>
<!-- End Layanan Favorite -->

<!-- Start Live Chat -->
<section class="ftco-section" style="padding-top: 10px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row justify-content-center pb-4">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Advokat Online</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="card" style="width: 95%; padding: 15px">
        <div class="card-body">
          <div class="row text-center justify-content-center">
            <div class="text d-flex align-items-center">
              <span class="position" style="font-size: 20px">{{ $jumlah_advokat_online }} Advokat Online saat ini</span>
            </div>
          </div>
          <hr style="width: 50%;">
          <div class="row justify-content-center mt-5 mb-3" style="padding-left: 70px;">
            @foreach($advokat_online as $a)
            @if($a->status_app == true)
            <div class="col-md" style="margin-left: -60px;">
              <div class="ftco-animate">
                <div class="staff" style="margin-bottom: 20px;">
                  <div class="img-wrap d-flex align-items-stretch">
                    @if($a->avatar == '')
                    <div class="img align-self-stretch"
                      style="background-image:url({{URL('/')}}/public/plugins/frontend/images/img_profil_default.png); border: solid 4px #fff;">
                    </div>
                    @else
                    <div class="img align-self-stretch"
                      style="background-image:url('{{ asset($a->avatar) }}'); border: solid 4px #fff;"></div>
                    @endif
                  </div>
                </div>
              </div>

            </div>
            @endif
            @endforeach
          </div>


          <a href="{{url('client/live_chat')}}" class="btn btn-primary btn-lg btn-block">Lihat Advokat Online</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Live Chat -->

<!-- Start App -->
<section class="ftco-section" style="padding-top: 70px; padding-bottom: 70px; top: -70px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="card ftco-animate" style="
              width: 95%;
              -webkit-box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
              -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2);
              box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
            ">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="{{url('public/plugins/frontend')}}/images/logo-bursa-hukum.png" alt=""
                style="border-radius: 50%; width: 100px; height: 100px" />
            </div>
            <div class="col-md-8 align-self-center">
              <h3><strong>Bursa Hukum</strong></h3>
            </div>
            <div class="col-md-2 align-self-center">
              <a href="#" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End App -->

<!-- Start Bidang Hukum -->
<section class="ftco-section ftco-no-pb ftco-services" style="padding-top: 10px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Layanan Hukum</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="owl-carousel carousel-bidang mb-5">
          @foreach($bidang_hukum as $h)
          <div class="post-slide4">
            <a href="{{url('client/detail_hukum/'.$h->id)}}">
              <div class="post-img">
                <img src="{{asset($h->gambar)}}" alt="" />
              </div>
            </a>

            <div class="post-content">
              <h3 class="post-title">{{$h->nama}}</h3>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Bidang Hukum -->

<!-- Start Artikel Terbaru -->
<section class="ftco-section" style="padding-top: 10px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row justify-content-center mb-3s pb-5">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Artikel Terbaru</h2>
      </div>
    </div>
    {{-- <div class="col-md-12 ">
      <div class="owl-carousel carousel-event-client">
        @foreach ($artikel as $a)
        <div class="item">
          <div class="col d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
              <a href="{{url('client/detail_artikel/'.$a->id)}}" class="block-20"
    style="background-image: url('{{ asset($a->image) }}')"> </a>
    <div class="text mt-3 float-right d-block">
      <div class="text">
        <h3 class="heading">
          <a href="{{url('client/detail_artikel')}}">{{$a->judul}}</a>
        </h3>
      </div>
      <p>{{date(' d M Y', strtotime($a->release_date))}}</p>
      <div class="d-flex align-items-center mt-4 meta">

      </div>
    </div>
  </div>
  </div>
  </div>
  @endforeach
  </div>
  </div> --}}
  <div class="row">
    <div class="col-md-12 ftco-animate">
      <div class="owl-carousel carousel-testimony">
        @foreach ($artikel as $a)
        <div class="post-slide2" style="height: 350px;">
          <div class="post-img">
            <a href="{{url('client/detail_artikel/'.$a->id)}}"><img class="card-img-top" src="{{asset($a->image)}}"
                alt="" style="height: 200px;" /></a>
          </div>
          <div class="post-content">
            <h3 class="post-title"><a href="{{url('client/detail_artikel')}}">{{$a->judul}}</a></h3>
            <ul class="post-bar">
              <li style="font-size: 14px"><i class="icon-calendar"></i>{{date(' d M Y', strtotime($a->release_date))}}
              </li>
            </ul>

          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </div>
</section>
<!-- End Artikel Terbaru -->

<!-- Start Event -->
<section class="ftco-section" style="padding-top: 40px; padding-bottom: 0; top: -70px;">
  <div class="container">
    <div class="row justify-content-center mb-3s pb-5">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Event</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="owl-carousel carousel-event-client">
          @foreach($event as $m)
          <div class="post-slide2">
            <div class="post-img">
              <a href="{{url('client/detail_event/'.$m->id)}}"><img class="card-img-top" src="{{asset($m->gambar)}}"
                  alt="" style="height: 250px;" /></a>
            </div>
            <div class="post-content">
              <h3 class="post-title"><a href="{{url('client/detail_event')}}">{{$m->nama}}</a></h3>
              <ul class="post-bar">
                <li style="font-size: 14px"><i class="icon-calendar"></i>{{date(' d M Y', strtotime($m->tanggal))}}</li>
              </ul>

            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Event Terbaru -->

<!-- Start Slider Iklan -->
<section class="ftco-section" style="padding-top: 10px; padding-bottom: 40px; top: -70px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel carousel-iklan">
          @foreach($slider_iklan as $p)
          <div class="report-module">
            <div class="thumbnail" style="height: 500px">
              <a href="{{url('client/detail_iklan/'.$p->id)}}"><img src="{{asset($p->image)}}" /></a>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Slider Iklan -->
@endsection

@section('modal')
<!-- Modal Penawaran -->
<div class="modal fade" id="modal-invoice" tabindex="-1" aria-labelledby="modal-invoice" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajukan Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 20px">
        <div class="card mb-3" style="max-width: auto">
          <div class="card-body" style="font-size: 14px; padding: 20px">
            <form class="needs-validation" novalidate>
              <div class="form-group" style="color: black">
                <label for="validationTooltip01">JUDUL BANTUAN</label>
                <input type="text" class="form-control" style="font-size: 14px" id="validationTooltip01"
                  placeholder="Judul Bantuan" required />
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip01">LAYANAN HUKUM YANG DICARI</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbKontrak" id="rbKontrak" value="option1"
                    checked />
                  <label class="form-check-label" for="rbKontrak"> Pembuatan Kontrak </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbOpinion" id="rbOpinion" value="option2" />
                  <label class="form-check-label" for="rbOpinion"> Legal Opinion </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbPerceraian" id="rbPerceraian" value="option2" />
                  <label class="form-check-label" for="rbPerceraian"> Perceraian </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbKepolisian" id="rbKepolisian" value="option2" />
                  <label class="form-check-label" for="rbKepolisian"> Pendampingan Kepolisian </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbSomasi" id="rbSomasi" value="option2" />
                  <label class="form-check-label" for="rbSomasi"> Somasi </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbHutang" id="rbHutang" value="option2" />
                  <label class="form-check-label" for="rbHutang"> Hutang Piutang </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbKepailitan" id="rbKepailitan" value="option2" />
                  <label class="form-check-label" for="rbKepailitan"> Kepailitan </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbPertanahan" id="rbPertanahan" value="option2" />
                  <label class="form-check-label" for="rbPertanahan"> Sengketa Pertanahan </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbPengadilan" id="rbPengadilan" value="option2" />
                  <label class="form-check-label" for="rbPengadilan"> Penanganan Perkara di Pengadilan </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbLainnya" id="rbLainnya" value="option2" />
                  <label class="form-check-label" for="rbLainnya"> Lainnya </label>
                </div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip02">BUDGET</label>
                <input type="text" class="form-control" style="font-size: 14px" id="validationTooltip01"
                  placeholder="Budget Penanganan Kasus" required />
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip03">PERTANYAAN</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip03">PENJELASAN</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <button class="btn btn-primary btn-block" type="submit">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Kantor Hukum -->
<div class="modal fade" id="modal-kantor" tabindex="-1" aria-labelledby="modal-kantor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kantor Hukum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 20px">
        <div class="card mb-3" style="max-width: auto">
          <div class="card-body" style="font-size: 14px; padding: 20px">
            <form class="needs-validation" novalidate>
              <div class="form-group" style="color: black">
                <label for="validationTooltip01">JUDUL BANTUAN</label>
                <input type="text" class="form-control" style="font-size: 14px" id="validationTooltip01"
                  placeholder="Judul Bantuan" required />
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip01">LAYANAN HUKUM YANG DICARI</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbKontrak" id="rbKontrak" value="option1"
                    checked />
                  <label class="form-check-label" for="rbKontrak"> Pembuatan Kontrak </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbOpinion" id="rbOpinion" value="option2" />
                  <label class="form-check-label" for="rbOpinion"> Legal Opinion </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbPerceraian" id="rbPerceraian" value="option2" />
                  <label class="form-check-label" for="rbPerceraian"> Perceraian </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbKepolisian" id="rbKepolisian" value="option2" />
                  <label class="form-check-label" for="rbKepolisian"> Pendampingan Kepolisian </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbSomasi" id="rbSomasi" value="option2" />
                  <label class="form-check-label" for="rbSomasi"> Somasi </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbHutang" id="rbHutang" value="option2" />
                  <label class="form-check-label" for="rbHutang"> Hutang Piutang </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbKepailitan" id="rbKepailitan" value="option2" />
                  <label class="form-check-label" for="rbKepailitan"> Kepailitan </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbPertanahan" id="rbPertanahan" value="option2" />
                  <label class="form-check-label" for="rbPertanahan"> Sengketa Pertanahan </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbPengadilan" id="rbPengadilan" value="option2" />
                  <label class="form-check-label" for="rbPengadilan"> Penanganan Perkara di Pengadilan </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rbLainnya" id="rbLainnya" value="option2" />
                  <label class="form-check-label" for="rbLainnya"> Lainnya </label>
                </div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip02">Pilih Lokasi</label>
                <input type="text" class="form-control" style="font-size: 14px" id="validationTooltip01"
                  placeholder="Pilih Provinsi" required />
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip02">Pilih Kota</label>
                <input type="text" class="form-control" style="font-size: 14px" id="validationTooltip01"
                  placeholder="Pilih Kota" required />
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip03">PERTANYAAN</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <div class="form-group" style="color: black">
                <label for="validationTooltip03">PENJELASAN</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div class="valid-tooltip">Field ini harus diisi</div>
              </div>
              <button class="btn btn-primary btn-block" type="submit">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Pemberitahuan -->
<div class="modal fade" id="modalPemberitahuan" tabindex="-1" role="dialog" aria-labelledby="modalPemberitahuanLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPemberitahuanLabel">Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 20px">
        @foreach($notifikasi1 as $m)
        @if($m->status == true)
        <div class="alert">
          @else
          <div class="alert" style="background-color:white;color:black;">
            @endif
            <div class="d-flex">
              <div class="p-2">{{$m->message}}</div>
              <div class="ml-auto p-2"><i class="fa fa-bell" style="font-size: 22px" aria-hidden="true"></i></div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('js')

  @endsection