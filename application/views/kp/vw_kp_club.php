<div class="container-fluid">
  <!--  Row 1 -->
  <?= $this->session->flashdata('message'); ?>


  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Kelola Club</h5>
      <div class="table-responsive">
        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Id</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Nama Club</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Nama PIC</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Nama Anggota</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Status</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Edit</h6>
              </th>

             
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($club as $u) : ?>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?= $i;?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $u['nama_club']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $u['nama_pic']; ?></p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $u['nama_anggota']; ?></p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">

                    <!-- <span class="badge bg-secondary rounded-3 fw-semibold">Di Proses</span> -->
                    <?php if ($u['status'] == "Di Proses") { ?>
                      <span class="badge bg-secondary rounded-3 fw-semibold">Di Proses</span>

                    <?php } else if ($u['status'] == "Di Terima") { ?>
                      <span class="badge bg-success rounded-3 fw-semibold">Di Terima</span>

                    <?php } else { ?>
                      <span class="badge bg-danger rounded-3 fw-semibold">Di Tolak</span>

                    <?php } ?>
                  </div>
                </td>
                <td class="border-bottom-0">
                <span><a class="badge bg-primary rounded-3 fw-semibold" href="<?= base_url('Kp/edit_club/') . $u['id']; ?>">Edit</a></span>
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