<!--  Header End -->
<div class="container-fluid">

  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Kelola Data</h5>
      <div class="table-responsive">
        <?= $this->session->flashdata('message'); ?>
        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Id</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Nama</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Email</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Role</h6>
              </th>
              
            </tr>
          </thead>

          <tbody>

            <?php $i = 1; ?>
            <?php foreach ($user as $u) : ?>

              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?= $i; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $u['nama'] ?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $u['email'] ?></p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <p> <?php
                        if ($u['role_id'] == 1) {
                          echo "Admin";
                        } else if ($u['role_id'] == 2) {
                          echo "Mahasiswa / Dosen ";
                        } else {
                          echo "Ka Prodi";
                        }
                        ?>

                    </p>
                  </div>
                </td>
             
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
          <!-- kondifi kalau misal gak ada data -->
          <tbody>
            <?php if (!empty($user)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($user as $u) : ?>
                <tr>
                  <!-- Isi baris tabel Anda di sini -->
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="5">Tidak ada data yang tersedia</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>