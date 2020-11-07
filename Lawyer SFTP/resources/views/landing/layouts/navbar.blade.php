<nav class="navbar navbar-expand-lg ftco-navbar-light site-navbar-target scrolled awake" id="ftco-navbar">
    <div class="container">
    <a class="navbar-brand" style="color: #ff2424;" href="{{request()->is('legal*')?url('legal'):url('/')}}">Bursa {{request()->is('legal*')?'Legal':'Hukum'}}</a>
    <button
        class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle"
        type="button"
        data-toggle="collapse"
        data-target="#ftco-nav"
        aria-controls="ftco-nav"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav nav">
        <li class="nav-item {{request()->is('/')?'active':''}}">
            <a href="{{url('/')}}" class="nav-link"><span>Tentang Kami</span></a>
        </li>
        <li class="nav-item dropdown">
            <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >
            Produk Kami
            </a>

            @include('landing.layouts.produk')
        </li>
        <li class="nav-item">
            <a href="{{request()->is('legal*')?url('/'):url('legal')}}" class="nav-link"><span>Bursa {{request()->is('legal*')?'Hukum':'Legal'}}</span></a>
        </li>
        <li class="nav-item {{request()->is('blog')?'active':''}}">
            <a href="{{url('blog')}}" class="nav-link"><span>Blog</span></a>
        </li>
        <li class="nav-item {{request()->is('berita')?'active':''}}">
            <a href="{{url('berita')}}" class="nav-link"><span>Berita</span></a>
        </li>
        </ul>
        <ul class="navbar-nav nav ml-auto"></ul>
        <a href="{{url('client')}}" class="btn button-line-nav my-2 my-sm-0 py-2 px-4" style="border-radius: 30px">Masuk</a>
        <a href="{{url('client/register')}}" class="btn button-round-nav m-2 py-2 px-4" style="border-radius: 30px">Daftar</a>
    </div>
    </div>
</nav>