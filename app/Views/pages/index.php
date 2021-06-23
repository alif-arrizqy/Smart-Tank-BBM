<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
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
                                    <p class="mb-0 font-w-800 tx-s-12">Kapasitas Tanki : <?= $t_pertalite ?> L </p>
                                </div>

                                <div class="card bg-light my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title">STATUS : KOSONG </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <p class="mb-0 font-w-800 tx-s-12">Kapasitas Tanki : <?= $t_pertamax ?> L </p>
                                </div>

                                <div class="card bg-success my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title">STATUS : TERISI </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>