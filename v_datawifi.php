<?php
include('./_partials/head.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('./_partials/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('./_partials/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <h1 class="h3 mb-0 text-gray-800">&nbsp;Dashboard</h1> -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data WiFi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelurahan</th>
                                        <th>RW</th>
                                        <th>Alamat</th>
                                        <th>Lokasi</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Platform</th>
                                        <th>Catatan</th>
                                        <th>Tambahan</th>
                                        <th>Olt</th>
                                        <th>Username_ppoe</th>
                                        <th>Password_ppoe</th>
                                        <th>IP Modem</th>
                                        <th>IP Router</th>
                                        <th>PIC</th>
                                        <th>No HP</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "./controller/koneksi.php";
                                    //query untuk menampilkan data table dari tb_siswa
                                    $query = mysqli_query($koneksi, "SELECT * FROM data_wifi limit 1") or die(mysqli_error($koneksi));
                                    //echo $query;
                                    $row = 0;
                                    while ($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                                        $row = $row + 1;
                                    ?>
                                    <tr>
                                        <td><?php echo $row; ?></td>
                                        <td><?php echo $data['kelurahan']; ?></td>
                                        <td><?php echo $data['rw']; ?></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td><?php echo $data['lokasi']; ?></td>
                                        <td><?php echo $data['progress']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <td><?php echo $data['platform']; ?></td>
                                        <td><?php echo $data['catatan']; ?></td>
                                        <td><?php echo $data['tambahan']; ?></td>
                                        <td><?php echo $data['olt']; ?></td>
                                        <td><?php echo $data['username_ppoe']; ?></td>
                                        <td><?php echo $data['password_ppoe']; ?></td>
                                        <td><?php echo $data['ip_modem']; ?></td>
                                        <td><?php echo $data['ip_router']; ?></td>
                                        <td><?php echo $data['pic']; ?></td>
                                        <td><?php echo $data['no_hp']; ?></td>
                                        <td><?php echo $data['longitude']; ?></td>
                                        <td><?php echo $data['latitude']; ?></td>
                                        <td>
                                            <table border="0">
                                                <tr>
                                                    <td>
                                                        <a href="v_editwifi.php?id=<?php echo $data['id']; ?>">
                                                            <button class="pilih btn btn-primary btn-sm">
                                                                <center><i class="fa fa-edit">
                                                                    </i></center>
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger btn-sm " data-toggle="modal"
                                                            data-target="#deleteModal" href=""><i
                                                                class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./controller/controller_data_wifi" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Yakin ingin menghapus id
                                                                <?php echo $data['id']; ?> ?</h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center>
                                                                Pilih "Hapus" untuk menghapus data
                                                                <?php echo $data['id']; ?>.
                                                            </center>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $data['id']; ?>">
                                                            <button class="btn btn-primary" type="button"
                                                                data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-danger" name="hapus">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelurahan</th>
                                        <th>RW</th>
                                        <th>Alamat</th>
                                        <th>Lokasi</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Platform</th>
                                        <th>Catatan</th>
                                        <th>Tambahan</th>
                                        <th>Olt</th>
                                        <th>Username_ppoe</th>
                                        <th>Password_ppoe</th>
                                        <th>IP Modem</th>
                                        <th>IP Router</th>
                                        <th>PIC</th>
                                        <th>No HP</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
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

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>