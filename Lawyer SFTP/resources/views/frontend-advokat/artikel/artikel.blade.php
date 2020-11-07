@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')

<!-- artikel detil -->
<section class="ftco-section">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3 pt-5">Peranan Hukum Dalam Pertanggungjawaban Perbuatan Pemerintahan</h2>
                <p><span class="far fa-calendar-alt text-muted"> 1 Desember 2020 &bull;</span> <a
                        class="text-danger px-2"> Oleh Hotman Paris</a>
                </p>

                <p>
                    <img src="{{url('public/plugins/fronted-advokat')}}/images/img/artikel/img-artikel-2.jpg" alt="" class="img-fluid">
                </p>
                <p>Reformasi hukum merupakan salah satu amanat penting dalam rangka pelaksanaan agenda reformasi
                    nasional. Di dalamnya tercakup agenda penataan kembali berbagai institusi hukum dan politik mulai
                    dari tingkat pusat sampai pada tingkat
                    pemerintahan desa, pembaharuan berbagai perangkat peraturan perundangundangan mulai dari UUD sampai
                    ke tingkat Peraturan Desa dan pembaruan dalam sikap, cara berpikir dan berbagai aspek perilaku
                    masyarakat hukum kearah kondisi
                    yang sesuai dengan tuntutan perkembangan zaman. </p>
                <p> Dengan perkataan lain dalam agenda reformasi hukum telah tercakup pengertian reformasi kelembagaan
                    (institutional reform), reformasi perundang-undangan (instrumental reform), dan reformasi budaya
                    hukum (cultural reform).Reformasi
                    hukum harus pula dimulai dari kondisi pemerintah yang baik. Pemerintahan yang sehat dan tegas akan
                    mendukung apapun langkah reformasi yang diamanatkan. Pemerintah sebagai subjek hukum yang berarti
                    pula dapat melakukan perbuatan
                    hukum, maka pemerintah sangat berpotensi melakukan penyimpangan atau pelanggaran hukum. Mengapa
                    demikian? Menurut James Madison, dalam tulisannya yakni Federalist Papers menyatakan “if men were
                    angels, no government would be
                    necessary. If angels were to govern men neither external nor internal controls on government would
                    be necessary”.</p>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <span class="icon-heart d-flex align-items-center" href="#"> <small> 70 suka</small></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="icon-chat  d-flex align-items-center"><small> 6 Komentar</small></span>

                    </div>
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <span class="icon-share"></span>
                    </div>
                </div>

                <!-- komentar -->
                <div class="pt-5 mt-5">
                    <h5 class="mb-5">6 Komentar</h5><a href="" style="float: right;">Lihat semua</a>
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h5>Jodi Tirani</h5>
                                <div class="meta">October 03, 2018 at 2:21pm</div>
                                <p>Artikel ini sangat membantu
                                </p>
                                <hr>
                            </div>
                        </li>
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h5>Abdul Qadir</h5>
                                <div class="meta">October 03, 2018 at 2:21pm</div>
                                <p>good
                                </p>
                                <hr>
                            </div>
                        </li>
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
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/image_1.jpg);"></a>
                        <div class="text">
                            <h5 class="heading artikel"><a href="#">Pembentukan PPRS Tahun 2020</a>
                            </h5>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> 4 Agustus 2020</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/image_2.jpg);"></a>
                        <div class="text">
                            <h5 class="heading artikel"><a href="#">Hukum yang Berlaku di Negara Indonesia</a>
                            </h5>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> 11 juli 2020</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{URL('/')}}/public/plugins/fronted-advokat/images/image_3.jpg);"></a>
                        <div class="text">
                            <h5 class="heading artikel"><a href="#">cara Mendapatkan Layanan Probono mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm</a>
                            </h5>
                            <div class="meta">
                                <div><a href="#"><span class="far fa-calendar-alt"></span> 20 Agustus 2020</a></div>
                            </div>
                        </div>
                    </div>
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