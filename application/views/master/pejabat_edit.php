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
                        
                        <h1>Edit Pejabat</h1>
                        
                        <form method="post" action="<?= site_url('MasterPejabat/update/' . $pejabat->id) ?>">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" value="<?= $pejabat->nama ?>" required><br><br>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a class="btn btn-warning" href="<?= site_url('MasterPejabat') ?>">Kembali</a>
                        </form>
                        
                        <?php $this->load->view('_partials/footer.php') ?>
                    </div>
                </div>
            </div>

        </div>


    </main>


</body>
</html>
