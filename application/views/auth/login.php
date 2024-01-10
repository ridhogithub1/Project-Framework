
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb">
              <div class="card-body">
                <!-- Gambar nya ini judul -->
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">


                  <img src="<?php echo base_url('assets/')?>../assets/images/logos/logoPSIT2.png" width="180" alt="">
                </a>
                <form method="POST" action="<?= base_url('auth')?>">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email"  value="<?= set_value('email');?>" >
                    <?= form_error('email','<small class="text-danger pl-3">','</small>');?>

                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  >
                    <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <?= form_error('password','<small class="text-danger pl-3">','</small>');?>

                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <button class="text-primary fw-bold" href="./index.html">Forgot Password ?</button>
                  </div>
                  <button href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Belum Memiliki Acount?</p>
                    <a class="text-primary fw-bold ms-2" href="<?= base_url('Auth/registrasi') ?>">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
