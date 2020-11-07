@extends('frontend-client.layouts.app-putih')

@section('content')
<section class="services-section section-padding30 fix mb-5 ftco-section block-23"
    style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-2">Pembuatan PT / CV / Firma</h2>
            </div>
        </div>
        <div class="card" style="
            width: 100%;
            border: none;
            border-radius: 0%;
            padding: 16px;
            -webkit-box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2);
            box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
          ">
            <!-- <div class="card-body">
            
          </div> -->
            <div class="card" style="max-width: auto; border: none">
                <div class="row no-gutters">
                    <div class="row justify-content-around card-body">
                        <div class="col mx-auto my-auto text-center">
                            <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                class="rounded-circle img-fluid" style="height: 100px; width: 100px" alt="..." />
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold m-0">Andira Pramanta</h5>
                                <p class="card-text" style="color: #ff2424; font-size: 14px">S.H.,LL.M, M.Hum.</p>
                                <div style="color: #f7ce39; display: inline">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                &nbsp;(27 Reviews)
                            </div>
                        </div>
                        <div class="col-md-4 my-auto justify-content-center">
                            <h1 style="color: #ff2424">Rp 5.000.000</h1>
                            <p style="font-size: 14px"><em>* 2 Bulan Proses Pembuatan</em></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr />

            <div class="card mb-3" style="max-width: auto; border: none">
                <div class="card-body">
                    <h5 style="color: #ff2424">Deskripsi</h5>
                    <div style="font-size: 14px">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non ea, tempora consequatur
                            facilis explicabo iste obcaecati eos ratione
                            culpa mollitia saepe voluptate soluta? Quas fugiat perspiciatis, at odio sunt fuga.
                        </p>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero itaque eos eius inventore
                            incidunt, ratione eligendi culpa pariatur
                            aperiam autem tempore officia ducimus, placeat fugiat blanditiis! Eligendi aspernatur veniam
                            provident!
                        </p>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores porro, facere quam
                            reiciendis, veritatis dolor id veniam nobis
                            impedit necessitatibus repellendus repudiandae perspiciatis voluptatum explicabo nesciunt
                            alias aspernatur blanditiis libero?
                        </p>
                    </div>
                    <div style="font-size: 14px">
                        <p>
                            Desclaimer : <br />Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
                            repellat placeat quo? Nam eveniet ut laborum.
                            Unde accusantium possimus reprehenderit expedita deleniti rerum sit consectetur. Magnam
                            totam porro qui sunt.
                        </p>
                    </div>
                    <div style="font-size: 14px">
                        <h5>Persyaratan</h5>
                        <p>Mengupload beberapa data. yaitu:</p>
                        <ol>
                            <li>Data Pemegang saham</li>
                            <ol type="a">
                                <li>Jika Perorangan</li>
                                <ul>
                                    <li>KTP</li>
                                    <li>NPWP</li>
                                </ul>
                                <li>Jika Badan Usaha</li>
                                <ul>
                                    <li>Data Perusahaan</li>
                                    <li>Surat Keterangan Domisili Usaha</li>
                                </ul>
                            </ol>
                            <li>Data Direksi dan Dewan Komisaris</li>
                            <li>Melengkapi Form Pendirian Badan Usaha ...</li>
                        </ol>
                    </div>
                    <div style="font-size: 14px">
                        <h5>Tahapan</h5>
                        <ul>
                            <li>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur dolores possimus a
                                at eum architecto nesciunt impedit quae
                                pariatur, ipsum libero. Veniam, eum eaque. Numquam laudantium repellat cumque nulla
                                fugiat?
                            </li>
                            <li>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis sed harum, excepturi
                                tempora perferendis amet dolorem cumque
                                magnam eligendi doloribus, esse nulla! Dolore, officia. Ad architecto neque molestias
                                sint quasi.
                            </li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target="#modal-buat-sekarang">Buat Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modal')

<!-- Modal buat sekarang -->
<div class="modal fade" id="modal-buat-sekarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto; font-size: 14px">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Informasi Pembayaran</h5>
                        <p class="card-text m-0">Nomor Tagihan</p>
                        <p class="card-text"><strong>202098039287</strong></p>

                        <p class="card-text m-0">Layanan</p>
                        <p class="card-text"><strong>Pembuatan PT</strong></p>

                        <p class="card-text m-0">Nama Lawyer</p>
                        <p class="card-text"><strong>Andira Pramanta</strong></p>

                        <p class="card-text m-0">Total Tagihan</p>
                        <p class="card-text"><strong>Rp. 8.000.000</strong></p>

                        <h5 class="card-title font-weight-bold">Metode Pembayaran</h5>
                        <div class="form-group">
                            <label for="pembayaran">Pilih Pembayaran</label>
                            <select class="form-control" id="pembayaran" style="font-size: 14px">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-block">Buat Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection