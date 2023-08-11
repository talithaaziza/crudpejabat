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
                            <!-- <select name="m_pejabat_id" class="js-example-basic-single">
                                <?php foreach ($pejabat_options as $pejabat) { ?>
                                    <option value="<?php echo $pejabat->id; ?>"><?php echo $pejabat->nama; ?></option>
                                 <?php } ?>
                            </select> -->
                            <select class="form-control" name="m_pejabat_id" class="js-example-basic-single" >
                                <?php foreach ($pejabat_options as $pejabat) { ?>
                                    <option value="<?php echo $pejabat->id; ?>"><?php echo $pejabat->nama; ?></option>
                                 <?php } ?>
                            </select>
                            <!-- <script>
                                $(document).ready(function() {
                                $('.js-example-basic-single').select2();
                            });
                            </script> -->
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

    <script src="<?php echo base_url('vendor/select2/dist/js/select2.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

</body>
</html>

<!-- <script src="path_to_your_assets/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('js-example-basic-single').select2();
    });
</script> -->
