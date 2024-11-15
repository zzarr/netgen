<div class="modal fade" id="edit-bayarModal" tabindex="-1" role="dialog" aria-labelledby="edit-bayarModaLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Bayar </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form method="POST" id="formUpdateBayar">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="nominal">Nominal</label>
                        <input type="number" step="0.01" min="0" max="" class="form-control"
                            id="nominal" placeholder="" name="nominal">
                    </div>
                    <!-- Input bulan dan pelanggan_id dibuat hidden -->
                    <input type="hidden" name="id_pembayaran">
                    <input type="hidden" name="id_tagihan">
                    <!-- Tambahkan input lainnya sesuai kebutuhan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
