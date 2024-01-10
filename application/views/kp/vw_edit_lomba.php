<div class="container-fluid">
    <br>
    <div class="row">

        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Edit Lomba</h5>
                    <form action="<?= site_url('kp/edit_lomba/' . $lomba['id']); ?>" method="POST">




                        <div class="mb-3">
                            <label for="proposal" class="form-label">Status</label>
                            <input type="text" class="form-control" id="tingkat" name="status" required value="<?= $lomba['status'] ?? ''; ?>">
                            <br>
                                <p>Note:</p>
                                <p>Ubah Menjadi "Di Terima" Untuk Menerima Ajuan Lomba</p>
                                <p>Ubah Menjadi "Di Tolak" Untuk Menolak Ajuan Lomba "</p>
                            <br>

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>