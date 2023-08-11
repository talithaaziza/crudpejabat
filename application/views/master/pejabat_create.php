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
                        
                        <!-- Content wrapper -->
                          <div class="content-wrapper">
                            <!-- Content -->
                
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="col">
                                  <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="card-body">
                                        <h1>Tambah Master Pejabat</h1>
                                        <div class="mb-3">
                                        <form method="post" action="<?= site_url('MasterPejabat/store') ?>">
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                            <br>
                                            <div class="toolbar">
                                                <button class="btn btn-primary" role="button" type="submit">Simpan</button>
                                                <a class="btn btn-warning" href="<?= site_url('MasterPejabat') ?>">Kembali</a>	
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- / Content -->
                    </div>
                </div>
            </div>
    
                <!-- Footer -->
                <?php $this->load->view('_partials/footer.php') ?>
    
                <!-- / Footer -->
    
                <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
		</div>
    </main>



<!-- <form method="post" action="<?= site_url('MasterPejabat/store') ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required><br>
    <button type="submit">Simpan</button>
</form> -->


</body>
</html>
