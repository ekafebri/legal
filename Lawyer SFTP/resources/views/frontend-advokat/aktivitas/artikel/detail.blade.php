@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')

<!-- artikel detil -->
<section class="ftco-section">
    <div class="container">
        <div class="row pt-5 ">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3 pt-5">{{$detail_artikel_saya->judul}}</h2>
                <p class="mb-0"><span
                        class="far fa-calendar-alt text-muted">{{date(' d F Y', strtotime($detail_artikel_saya->release_date))}}
                        &ensp;&bull;</span> <a class="text-danger px-2"> Oleh
                        {{$detail_artikel_saya->user->nama_lengkap}}</a>
                </p>

                <p>
                    <img src="{{asset($detail_artikel_saya->image)}}" alt="" class="img-fluid">
                </p>
                <p>{{$detail_artikel_saya->content}} </p>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <span class="icon-heart d-flex align-items-center" href="#">
                            <small>&ensp;{{count($detail_artikel_saya->like)}} suka</small></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="icon-chat  d-flex align-items-center"><small>&ensp;{{count($detail_artikel_saya->comment)}}
                                Komentar</small></span>

                    </div>
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <span class="icon-share"></span>
                    </div>
                </div>

                <!-- komentar -->
                <div class="pt-5 mt-5">
                    <h5 class="mb-5">{{count($detail_artikel_saya->comment)}} Komentar</h5>
                    @if (count($detail_artikel_saya->comment)==0)
                    <div class="row d-flex justify-content-center mt-3 mb-4 pt-4 pb-5">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_komentar_kosong.png"
                            class="img-fluid" style="width: 6rem;">
                    </div>
                    @else
                    <a href="" style="float: right;">Lihat semua</a>
                    <ul class="comment-list">
                        @foreach ($detail_artikel_saya->comment as $c)
                        <li class="comment">
                            <div class="vcard bio">
                                @if ($c->user->avatar=='')
                                <img src="{{url('public/avatar-default1.png')}}" class="rounded-circle img-fluid"
                                    style="height: 4rem; width: 4rem;">
                                @else
                                <img src="{{asset($c->user->avatar)}}" class="rounded-circle img-fluid"
                                    style="height: 4rem; width: 4rem;">
                                @endif
                            </div>
                            <div class="comment-body">
                                <h5>{{$c->user->nama_lengkap}}</h5>
                                <div class="meta">{{date(' d F Y  H:i', strtotime($c->created_at))}} WIB</div>
                                <p>{{$c->komentar}}
                                </p>
                                <hr>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <!-- END comment-list -->
                    <div class="comment-form-wrap pt-5">
                        <h5 class="mb-5">Tinggalkan Komentar</h5>
                        <form action="#" class="p-5 bg-light">
                            <div class="form-group p-5">
                                <textarea name="" id="message" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group px-3">
                                <input type="submit" value="Kirim Komentar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--  artikel lainya -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h5 class="heading-sidebar">Artikel Lainya</h5>
                    @if ($artikelsaya->isEmpty())
                    <p class="text-muted">Tidak Ada</p>
                    @else
                    @foreach ($artikelsaya as $a)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('{{ asset($a->image) }}')"></a>
                        <div class="text">
                            <h5 class="heading artikel">
                                <a href="{{url('advokat/artikel/'.$a->id)}}">
                                    {{$a->judul}}
                                </a>
                            </h5>
                            @if ($a->mode=='DRAF')
                            <p>Draf</p>
                            @else
                            <div class="meta">
                                <div><a href="#"><span
                                            class="far fa-calendar-alt"></span>{{date(' d M Y', strtotime($a->release_date))}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- .section -->


@endsection


@section('modal')
@endsection


@section('js')
@endsection