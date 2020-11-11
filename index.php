<?php include('./_partials/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">

    <!-- Mapbox -->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css" />
    <!-- Mapbox -->

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
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    include('./controller/koneksi.php');
                                    $sqlCommand = "SELECT COUNT(*) FROM radcheck";
                                    $query_total_user = mysqli_query($koneksi, $sqlCommand);
                                    $total_user = mysqli_fetch_row($query_total_user);
                                    mysqli_close($koneksi);
                                    ?>
                                    <h3><?php echo $total_user[0]; ?></h3>

                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-man"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    include('./controller/koneksi.php');
                                    $sql_online = "SELECT COUNT(*) FROM radacct WHERE (radacct.AcctStopTime IS NULL OR radacct.AcctStopTime = '0000-00-00 00:00:00') AND (radacct.Username LIKE '%jss%')";
                                    $query_total_online = mysqli_query($koneksi, $sql_online);
                                    $total_online = mysqli_fetch_row($query_total_online);
                                    mysqli_close($koneksi);
                                    ?>
                                    <h3><?php echo $total_online[0]; ?></h3>

                                    <p>Online Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="online-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">

                        <!-- query grafik -->
                        <?php
                        include('./controller/koneksi.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $tahun = date("Y");

                        $query1 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 01 and year(acctstoptime) = '$tahun'";
                        $sql1 = mysqli_query($koneksi, $query1);
                        $data1 = mysqli_fetch_row($sql1);
                        if ($data1[0] == NULL && $data1[1] == NULL) {
                            $up1 = 0;
                            $down1 = 0;
                        } else {
                            $up1 = substr($data1[0] / 1073741824, 0, 11);
                            $down1 = substr($data1[1] / 1073741824, 0, 11);
                        }

                        $query2 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 02 and year(acctstoptime) = $tahun";
                        $sql2 = mysqli_query($koneksi, $query2);
                        $data2 = mysqli_fetch_row($sql2);
                        if ($data2[0] == NULL && $data2[1] == NULL) {
                            $up2 = 0;
                            $down2 = 0;
                        } else {
                            $up2 = substr($data2[0] / 1073741824, 0, 11);
                            $down2 = substr($data2[1] / 1073741824, 0, 11);
                        }


                        $query3 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 03 and year(acctstoptime) = $tahun";
                        $sql3 = mysqli_query($koneksi, $query3);
                        $data3 = mysqli_fetch_row($sql3);
                        if ($data3[0] == NULL && $data3[1] == NULL) {
                            $up3 = 0;
                            $down3 = 0;
                        } else {
                            $up3 = substr($data3[0] / 1073741824, 0, 11);
                            $down3 = substr($data3[1] / 1073741824, 0, 11);
                        }


                        $query4 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 04 and year(acctstoptime) = $tahun";
                        $sql4 = mysqli_query($koneksi, $query4);
                        $data4 = mysqli_fetch_row($sql4);
                        if ($data4[0] == NULL && $data4[1] == NULL) {
                            $up4 = 0;
                            $down4 = 0;
                        } else {
                            $up4 = substr($data4[0] / 1073741824, 0, 11);
                            $down4 = substr($data4[1] / 1073741824, 0, 11);
                        }


                        $query5 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 05 and year(acctstoptime) = $tahun";
                        $sql5 = mysqli_query($koneksi, $query11);
                        $data5 = mysqli_fetch_row($sql11);
                        if ($data5[0] == NULL && $data5[1] == NULL) {
                            $up5 = 0;
                            $down5 = 0;
                        } else {
                            $up5 = substr($data5[0] / 1073741824, 0, 11);
                            $down5 = substr($data5[1] / 1073741824, 0, 11);
                        }


                        $query6 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 06 and year(acctstoptime) = $tahun";
                        $sql6 = mysqli_query($koneksi, $query6);
                        $data6 = mysqli_fetch_row($sql6);
                        if ($data6[0] == NULL && $data6[1] == NULL) {
                            $up6 = 0;
                            $down6 = 0;
                        } else {
                            $up6 = substr($data6[0] / 1073741824, 0, 11);
                            $down6 = substr($data6[1] / 1073741824, 0, 11);
                        }


                        $query7 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 07 and year(acctstoptime) = $tahun";
                        $sql7 = mysqli_query($koneksi, $query7);
                        $data7 = mysqli_fetch_row($sql7);
                        if ($data7[0] == NULL && $data7[1] == NULL) {
                            $up7 = 0;
                            $down7 = 0;
                        } else {
                            $up7 = substr($data7[0] / 1073741824, 0, 11);
                            $down7 = substr($data7[1] / 1073741824, 0, 11);
                        }


                        $query8 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 08 and year(acctstoptime) = $tahun";
                        $sql8 = mysqli_query($koneksi, $query8);
                        $data8 = mysqli_fetch_row($sql8);
                        if ($data8[0] == NULL && $data8[1] == NULL) {
                            $up8 = 0;
                            $down8 = 0;
                        } else {
                            $up8 = substr($data8[0] / 1073741824, 0, 11);
                            $down8 = substr($data8[1] / 1073741824, 0, 11);
                        }


                        $query9 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 09 and year(acctstoptime) = $tahun";
                        $sql9 = mysqli_query($koneksi, $query9);
                        $data9 = mysqli_fetch_row($sql9);
                        if ($data9[0] == NULL && $data9[1] == NULL) {
                            $up9 = 0;
                            $down9 = 0;
                        } else {
                            $up9 = substr($data9[0] / 1073741824, 0, 11);
                            $down9 = substr($data9[1] / 1073741824, 0, 11);
                        }


                        $query10 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 10 and year(acctstoptime) = $tahun";
                        $sql10 = mysqli_query($koneksi, $query10);
                        $data10 = mysqli_fetch_row($sql10);
                        if ($data10[0] == NULL && $data10[1] == NULL) {
                            $up10 = 0;
                            $down10 = 0;
                        } else {
                            $up10 = substr($data10[0] / 1073741824, 0, 11);
                            $down10 = substr($data10[1] / 1073741824, 0, 11);
                        }


                        $query11 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 11 and year(acctstoptime) = $tahun";
                        $sql11 = mysqli_query($koneksi, $query11);
                        $data11 = mysqli_fetch_row($sql11);
                        if ($data11[0] == NULL && $data11[1] == NULL) {
                            $up11 = 0;
                            $down11 = 0;
                        } else {
                            $up11 = substr($data11[0] / 1073741824, 0, 11);
                            $down11 = substr($data11[1] / 1073741824, 0, 11);
                        }


                        $query12 = "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 12 and year(acctstoptime) = $tahun";
                        $sql12 = mysqli_query($koneksi, $query12);
                        $data12 = mysqli_fetch_row($sql12);
                        if ($data12[0] == NULL && $data12[1] == NULL) {
                            $up12 = 0;
                            $down12 = 0;
                        } else {
                            $up12 = substr($data12[0] / 1073741824, 0, 11);
                            $down12 = substr($data12[1] / 1073741824, 0, 11);
                        }

                        ?>

                        <!-- LINE CHART -->
                        <div class="card col-6">
                            <div class="card-header">
                                <center>
                                    <h4>Bandwidth(Gigabyte) </h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- Grafik Login Bulanan -->

                        <?php
                        include('./controller/koneksi.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $tahun = date("Y");

                        $querylog1 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 1 and year(acctstoptime) = $tahun";
                        $sqllog1 = mysqli_query($koneksi, $querylog1);
                        $datalog1 = mysqli_fetch_row($sqllog1);
                        $hasil1 = implode($datalog1);


                        $querylog2 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 2 and year(acctstoptime) = $tahun";
                        $sqllog2 = mysqli_query($koneksi, $querylog2);
                        $datalog2 = mysqli_fetch_row($sqllog2);
                        $hasil2 = implode($datalog2);


                        $querylog3 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 3 and year(acctstoptime) = $tahun";
                        $sqllog3 = mysqli_query($koneksi, $querylog3);
                        $datalog3 = mysqli_fetch_row($sqllog3);
                        $hasil3 = implode($datalog3);

                        $querylog4 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 4 and year(acctstoptime) = $tahun";
                        $sqllog4 = mysqli_query($koneksi, $querylog4);
                        $datalog4 = mysqli_fetch_row($sqllog4);
                        $hasil4 = implode($datalog4);

                        $querylog5 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 5 and year(acctstoptime) = $tahun";
                        $sqllog5 = mysqli_query($koneksi, $querylog5);
                        $datalog5 = mysqli_fetch_row($sqllog5);
                        $hasil5 = implode($datalog5);


                        $querylog6 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 6 and year(acctstoptime) = $tahun";
                        $sqllog6 = mysqli_query($koneksi, $querylog6);
                        $datalog6 = mysqli_fetch_row($sqllog6);
                        $hasil6 = implode($datalog6);


                        $querylog7 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 7 and year(acctstoptime) = $tahun";
                        $sqllog7 = mysqli_query($koneksi, $querylog7);
                        $datalog7 = mysqli_fetch_row($sqllog7);
                        $hasil7 = implode($datalog7);


                        $querylog8 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 8 and year(acctstoptime) = $tahun";
                        $sqllog8 = mysqli_query($koneksi, $querylog8);
                        $datalog8 = mysqli_fetch_row($sqllog8);
                        $hasil8 = implode($datalog8);

                        $querylog9 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 9 and year(acctstoptime) = $tahun";
                        $sqllog9 = mysqli_query($koneksi, $querylog9);
                        $datalog9 = mysqli_fetch_row($sqllog9);
                        $hasil9 = implode($datalog9);

                        $querylog10 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 10 and year(acctstoptime) = $tahun";
                        $sqllog10 = mysqli_query($koneksi, $querylog10);
                        $datalog10 = mysqli_fetch_row($sqllog10);
                        $hasil10 = implode($datalog10);

                        $querylog11 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 11 and year(acctstoptime) = $tahun";
                        $sqllog11 = mysqli_query($koneksi, $querylog11);
                        $datalog11 = mysqli_fetch_row($sqllog11);
                        $hasil11 = implode($datalog11);


                        $querylog12 = "SELECT COUNT(*) as jumlah FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 12 and year(acctstoptime) = $tahun";
                        $sqllog12 = mysqli_query($koneksi, $querylog12);
                        $datalog12 = mysqli_fetch_row($sqllog12);
                        $hasil12 = implode($datalog12);

                        ?>

                        <!-- LINE CHART -->
                        <div class="card col-6">
                            <div class="card-header">
                                <center>
                                    <h4>Login Bulanan </h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->




                    </div>

                    <div class="row">

                        <!-- Grafik Mingguna -->
                        <?php
                        include('./controller/koneksi.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $tahun = date("Y");
                        $minggu_ini = "SELECT date_format(now(), '%u');";
                        $query_total_minggu = mysqli_query($koneksi, $minggu_ini);
                        $total_minggu = mysqli_fetch_row($query_total_minggu);
                        $minggu = $total_minggu[0];
                        if ($minggu % 4 == 0) {
                            $satu = $minggu;
                            $dua = $minggu + 1;
                            $tiga = $minggu + 2;
                            $empat = $minggu + 3;
                        } elseif ($minggu % 4 == 1) {
                            $satu = $minggu - 1;
                            $dua = $minggu;
                            $tiga = $minggu + 1;
                            $empat = $minggu + 2;
                        } elseif ($minggu % 4 == 2) {
                            $satu = $minggu - 2;
                            $dua = $minggu - 1;
                            $tiga = $minggu;
                            $empat = $minggu + 1;
                        } elseif ($minggu % 4 == 3) {
                            $satu = $minggu - 3;
                            $dua = $minggu - 2;
                            $tiga = $minggu - 1;
                            $empat = $minggu;
                        }

                        $querylog1 = "SELECT COUNT(*) AS jumlah_mingguan FROM radacct WHERE acctstoptime > '0000-00-00 00:00:01' AND date_format(accstarttime, '%u') = $satu and year(acctstoptime) = $tahun";
                        $sqllog1 = mysqli_query($koneksi, $querylog1);
                        $datalog1 = mysqli_fetch_row($sqllog1);
                        if (implode($datalog1) == NULL or implode($datalog1) == '') {
                            $hasil1 = 0;
                        } else {
                            $hasil1 = implode($datalog1);
                        }

                        $querylog2 = "SELECT COUNT(*) AS jumlah_mingguan FROM radacct WHERE acctstoptime > '0000-00-00 00:00:01' AND date_format(accstarttime, '%u') = $dua and year(acctstoptime) = $tahun";
                        $sqllog2 = mysqli_query($koneksi, $querylog2);
                        $datalog2 = mysqli_fetch_row($sqllog2);
                        if (implode($datalog2) == NULL or implode($datalog2) == '') {
                            $hasil2 = 0;
                        } else {
                            $hasil2 = implode($datalog2);
                        }

                        $querylog3 = "SELECT COUNT(*) AS jumlah_mingguan FROM radacct WHERE acctstoptime > '0000-00-00 00:00:01' AND date_format(accstarttime, '%u') = $tiga and year(acctstoptime) = $tahun";
                        $sqllog3 = mysqli_query($koneksi, $querylog3);
                        $datalog3 = mysqli_fetch_row($sqllog3);
                        if (implode($datalog3) == NULL or implode($datalog3) == '') {
                            $hasil3 = 0;
                        } else {
                            $hasil3 = implode($datalog3);
                        }

                        $querylog4 = "SELECT COUNT(*) AS jumlah_mingguan FROM radacct WHERE acctstoptime > '0000-00-00 00:00:01' AND date_format(accstarttime, '%u') = $empat and year(acctstoptime) = $tahun";
                        $sqllog4 = mysqli_query($koneksi, $querylog4);
                        $datalog4 = mysqli_fetch_row($sqllog4);
                        if (implode($datalog4) == NULL or implode($datalog4) == '') {
                            $hasil4 = 0;
                        } else {
                            $hasil4 = implode($datalog4);
                        }

                        ?>

                        <!-- LINE CHART -->
                        <div class="card col-6">
                            <div class="card-header">
                                <center>
                                    <h4>Login Mingguan</h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->

                        <!-- harian -->
                        <?php
                        $hari_ini = "SELECT date_format(now(),'%u')";
                        $query_total_hari = mysqli_query($koneksi, $hari_ini);
                        $total_hari = mysqli_fetch_row($query_total_hari);
                        $tahun = date("Y");
                        $hari = $total_hari[0];

                        $hari_ini1 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 1";
                        $query_total_hari1 = mysqli_query($koneksi, $hari_ini1);
                        $total_hari1 = mysqli_fetch_row($query_total_hari1);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari1 = 0;
                        } else {
                            $hari1 = $total_hari1[0];
                        }

                        $hari_ini2 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 2";
                        $query_total_hari2 = mysqli_query($koneksi, $hari_ini2);
                        $total_hari2 = mysqli_fetch_row($query_total_hari2);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari2 = 0;
                        } else {
                            $hari2 = $total_hari2[0];
                        }

                        $hari_ini3 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 3";
                        $query_total_hari3 = mysqli_query($koneksi, $hari_ini3);
                        $total_hari3 = mysqli_fetch_row($query_total_hari3);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari3 = 0;
                        } else {
                            $hari3 = $total_hari3[0];
                        }

                        $hari_ini4 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 4";
                        $query_total_hari4 = mysqli_query($koneksi, $hari_ini4);
                        $total_hari4 = mysqli_fetch_row($query_total_hari4);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari4 = 0;
                        } else {
                            $hari4 = $total_hari4[0];
                        }

                        $hari_ini5 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 5";
                        $query_total_hari5 = mysqli_query($koneksi, $hari_ini5);
                        $total_hari5 = mysqli_fetch_row($query_total_hari5);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari5 = 0;
                        } else {
                            $hari5 = $total_hari5[0];
                        }

                        $hari_ini6 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 6";
                        $query_total_hari6 = mysqli_query($koneksi, $hari_ini6);
                        $total_hari6 = mysqli_fetch_row($query_total_hari6);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari6 = 0;
                        } else {
                            $hari6 = $total_hari6[0];
                        }

                        $hari_ini7 = "SELECT count(*) FROM radacct WHERE year(acctstarttime) = $tahun AND date_format(acctstarttime,'%u') = $hari AND date_format(acctstarttime,'%w') = 7";
                        $query_total_hari7 = mysqli_query($koneksi, $hari_ini7);
                        $total_hari7 = mysqli_fetch_row($query_total_hari7);
                        if ($total_hari1[0] == NULL or $total_hari1[1] == '') {
                            $hari7 = 0;
                        } else {
                            $hari7 = $total_hari7[0];
                        }
                        ?>

                        <!-- LINE CHART -->
                        <div class="card col-6">
                            <div class="card-header">
                                <center>
                                    <h4>7 Hari </h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="myChart3"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>





                    </div>


                    <!-- Mapbox -->
                    <div class="row">
                        <div class="card col-12">

                            <style>
                                #map {
                                    position: relative;
                                    top: 0;
                                    bottom: 0;
                                    width: 100%;
                                }

                                .marker {
                                    background-image: url('./assets/img/mapbox-1.png');
                                    background-size: cover;
                                    width: 50px;
                                    height: 50px;
                                    border-radius: 50%;
                                    cursor: pointer;
                                }

                                .mapboxgl-popup {
                                    min-width: 400px;
                                }

                                .mapboxgl-popup-content {
                                    text-align: center;
                                    font-family: 'Open Sans', sans-serif;
                                }
                            </style>
                            <div id='map' style='height: 600px;'></div>


                            <script>
                                mapboxgl.accessToken = 'pk.eyJ1IjoiYWZpZmZhcmlzIiwiYSI6ImNraDBtYWhxbTBnc2IycXNpYmowMXZ6YmQifQ.SuwwVsZ9ONc2mnEoJ0mvrw';

                                var map = new mapboxgl.Map({
                                    container: 'map',
                                    style: 'mapbox://styles/mapbox/light-v10',
                                    center: [110.3960012, -7.7860458],
                                    zoom: 12
                                });

                                // code from the next step will go here!
                                var geojson = {
                                    type: 'FeatureCollection',
                                    features: [
                                        <?php
                                        include('./controller/koneksi.php');
                                        $sql_map = "SELECT data_wifi.kelurahan, data_wifi.rw, data_wifi.alamat, data_wifi.longitude, data_wifi.latitude, data_wifi.alamat FROM `data_wifi` INNER JOIN radacct on radacct.framedipaddress=data_wifi.ip WHERE (radacct.Username LIKE '%jss%') AND (data_wifi.longitude != NULL OR data_wifi.longitude != '') AND (data_wifi.latitude != NULL OR data_wifi.latitude != '') GROUP BY kelurahan";
                                        $query_map = mysqli_query($koneksi, $sql_map);
                                        $row = 0;
                                        while ($data_map = mysqli_fetch_array($query_map)) {
                                            $row = $row + 1;
                                            if ($row == 1) {
                                                $koma = '';
                                            } else {
                                                $koma = ',';
                                            }

                                            $sql_count = "SELECT COUNT(*) FROM radacct INNER JOIN data_wifi ON data_wifi.ip=radacct.framedipaddress WHERE (radacct.AcctStopTime IS NULL OR radacct.AcctStopTime = '0000-00-00 00:00:00') AND alamat = '$data_map[5]' GROUP BY alamat";
                                            $query_count = mysqli_query($koneksi, $sql_count);
                                            $total_count = mysqli_fetch_row($query_count);
                                            if ($total_count == NULL or $total_count == '') {
                                                $total_count[0] = 0;
                                            }
                                        ?>
                                            <?php echo $koma; ?> {
                                                type: 'Feature',
                                                geometry: {
                                                    type: 'Point',
                                                    coordinates: [<?php echo $data_map[4] ?>, <?php echo $data_map[3] ?>]
                                                },
                                                properties: {
                                                    description: '<table class="table table-striped">' +
                                                        '<tbody>' +
                                                        '<tr>' +
                                                        '<td>Kelurahan :</td>' +
                                                        '<td>' + '<?php echo $data_map[0] ?>' + '</td>' +
                                                        '</tr>' +
                                                        '<tr>' +
                                                        '<td>RW :</td>' +
                                                        '<td>' + '<?php echo $data_map[1] ?>' + '</td>' +
                                                        '</tr>' +
                                                        '<tr>' +
                                                        '<td>Alamat :</td>' +
                                                        '<td>' + '<?php echo $data_map[2] ?>' + '</td>' +
                                                        '</tr>' +
                                                        '<tr>' +
                                                        '<td>Longitude :</td>' +
                                                        '<td>' + '<?php echo $data_map[3] ?>' + '</td>' +
                                                        '</tr>' +
                                                        '<tr>' +
                                                        '<td>Latitude :</td>' +
                                                        '<td>' + '<?php echo $data_map[4] ?>' + '</td>' +
                                                        '</tr>' +
                                                        '<tr>' +
                                                        '<td>Total :</td>' +
                                                        '<td>' + '<?php echo $total_count[0]; ?>' + '</td>' +
                                                        '</tr>' +
                                                        '</tbody>' +
                                                        '</table>'
                                                }
                                            }
                                        <?php } ?>
                                    ]
                                };

                                // add markers to map
                                geojson.features.forEach(function(marker) {

                                    // create a HTML element for each feature
                                    var el = document.createElement('div');
                                    el.className = 'marker';

                                    // make a marker for each feature and add to the map
                                    new mapboxgl.Marker(el)
                                        .setLngLat(marker.geometry.coordinates)
                                        .addTo(map);

                                    new mapboxgl.Marker(el)
                                        .setLngLat(marker.geometry.coordinates)
                                        .setPopup(new mapboxgl.Popup({
                                                offset: 25
                                            }) // add popups
                                            .setHTML('<p>' + marker.properties.description + '</p>'))
                                        .addTo(map);
                                });
                                // Add pencarian geocoder
                                map.addControl(
                                    new MapboxGeocoder({
                                        accessToken: mapboxgl.accessToken,
                                        // marker pencarian
                                        mapboxgl: mapboxgl
                                    })
                                );

                                // Add zoom and rotation controls to the map.
                                map.addControl(new mapboxgl.NavigationControl());

                                // Add geolocate control to the map.
                                map.addControl(
                                    new mapboxgl.GeolocateControl({
                                        positionOptions: {
                                            enableHighAccuracy: true
                                        },
                                        trackUserLocation: true
                                    })
                                );
                            </script>
                        </div>
                    </div>
                    <!-- /.Mapbox -->
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

<!-- page script -->


<script>
    var lineChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ],
        datasets: [{
            label: 'Download(Gb)',
            borderColor: window.chartColors.red,
            backgroundColor: window.chartColors.red,
            fill: false,
            data: [<?php echo $down1; ?>, <?php echo $down2; ?>, <?php echo $down3; ?>, <?php echo $down4; ?>, <?php echo $down5; ?>, <?php echo $down6; ?>, <?php echo $down7; ?>, <?php echo $down8; ?>, <?php echo $down9; ?>, <?php echo $down10; ?>, <?php echo $down11; ?>, <?php echo $down12; ?>],
            yAxisID: 'y-axis-1',
        }, {
            label: 'Upload(Gb)',
            borderColor: window.chartColors.blue,
            backgroundColor: window.chartColors.blue,
            fill: false,
            data: [<?php echo $up1; ?>, <?php echo $up2; ?>, <?php echo $up3; ?>, <?php echo $up4; ?>, <?php echo $up5; ?>, <?php echo $up6; ?>, <?php echo $up7; ?>, <?php echo $up8; ?>, <?php echo $up9; ?>, <?php echo $up10; ?>, <?php echo $up11; ?>, <?php echo $up12; ?>],
            yAxisID: 'y-axis-1'
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = Chart.Line(ctx, {
            data: lineChartData,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: true,
                scales: {
                    yAxes: [{
                        type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: 'left',
                        id: 'y-axis-1',
                    }, {
                        type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: false,
                        position: 'right',
                        id: 'y-axis-2',

                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
                }
            }
        });
    };
</script>

<!-- Grafik Login Bulanan -->
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                'November', 'Desember'
            ],
            datasets: [{
                label: 'Jumlah',
                data: [<?php echo $hasil1; ?>, <?php echo $hasil2; ?>, <?php echo $hasil3; ?>, <?php echo $hasil4; ?>, <?php echo $hasil5; ?>, <?php echo $hasil6; ?>, <?php echo $hasil7; ?>, <?php echo $hasil8; ?>, <?php echo $hasil9; ?>, <?php echo $hasil10; ?>, <?php echo $hasil11; ?>, <?php echo $hasil12; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: true,
            scales: {
                yAxes: [{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<!-- mingguan -->
<script>
    var ctx = document.getElementById('myChart2');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            datasets: [{
                label: 'Jumlah',
                data: [<?php echo $hasil1; ?>, <?php echo $hasil2; ?>, <?php echo $hasil3; ?>, <?php echo $hasil4; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: true,
            scales: {
                yAxes: [{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<!-- harian -->
<script>
    var ctx = document.getElementById('myChart3');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Jumlah',
                data: [<?php echo $hari1; ?>, <?php echo $hari2; ?>, <?php echo $hari3; ?>, <?php echo $hari4; ?>, <?php echo $hari5; ?>, <?php echo $hari6; ?>, <?php echo $hari7; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: true,
            scales: {
                yAxes: [{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>