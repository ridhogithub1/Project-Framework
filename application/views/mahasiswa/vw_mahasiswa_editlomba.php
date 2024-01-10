<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lomba</title>
</head>

<body>

    <div class="container-fluid">
        <br>
        <div class="row"><!-- Form Section -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Lomba</h5>
                        <form action="<?= site_url('Mahasiswa/editlomba/' . $lomba['id']); ?>" method="POST" enctype="multipart/form-data">

                            <!-- Lomba Name -->
                            <div class="mb-3">
                                <label for="nama_lomba" class="form-label">Nama Lomba</label>
                                <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" value="<?= $lomba['nama_lomba']; ?>" required>
                            </div>
                            <!-- Lomba lokasi -->
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi Lomba</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $lomba['lokasi']; ?>" required>
                            </div>
                            <!-- Lomba Date -->
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Tanggal Lomba</label>
                                <input type="date" class="form-control" id="waktu" name="waktu" value="<?= $lomba['waktu']; ?>" required>
                            </div>
                            <!-- Lomba tingkat -->
                            <div class="mb-3">
                                <label for="tingkat" class="form-label">Tingkat Lomba</label>
                                <input type="text" class="form-control" id="tingkat" name="tingkat" value="<?= $lomba['tingkat']; ?>" required>
                            </div>
                            <!-- Lomba proposal -->
                            <div class="mb-3">
                                <label for="proposal" class="form-label">Upload Proposal</label>
                                <input type="file" class="form-control" id="proposal" name="proposal">
                            </div>
                            <!-- Lomba sertifikat -->
                            <div class="mb-3">
                                <label for="sertifikat" class="form-label">Upload Sertifikat</label>
                                <input type="file" class="form-control" id="sertifikat" name="sertifikat">
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