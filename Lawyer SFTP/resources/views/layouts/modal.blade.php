<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
      </div>
    </div>
  </div>
</div>
  
<!-- Modal Change Password-->
<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="" method="post" class='form-changepassword'>
        @csrf
        <div class="form-group" id="password">
            <label>New Password</label><br>
            <small style="color:red">*min 6 Karakter</small>
            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group" id="password-confirmation">
            <label>Confirm Password</label>
            <input type="password" class="form-control form-control-user" name="password_confirmation" id="password_confirmation" placeholder="" required>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
</div>
<!-- image modal -->
<div id="myModal" class="modal-image">
    <button class="btn btn-lg btn-danger mr-3" style="float:right;" onclick="document.getElementById('myModal').style.display='none'">X</button>

    <img class="modal-image-content" id="img01">
    <div id="caption"></div>
</div>

<!-- Modal Admin Edit-->
<div class="modal fade form-admin" id="modalAdminEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{(request()->is('admin')?'Admin':'Profile')}}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('admin')}}" method="post" enctype="multipart/form-data" class='form-admin'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control form-control-admin" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control form-control-admin" name="email" id="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label>Telpon</label>
            <input type="number" class="form-control form-control-admin" name="telp" id="telp" placeholder="Telp" required>
        </div>
        <div class="form-group" id="avatar">
            <label>Avatar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-admin" name="avatar" id="image">
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
</div>