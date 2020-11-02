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
                                        <th>Name</th>
                                        <th>Ip Address</th>
                                        <th>Start Time</th>
                                        <th>Total Time</th>
                                        <th>Hotspot / NAS Shortname</th>
                                        <th>Total Traffic</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('./controller/koneksi.php');
                                    $query = mysqli_query($koneksi, "SELECT radacct.username, radacct.FramedIPAddress,
                                                radacct.CallingStationId, radacct.AcctStartTime,
                                                radacct.AcctSessionTime, radacct.NASIPAddress, 
                                                radacct.CalledStationId, radacct.AcctSessionId, 
                                                radacct.acctinputoctets AS Upload,
                                                radacct.acctoutputoctets AS Download,
                                                hotspots.name AS hotspot, 
                                                nas.shortname AS NASshortname, 
                                                userinfo.Firstname AS Firstname, 
                                                userinfo.Lastname AS Lastname FROM radacct LEFT JOIN hotspots ON (mac = CalledStationId) LEFT JOIN nas ON (nasname = NASIPAddress) LEFT JOIN userinfo ON (radacct.username = userinfo.username) WHERE (AcctStopTime IS NULL OR AcctStopTime = '0000-00-00 00:00:00')");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data['Username']; ?></td>
                                            <td><?php echo $data['Firstname']; ?> <?php echo $data['Lastname']; ?></td>
                                            <td><?php echo $data['FramedIPAddress']; ?><?php echo $data['CallingStationId']; ?></td>
                                            <td><?php echo $data['AcctStartTime']; ?></td>
                                            <td><?php echo $data['AcctSessionTime']; ?></td>
                                            <td><?php echo $data['hotspot']; ?> <?php echo $data['NASshortname']; ?></td>
                                            <td><?php echo $data['Upload']; ?> <?php echo $data['Download']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Ip Address</th>
                                        <th>Start Time</th>
                                        <th>Total Time</th>
                                        <th>Hotspot / NAS Shortname</th>
                                        <th>Total Traffic</th>
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