<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('_partials/head.php') ?>
    <title>Edit Pejabat</title>
</head>
<body>
    <main class="main">
    <?php $this->load->view('_partials/side_nav.php') ?>

        <div class="content">
            <!-- Content wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1>Edit Pejabat</h1> <br>
                        
                        <form method="post" action="<?= site_url('pejabat/update/' . $pejabat->id) ?>">
                            <label for="nama_pejabat">Nama Pejabat: </label>
                            <input class="form-control" type="text" name="nama_pejabat" value="<?= $pejabat->nama_pejabat ?>" required>

                            <br>
                            <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option value="Laki-laki" <?php echo ($pejabat->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo ($pejabat->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select><br>
                            </div>
                            <label for="alamat">Alamat:</label>
                            <input class="form-control" type="text" name="alamat" value="<?= $pejabat->alamat ?>" required>
                            <br>
                            <br>
                            <label for="m_pejabat_id">Jabatan:</label>
                            <select class="form-control" name="m_pejabat_id" class="js-example-basic-single">
                                <?php foreach ($pejabat_options as $master_pejabat): ?>
                                    <option value="<?= $master_pejabat->id ?>" <?= ($master_pejabat->id == $pejabat->m_pejabat_id) ? 'selected' : '' ?>>
                                        <?= $master_pejabat->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <br><br>
                            <button class="btn btn-primary" type="submit">Simpan</button>

                            <a class="btn btn-warning" href="<?= site_url('pejabat') ?>">Kembali</a>
                        </form>
                        
                    </div>
                </div>
            </div>

            <?php $this->load->view('_partials/footer.php') ?>

        </div>
    </main>
    <script src="<?php echo base_url('vendor/select2/dist/js/select2.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

</body>
</html>
