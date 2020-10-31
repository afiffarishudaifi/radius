<?php include('./_partials/head.php'); ?>

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
                                    $sql_online = "SELECT COUNT(*) FROM radacct WHERE acctstoptime = '0000-00-00 00:00:00' OR acctstoptime = NULL";
                                    $query_total_online = mysqli_query($koneksi, $sql_online);
                                    $total_online = mysqli_fetch_row($query_total_online);
                                    mysqli_close($koneksi);
                                    ?>
                                    <h3><?php echo $total_online[0]; ?></h3>

                                    <p>User Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>  -->


                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">

                        <!-- query grafik -->
                        <?php
                        include('./controller/koneksi.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $tahun = date("Y");



                        $query1 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 01 and year(acctstoptime) = '$tahun'";
                        $sql1 = mysqli_query($koneksi, $query1);
                        $data1 = mysqli_fetch_row($sql1);
                        if ($data1[0] == NULL && $data1[1] == NULL) {
                            $up1 = 0;
                            $down1 = 0;
                        } else {
                            $up1 = $data1[0];
                            $down1 = $data1[1];
                        }

                        $query2 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 02 and year(acctstoptime) = $tahun";
                        $sql2 = mysqli_query($koneksi, $query2);
                        $data2 = mysqli_fetch_row($sql2);
                        if ($data2[0] == NULL && $data2[1] == NULL) {
                            $up2 = 0;
                            $down2 = 0;
                        } else {
                            $up2 = $data2[0];
                            $down2 = $data2[1];
                        }


                        $query3 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 03 and year(acctstoptime) = $tahun";
                        $sql3 = mysqli_query($koneksi, $query3);
                        $data3 = mysqli_fetch_row($sql3);
                        if ($data3[0] == NULL && $data3[1] == NULL) {
                            $up3 = 0;
                            $down3 = 0;
                        } else {
                            $up3 = $data3[0];
                            $down3 = $data3[1];
                        }


                        $query4 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 04 and year(acctstoptime) = $tahun";
                        $sql4 = mysqli_query($koneksi, $query4);
                        $data4 = mysqli_fetch_row($sql4);
                        if ($data4[0] == NULL && $data4[1] == NULL) {
                            $up4 = 0;
                            $down4 = 0;
                        } else {
                            $up4 = $data4[0];
                            $down4 = $data4[1];
                        }


                        $query5 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 05 and year(acctstoptime) = $tahun";
                        $sql5 = mysqli_query($koneksi, $query5);
                        $data5 = mysqli_fetch_row($sql5);
                        if ($data5[0] == NULL && $data5[1] == NULL) {
                            $up5 = 0;
                            $down5 = 0;
                        } else {
                            $up5 = $data5[0];
                            $down5 = $data5[1];
                        }


                        $query6 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 06 and year(acctstoptime) = $tahun";
                        $sql6 = mysqli_query($koneksi, $query6);
                        $data6 = mysqli_fetch_row($sql6);
                        if ($data6[0] == NULL && $data6[1] == NULL) {
                            $up6 = 0;
                            $down6 = 0;
                        } else {
                            $up6 = $data6[0];
                            $down6 = $data6[1];
                        }


                        $query7 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 07 and year(acctstoptime) = $tahun";
                        $sql7 = mysqli_query($koneksi, $query7);
                        $data7 = mysqli_fetch_row($sql7);
                        if ($data7[0] == NULL && $data7[1] == NULL) {
                            $up7 = 0;
                            $down7 = 0;
                        } else {
                            $up7 = $data7[0];
                            $down7 = $data7[1];
                        }


                        $query8 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 08 and year(acctstoptime) = $tahun";
                        $sql8 = mysqli_query($koneksi, $query8);
                        $data8 = mysqli_fetch_row($sql8);
                        if ($data8[0] == NULL && $data8[1] == NULL) {
                            $up8 = 0;
                            $down8 = 0;
                        } else {
                            $up8 = $data8[0];
                            $down8 = $data8[1];
                        }


                        $query9 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 09 and year(acctstoptime) = $tahun";
                        $sql9 = mysqli_query($koneksi, $query9);
                        $data9 = mysqli_fetch_row($sql9);
                        if ($data9[0] == NULL && $data9[1] == NULL) {
                            $up9 = 0;
                            $down9 = 0;
                        } else {
                            $up9 = $data9[0];
                            $down9 = $data9[1];
                        }


                        $query10 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 10 and year(acctstoptime) = $tahun";
                        $sql10 = mysqli_query($koneksi, $query10);
                        $data10 = mysqli_fetch_row($sql10);
                        if ($data10[0] == NULL && $data10[1] == NULL) {
                            $up10 = 0;
                            $down10 = 0;
                        } else {
                            $up10 = $data10[0];
                            $down10 = $data10[1];
                        }


                        $query11 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 11 and year(acctstoptime) = $tahun";
                        $sql11 = mysqli_query($koneksi, $query11);
                        $data11 = mysqli_fetch_row($sql11);
                        if ($data11[0] == NULL && $data11[1] == NULL) {
                            $up11 = 0;
                            $down11 = 0;
                        } else {
                            $up11 = $data11[0];
                            $down11 = $data11[1];
                        }


                        $query12 = "SELECT (SUM(acctinputoctets)/1048576) as 'upload' , (SUM(acctoutputoctets)/1048576) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = 12 and year(acctstoptime) = $tahun";
                        $sql12 = mysqli_query($koneksi, $query12);
                        $data12 = mysqli_fetch_row($sql12);
                        if ($data12[0] == NULL && $data12[1] == NULL) {
                            $up12 = 0;
                            $down12 = 0;
                        } else {
                            $up12 = $data12[0];
                            $down12 = $data12[1];
                        }

                        ?>

                        <!-- LINE CHART -->
                        <div class="card card-primary col-12">
                            <div class="card-header">
                                <h3 class="card-title">Bandwidth(MegaByte)</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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

<!-- page script -->
<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- LINE CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.



        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')

        var lineChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                    label: "Upload",
                    borderColor: "rgba(60,141,188,0.8)",
                    pointRadius: false,
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [<?php echo $up1; ?>, <?php echo $up2; ?>,
                        <?php echo $up3; ?>, <?php echo $up4; ?>, <?php echo $up5; ?>,
                        <?php echo $up6; ?>, <?php echo $up7; ?>, <?php echo $up8; ?>,
                        <?php echo $up9; ?>, <?php echo $up10; ?>, <?php echo $up11; ?>,
                        <?php echo $up12; ?>
                    ]
                },
                {
                    label: 'Download',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo $down1; ?>, <?php echo $down2; ?>,
                        <?php echo $down3; ?>, <?php echo $down4; ?>, <?php echo $down5; ?>,
                        <?php echo $down6; ?>, <?php echo $down7; ?>, <?php echo $down8; ?>,
                        <?php echo $down9; ?>, <?php echo $down10; ?>, <?php echo $down11; ?>,
                        <?php echo $down12; ?>
                    ]
                },
            ]
        }

        var lineChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }
        lineChartData.datasets[0].fill = false;
        lineChartOptions.datasetFill = false

        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })

    })
</script>