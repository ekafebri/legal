<!-- Logout Modal-->
<div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Logout Untuk Keluar</div>
            <div class="modal-footer">
                <button class="btn  btn-outline-danger " type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('logout-client')}}">Logout</a>
            </div>
        </div>
    </div>
</div>