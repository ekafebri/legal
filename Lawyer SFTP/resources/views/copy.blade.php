@extends('layouts.app')
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar User</h6>
    <a href="#" class="btn btn-info" style="float:right;display:inline" >
        Tambah User
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach
          <tr>
            <td>{{User}}</td>
            <td>{{user@gmail.com}}</td>
            <td>{{077777777}}</td>
            <td>{{USER}}</td>
            <td>{{ Blank }}</td>
            <td>
                <a href="#" >Edit</a>
                <a href="#" >Delete</a>
                <a href="#" >Change Password</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection

