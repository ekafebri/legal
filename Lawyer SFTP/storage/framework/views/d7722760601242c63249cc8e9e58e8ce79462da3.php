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
          <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>">Logout</a>
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
        <?php echo csrf_field(); ?>
        <div class="form-group" id="password">
            <label>New Password</label><br>
            <small style="color:red">*min 6 Karakter</small>
            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group" id="password-confirmation">
            <label>Confirm Password</label>
            <input type="password" class="form-control form-control-user" name="password_confirmation" id="password" placeholder="" required>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
</div><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/layouts/modal.blade.php ENDPATH**/ ?>