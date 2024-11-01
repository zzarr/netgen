<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form id="editForm" method="POST"> <!-- Sesuaikan id form -->
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="editNama">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group mb-4">
                        <label for="editNoHp">No HP</label>
                        <input type="text" class="form-control" id="editNoHp" name="no_hp" placeholder="No HP">
                    </div>
                    <div class="form-group mb-4">
                        <label for="editAlamat">Alamat</label>
                        <input type="text" class="form-control" id="editAlamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group mb-4">
                        <label for="editPaket">Paket</label>
                        <input type="text" class="form-control" id="editPaket" name="paket" placeholder="Paket">
                    </div>
                </div>

                <!-- Hidden input untuk ID pelanggan dan id_petugas -->
                <input type="hidden" name="id_petugas" value="{{ Auth::user() ? Auth::user()->id : '1' }}">
                <input type="hidden" name="id" id="id_pelanggan"> <!-- ID Pelanggan -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
