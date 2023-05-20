<?php
    require(__DIR__.'/template/header.php');
?>
  <!-- Preloader -->
  <div class="preloader">
    <img src="/public/dist/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="/public/dist/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" width="180" alt="">
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 text-center fw-bolder">Welcome to My App</h2>
                <form action="/functions/auth.php" method="POST">
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <a class="text-primary fw-medium" href="authentication-forgot-password.html">Forgot Password ?</a>
                  </div>
                  <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" name="login">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Doesn't have account?</p>
                    <a class="text-primary fw-medium ms-2" href="authentication-register.html">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

<?php
    require(__DIR__.'/template/footer.php');
?>