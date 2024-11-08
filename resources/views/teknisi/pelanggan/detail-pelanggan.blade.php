<div class="modal fade" id="detailPelangganModal" tabindex="-1" aria-labelledby="detailPelangganModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPelangganModalLabel">Detail Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><span id="pelangganNama"></span></h5>
                <p>Paket: <span id="pelangganPaket"></span></p>
                <p>Alamat: <span id="pelangganAlamat"></span></p>
                <p>Nomor HP: <span id="pelangganNoHp"></span></p>

                <table class="table mt-4">
                    <thead>
                        <tr>

                            <th>Bulan</th>
                            <th>Tgl Pembayaran</th>
                            <th>Jumlah (Rp)</th>
                            <th>Kurang</th>
                            <th>User</th>

                        </tr>
                    </thead>
                    <tbody id="tagihanTableBody">
                        <!-- Data tagihan akan diisi oleh AJAX -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger" onclick="printPDF()">Cetak PDF</button>
            </div>
        </div>
    </div>
</div>
