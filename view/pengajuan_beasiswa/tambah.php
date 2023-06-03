<?php
  require(__DIR__.'/../../functions/functions.php');
  $beasiswa = get_data_beasiswa();
  $kriteria = get_data_kriteria();
  $mahasiswa = get_data_mahasiswa();
  require(__DIR__.'/../template/header.php');
  require(__DIR__.'/../template/dashboard/loadingTemplate.php');
?>
<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
    data-header-position="fixed">
    <?php require(__DIR__.'/../template/dashboard/sidebar.php') ?>
    <!-- Main wrapper -->
    <div class="body-wrapper">
        <?php require(__DIR__.'/../template/dashboard/header.php')?>
        <div class="container-fluid">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Tambah Pengajuan Beasiswa</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted" href="/view/dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Pengajuan Beasiswa</li>
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
                    <form action="/functions/pengajuan_beasiswa.php" method="POST">
                        <div class="row flex-column gap-4">
                            <div class="col">
                                <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="mahasiswa_id">Opsi</label>
                                    <select class="form-select" id="mahasiswa_id" name="mahasiswa_id">
                                        <option>Choose...</option>
                                        <?php foreach($mahasiswa as $val) : ?>
                                        <option value="<?= $val['id']?>"><?= $val['nama']; ?> (<?= $val['nim']?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="beasiswa_id" class="form-label">Beasiswa</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="beasiswa_id">Opsi</label>
                                    <select class="form-select beasiswa_id" id="beasiswa_id" name="beasiswa_id">
                                        <option>Choose...</option>
                                        <?php foreach($beasiswa as $val) : ?>
                                        <option value="<?= $val['id']?>"><?= $val['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="kriteria_id">Opsi</label>
                                    <select class="form-select" id="kriteria_id" name="kriteria_id">
                                        <option>Choose...</option>
                                        <?php foreach($kriteria as $val) : ?>
                                        <option value="<?= $val['id']?>"><?= $val['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="nilai" class="form-label">Nilai</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="nilai">Opsi</label>
                                    <select class="form-select" id="nilai" name="nilai">
                                        <option selected>Choose...</option>
                                    </select>
                                </div>
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

<script>
    $(function() {
        $('#kriteria_id').on('change', function() {
            let id = $(this).val();
            let beasiswa_id = $('.beasiswa_id').val();
            $.ajax({
                url: `http://<?= $_SERVER['HTTP_HOST']?>/functions/pengajuan_beasiswa.php?kriteria_id=${id}&beasiswa_id=${beasiswa_id}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    let html = '';
                    html = '<option selected>Choose...</option>'
                    $.each(response, function(key, value) {
                        html += `<option value="${value.id}">${value.keterangan}</option>`
                    })
                    $('#nilai').html(html);
                }
            })
        })
    })
</script>

<?php
  require(__DIR__.'/../template/dashboard/anotherActionFromTemplate.php');
  require(__DIR__.'/../template/footer.php');
?>