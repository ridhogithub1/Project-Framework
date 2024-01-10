<div class="container-fluid">
  <!--  Row 1 -->
  <div class="card ">
    <div class="card-body ">
      <h5 class="card-title fw-semibold mb-4">Kelola Lomba</h5>
      <div class="table-responsive">
        <?= $this->session->flashdata('message'); ?>

        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Id</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Nama Lomba</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Lokasi</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Waktu</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Tingkat</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Status</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Proposal</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Sertifikat</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Edit</h6>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($lomba as $l) : ?>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?= $i; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $l['nama_lomba']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $l['lokasi']; ?></p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $l['waktu']; ?></p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $l['tingkat']; ?></p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">

                    <!-- <span class="badge bg-secondary rounded-3 fw-semibold">Di Proses</span> -->
                    <?php if ($l['status'] == "Di Proses") { ?>
                      <span class="badge bg-secondary rounded-3 fw-semibold">Di Proses</span>

                    <?php } else if ($l['status'] == "Di Terima") { ?>
                      <span class="badge bg-success rounded-3 fw-semibold">Di Terima</span>

                    <?php } else { ?>
                      <span class="badge bg-danger rounded-3 fw-semibold">Di Tolak</span>

                    <?php } ?>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4"><?= $l['proposal']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4"><?= $l['sertifikat']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <span><a class="badge bg-primary rounded-3 fw-semibold" href=" <?= base_url('Kp/edit_lomba/'). $l['id'];  ?>">Edit</a></span>
                </td>
              </tr>
          
              
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