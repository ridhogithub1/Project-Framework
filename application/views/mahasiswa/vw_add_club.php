<div class="container-fluid">
    <br>
    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Tambah Club</h5>
                    <?php echo validation_errors(); ?>
                    <form action="<?= site_url('Mahasiswa/tambah_club'); ?>"method="POST">

                        <!-- Hidden Inputs -->
                        <input type="hidden" id="nama" name="nama" value="<?= set_value('nama') ?>">
                        <input type="hidden" id="email" name="email" value="<?= set_value('email') ?>">
                        <input type="hidden" id="role_id" name="role_id" value="<?= set_value('role_id') ?>">

                        <!-- Lomba Name -->
                        <div class="mb-3">
                            <label for="nama_club" class="form-label">Nama Club</label>
                            <input type="text" class="form-control" id="nama_club" name="nama_club"  value="<?= set_value('nama_club') ?>" required>
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="nama_pic" class="form-label">Nama PIC</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic"  value="<?= set_value('nama_pic') ?>" required>
                        </div>

                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="nama_anggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota"  value="<?= set_value('nama_anggota') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi"  value="<?= set_value('nama_anggota') ?>" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Club</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>