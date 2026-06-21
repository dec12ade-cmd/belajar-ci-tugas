<div class="modal fade" id="add" tabindex="-1" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="<?= base_url('pesanan/create') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="modal-header">
                    <h5 class="modal-title">
                        Tambah Data Pesanan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">User ID</label>
                        <input type="number"
                               name="user_id"
                               class="form-control"
                               placeholder="User ID"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pesanan</label>
                        <input type="datetime-local"
                               name="tanggal_pesanan"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Bayar</label>
                        <input type="number"
                               name="total_bayar"
                               class="form-control"
                               placeholder="Total Bayar"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="">Pilih Status</option>
                            <option value="pending">Pending</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>