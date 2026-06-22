<?php foreach ($pesanan as $i => $item) : ?>
<div class="modal fade" id="editModal-<?= $item['id'] ?>" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow modal-burjo">

            <div class="modal-header modal-burjo-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="modal-burjo-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h5 class="modal-title text-white fw-bold mb-0">Edit Data Pesanan</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <?= form_open(base_url('pesanan/edit/' . $item['id'])); ?>
            <?= csrf_field(); ?>

            <div class="modal-body px-4 py-3">

                <div class="mb-3">
                    <label class="modal-burjo-label">User ID</label>
                    <?= form_input([
                        'type'        => 'number',
                        'name'        => 'user_id',
                        'id'          => 'user_id',
                        'class'       => 'form-control modal-burjo-input',
                        'value'       => $item['user_id'],
                        'placeholder' => 'Masukkan User ID',
                        'required'    => true
                    ]); ?>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Tanggal Pesanan</label>
                    <?= form_input([
                        'type'     => 'datetime-local',
                        'name'     => 'tanggal_pesanan',
                        'id'       => 'tanggal_pesanan',
                        'class'    => 'form-control modal-burjo-input',
                        'value'    => date('Y-m-d\TH:i', strtotime($item['tanggal_pesanan'])),
                        'required' => true
                    ]); ?>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Total Bayar</label>
                    <div class="input-group">
                        <span class="input-group-text modal-burjo-prefix">Rp</span>
                        <?= form_input([
                            'type'        => 'number',
                            'name'        => 'total_bayar',
                            'id'          => 'total_bayar',
                            'class'       => 'form-control modal-burjo-input',
                            'value'       => $item['total_bayar'],
                            'placeholder' => '0',
                            'required'    => true
                        ]); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="modal-burjo-label">Status</label>
                    <select name="status" id="status" class="form-select modal-burjo-input" required>
                        <option value="pending" <?= $item['status'] == 'pending' ? 'selected' : '' ?>>
                            ⏳ Pending
                        </option>
                        <option value="selesai" <?= $item['status'] == 'selesai' ? 'selected' : '' ?>>
                            ✅ Selesai
                        </option>
                    </select>
                </div>

            </div>

            <div class="modal-footer modal-burjo-footer">
                <button type="button" class="btn modal-burjo-btn-cancel" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Tutup
                </button>
                <?= form_submit('submit',  'Simpan', ['class' => 'btn modal-burjo-btn-save']); ?>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
<?php endforeach ?>