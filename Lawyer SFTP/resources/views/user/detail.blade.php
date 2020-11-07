@extends('layouts.app')
@section('title')
{{request()->is('user-client*')?'Client':'Lawyer'}}
@endsection
@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail {{request()->is('user-client*')?'Client':'Lawyer'}}</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">{{request()->is('user-client*')?'Client':'Lawyer'}} {{$user->nama_lengkap}}</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td>:</td>
                    <td>{{$user->telp}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$user->alamat}}</td>
                </tr>
                @if($user->role == 'LAWYER')
                <tr>
                    <td>Gelar</td>
                    <td>:</td>
                    <td>{{$user->lawyer_detail->gelar}}</td>
                </tr>
                <tr>
                    <td>Bio</td>
                    <td>:</td>
                    <td>{{$user->lawyer_detail->bio}}</td>
                </tr>
                <tr>
                    <td>Probono Status</td>
                    <td>:</td>
                    <td>
                        @if($user->lawyer_detail->probono == true)
                        Aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td>Status Akun</td>
                    <td>:</td>
                    <td>
                        @if($user->status == true)
                        Aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if($user->jenis_kelamin == 'PR')
                        Perempuan
                        @else
                        Laki-laki
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>:</td>
                    <td>
                        @if($user->verified == true)
                        Sudah Verifikasi
                        @else
                        Belum Verifikasi
                        @endif
                    </td>
                </tr>
                @if($user->role == 'LAWYER')
                <tr>
                    <td>Membership</td>
                    <td>:</td>
                    <td>
                        @if($user->lawyer_detail->member_expired == '')
                        Belum Member
                        @else
                        {{$user->lawyer_detail->member_expired}}
                        @endif
                    </td>
                </tr>
                @endif
                @if($user->verified == true)
                <tr>
                    <td>No KTP</td>
                    <td>:</td>
                    <td>{{$user->no_ktp}}</td>
                </tr>
                @endif
                <tr>
                    <td>
                        <div class="modal-body">
                            <label for="">Avatar</label>
                            <div class="form-group">
                                @if($user->avatar == '')
                                <img src="{{url('public/avatar-default1.png')}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @else
                                <img src="{{asset($user->avatar)}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @endif
                            </div>
                        </div>
                        @if(request()->is('client-konfirmasi*'))
                        <div class="modal-body">
                            <label for="">KTP</label>
                            <div class="form-group">
                                <img src="{{asset($id->ktp)}}" alt="KTP" width="300px" class="img-thumbnail myImg">
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="">Selfie KTP</label>
                            <div class="form-group">
                                <img src="{{asset($id->ktp)}}" alt="Selfie KTP" width="300px" class="img-thumbnail myImg">
                            </div>
                        </div>
                        @endif
                        @if($user->role == 'CLIENT' && $user->verified == true)
                        <div class="modal-body">
                            <label for="">KTP</label>
                            <div class="form-group">
                                <img src="{{asset($user->ktp)}}" alt="KTP" width="300px" class="img-thumbnail myImg">
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="">Selfie KTP</label>
                            <div class="form-group">
                                <img src="{{asset($user->ktp)}}" alt="Selfie KTP" width="300px" class="img-thumbnail myImg">
                            </div>
                        </div>
                        @endif
                        @if($user->role == 'LAWYER')
                        <div class="modal-body">
                            <label for="">Kartu Peradi</label>
                            <div class="form-group">
                                <img src="{{asset($user->lawyer_detail->kartu_peradi)}}" alt="Kartu Peradi" width="300px" class="img-thumbnail myImg">
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="">Berita Acara</label>
                            <div class="form-group">
                                <img src="{{asset($user->lawyer_detail->berita_acara)}}" alt="Berita Acara" width="300px" class="img-thumbnail myImg">
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td style="border: 1px solid #e6e6e6;">
                        <h3>Service Yang di Layani</h3>
                        @foreach($service as $m)
                        <div class="form-group" style="border: 1px solid #e6e6e6;">
                            <div class="m-3">
                                <img src="{{asset($m['gambar'])}}" alt="{{$m['nama']}}" width="300px" class="img-thumbnail myImg">
                                <h3>Nama Layanan : {{$m['nama']}}</h3>
                                <h4>Harga : @rupiah($m['harga'])</h4>
                                <h4>Harga Vicon : @rupiah($m['harga_vicon'])</h4>
                                <h4>Deskripsi : {{$m['deskripsi']}}</h4>
                            </div>
                        </div>
                        @endforeach
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')
@endsection
@section('js')
@endsection