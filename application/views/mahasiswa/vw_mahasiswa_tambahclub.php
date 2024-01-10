<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lomba</title>
</head>
<body>

<div class="container-fluid">
    <br>
    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Tambah Club</h5>
                    
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-info" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?= site_url('Mahasiswa/simpanclub');?>" method="POST" enctype="multipart/form-data">

                        <!-- Lomba Name -->
                        <div class="mb-3">
                            <label for="nama_lomba" class="form-label">Nama Lomba</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
                        </div>
                        <!-- Lomba lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi Lomba</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                        </div>
                        <!-- Lomba Date -->
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Tanggal Lomba</label>
                            <input type="date" class="form-control" id="waktu" name="waktu" required>
                        </div>
                        <!-- Lomba tingkat -->
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Tingkat Lomba</label>
                            <input type="text" class="form-control" id="tingkat" name="tingkat" required>
                        </div>
                        <!-- Lomba proposal -->
                        <div class="mb-3">
                            <label for="proposal" class="form-label">Proposal Lomba</label>
                            <input type="file" class="form-control" id="proposal" name="proposal" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Simpan Lomba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
