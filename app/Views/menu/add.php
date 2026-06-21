<div class="modal fade" id="add" tabindex="-1" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow modal-burjo">

            <div class="modal-header modal-burjo-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="modal-burjo-icon">
                        <i class="bi bi-plus-circle"></i>
                    </div>
                    <h5 class="modal-title text-white fw-bold mb-0">Tambah Data Menu</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="<?= base_url('menu') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="modal-body px-4 py-3">

                <div class="mb-3">
                    <label class="modal-burjo-label">Nama Menu</label>
                    <input type="text"
                           name="nama_menu"
                           class="form-control modal-burjo-input"
                           placeholder="Masukkan nama menu"
                           required>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Kategori</label>
                    <select name="kategori" class="form-select modal-burjo-input" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Makanan">🍽️ Makanan</option>
                        <option value="Minuman">🥤 Minuman</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text modal-burjo-prefix">Rp</span>
                        <input type="number"
                               name="harga"
                               class="form-control modal-burjo-input"
                               placeholder="0"
                               required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Foto Menu</label>
                    <input type="file"
                           name="foto"
                           class="form-control modal-burjo-input">
                </div>

            </div>

            <div class="modal-footer modal-burjo-footer">
                <button type="button" class="btn modal-burjo-btn-cancel" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Tutup
                </button>
                <button type="submit" class="btn modal-burjo-btn-save">
                    <i class="bi bi-check-circle me-1"></i> Simpan
                </button>
            </div>

            </form>
        </div>
    </div>
</div>