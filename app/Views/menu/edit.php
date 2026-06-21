<?php foreach ($menu as $i => $item) : ?>
<div class="modal fade" id="editModal-<?= $item['id'] ?>" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow modal-burjo">

            <div class="modal-header modal-burjo-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="modal-burjo-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h5 class="modal-title text-white fw-bold mb-0">Edit Data Menu</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <?= form_open_multipart(base_url('menu/edit/' . $item['id'])); ?>
            <?= csrf_field(); ?>

            <div class="modal-body px-4 py-3">

                <div class="mb-3">
                    <label class="modal-burjo-label">Nama Menu</label>
                    <?= form_input([
                        'name'        => 'nama_menu',
                        'id'          => 'nama_menu',
                        'class'       => 'form-control modal-burjo-input',
                        'value'       => $item['nama_menu'],
                        'placeholder' => 'Nama Menu',
                        'required'    => true
                    ]); ?>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select modal-burjo-input" required>
                        <option value="Makanan" <?= $item['kategori'] == 'Makanan' ? 'selected' : '' ?>>
                            🍽️ Makanan
                        </option>
                        <option value="Minuman" <?= $item['kategori'] == 'Minuman' ? 'selected' : '' ?>>
                            🥤 Minuman
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text modal-burjo-prefix">Rp</span>
                        <?= form_input([
                            'type'        => 'number',
                            'name'        => 'harga',
                            'id'          => 'harga',
                            'class'       => 'form-control modal-burjo-input',
                            'value'       => $item['harga'],
                            'placeholder' => '0',
                            'required'    => true
                        ]); ?>
                    </div>
                </div>

                <?php if (!empty($item['foto'])) : ?>
                <div class="mb-3">
                    <label class="modal-burjo-label">Foto Saat Ini</label>
                    <div class="modal-burjo-img-preview">
                        <img src="<?= base_url('img/' . $item['foto']); ?>"
                             alt="<?= $item['nama_menu'] ?>"
                             class="modal-burjo-img">
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-check mb-3 modal-burjo-check">
                    <?= form_checkbox([
                        'name'  => 'check',
                        'id'    => 'check-' . $item['id'],
                        'value' => '1',
                        'class' => 'form-check-input'
                    ]); ?>
                    <?= form_label(
                        'Ganti foto menu',
                        'check-' . $item['id'],
                        ['class' => 'form-check-label']
                    ); ?>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Upload Foto Baru</label>
                    <?= form_upload([
                        'name'  => 'foto',
                        'id'    => 'foto',
                        'class' => 'form-control modal-burjo-input'
                    ]); ?>
                </div>

            </div>

            <div class="modal-footer modal-burjo-footer">
                <button type="button" class="btn modal-burjo-btn-cancel" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Tutup
                </button>
                <?= form_submit('submit', '<i class="bi bi-check-circle me-1"></i> Simpan', ['class' => 'btn modal-burjo-btn-save']); ?>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
<?php endforeach ?>