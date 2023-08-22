<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/js/select2.min.js"></script>
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
                            <select class="form-control" name="m_pejabat_id" id="m_pejabat_id">
                                <option value="">Pilih Nama Jabatan</option>
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
$('#m_pejabat_id').select2({
    ajax: {
        url: '<?php echo site_url('pejabat/search_pejabat'); ?>', //diisi nama controller dan fungsinya
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                q: params.term // Parameter pencarian, parameter yang dibikin di fungsi controller
            };
        },
        processResults: function(data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 0
});
});

</script>


</body>
</html>


