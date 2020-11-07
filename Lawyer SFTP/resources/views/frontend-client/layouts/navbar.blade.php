<nav class="navbar navbar-expand-lg navbar-dark ftco-navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Bursa Hukum</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
            data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item">
                    <a href="{{url('client/home')}}" class="nav-link"><span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('client/chat')}}" class="nav-link"><span>Konsultasi</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('client/riwayat')}}" class="nav-link"><span>Riwayat</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('client/profil')}}" class="nav-link"><span>Profil</span></a>
                </li>

                <li class="nav-item nav-link my-auto ">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" type="button" href="{{url('client/bantuan')}}">Bantuan</a>
                            <a class="dropdown-item" type="button" href="{{url('client/FAQ')}}">FAQ</a>
                            <a class="dropdown-item" type="button" href="{{url('client/kebijakan-privasi')}}">Kebijakan
                                Privasi</a>
                            <a class="dropdown-item text-danger" type="button" data-toggle="modal"
                                data-target="#logout-modal" href="#">Keluar</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>