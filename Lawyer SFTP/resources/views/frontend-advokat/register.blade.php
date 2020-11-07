<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
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
    .judul{
        word-wrap: break-word;
  width: 150px;
  height: auto;
      }
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
    
    /* .input[type="checkbox"][id^="cb"] {
        display: none;
    } */
    
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
            <div class="container">
                <h2 class="mb-5">Registrasi Bursa Legal</h2>
                <form method="POST" id="signup-form" class="signup-form">
                    <!-- step 1 -->
                    <h3>
                        <span>Data Diri</span>
                    </h3>
                    <fieldset>
                        <div class="fieldset-content">
                            <div class="col-md-8  mx-auto">
                                <div class="form-group mb-2">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" placeholder=" ">
                                </div>
                                <div class="form-group ">
                                    <label for="gender">Gender</label>
                                    <div class="input-group">
                                        <div class="radio-item">
                                            <input type="radio" id="lk" name="gender" value="lk">
                                            <label for="lk">Laki-Laki</label>
                                        </div>

                                        <div class="radio-item">
                                            <input type="radio" id="pr" name="gender" value="pr">
                                            <label for="pr">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2 ">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder=" ">
                                </div>
                                <div class="form-group ">
                                    <label for="gender">Tipe Akun</label>
                                    <div class="input-group">
                                        <div class="radio-item">
                                            <input type="radio" id="ad" name="tipe" value="ad">
                                            <label for="ad">Advokat</label>
                                        </div>

                                        <div class="radio-item">
                                            <input type="radio" id="kh" name="tipe" value="kh">
                                            <label for="kh">Kantor Hukum</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="exampleFormControlInput1">Nomor Telepon</label>
                                    <input type="" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                                </div>
                                <div class="form-group mb-2 ">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="exampleFormControlInput1">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                                </div>
                            </div>
                        </div>
                        <div class="fieldset-footer">
                            <span>1/3</span>
                        </div>
                    </fieldset>

                    <!-- step 2 -->
                    <h3>
                        <span class="title_text">Upload Berkas</span>
                    </h3>
                    <fieldset>
                        <div class="fieldset-content">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group mb-2">
                                    <label for="exampleFormControlInput1">Nomor KTP</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=" ">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="gender">KTP</label>
                                    <div action="/file-upload" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="gender">Kartu Peradi</label>
                                    <div action="/file-upload" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2 ">
                                    <label for="gender">Sumpah Acara Sumpah Dari Pengadilan Negeri Tinggi</label>
                                    <div action="/file-upload" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="fieldset-footer">
                            <span>2/3</span>
                        </div>
                    </fieldset>

                    <!-- step 3 -->
                    <h3>
                        <span class="title_text">Bidang Hukum</span>
                    </h3>
                    <fieldset>
                        <div class="fieldset-content">
                            <ul>
                                <div class=""  style="overflow: scroll;  width: 100%;height: 400px;">
                                @foreach ($service as $s)
                                <li> 
                                <input type="checkbox" style="display: none" id="{{$s->id}}"/>
                                    <label class="pilih" for="{{$s->id}}">
                                        <figure class="figure" style="">
                                            <img src="{{asset($s->gambar)}}" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0 judul" style="width: auto">{{$s->nama}}</p>
                                                {{-- <p class="text-danger mb-0">120 Lawyer</p> --}}
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                @endforeach
                            </div>
                            <div class="jumlah pt-3" style="width: auto; align-items: center;">
                                <div class="col-12 d-flex justify-content-center">
                                    <h4 class="text-danger text-weight-bold">7</h4>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <small class="text-center"><strong>Bidang Hukum dipilih</strong></small>
                                </div>
                            </div>
                        </div>
                        <div class="fieldset-footer">
                            <span>3/3</span>
                        </div>
                    </fieldset>
                </form>
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
    <script  src="{{url('public/plugins/fronted-advokat')}}/js/daftar.js"></script>
</body>

</html>