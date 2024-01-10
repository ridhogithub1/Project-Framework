<div class="container-fluid">
    <br>
    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Tambah Data</h5>
                    <?php echo validation_errors(); ?>
                    <form action="<?= site_url('User/tambah_data'); ?>"method="POST">

                        <!-- Lomba Name -->
                        <div class="mb-3">
                            <label for="nama_lomba" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama"  value="<?= set_value('nama') ?>" required>
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Email</label>
                            <input type="text" class="form-control" id="lokasi" name="email"  value="<?= set_value('email') ?>" required>
                        </div>

                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Role</label>
                            <input type="text" class="form-control" id="tingkat" name="role_id"  value="<?= set_value('role_id') ?>" required>
                        </div>
                   

                        <!-- Submit Button -->

                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>
<!--  Header End -->