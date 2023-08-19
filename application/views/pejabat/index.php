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
                        <table class="table table-striped" id="pejabat">
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
                            <tbody>

                            </tbody>
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
<script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js') ?>" ></script>
<script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js') ?>"  ></script>
<script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js') ?>"  ></script>

<script>
    $(document).ready(function() {
        $('#pejabat').DataTable({
            "processing": true,
            "serverSide": true,

            "order": [], 
            "ajax": {
                "url": "<?php echo site_url('Pejabat/get_data'); ?>",
                "type": "POST"
            },
            "columns": [

                {"data": null,width: 10}, // Add row_number column
                    {"data": "nama_pejabat",width:100},
                    {"data": "jenis_kelamin",width:10},
                    {"data": "alamat",width:100},
                    {"data": "nama_master",width:50},
                    {"data": "tglBuat",width:100},
                    {"data": "tglUbah",width:100},
                    {
                        "data": null,
                        "width": 100,
                        "orderable": false,
                        "render": function(data, type, row) {
                            var editUrl = "<?php echo site_url('pejabat/edit'); ?>/" + row.id;
                            var deleteUrl = "<?php echo site_url('pejabat/delete'); ?>/" + row.id;

                            return '<a href="' + editUrl + '" class="btn btn-warning btn-sm">Edit</a>' +
                                    ' ' +
                                   '<a href="' + deleteUrl + '" class="btn btn-danger btn-sm ml-2" onclick="return confirmDelete()">Delete</a>';

                        }
                    }
            ],
            "createdRow": function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
            
        });
    });
</script>

<script>
    function confirmDelete() {
return confirm('Apakah Anda yakin ingin menghapus data ini?');
}
</script>


</body>
</html>


