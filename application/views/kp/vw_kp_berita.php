<!--  Header End -->
<div class="container-fluid">

  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Kelola Berita</h5>
      <div class="table-responsive">
        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Id</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Judul</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Isi</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Poster</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Penulis</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Edit</h6>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($berita as $b) : ?>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?= $i; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $b['judul']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $b['isi']; ?></p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"> <img src="<?= base_url('assets/') ?>/images/products/freya.jpg" width="30%" alt=""></p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?=$b['penulis']; ?></p>
                </td>
                <!-- <td class="border-bottom-0">
                  <span><a class="badge bg-primary rounded-3 fw-semibold" href=" <?= base_url('User/edit_berita/'). $b['id']; ?>">Edit</a></span>
                  <span><a class="badge bg-danger rounded-3 fw-semibold" href="<?= base_url('User/hapus_berita/'). $b['id']; ?>">Hapus</a></span>
                </td> -->
                <?php $i++; ?>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>