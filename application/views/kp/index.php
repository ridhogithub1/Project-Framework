<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Data Kegiatan Lomba Tahun 2024</h5>
            </div>
          </div>
          <div class="table">
            <?= $this->session->flashdata('message'); ?>

            <!-- Jika user == 1 yaitu admin -->

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


                </tr>
              </thead>
              <tbody>
                <?php $i = 10; ?>
                <?php $a = 1; ?>
                <?php foreach ($lomba as $l) : ?>
                  <tr>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0"><?= $a; ?></h6>
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

                  </tr>


                  <?php $i--; ?>
                  <?php $a++; ?>
                <?php endforeach; ?>
              </tbody>


            </table>
            <!-- jika user == 3 yaitu ka prodi -->


          </div>

        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title mb-9 fw-semibold">Jumlah Kegiatan Lomba </h5>
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="fw-semibold mb-3"><?php echo $a-1;?></h4>
                
                 
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <!-- Monthly Earnings -->
          <?php $i = 1; ?>
            <?php foreach ($club as $u) : ?>
		
              <?php $i++; ?>
            <?php endforeach; ?>

          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Jumlah Club </h5>
                  <h4 class="fw-semibold mb-3"><?= $i-1?></h4>
                 
                </div>
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <!-- Monthly Earnings -->
          <?php $i = 1; ?>
            <?php foreach ($berita as $b) : ?>
		
              <?php $i++; ?>
            <?php endforeach; ?>

          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold"> Jumlah Data </h5>
                  <h4 class="fw-semibold mb-3"><?= $i-1?></h4>
                 
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">


  </div>


</div>
</div>
</div>