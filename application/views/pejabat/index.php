<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('_partials/head.php') ?>
    <title>Daftar Pejabat</title>
</head>
<body>
<main class="main">
		<?php $this->load->view('_partials/side_nav.php') ?>

		<div class="content">
            <!-- Content wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <!-- Content wrapper -->
                          <div class="content-wrapper">
                            <!-- Content -->
                
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="col">
                                  <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="card-body">
                                        <h1>Daftar Pejabat</h1>
                            <div class="toolbar">
                                <a href="<?= site_url('pejabat/create') ?>" class="btn btn-primary" role="button">Tambah</a>
                            </div>
                            <br>
     
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php elseif ($this->session->flashdata('error')): ?>
                                <div class="alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <br>
                        <table class="table table-striped" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Master Pejabat</th>
                                    <th>Tanggal Buat</th>
                                    <th>Tanggal Ubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($pejabat as $row){
                                $no = $no + 1;
                            ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?= $row->nama_pejabat ?></td>
                                <td><?= $row->jenis_kelamin ?></td>
                                <td><?= $row->alamat ?></td>
                                <td><?= $row->master_pejabat_name ?></td>
                                <td><?= $row->tglBuat ?></td>
                                <td><?= $row->tglUbah ?></td>
                                <td>
                                    <div class="action">
                                        <a href="<?= site_url('pejabat/edit/' . $row->id) ?>" class="btn btn-success" class="button button-small " role="button">Edit</a>
                                        <a href="<?= site_url('pejabat/delete/' . $row->id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        class="btn btn-small btn-danger" role="button">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Content -->
                
                            <!-- Footer -->
                            <?php $this->load->view('_partials/footer.php') ?>
                
                            <!-- / Footer -->
                
                            <div class="content-backdrop fade"></div>
                          </div>
                          <!-- Content wrapper -->
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

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
        
    });
});
</script>

</body>
</html>


