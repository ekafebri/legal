<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi | Bursa Hukum</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/open-iconic-bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/dropzone.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/style-daftar.css">
    <link rel="stylesheet" href="{{url('public/plugins/fronted-advokat')}}/css/style.css">
</head>
<style>
    .radio-item {
        display: inline-block;
        position: relative;
        padding: 0 6px;
    }

    .radio-item input[type='radio'] {
        display: none;
    }

    .radio-item label:before {
        content: " ";
        display: inline-block;
        position: relative;
        top: 5px;
        margin: 0 5px 0 0;
        width: 20px;
        height: 20px;
        border-radius: 11px;
        border: 1px solid #FF2424;
        background-color: transparent;
    }

    .radio-item input[type=radio]:checked+label:after {
        border-radius: 11px;
        width: 12px;
        height: 12px;
        position: absolute;
        top: 9px;
        left: 10px;
        content: " ";
        display: block;
        background: #FF2424;
    }

    /* bidang hukum */

    ul {
        list-style-type: none;
    }

    li {
        display: inline-block;
    }

    input[type="checkbox"][id^="cb"] {
        display: none;
    }

    .pilih {
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .pilih::before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .pilih img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+.pilih::before {
        content: "✓";
        background-color: rgb(253, 11, 11);
        transform: scale(1);
    }

    :checked+.pilih img {
        transform: scale(0.9);
        z-index: -1;
    }
</style>

<body style="background: 
    linear-gradient(
      rgba(7, 7, 7, 0.349),
      rgba(255, 253, 253, 0.199)
    ),
    url({{URL('/')}}/public/plugins/fronted-advokat/images/bg_1.jpg);background-size: cover;background-attachment: fixed;">
    <div class="main">
        <div class="col-lg-8 mx-auto ">
            <div class="container" style="width: 70%;">
                <div class="mx-auto">
                    <div class="card shadow p-0 mb-5 bg-white rounded my-auto mx-auto p-2" style="border-radius: 10%;">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li><br>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="card-body">
                            <h3 class="text-center mb-5 "><b> REGISTRASI </b></h3>
                            <h5 class="mb-0"><b>Selamat Bergabung di Bursa Hukum</b></h5>
                            <p><small>Silahkan mendaftar</small> </p>
                            <div>
                            <form action="{{url('client/register')}}" method="post">
                            @csrf
                                <div class="form-group ">
                                    <label for="exampleFormControlInput1">NAMA LENGKAP</label>
                                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" required value="{{old('nama_lengkap')}}">
                                </div>
                                <div class="form-group ">
                                    <label for="gender">JENIS AKUN</label>
                                    <div class="input-group">
                                        <div class="radio-item">
                                            <input class="gender" type="radio" id="ritema" name="type" value="PERORANGAN" checked>
                                            <label for="ritema">Perorangan</label>
                                        </div>

                                        <div class="radio-item">
                                            <input class="gender" type="radio" id="ritemb" name="type" value="PERUSAHAAN">
                                            <label for="ritemb">Perusahaan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleFormControlInput1">EMAIL</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email@domain.com" name="email" required value="{{old('email')}}">
                                </div>

                                <div class="form-group ">
                                    <label for="exampleFormControlInput1">SANDI</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="********" name="password" required>
                                </div>
                                <div class="form-group ">
                                    <label for="exampleFormControlInput1">KONFIRMASI SANDI</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="********" name="password_confirmation" required>
                                </div>
                                <div class="form-group ">
                                    <label for="exampleFormControlInput1">NOMOR TELPON</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="08123456789" name="telp" required value="{{old('telp')}}">
                                </div>
                                <div class="form-group ">
                                    <label for="exampleFormControlInput1">ALAMAT</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama jalan rumah" name="alamat" required value="{{old('alamat')}}">
                                </div>
                                <div class="form-group ">
                                    <label for="gender">JENIS KELAMIN</label>
                                    <div class="input-group">
                                        <div class="radio-item">
                                            <input class="gender" type="radio" id="ritema" name="jenis_kelamin" value="LK" checked>
                                            <label for="ritema">Pria</label>
                                        </div>

                                        <div class="radio-item">
                                            <input class="gender" type="radio" id="ritemb" name="jenis_kelamin" value="PR">
                                            <label for="ritemb">Wanita</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{url('public/plugins/fronted-advokat')}}/JSregister/jquery/jquery.min.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/JSregister/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/JSregister/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/JSregister/jquery-steps/jquery.steps.min.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/JSregister/minimalist-picker/dobpicker.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/JSregister/jquery.pwstrength/jquery.pwstrength.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/js/bootstrap.min.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/js/dropzone.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{url('public/plugins/fronted-advokat')}}/js/daftar.js"></script>
</body>

</html>