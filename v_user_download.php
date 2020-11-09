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
                            <h3 class="card-title">Data Pengguna WiFi</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Download</th>
                                        <th>Rata Rata Download / Hari</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT radacct.username, sum(radacct.acctoutputoctets) as 'total', AVG(radacct.acctoutputoctets) FROM radacct GROUP BY radacct.username ORDER BY sum(radacct.acctoutputoctets) DESC") or die(mysqli_error($koneksi));
                                    //echo $query;
                                    $row = 0;
                                    while ($data = mysqli_fetch_array($query)) {  //merubah array dari objek ke array yang biasanya
                                        if ($data[1] == NULL or $data[1] == '') {
                                            $data[1] = 0;
                                        }
                                        // else {
                                        //     $data[1] = substr($data[1] / 1073741824, 0, 9);
                                        // }
                                        $row = $row + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $row; ?></td>
                                            <td><?php echo $data[0]; ?></td>
                                            <td><?php if ($data[1] >= 1073741824) {
                                                    $d = substr($data[1] / 1073741824, 0, 6);
                                                    echo $d . " Gb";
                                                } else if ($data[1] >= 1048576) {
                                                    $d = substr($data[1] / 1048576, 0, 6);
                                                    echo $d . " Mb";
                                                } else {
                                                    $d = substr($data[1] / 1024, 0, 6);
                                                    echo $d . " Kb";
                                                } ?></td>
                                            <td><?php if ($data[2] >= 1073741824) {
                                                $rata = substr($data[2] / 1073741824, 0, 6);
                                                echo $rata . " Gb";
                                            } else if ($data[2] >= 1048576) {
                                                $rata = substr($data[2] / 1048576, 0, 6);
                                                echo $rata . " Mb";
                                            } else {
                                                $rata = substr($data[2] / 1024, 0, 6);
                                                echo $rata . " Kb";
                                            } ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Download</th>
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