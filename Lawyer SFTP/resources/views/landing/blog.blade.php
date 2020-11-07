@extends('landing.layouts.app')
@section('css')
    <style>
      .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #14a823;
        z-index: 2;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
      }

      .text-float {
        position: fixed;
        width: 150px;
        height: 30px;
        bottom: 110px;
        right: 40px;
        padding: 4px;
        background-color: #fff;
        z-index: 2;
        color: #636362;
        border-radius: 5px;
        text-align: center;
        font-size: 12px;
      }

      .my-float {
        margin-top: 22px;
      }

      .float:hover {
        color: white;
      }
    </style>

    <!-- style navbar -->
    <style>
      .button-round {
        border-radius: 30px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        /* background-color: #1fc0ae; */
        background-color: #edb5ab;
        color: #fff;
      }
      .button-round-nav {
        border-radius: 30px;
        text-align: center;
        background-color: #ff2424;
        /* background-color: #1fc0ae; */
        color: #fff;
      }
      .button-line-nav {
        border-radius: 30px;
        text-align: center;
        /* border: solid 1px #1fc0ae; */
        border: solid 1px #ff2424;
        background-color: #fff;
        /* color: #1fc0ae; */
        color: #ff2424;
      }
    </style>

    <!-- Style card -->
    <style>
      .post-slide2 {
        margin: 0 15px;
        box-shadow: 0 1px 2px rgba(43, 59, 93, 0.3);
        margin-bottom: 2em;
      }

      .post-slide2 .post-img {
        overflow: hidden;
      }

      .post-slide2 .post-img img {
        width: 550px;
        height: 300px;
        /* height: auto; */
        transform: scale(1);
        transition: all 1s ease-in-out 0s;
      }

      .post-slide2:hover .post-img img {
        transform: scale(1.08);
      }

      .post-slide2 .post-content {
        background: #fff;
        height: 110px;
        padding: 20px;
      }

      .post-slide2 .post-title {
        font-size: 17px;
        font-weight: 600;
        margin-top: 0;
        text-transform: capitalize;
      }

      .post-slide2 .post-title a {
        display: inline-block;
        color: grey;
        transition: all 0.3s ease 0s;
      }

      .post-slide2 .post-title a:hover {
        color: #3d3030;
        text-decoration: none;
      }

      .post-slide2 .post-description {
        font-size: 15px;
        color: #676767;
        line-height: 24px;
        margin-bottom: 14px;
      }

      .post-slide2 .post-bar {
        padding: 0;
        margin-bottom: 0px;
        list-style: none;
      }

      .post-slide2 .post-bar li {
        color: #676767;
        padding: 2px 0;
      }

      .post-slide2 .post-bar li i {
        margin-right: 5px;
      }

      .post-slide2 .post-bar li a {
        display: inline-block;
        font-size: 12px;
        color: grey;
        transition: all 0.3s ease 0s;
      }

      .post-slide2 .post-bar li a:after {
        content: ",";
      }

      .post-slide2 .post-bar li a:last-child:after {
        content: "";
      }

      .post-slide2 .post-bar li a:hover {
        color: #3d3030;
        text-decoration: none;
      }

      .post-slide2 .read-more {
        display: inline-block;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        background: #ff2424;
        border-bottom-right-radius: 10px;
        text-transform: capitalize;
        transition: all 0.3s linear;
      }

      .post-slide2 .read-more:hover {
        background: #333;
        text-decoration: none;
      }

      /* Style Pemberitahuan */

      .alert {
        padding: 10px;
        background-color: #f2bcb8;
        color: #ff2424;
        font-size: 16px;
      }

      .alert2 {
        padding: 10px;
        background-color: #ffeeec;
        color: #000;
        font-size: 16px;
      }
    </style>
@endsection
@section('content')
<!-- Event -->
<section class="ftco-section" style="padding-top: 120px; padding-bottom: 0">
    <div class="container">
    <div class="row justify-content-center mb-3s pb-5">
        <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Event</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ftco-animate">
        <div class="owl-carousel carousel-event">
            @foreach($event as $m)
            <div class="post-slide2">
            <div class="post-img">
                <a href="{{url('blog/event/'.$m->id)}}"><img class="card-img-top" src="{{asset($m->gambar)}}" alt="" style="height: 250px" /></a>
            </div>
            <div class="post-content">
                <h3 class="post-title"><a href="#">{{$m->nama}}</a></h3>
                <ul class="post-bar">
                <li style="font-size: 14px"><i class="icon-calendar"></i>{{date('d-M-Y H:i:s', strtotime($m->tanggal))}}</li>
                </ul>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>

<!-- Artikel -->
<section class="ftco-section" style="padding-top: 30px; padding-bottom: 30px">
    <div class="container">
    <div class="row justify-content-center mb-3s pb-5">
        <div class="col-md-10 heading-section text-center ftco-animate">
        <h2 class="mb-1">Artikel</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ftco-animate">
        <div class="owl-carousel carousel-testimony">
            @foreach($artikel as $m)
            <div class="post-slide2">
                <div class="post-img">
                    <a href="{{url('blog/artikel/'.$m->id)}}"><img class="card-img-top" src="{{asset($m->image)}}" alt="" style="height: 300px" /></a>
                </div>
                <div class="post-content">
                    <h3 class="post-title"><a href="#">{{$m->judul}}</a></h3>
                    <ul class="post-bar">
                    <li style="font-size: 14px"><i class="icon-calendar"></i>{{date('d-M-Y', strtotime($m->release_date))}}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
@section('js')
@endsection
