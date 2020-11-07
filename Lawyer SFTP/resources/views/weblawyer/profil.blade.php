@extends('weblawyer/layout')
@section('content')
<style>
    .card {
        margin: 10px 0;
        width: 100%;
    }

    .col-md-4 img{
        border: 1px solid red;
        border-radius:100px; 
        width: 200px;
        height: 200px;
        margin-left:auto;
        margin-right:auto;
      
        display:block;
    }
    .col-md-4{
        margin-top:auto;
        margin-bottom:auto;
    }
    .card{
        box-shadow: 0.2px grey;
    }
    .card .hari{
        margin-top:30px;
        background-color: #FF2424;
        color: white;
        text-align:center;
    }
    .card .hari h2{
        font-style: bold;
        color: white;
    }
    .card p{
        padding:0;
    }
</style>
<section>
    <div class="container">
        <div class="card md-6 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="https://cdn2.tstatic.net/pekanbaru/foto/bank/images/tarissa-maharani-dewi-pembawa-baki-nampan-sang-saka-merah-putih-2018_20180817_103556.jpg" class="card-img" >
                    <div class="card hari">
                        <h2>Nama lawyer</h2>
                        <p>192 hari</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><center>Informasi Pribadi</center></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Email </li>
                            <li class="list-group-item">Nomor Telepon</li>
                            <li class="list-group-item">Tanggal Lahir</li>
                            <li class="list-group-item">Gender</li>
                            <li class="list-group-item">Bidang Hukum</li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection