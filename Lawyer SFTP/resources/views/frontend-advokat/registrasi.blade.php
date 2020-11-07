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
@include('frontend-advokat.layouts.navbar-register')
<body style="background: 
    linear-gradient(
      rgba(7, 7, 7, 0.349),
      rgba(255, 253, 253, 0.199)
    ),
    url(images/bg_1.jpg) no-repeat;background-size: cover;background-attachment: fixed;">
    <div class="main">
        <div class="col-lg-8 mx-auto ">
            <div class="container">
                <h2 class="mb-5">Registrasi Bursa Advokat</h2>
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
                            <ul style="overflow: scroll;  width: 100%;height: 400px;">
                                <li><input type="checkbox" id="cb1" />
                                    <label class="pilih" for="cb1">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_11_hutang piutang.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Hutang Piutang</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb2" />
                                    <label class="pilih" for="cb2">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_12_property.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Property</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb3" />
                                    <label class="pilih" for="cb3">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_14_tax.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Pajak</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb4" />
                                    <label class="pilih" for="cb4">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_15_investmen.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Invetasi</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb5" />
                                    <label class="pilih" for="cb5">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_16_ company.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Perusahaan</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb6" />
                                    <label class="pilih" for="cb6">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_18_pertambangan.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Pertambangan</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb7" />
                                    <label class="pilih" for="cb7">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_4_pertanahan.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Pertanahan</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb8" />
                                    <label class="pilih" for="cb8">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_1_arbitration.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Warisan</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb9" />
                                    <label class="pilih" for="cb9">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_26_politics.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Politik</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb10" />
                                    <label class="pilih" for="cb10">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_29_ korupsi.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Korupsi</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb11" />
                                    <label class="pilih" for="cb11">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_10_ banking.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Banking</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                                <li><input type="checkbox" id="cb12" />
                                    <label class="pilih" for="cb12">
                                        <figure class="figure">
                                            <img src="{{url('public/plugins/fronted-advokat')}}/images/img/bidang-hukum/img_mpl_6_ employment.jpg" class="d-block rounded img-fluid"
                                                style="width: 150px;height: auto;">
                                            <figcaption class="figure-caption text-center py-2 font-weight-bold">
                                                <p class="text-dark mb-0">Pekerjaan</p>
                                                <p class="text-danger mb-0">120 Lawyer</p>
                                            </figcaption>
                                        </figure>
                                    </label>
                                </li>
                            </ul>
                            <div class="jumlah" style="width: auto; align-items: center;">
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

</body>

</html>