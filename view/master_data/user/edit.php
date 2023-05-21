<?php
    require(__DIR__.'/../../../functions/functions.php');
    $value = mysqli_fetch_assoc(get_data_user($_GET['id']));
    require(__DIR__.'/../../template/header.php');
    require(__DIR__.'/../../template/dashboard/loadingTemplate.php');
?>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?php require(__DIR__.'/../../template/dashboard/sidebar.php') ?>
    <!-- Main wrapper -->
    <div class="body-wrapper">
      <?php require(__DIR__.'/../../template/dashboard/header.php')?>
      <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
          <div class="card-body px-4 py-3">
            <div class="row align-items-center">
              <div class="col-9">
                <h4 class="fw-semibold mb-8">Edit User</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted" href="/view/dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">User</li>
                  </ol>
                </nav>
              </div>
              <div class="col-3">
                <div class="text-center mb-n5">
                  <img src="/public/dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card w-100 position-relative overflow-hidden">
          <div class="card-body p-4">
            <form action="/functions/user.php" method="POST">
                <input type="hidden" value="<?= $value['id']?>" name="id">
                <div class="row flex-column gap-4">
                    <div class="form-group col">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" name="username" value="<?= $value['username']?>">
                    </div>
                    <div class="form-group col">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group col">
                      <div class="form-check form-switch">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          name="is_active"
                          id="flexSwitchCheckDefault"
                          <?= $value['is_active'] ? 'checked' : '' ?>
                        />
                        <label
                          class="form-check-label"
                          for="flexSwitchCheckDefault"
                          >User Aktif</label
                        >
                      </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-sm" name="update">Simpan</button>
                        <a href="./index.php" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- container-fluid over -->
    </div>
  </div>
<?php
  require(__DIR__.'/../../template/dashboard/anotherActionFromTemplate.php');
  require(__DIR__.'/../../template/footer.php');
?>