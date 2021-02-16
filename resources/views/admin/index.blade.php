@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="mt-4"></div>
                        <div class="row">
                        
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col">
                                    <div id="barChart" width="100%" height="40"></div>
                                </div>
                                <div class="col">
                                    <div id="chartContainer" width="100%" height="40"></div>
                                </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header text-center">
                                <h3>Global</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Negara</th>
                                                <th>Kasus</th>
                                                <th>Aktif</th>
                                                <th>Sembuh</th>
                                                <th>Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1 @endphp
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item['nama_negara']}}</td>
                                                <td>{{$item['kasus']}}</td>
                                                <td>{{$item['aktif']}}</td>
                                                <td>{{$item['sembuh']}}</td>
                                                <td>{{$item['meninggal']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
@endsection
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
                    }
                $f = $g + $h + $k;
                $n = ($g / $f) * 100;
                $m = ($h / $f) * 100;
                $b = ($k / $f) * 100;
                ?>
                var kasus = <?php echo $f?>;
                var aktif = <?php echo $n?>;
                var meninggal = <?php echo $m?>;
                var sembuh = <?php echo $b?>;
                window.onload = function() {
                var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                                text: "Total Data Global"
                        },
                        data: [{
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
                chart.render();
                }
        </script>
        <script>
            window.onload = function () {
                var chart = new CanvasJS.Chart("barChart", {
                    animationEnabled: true,
                    axisX:{
                        interval: 1
                    },
                    axisY2:{
                        interlacedColor: "rgba(1,77,101,.2)",
                        gridColor: "rgba(1,77,101,.1)",
                        title: "Number of Companies"
                    },
                    data: [{
                        type: "bar",
                        name: "companies",
                        axisYType: "secondary",
                        indexLabel: "{nama} {v}",
                        color: "#014D65",
                        dataPoints: [
                            <?php
                            $pp = 0;
                                foreach ($data as $no) {
                                    if ($pp++ > 10) {
                                        break;
                                    }
                                    ?>
                            { v: <?= $no['kasus']?>, nama: "<?= $no['nama_negara']?>" },
                            <?php }?>
                        ]
                    }]
                });
                chart.render();
                
                }
        </script>