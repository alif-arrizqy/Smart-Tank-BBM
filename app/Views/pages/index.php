<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<meta http-equiv="refresh" content="300; url=" <?php echo $_SERVER['PHP_SELF']; ?>">
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($tinggi_pertalite->getResult() as $rs) {
                $t_pertalite = $rs->tinggi_ir;
            }

            foreach ($tinggi_pertamax->getResult() as $rsl) {
                $t_pertamax = $rsl->tinggi_ir;
            }
            ?>
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card overflow-hidden">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">TANKI PERTALITE</h6>
                    </div>
                    <div id="div_refresh">
                        <div class="card-content">
                            <div class="card-body p-4 text-center">
                                <div class="my-auto">
                                    <img class="card-img-center rounded-0" src="<?= base_url('public/assets/images/tank_pertalite.png') ?>">
                                </div>
                                <div class="content my-3">
                                    <p class="mb-0 font-w-800 tx-s-12">Kapasitas Tanki : <?= $t_pertalite ?> ml </p>
                                </div>
                                <?php if ($t_pertalite >= 301 && $t_pertalite <= 1000) { ?>
                                    <div class="card bg-success my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : TERISI </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($t_pertalite >= 1 && $t_pertalite <= 300) {
                                    $api = 'http://localhost/smart_tankibbm/sendEmailPertalite';
                                    $ch = curl_init($api);
                                    // Set the file URL to fetch through cURL
                                    curl_setopt($ch, CURLOPT_URL, $api);

                                    // Do not check the SSL certificates
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                                    // Return the actual result of the curl result instead of success code
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                    $data = curl_exec($ch);
                                    curl_close($ch);
                                    // return $data;

                                    // auto refresh web setiap 1 menit
                                    $url = $_SERVER['REQUEST_URI'];
                                    header("Refresh: 1800; URL=$url");
                                    redirect()->to('/Home');
                                ?>
                                    <div class="card bg-warning my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : HAMPIR HABIS </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </a> -->
                                <?php } ?>
                                <?php if ($t_pertalite == 0) { ?>
                                    <div class="card bg-light my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : KOSONG </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card overflow-hidden">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title"> TANKI PERTAMAX</h6>
                    </div>
                    <div id="div_refresh">
                        <div class="card-content">
                            <div class="card-body p-4 text-center">
                                <div class="my-auto">
                                    <img class="card-img-center rounded-0" src="<?= base_url('public/assets/images/tank_pertamax.png') ?>">
                                </div>
                                <div class="content my-3">
                                    <p class="mb-0 font-w-800 tx-s-12">Kapasitas Tanki : <?= $t_pertamax ?> ml </p>
                                </div>
                                <?php if ($t_pertamax >= 301 && $t_pertamax <= 1000) { ?>
                                    <div class="card bg-success my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : TERISI </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($t_pertamax >= 1 && $t_pertamax <= 300) {
                                    $api = 'http://localhost/smart_tankibbm/sendEmailPertamax';
                                    $ch = curl_init($api);
                                    // Set the file URL to fetch through cURL
                                    curl_setopt($ch, CURLOPT_URL, $api);

                                    // Do not check the SSL certificates
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                                    // Return the actual result of the curl result instead of success code
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                    $data = curl_exec($ch);
                                    curl_close($ch);
                                    // return $data;

                                    // auto refresh web setiap 1 menit
                                    $url = $_SERVER['REQUEST_URI'];
                                    header("Refresh: 1800; URL=$url");
                                    redirect()->to('/Home');
                                ?>
                                    <div class="card bg-warning my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : HAMPIR HABIS </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </a> -->
                                <?php } ?>
                                <?php if ($t_pertamax == 0) { ?>
                                    <div class="card bg-light my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : KOSONG </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>