<div class="modal fade" id="logoutModal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Keluar Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Apakah Anda yakin ingin keluar? </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
                <button type="submit" class="btn btn-danger">Keluar</button>
            </form>
        </div>
        </div>
    </div>
</div><!-- End Basic Modal--> 