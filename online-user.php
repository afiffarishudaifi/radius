<?php
//$online = query("SELECT username, framedipaddress, calledstationid, acctstarttime, acctsessiontime, nasipaddress, calledstationid, acctsessionid FROM radacct WHERE acctstoptime = '0000-00-00 00:00:00' OR acctstoptime = NULL");
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
                                    WHERE (radacct.AcctStopTime IS NULL OR radacct.AcctStopTime = '0000-00-00 00:00:00')");
                                    // WHERE (AcctStopTime IS NULL OR AcctStopTime = '0000-00-00 00:00:00') GROUP BY radacct.username
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <?php
                                            $id = $data['username'];
                                            ?>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $data['FramedIPAddress']; ?></td>
                                            <td><?php echo $data['AcctStartTime']; ?></td>
                                            <td><?php
                                                $waktu = $data['AcctSessionTime'];
                                                if ($waktu >= 0 && $waktu <= 60) {
                                                    $lama = number_format($waktu) . " detik";
                                                    echo $lama;
                                                } else if ($waktu >= 60 && $waktu <= 3600) {
                                                    $detik = fmod($waktu, 60);
                                                    $menit = $waktu - $detik;
                                                    $menit = $menit / 60;
                                                    $lama = $menit . " Menit " . number_format($detik) . " detik";
                                                    echo $lama;
                                                } else {
                                                    $detik = fmod($waktu, 60);
                                                    $tempmenit = ($waktu - $detik) / 60;
                                                    $menit = fmod($tempmenit, 60);
                                                    $jam = ($tempmenit - $menit) / 60;
                                                    $lama = $jam . " Jam " . $menit . " Menit " . number_format($detik) . " detik";
                                                    echo $lama;
                                                } ?></td>
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
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Kelurahan</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="kelurahan" id="kelurahan" value="<?php echo $data['kelurahan']; ?>" size="4" class="form-control" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">RW</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="rw" id="rw" value="<?php echo $data['rw']; ?>" size="4" class="form-control" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Alamat</label>
                                                                        <div class="col-sm-8">
                                                                            <textarea type="text" name="alamat" id="alamat" value="" size="4" class="form-control" readonly><?php echo $data['alamat']; ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Upload</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="upload" id="upload" value="<?php
                                                                                                                                $up = $data['Upload'];
                                                                                                                                if ($up >= 1073741824) {
                                                                                                                                    $u = substr($up / 1073741824, 0, 6);
                                                                                                                                    echo $u . " Gb";
                                                                                                                                } else if ($up >= 1048576) {
                                                                                                                                    $u = substr($up / 1048576, 0, 6);
                                                                                                                                    echo $u . " Mb";
                                                                                                                                } else {
                                                                                                                                    $u = substr($up / 1024, 0, 6);
                                                                                                                                    echo $u . " Kb";
                                                                                                                                }
                                                                                                                                ?>" size="4" class="form-control" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Download</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="download" id="download" value="<?php
                                                                                                                                    $down = $data['Download'];
                                                                                                                                    if ($down >= 1073741824) {
                                                                                                                                        $d = substr($down / 1073741824, 0, 6);
                                                                                                                                        echo $d . " Gb";
                                                                                                                                    } else if ($down >= 1048576) {
                                                                                                                                        $d = substr($down / 1048576, 0, 6);
                                                                                                                                        echo $d . " Mb";
                                                                                                                                    } else {
                                                                                                                                        $d = substr($down / 1024, 0, 6);
                                                                                                                                        echo $d . " Kb";
                                                                                                                                    }
                                                                                                                                    ?>" size="4" class="form-control" readonly>
                                                                        </div>
                                                                    </div>

                                                                </form>

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