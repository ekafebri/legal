@extends('landing.layouts.app')
@section('css')
@endsection
@section('content')

<section class="ftco-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{$artikel->judul}}</h2>
        <div style="font-size: 16px"><span class="icon-calendar"></span>  {{date('d-m-Y H:i:s', strtotime($artikel->release_date))}} <span class="icon-person"></span> {{$artikel->user->nama_lengkap}}</div>

        <p>
            <img src="images/image_3.jpg" alt="" class="img-fluid" />
        </p>
        <p>
            {{$artikel->content}}
        </p>

        <div class="pt-5 mt-5">
            <div class="row mb-4">
            <div class="col-2 text-center"><span class="icon-heart"></span> {{$artikel->like->count()}} Suka</div>
            <div class="col-3 text-center"><span class="icon-chat"></span> {{$artikel->comment->count()}} Komentar</div>
            <div class="col-2">
                <a href="#" style="color: darkgray"><i class="fa fa-share-alt"></i></a>
            </div>
            </div>
            <ul class="comment-list">
            @foreach($artikel->comment as $m)
            <li class="comment">
                <div class="vcard bio">
                <img src="{{asset($m->user->avatar)}}" alt="Image placeholder" />
                </div>
                <div class="comment-body">
                <h3>
                    {{$m->user->nama_lengkap}}
                </h3>
                <div class="meta">03 Oktober 2020 14:41</div>
                <p>
                    {{$m->komentar}}
                </p>
                </div>
            </li>
            <!-- END comment-list -->
            @endforeach

            <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Tinggalkan Komentar</h3>
            <form action="#" class="p-5 bg-light">
                <div class="form-group">
                <label for="message">Komentar</label>
                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                <input type="submit" value="Post" class="btn py-3 px-4 btn-primary" />
                </div>
            </form>
            </div>
        </div>
        </div>

        <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box">
            <form action="{{url('blog/artikel').'/'.$artikel->id}}" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" name="search" class="form-control" placeholder="Cari Artikel Disini" />
            </div>
            </form>
        </div>

        <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Artikel Lainnya</h3>
            @foreach($allartikel as $m)
            <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{url('public/storage/'.$m->image)}})"></a>
            <div class="text">
                <h3 class="heading"><a href="{{url('blog/artikel/'.$m->id)}}">{{$m->judul}}</a></h3>
                <div class="meta">
                <div>
                    <a href="#"><span class="icon-calendar"></span> {{date('d-m-Y H:i:s', strtotime($m->release_date))}}</a>
                </div>
                <div>
                    <a href="#"><span class="icon-person"></span> {{$m->user->nama_lengkap}}</a>
                </div>
                <div>
                    <a href="#"><span class="icon-chat"></span> {{$m->comment->count()}}</a>
                </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>
<!-- .section -->

@endsection
@section('js')
@endsection
