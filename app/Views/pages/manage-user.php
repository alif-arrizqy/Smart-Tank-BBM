<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Datatable</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Management User</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Export</h4>
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>email</th>
                                        <th>No Telp</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($listUser as $rs) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $rs['username'] ?></td>
                                            <td><?= $rs['email'] ?></td>
                                            <td><?= $rs['mobile'] ?></td>
                                            <?php if ($rs['status'] == 1) {
                                                $status = 'Manager/Admin';
                                            } else if ($rs['status'] == 2) {
                                                $status = 'Petugas/User';
                                            } ?>
                                            <td><?= $status ?></td>
                                        <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>