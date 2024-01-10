<div class="container-fluid">
    <br>
    <div class="row">

        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Edit Lomba</h5>
                    <form action="<?= site_url('user/edit_lomba/' . $lomba['id']); ?>" method="POST">



                        <!-- Lomba Name -->
                        <div class="mb-3">
                            <label for="nama_lomba" class="form-label">Nama Lomba</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required value="<?= $lomba['nama_lomba'] ?? ''; ?>">
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required value="<?= $lomba['lokasi'] ?? ''; ?>">
                        </div>

                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Waktu</label> 
                            <input type="text" class="form-control" id="waktu" name="waktu" required value="<?= $lomba['waktu'] ?? ''; ?>">
                        </div>
                        <!-- Lomba proposal -->
                        <div class="mb-3">
                            <label for="proposal" class="form-label">Tingkat</label>
                            <input type="text" class="form-control" id="tingkat" name="tingkat" required value="<?= $lomba['tingkat'] ?? ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="proposal" class="form-label">Proposal</label>
                            <input type="file" class="form-control" id="proposal" name="proposal" required value="<?= $lomba['proposal'] ?? ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sertifikat" class="form-label">Sertifikat</label>
                            <input type="file" class="form-control" id="sertifikat" name="sertifikat" required value="<?= $lomba['sertifikat'] ?? ''; ?>">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>