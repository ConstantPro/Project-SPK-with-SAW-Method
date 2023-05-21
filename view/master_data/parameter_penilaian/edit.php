<?php
    require(__DIR__.'/../../../functions/functions.php');
    $value = mysqli_fetch_assoc(get_data_kriteria($_GET['id']));
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
                <h4 class="fw-semibold mb-8">Tambah Kriteria</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted" href="/view/dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Kriteria</li>
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
            <form action="/functions/parameter_penilaian.php" method="POST">
                <input type="hidden" value="<?= $value['id']?>" name="id">
                <div class="row flex-column gap-4">
                  <div class="col">
                      <label for="beasiswa_id" class="form-label">Beasiswa</label>
                      <div class="input-group">
                          <label class="input-group-text" for="beasiswa_id">Opsi</label>
                          <select class="form-select" id="beasiswa_id" name="beasiswa_id">
                              <option selected>Choose...</option>
                              <?php foreach($beasiswa as $val) : ?>
                                <option value="<?= $val['id']?>" <?= $value['kriteria_id'] == $val['id'] ? 'selected' : '' ?>><?= $val['nama']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  <div class="col">
                      <label for="kriteria_id" class="form-label">Kriteria</label>
                      <div class="input-group">
                          <label class="input-group-text" for="kriteria_id">Opsi</label>
                          <select class="form-select" id="kriteria_id" name="kriteria_id">
                              <option selected>Choose...</option>
                              <?php foreach($kriteria as $val) : ?>
                                <option value="<?= $val['id']?>" <?= $value['kriteria_id'] == $val['id'] ? 'selected' : '' ?>><?= $val['nama']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group col">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan"><?= $value['keterangan'] ?></textarea>
                    <small>e.g: Penilaian terhadap kriteria dan beasiswa</small>
                  </div>
                  <div class="form-group col">
                    <label for="bobot" class="form-label">Bobot</label>
                    <input type="text" class="form-control" name="bobot" placeholder="0" value="<?= $value['bobot']; ?>">
                    <small>e.g: 0.2, 1.2, 3.4</small>
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