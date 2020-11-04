<?php include('./_partials/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Mapbox -->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css" />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
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
                                <a href="" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
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

                                    <p>Online Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="online-user.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
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
                        <div class="card col-12">
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
                    </div>

                    <!-- Mapbox -->
                    <div class="row">
                        <div class="card col-12">                            
                            <div id='map' style='height: 600px;'></div>

                            <script>
                            mapboxgl.accessToken = 'pk.eyJ1IjoiYWZpZmZhcmlzIiwiYSI6ImNraDBtYWhxbTBnc2IycXNpYmowMXZ6YmQifQ.SuwwVsZ9ONc2mnEoJ0mvrw';
                            var map = new mapboxgl.Map({
                                container: 'map',
                                style: 'mapbox://styles/mapbox/streets-v11',
                                // longitute, latitude
                                center: [110.3960012, -7.7860458],
                                zoom: 12
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

                            var marker = new mapboxgl.Marker()
                                .setLngLat([110.3617331, -7.8046583])
                                .addTo(map);

                            map.on('load', function() {
                                map.loadImage(
                                    'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
                                    // Add an image to use as a custom marker
                                    function(error, image) {
                                        if (error) throw error;
                                        map.addImage('custom-marker', image);

                                        map.addSource('places', {
                                            'type': 'geojson',
                                            'data': {
                                                'type': 'FeatureCollection',
                                                'features': [{
                                                        'type': 'Feature',
                                                        'properties': {
                                                            'description': '<strong>Taman Sari</strong><p>Make it Mount Pleasant is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>'
                                                        },
                                                        'geometry': {
                                                            'type': 'Point',
                                                            'coordinates': [110.3596876, -7.8105834]
                                                        }
                                                    },
                                                    {
                                                        'type': 'Feature',
                                                        'properties': {
                                                            'description': '<strong>Dekat Malioboro</strong><p>Head to Lounge 201 (201 Massachusetts Avenue NE) Sunday for a Mad Men Season Five Finale Watch Party, complete with 60s costume contest, Mad Men trivia, and retro food and drink. 8:00-11:00 p.m. $10 general admission, $20 admission and two hour open bar.</p>'
                                                        },
                                                        'geometry': {
                                                            'type': 'Point',
                                                            'coordinates': [110.3625862, -7.8007155]
                                                        }
                                                    },
                                                    {
                                                        'type': 'Feature',
                                                        'properties': {
                                                            'description': '<strong>Taman Pintar</strong><p>Truckeroo brings dozens of food trucks, live music, and games to half and M Street SE (across from Navy Yard Metro Station) today from 11:00 a.m. to 11:00 p.m.</p>'
                                                        },
                                                        'geometry': {
                                                            'type': 'Point',
                                                            'coordinates': [110.3672428, -7.8010777]
                                                        }
                                                    }
                                                ]
                                            }
                                        });

                                        // Add a layer showing the places.
                                        map.addLayer({
                                            'id': 'places',
                                            'type': 'symbol',
                                            'source': 'places',
                                            'layout': {
                                                'icon-image': 'custom-marker',
                                                'icon-allow-overlap': true
                                            }
                                        });
                                    }
                                );

                                // Create a popup, but don't add it to the map yet.
                                var popup = new mapboxgl.Popup({
                                    closeButton: false,
                                    closeOnClick: false
                                });

                                map.on('mouseenter', 'places', function(e) {
                                    // Change the cursor style as a UI indicator.
                                    map.getCanvas().style.cursor = 'pointer';

                                    var coordinates = e.features[0].geometry.coordinates.slice();
                                    var description = e.features[0].properties.description;

                                    // Ensure that if the map is zoomed out such that multiple
                                    // copies of the feature are visible, the popup appears
                                    // over the copy being pointed to.
                                    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                                    }

                                    // Populate the popup and set its coordinates
                                    // based on the feature found.
                                    popup.setLngLat(coordinates).setHTML(description).addTo(map);
                                });

                                map.on('mouseleave', 'places', function() {
                                    map.getCanvas().style.cursor = '';
                                    popup.remove();
                                });
                            });
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
        data: [<?php echo $down1; ?> , <?php echo $down2; ?>, <?php echo $down3; ?> , <?php echo $down4; ?> , <?php echo $down5; ?> , <?php echo $down6; ?> , <?php echo $down7; ?> , <?php echo $down8; ?> , <?php echo $down9; ?> , <?php echo $down10; ?> , <?php echo $down11; ?> , <?php echo $down12; ?>
        ],
        yAxisID: 'y-axis-1',
    }, {
        label: 'Upload(Gb)',
        borderColor: window.chartColors.blue,
        backgroundColor: window.chartColors.blue,
        fill: false,
        data: [<?php echo $up1; ?> , <?php echo $up2; ?> , <?php echo $up3; ?> , <?php echo $up4; ?> , <?php echo $up5; ?> , <?php echo $up6; ?> , <?php echo $up7; ?> , <?php echo $up8; ?> , <?php echo $up9; ?> , <?php echo $up10; ?> , <?php echo $up11; ?> , <?php echo $up12; ?>
        ],
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