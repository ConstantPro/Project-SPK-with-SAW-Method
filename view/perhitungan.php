<?php
  require(__DIR__.'/../functions/functions.php');
  $list_beasiswa = get_data_beasiswa();
  $beasiswa = get_data_beasiswa()->fetch_assoc();
  $data = get_data_perhitungan($beasiswa['id']);
  require(__DIR__.'/template/header.php');
  require(__DIR__.'/template/dashboard/loadingTemplate.php');

?>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?php require(__DIR__.'/template/dashboard/sidebar.php') ?>
    <!-- Main wrapper -->
    <div class="body-wrapper">
      <?php require(__DIR__.'/template/dashboard/header.php')?>
      <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
          <div class="card-body px-4 py-3">
            <div class="row align-items-center">
              <div class="col-9">
                <h4 class="fw-semibold mb-8">Perhitungan</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted" href="/view/dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Perhitungan</li>
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
              <div class="form-group">
                <div class="col">
                  <div class="input-group">
                      <select class="form-select" id="beasiswa" name="beasiswa">
                        <option>Choose...</option>
                        <?php foreach($list_beasiswa as $val) : ?>
                          <option value="<?= $val['id']?>"><?= $val['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <div class="table-responsive rounded-2 mb-4">
              <table class="table border table-md text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-3">
                  <tr>
                    <th><h6 class="fs-3 fw-semibold mb-0">Nim</h6></th>
                    <th><h6 class="fs-3 fw-semibold mb-0">Nama</h6></th>
                    <th><h6 class="fs-3 fw-semibold mb-0">Perhitungan</h6></th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php foreach($data as $val) : ?>
                    <tr>
                      <td><h6 class="fs-3 fw-normal mb-0"><?= $val['nim']; ?></h6></td>
                      <td><h6 class="fs-3 fw-normal mb-0"><?= $val['nama']; ?></h6></td>
                      <td><h6 class="fs-3 fw-normal mb-0"><?= $val['result'];?></h6></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- container-fluid over -->
    </div>
  </div>

  <script>
    $(function() {
        $('#beasiswa').on('change', function() {
            let id = $(this).val();
            $.ajax({
                url: `http://<?= $_SERVER['HTTP_HOST']?>/functions/perhitungan.php?beasiswa=${id}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    let html = '';
                    $.each(response, function(key, value) {
                      html += `
                        <<tr>
                          <td><h6 class="fs-3 fw-normal mb-0">${value['nim']}</h6></td>
                          <td><h6 class="fs-3 fw-normal mb-0">${value['nama']}</h6></td>
                          <td><h6 class="fs-3 fw-normal mb-0">${value['result']}</h6></td>
                        </tr>
                      `
                    })
                    $('#tbody').html(html);
                }
            })
        })
    })
  </script>

<?php
  require(__DIR__.'/template/dashboard/anotherActionFromTemplate.php');
  require(__DIR__.'/template/footer.php');
?>