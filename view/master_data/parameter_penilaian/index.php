<?php
  require(__DIR__.'/../../../functions/functions.php');
  $data = get_data_parameter_penilaian();
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
                <h4 class="fw-semibold mb-8">Parameter Penilaian</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted" href="/view/dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Parameter Penilaian</li>
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
          <div class="px-4 py-3 border-bottom">
            <div class="card-title d-flex justify-content-between align-items-center">
              <h5 class="fw-semibold mb-0 lh-sm">Basic Table</h5>
              <a href="./tambah.php" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
          </div>
          <div class="card-body p-4">
            <div class="table-responsive rounded-2 mb-4">
              <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th><h6 class="fs-4 fw-semibold mb-0">Beasiswa</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Kriteria</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Keterangan</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Bobot</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Dibuat Oleh</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Dibuat Tanggal</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Opsi</h6></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($data as $value) { 
                  ?>
                    <tr>
                      <td>
                        <p class="fs-4 fw-semibold mb-0"><?= $value['beasiswa']; ?></p>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4"><?= $value['kriteria']; ?></p>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4"><?= $value['keterangan']; ?></p>  
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4"><?= $value['bobot']; ?></p>  
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4"><?= $value['user_created']; ?></p>
                      </td>
                      <td>
                      <p class="mb-0 fw-normal fs-4"><?= $value['dibuat_tanggal']; ?></p>
                      </td>
                      <td>
                        <a href="./edit.php?id=<?= $value['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="./delete.php?id=<?= $value['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
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