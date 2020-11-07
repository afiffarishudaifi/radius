<?php
//$online = query("SELECT username, framedipaddress, calledstationid, acctstarttime, acctsessiontime, nasipaddress, calledstationid, acctsessionid FROM radacct WHERE acctstoptime = '0000-00-00 00:00:00' OR acctstoptime = NULL");
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
                            <h3 class="card-title">Online Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>IP Address</th>
                                        <th>Start Time</th>
                                        <th>Total Time</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('./controller/koneksi.php');
                                    $query = mysqli_query($koneksi, "SELECT radacct.username, radacct.FramedIPAddress,
                                    radacct.AcctStartTime, radacct.AcctSessionTime,
                                    radacct.acctinputoctets AS Upload,
                                    radacct.acctoutputoctets AS Download,
                                    data_wifi.kelurahan, data_wifi.rw, data_wifi.alamat, data_wifi.ip
                                    FROM radacct LEFT JOIN data_wifi ON radacct.framedipaddress=data_wifi.ip 
                                    WHERE (AcctStopTime IS NULL OR AcctStopTime = '0000-00-00 00:00:00')
                                    GROUP BY data_wifi.kelurahan");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <?php
                                            $id = $data['username'];
                                            ?>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $data['FramedIPAddress']; ?></td>
                                            <td><?php echo $data['AcctStartTime']; ?></td>
                                            <td><?php echo $data['AcctSessionTime']; ?></td>
                                            <td>
                                                <center>
                                                    <a data-toggle="modal" data-target="#<?php echo $id; ?>" class="btn btn-circle btn-primary"><i class="fas fa-info-circle"></i></a>
                                                </center>

                                                <!-- modal detail -->
                                                <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Detail <?php echo $id; ?> </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Kelurahan</label>
                                                                    <input type="text" class="form-control" name="kelurahan" value="<?php echo $data['kelurahan']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>RW</label>
                                                                    <input type="text" class="form-control" name="rw" value="<?php echo $data['rw']; ?>" readonly>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Upload/Download</label>
                                                                    <input type="text" class="form-control" name="up" value="<?php echo $data['Upload']; ?>/<?php echo $data['Download']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end modal -->
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>IP Address</th>
                                        <th>Start Time</th>
                                        <th>Total Time</th>
                                        <th>Details</th>
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