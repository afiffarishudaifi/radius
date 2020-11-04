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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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