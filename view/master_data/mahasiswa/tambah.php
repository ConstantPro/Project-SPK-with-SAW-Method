<?php
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
                <h4 class="fw-semibold mb-8">Tambah Mahasiswa</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted" href="/view/dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Mahasiswa</li>
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
            <form action="/functions/mahasiswa.php" method="POST">
                <div class="row flex-column gap-4">
                    <div class="form-group col">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="text" class="form-control" name="nim">
                    </div>
                    <div class="form-group col">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group col">
                        <label for="nama" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="form-group col">
                      <label for="nama" class="form-label">Jenis Kelamin</label>
                      <div class="d-flex">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jenis_kelamin" id="radio" value="Laki-laki">
                          <label class="form-check-label" for="radio">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jenis_kelamin" id="radio" value="Perempuan">
                          <label class="form-check-label" for="radio">Perempuan</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col">
                      <label for="tahun" class="form-label">Tahun Mengajukan</label>
                      <input type="number" min="1900" max="2100" class="form-control" step="1" value="2016" name="tahun" />
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-sm" name="simpan">Simpan</button>
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