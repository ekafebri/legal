<style>
  .span {
    color:  #FF2424;

}
.ftco-navbar-light.scrolled .navbar-brand {
    color: #FF2424;
    padding-top: 1rem;
    padding-bottom: 1rem;
    font-size: 24px;
}
.ftco-navbar-light.scrolled .nav-link.active {
    color: #FF2424 !important;
}
.ftco-navbar-light .navbar-nav > .nav-item > .nav-link span:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: 0;
    left: 0;
    background: #FF2424;
}
.btn {
background-color: #FF2424;
color: aliceblue;
}
.btn:hover {
    color:#FF2424;
    text-decoration: none;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
  id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html">MyPocketLawyer</a>
    <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle bg-red" type="button" data-toggle="collapse"
      data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav nav ml-auto">
        <li class="nav-item"><a href="{{url('/beranda')}}" class="nav-link"><span>Home</span></a></li>

        <li class="nav-item"><a href="#practice-section" class="nav-link"><span>Pertanyaan</span></a></li>
        <li class="nav-item"><a href="#blog-section" class="nav-link"><span>History</span></a></li>
      <li class="nav-item"><a href="{{url('/profil')}}" class="nav-link"><span>Profil</span></a></li>
        <li class="nav-item "><a href="#" class="btn rounded">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
