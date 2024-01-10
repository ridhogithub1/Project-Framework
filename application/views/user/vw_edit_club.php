<div class="container-fluid">
    <br>
    <div class="row">

        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Edit Club</h5>
                    <form action="<?= site_url('user/edit_club/' . ($club['id'] ?? '')); ?>" method="POST">

                        <!-- Lomba Name -->
                        <div class="mb-3">
                            <label for="nama_lomba" class="form-label">Nama Club</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama_club" required value="<?= $club['nama_club'] ?? ''; ?>">
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Nama PIC</label>
                            <input type="text" class="form-control" id="lokasi" name="nama_pic" required value="<?= $club['nama_pic'] ?? ''; ?>">
                        </div>

                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" id="tingkat" name="nama_anggota" required value="<?= $club['nama_anggota'] ?? ''; ?>">
                        </div>
                        

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>