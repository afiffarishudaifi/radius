<?php
include('./_partials/head.php');
?>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('./_partials/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('./_partials/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><strong>
                                    <h4>Edit Data Wifi</h4>
                                </strong></div>
                        </div>
                        <div class="card-body">
                            <form action="./controller/controller_data_wifi" method="post">
                                <?php
                                require_once "./controller/koneksi.php";
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    //query untuk menampilkan sebuah query select dari table tb_siswa dengan id siswa sebagai parameter
                                    $sql = "SELECT * FROM data_wifi WHERE id='$id'";
                                    $querykec = mysqli_query($koneksi, $sql);
                                    while ($data = mysqli_fetch_array($querykec)) { ?>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">id</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['id']; ?>" name="id" size="4" class="form-control" readonly required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelurahan</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['kelurahan']; ?>" name="kelurahan" placeholder="Kelurahan" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">RW</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['rw']; ?>" name="rw" placeholder="RW" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" value="<?php echo $data['alamat']; ?>" name="alamat" placeholder="Alamat" size="4" class="form-control" required><?php echo $data['alamat']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['lokasi']; ?>" name="lokasi" placeholder="Lokasi" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Progress</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['progress']; ?>" name="progress" placeholder="Progress" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['status']; ?>" name="status" placeholder="Status" size="4" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['keterangan']; ?>" name="keterangan" placeholder="Keterangan" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Platform</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="platform" placeholder="Platform" style="width: 100%;">
                                                    <option value="WIRELESS" <?php if ($data['platform'] == 'WIRELESS') {
                                                                                    echo 'selected';
                                                                                } ?>>WIRELESS</option>
                                                    <option value="FTTH" <?php if ($data['platform'] == 'FTTH') {
                                                                                echo 'selected';
                                                                            } ?>>FTTH</option>
                                                </select>
                                                <!-- <input type="text" value="<?php echo $data['platform']; ?>" name="platform" placeholder="Platform" size="4" class="form-control" required> -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Catatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['catatan']; ?>" name="catatan" placeholder="Catatan" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tambahan</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['tambahan']; ?>" name="tambahan" placeholder="tambahan" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Olt</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['olt']; ?>" name="olt" placeholder="Olt" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username PPOE</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['username_ppoe']; ?>" name="username_ppoe" placeholder="Username PPOE" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password PPOE</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['password_ppoe'] ?>" name="password_ppoe" placeholder="Password PPOE" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">IP</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['ip']; ?>" name="ip" placeholder="IP Modem" size="4" class="form-control">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">IP Router</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['ip_router']; ?>" name="ip_router" placeholder="IP Router" size="4" class="form-control" required>
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">PIC</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['pic']; ?>" name="pic" placeholder="PIC" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No HP</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['no_hp']; ?>" name="no_hp" placeholder="No Handphone" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Longitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['longitude']; ?>" name="longitude" placeholder="Longitude" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Latitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $data['latitude']; ?>" name="latitude" placeholder="Latitude" size="4" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
                                                <a class="btn btn-danger" onclick="goBack()">
                                                    <font color="white">Kembali</font>
                                                </a>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('./_partials/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./_partials/wrapper -->

    <?php include('./_partials/js.php'); ?>
</body>

</html>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>