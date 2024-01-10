<div class="container-fluid">
    <br>
    <div class="row">

        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Edit Data</h5>
                    <form action="<?= site_url('user/edit_data/' . $user['id']); ?>" method="POST">
                        
                    <div class="mb-3">
                            <label for="nama_lomba" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama" required value="<?= $user['nama'] ?? ''; ?>">
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Email</label>
                            <input type="text" class="form-control" id="lokasi" name="email" required value="<?= $user['email'] ?? ''; ?>">
                        </div>

                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Role</label>
                            <input type="text" class="form-control" id="tingkat" name="role_id" required value="<?= $user['role'] ?? ''; ?>">
                        </div>
                        <!-- Lomba sertifikat -->

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>