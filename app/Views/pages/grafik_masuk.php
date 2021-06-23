<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Grafik Pengisian BBM</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Grafik</a></li>
                        <li class="breadcrumb-item active">Pengisian BBM</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengisian BBM Pertalite</h4>
                        <div>
                            <canvas id="myChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengisian BBM Pertamax</h4>
                        <div>
                            <canvas id="myGrafik" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
foreach ($rekap_pertalite as $lt) {
    $dm[] = $lt['data_masuk'];
    $w[] = $lt['waktu'];
}
?>
<?php
foreach ($rekap_pertamax as $mx) {
    $dmx[] = $mx['data_masuk'];
    $wx[] = $mx['waktu'];
}
?>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($w) ?>,
            datasets: [{
                label: 'Pengisian BBM Pertalite',
                data: <?php echo json_encode($dm) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(60, 206, 34, 0.2)',
                    'rgba(241, 206, 54, 0.2)',
                    'rgba(19, 11, 88, 0.2)',
                    'rgba(88, 40, 30, 0.2)',
                    'rgba(20, 111, 186, 0.2)',
                    'rgba(51, 196, 86, 0.2)',
                    'rgba(78, 128, 86, 0.2)',
                    'rgba(100, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(60, 206, 34, 1)',
                    'rgba(241, 206, 54, 1)',
                    'rgba(19, 11, 88, 1)',
                    'rgba(88, 40, 30, 1)',
                    'rgba(20, 111, 186, 1)',
                    'rgba(51, 196, 86, 1)',
                    'rgba(78, 128, 86, 1)',
                    'rgba(100, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById("myGrafik").getContext('2d');
    var myGrafik = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($wx) ?>,
            datasets: [{
                label: 'Pengisian BBM Pertamax',
                data: <?php echo json_encode($dmx) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(60, 206, 34, 0.2)',
                    'rgba(241, 206, 54, 0.2)',
                    'rgba(19, 11, 88, 0.2)',
                    'rgba(88, 40, 30, 0.2)',
                    'rgba(20, 111, 186, 0.2)',
                    'rgba(51, 196, 86, 0.2)',
                    'rgba(78, 128, 86, 0.2)',
                    'rgba(100, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(60, 206, 34, 1)',
                    'rgba(241, 206, 54, 1)',
                    'rgba(19, 11, 88, 1)',
                    'rgba(88, 40, 30, 1)',
                    'rgba(20, 111, 186, 1)',
                    'rgba(51, 196, 86, 1)',
                    'rgba(78, 128, 86, 1)',
                    'rgba(100, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?= $this->endSection(); ?>