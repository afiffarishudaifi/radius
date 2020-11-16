<?php include('./_partials/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">

    <!-- Mapbox -->
    <script src="./assets/dist/mapbox/js/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="./assets/dist/mapbox/css/mapbox-gl-geocoder.css" type="text/css" />
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
                                    $sqlCommand = "SELECT COUNT(id) FROM radcheck";
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
                                <a href="total-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    include('./controller/koneksi.php');
                                    $sql_online = "SELECT COUNT(radacctid) FROM radacct WHERE (radacct.AcctStopTime IS NULL OR radacct.AcctStopTime = '0000-00-00 00:00:00') AND (radacct.Username LIKE '%jss%')";
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

                        for ($bulan = 01; $bulan < 13; $bulan++) {
                            $query_up_down = mysqli_query($koneksi, "SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' FROM `radacct` WHERE acctstoptime > '0000-00-00 00:00:01' AND month(acctstoptime) = '$bulan' and year(acctstoptime) = '$tahun'");
                            $row_up_down = $query_up_down->fetch_array();
                            $upload[] = substr($row_up_down['upload'] / 1073741824, 0, 11);
                            $download[] = substr($row_up_down['download'] / 1073741824, 0, 11);
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
                        $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                        for ($bulan = 1; $bulan < 13; $bulan++) {
                            $query = mysqli_query($koneksi, "SELECT COUNT(id) as jumlah FROM radpostauth WHERE MONTH(authdate)=$bulan and year(authdate) = $tahun and reply = 'Access-Accept'");
                            $row = $query->fetch_array();
                            $jumlah_id[] = $row['jumlah'];

                            $query2 = mysqli_query($koneksi, "SELECT COUNT(id) as jumlah2 FROM radpostauth WHERE MONTH(authdate)=$bulan and year(authdate) = $tahun and reply = 'Access-Reject'");
                            $row2 = $query2->fetch_array();
                            $jumlah_id2[] = $row2['jumlah2'];
                        }

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
                        
                        $queryacc1 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $satu AND reply='Access-Accept'";
                        $sqlacc1 = mysqli_query($koneksi, $queryacc1);
                        $dataacc1 = mysqli_fetch_row($sqlacc1);
                        if (implode($dataacc1) == NULL or implode($dataacc1) == '') {
                            $hasilacc1 = 0;
                        } else {
                            $hasilacc1 = implode($dataacc1);
                        }

                        $queryrej1 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $satu AND reply='Access-Reject'";
                        $sqlrej1 = mysqli_query($koneksi, $queryrej1);
                        $datarej1 = mysqli_fetch_row($sqlrej1);
                        if (implode($datarej1) == NULL or implode($datarej1) == '') {
                            $hasilrej1 = 0;
                        } else {
                            $hasilrej1 = implode($datarej1);
                        }

                        $queryacc2 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $dua AND reply='Access-Accept'";
                        $sqlacc2 = mysqli_query($koneksi, $queryacc2);
                        $dataacc2 = mysqli_fetch_row($sqlacc2);
                        if (implode($dataacc2) == NULL or implode($dataacc2) == '') {
                            $hasilacc2 = 0;
                        } else {
                            $hasilacc2 = implode($dataacc2);
                        }

                        $queryrej2 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $dua AND reply='Access-Reject'";
                        $sqlrej2 = mysqli_query($koneksi, $queryrej2);
                        $datarej2 = mysqli_fetch_row($sqlrej2);
                        if (implode($datarej2) == NULL or implode($datarej2) == '') {
                            $hasilrej2 = 0;
                        } else {
                            $hasilrej2 = implode($datarej2);
                        }

                        $queryacc3 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $tiga AND reply='Access-Accept'";
                        $sqlacc3 = mysqli_query($koneksi, $queryacc3);
                        $dataacc3 = mysqli_fetch_row($sqlacc3);
                        if (implode($dataacc3) == NULL or implode($dataacc3) == '') {
                            $hasilacc3 = 0;
                        } else {
                            $hasilacc3 = implode($dataacc3);
                        }

                        $queryrej3 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $tiga AND reply='Access-Reject'";
                        $sqlrej3 = mysqli_query($koneksi, $queryrej3);
                        $datarej3 = mysqli_fetch_row($sqlrej3);
                        if (implode($datarej3) == NULL or implode($datarej3) == '') {
                            $hasilrej3 = 0;
                        } else {
                            $hasilrej3 = implode($datarej3);
                        }

                        $queryacc4 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $empat AND reply='Access-Accept'";
                        $sqlacc4 = mysqli_query($koneksi, $queryacc4);
                        $dataacc4 = mysqli_fetch_row($sqlacc4);
                        if (implode($dataacc4) == NULL or implode($dataacc4) == '') {
                            $hasilacc4 = 0;
                        } else {
                            $hasilacc4 = implode($dataacc4);
                        }

                        $queryrej4 = "SELECT COUNT(id) as jumlah FROM radpostauth WHERE year(authdate) = $tahun AND month(authdate) = $bulan AND date_format(authdate,'%u') = $empat AND reply='Access-Reject'";
                        $sqlrej4 = mysqli_query($koneksi, $queryrej4);
                        $datarej4 = mysqli_fetch_row($sqlrej4);
                        if (implode($datarej4) == NULL or implode($datarej4) == '') {
                            $hasilrej4 = 0;
                        } else {
                            $hasilrej4 = implode($datarej4);
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
                        include('./controller/koneksi.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $tahun = date("Y");
                        $hari_ini = "SELECT date_format(now(),'%u')";
                        $query_total_hari = mysqli_query($koneksi, $hari_ini);
                        $total_hari = mysqli_fetch_row($query_total_hari);
                        $minggu = $total_hari[0];
                        
                        for ($day = 1; $day < 8; $day++) {
                            $queryhr = mysqli_query($koneksi, "SELECT COUNT(authdate) as jumlahr FROM radpostauth WHERE year(authdate) = $tahun AND date_format(authdate,'%u') = $minggu AND date_format(authdate,'%w') = $day and reply = 'Access-Accept'");
                            $rowhr = $queryhr->fetch_array();
                            $jumlah_idhr[] = $rowhr['jumlahr'];

                            $queryhr2 = mysqli_query($koneksi, "SELECT COUNT(authdate) as jumlahr2 FROM radpostauth WHERE year(authdate) = $tahun AND date_format(authdate,'%u') = $minggu AND date_format(authdate,'%w') = $day and reply = 'Access-Reject'");
                            $rowhr2 = $queryhr2->fetch_array();
                            $jumlah_idhr2[] = $rowhr2['jumlahr2'];
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
            data: <?php echo json_encode($download); ?>,
            yAxisID: 'y-axis-1',
        }, {
            label: 'Upload(Gb)',
            borderColor: window.chartColors.blue,
            backgroundColor: window.chartColors.blue,
            fill: false,
            data: <?php echo json_encode($upload); ?>,
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
            labels: <?php echo json_encode($label); ?>,
            datasets: [{
                    label: 'Access',
                    data: <?php echo json_encode($jumlah_id); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Reject',
                    data: <?php echo json_encode($jumlah_id2); ?>,
                    backgroundColor: [
                        'rgba(54, 43, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 43, 207, 1)'
                    ],
                    borderWidth: 1
                }
            ]
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
                }, {
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
                    label: 'Access',
                    data: [<?php echo $hasilacc1; ?>, <?php echo $hasilacc2; ?>, <?php echo $hasilacc3; ?>, <?php echo $hasilacc4; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Reject',
                    data: [<?php echo $hasilrej1; ?>, <?php echo $hasilrej2; ?>, <?php echo $hasilrej3; ?>, <?php echo $hasilrej4; ?>],
                    backgroundColor: [
                        'rgba(54, 43, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 43, 207, 1)'
                    ],
                    borderWidth: 1
                }
            ]
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
                    label: 'Access',
                    data: <?php echo json_encode($jumlah_idhr); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Reject',
                    data: <?php echo json_encode($jumlah_idhr2); ?>,
                    backgroundColor: [
                        'rgba(54, 43, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 43, 207, 1)'
                    ],
                    borderWidth: 1
                }
            ]
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
                }, {
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

