  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?php echo base_url('assets/')?>../assets/images/logos/logoPSIT2.png" width="180" alt="">
                </a>

                <form method="POST" class="user"  action="<?= base_url('auth/registrasi');?>">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <!-- inputan nama -->
                    <input type="text" class="form-control" id="nama" name="nama" value="<?=set_value('nama') ?>"  aria-describedby="textHelp">
                    <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
                  </div>
                  <div class="mb-3">
                    <!-- Inputan email -->

                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=set_value('email') ?>" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <!-- Inputan Passowrd1 -->
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password1" name="password1" > 
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
                  </div><div class="mb-4">
                    <!-- Inputan Passowrd2 -->
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control"  id="password2" name="password2"> 
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="<?= base_url('auth')?>">Sign In</a>
                  </div>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
