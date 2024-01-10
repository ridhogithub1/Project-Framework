<?= $this->session->flashdata('message'); ?>

<div class="container-fluid">
  <!--  Row 1 -->

  <ul class="navbar-nav flex-row ms-auto align-items-center ">

    <a href="<?= site_url('Mahasiswa/tambah_club'); ?>" target="_blank" class="btn btn-primary">Ajukan Club Baru</a>
  </ul>
  <br>
  <div class="row">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Club Yang diikuti</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">No</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nama Club</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nama PIC</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">prodi</h6>
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
                  <h6 class="fw-semibold mb-1"><?= $u['nama_club'];?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $u['nama_pic'];?></p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $u['prodi'];?></p>
                </td>


              </tr>

              <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>