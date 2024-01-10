<div class="container-fluid">
    <br>
    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Tambah Berita</h5>
                    <form action="<?= site_url('User/tambah_berita'); ?>" method="POST" enctype="multipart/form-data">

                        <!-- Judul Berita -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>

                        <!-- Isi Berita -->
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Berita</label>
                            <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                        </div>

                        <!-- Penulis Berita -->
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" required>
                        </div>

                        <!-- Poster Berita -->
                        <div class="mb-3">
                            <label for="poster" class="form-label">Poster</label>
                            <input type="file" class="form-control" id="poster" name="poster" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Tambah Berita</button>
                    </form>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>