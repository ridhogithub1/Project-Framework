
<div class="container-fluid">
    <br>
    <div class="row">

        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Edit Berita</h5>
                    <form action="<?= site_url('user/edit_berita/' . $berita['id']); ?>" method="POST">

                        <!-- Lomba Name -->
                        <div class="mb-3">
                            <label for="nama_lomba" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul" name="judul" required value="<?= $berita['judul'] ?? ''; ?>">
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Isi Berita</label>
                            <input type="text" class="form-control" id="lokasi" name="isi" required value="<?= $berita['isi'] ?? ''; ?>">
                        </div>

                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="tingkat" name="penulis" required value="<?= $berita['penulis'] ?? ''; ?>">
                        </div>
                        <!-- Lomba proposal -->
                        <div class="mb-3">
                            <label for="proposal" class="form-label">Poster</label>
                            <input type="file" class="form-control" id="proposal" name="poster" required value="<?= $berita['poster'] ?? ''; ?>">
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
