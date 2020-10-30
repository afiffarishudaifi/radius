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
                                    // mysqli_close($koneksi);
                                    ?>
                                    <h3><?php echo $total_user[0]; ?></h3>

                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-persons"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $sql_online = "SELECT COUNT(*) FROM radacct WHERE acctstoptime >= date_format(now(),'%Y-%m-%d %H:%i:%s') OR acctstoptime = ''";
                                    $query_total_online = mysqli_query($koneksi, $sql_online);
                                    $total_online = mysqli_fetch_row($query_total_online);
                                    // mysqli_close($koneksi);
                                    ?>
                                    <h3><?php echo $total_online[0]; ?></h3>

                                    <p>User Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
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
                        <!-- LINE CHART -->
                        <div class="card card-primary col-12">
                            <div class="card-header">
                                <h3 class="card-title">Bandwidth</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                label: "Waiting List",
                borderColor: "rgba(60,141,188,0.8)",
                pointRadius: false,
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [65, 59, 80, 81, 56, 55, 40, 7, 6, 19, 26, 79]
            },
            // {
            //     label: 'Electronics',
            //     borderColor: 'rgba(210, 214, 222, 1)',
            //     pointRadius: false,
            //     pointColor: 'rgba(210, 214, 222, 1)',
            //     pointStrokeColor: '#c1c7d1',
            //     pointHighlightFill: '#fff',
            //     pointHighlightStroke: 'rgba(220,220,220,1)',
            //     data: [65, 59, 80, 81, 56, 55, 40, 7, 6, 19, 26,79]
            // },
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