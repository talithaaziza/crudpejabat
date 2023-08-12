<!DOCTYPE html>
<html>
<head>

    <?php $this->load->view('_partials/head.php') ?>
    <title>Tambah Pejabat</title>
</head>
<body>
    <main class="main">
    <?php $this->load->view('_partials/side_nav.php') ?>

        <div class="content">
            <!-- Content wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1>Tambah Pejabat</h1> <br>
                        
                        <form method="post" action="<?= site_url('Pejabat/store') ?>">
                            <label for="nama_pejabat">Nama Pejabat:</label>
                            <input class="form-control" type="text" name="nama_pejabat" required>
                            <br>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" name="jenis_kelamin" class="form-control">
                                    <option value="">--Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki_Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <br>
                            <label for="alamat">Alamat:</label>
                            <input class="form-control" type="text" name="alamat" required>
                            <br>
                            <label for="m_pejabat_id">Pilih Pejabat:</label>
                            <select class="js-example-basic-single form-control" name="m_pejabat_id" >
                            <option value="">--Pilih Jabatan--</option>
                                <?php foreach ($pejabat_options as $pejabat) { ?>
                                    <option value="<?php echo $pejabat->id; ?>"><?php echo $pejabat->nama; ?></option>
                                 <?php } ?>
                            </select>
                            <br>
                            <br>
                            <div class="toolbar">
                                    <button class="btn btn-primary" role="button" type="submit">Simpan</button>
                                    <a class="btn btn-warning" href="<?= site_url('pejabat') ?>" class="button">Kembali</a>
                            </div>
                        </form>
                        <?php $this->load->view('_partials/footer.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>" ></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('vendor/metisMenu/metisMenu.min.js') ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url('vendor/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/morrisjs/morris.min.js') ?>"></script>
<script src="<?php echo base_url('data/morris-data.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('dist/js/sb-admin-2.js') ?>"></script>

<script src="<?php echo base_url('vendor/select2/dist/js/select2.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

</body>
</html>


