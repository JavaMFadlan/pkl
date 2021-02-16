<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- PAGE CONTENT-->
        <?php
            $p = 0;
            foreach ($data as $key) {
                $p += $key['kasus'];
            }
        ?>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" 
            style="background-image: url('{{asset('img/covid-banner.jpg')}}');
                    background-repeat: no-repeat; 
                    background-size: cover;">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <div class="overview-box clearfix">
                    <h1>Total Data Global Yang Sial </h1>
                    <div class="number">
                        <h2>{{number_format($p)}}</h2>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="page-content--bgf7">
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                    <?php 
                            $m = 0;
                            $g = 0;
                            $h = 0;
                            $k = 0;
                            foreach ($data as $key) {
                                    $g += $key['aktif'];
                                    $h += $key['meninggal'];
                                    $k += $key['sembuh'];
                                }
                            foreach ($tracking as $ke) {
                                $m += $ke->total;
                            }
                            ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">{{number_format($g)}}</h2>
                                <span class="desc">Total Aktif</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-time-countdown"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">{{number_format($h)}}</h2>
                                <span class="desc">Total meninggal</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-mood-bad"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">{{number_format($k)}}</h2>
                                <span class="desc">Total Sembuh</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-mood"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">{{number_format($m)}}</h2>
                                <span class="desc">Total Kasus</span>
                                <div class="icon">
                                    <object data="{{asset('svg/indonesia.svg')}}" width="150" height="150" style="opacity: 0.5;"> </object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- STATISTIC CHART-->
            <section class="statistic-chart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">statistics</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic-chart-1">
                                <h3 class="title-3 m-b-30">Persentase</h3>
                                <div class="chart-wrap">
                                    <div class="container" style="width: 100%; height:80vh">
                                        <div id="Bar"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END CHART-->
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <!-- TOP CAMPAIGN-->
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">Top Global Maut</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign scrollable">
                                        <tbody>
                                            <?php
                                            $b = 0;
                                                foreach ($data as $it) {
                                                    $b++;
                                                ?>
                                            <tr>
                                                <td>{{$it['nama_negara']}}</td>
                                                <td>{{number_format($it['kasus'])}}</td>
                                            </tr>
                                            <?php
                                                if ($b > 7) {
                                                    break;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END TOP CAMPAIGN-->
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <!-- CHART PERCENT-->
                            <div class="chart-percent-2">
                                <h3 class="title-3 m-b-30">Persentase</h3>
                                    <div class="container" style="width: 100%; height:80vh">
                                        <div id="Pie"></div>
                                    </div>
                            </div>
                            <!-- END CHART PERCENT-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC CHART-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="title-5 m-b-35">Data Global</h3>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Nama Negara</th>
                                            <th>Kasus</th>
                                            <th>Aktif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal</th>
                                            <th>price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lori@example.com</span>
                                            </td>
                                            <td class="desc">Samsung S8 Black</td>
                                            <td>2018-09-27 02:12</td>
                                            <td>
                                                <span class="status--process">Processed</span>
                                            </td>
                                            <td>$679.00</td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <script>
                <?php 
                $f = 0;
                $g = 0;
                $h = 0;
                $k = 0;
                foreach ($data as $key) {
                        $g += $key['aktif'];
                        $h += $key['meninggal'];
                        $k += $key['sembuh'];
                        $f += $key['kasus'];
                    }
                $n = ($g / $f) * 100;
                $m = ($h / $f) * 100;
                $b = ($k / $f) * 100;
                ?>
                var kasus = <?php echo $f?>;
                var aktif = <?php echo $n?>;
                var meninggal = <?php echo $m?>;
                var sembuh = <?php echo $b?>;
                window.onload = function() {
                var chart = new CanvasJS.Chart("Pie", {
                        animationEnabled: true,
                        data: [{
                            responsive: true,
                            maintainAspectRatio	: false,
                                type: "pie",
                                startAngle: 240,
                                yValueFormatString: "##0.00\"%\"",
                                indexLabel: "{label} {y}",
                                dataPoints: [
                                        {y: aktif, label: "aktif"},
                                        {y: meninggal, label: "meninggal"},
                                        {y: sembuh, label: "sembuh"}
                                ]
                        }]
                });
                var chart1 = new CanvasJS.Chart("Bar", {
                    animationEnabled: true,
                    theme: "light2",
                    data: [{   
                        responsive: true,
                        maintainAspectRatio	: false,     
                        type: "column",  
                        showInLegend: true, 
                        dataPoints: [      
                            <?php 
                            $nm = 0;
                                foreach ($data as $bu) {
                                    $nm++;
                                ?>
                            { y: {{$bu['kasus']}}, label: "{{$bu['nama_negara']}}" },
                            <?php 
                            if ($nm > 5) {
                                break;
                                }
                            }
                        ?>
                        ]
                    }]
                });
                chart.render();
                chart1.render();
                }
        </script>
    <!-- Jquery JS-->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
