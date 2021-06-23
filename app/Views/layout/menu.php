<!-- --------------------- Admin ---------------------------------- -->
<?php if (session()->get('status') == 1) {
    $status = 'Manager';
} else if (session()->get('status') == 2) {
    $status = 'Petugas';
}
?>

<?php if (session()->get('status') == 1) { ?>
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User Profile-->
            <div class="user-profile">
                <div class="user-pro-body">
                    <div>
                        <img src="<?= base_url('public/assets/images/user.png') ?>" alt="user-img">
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                            <?= session()->get('fullname') ?> / <?= $status ?>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="<?= base_url('Profile') ?>" class="dropdown-item">
                                <i class="ti-user"></i> My Profile</a>
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="<?= base_url('login/logout') ?>" class="dropdown-item">
                                <i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <a class="waves-effect waves-dark" href="<?= base_url('Home') ?>" aria-expanded="false">
                            <i class="icon-home"></i>
                            <span class="hide-menu">Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="<?= base_url('Manage-user') ?>" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Management User
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-chart"></i>
                            <span class="hide-menu">Grafik</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="<?= base_url('Grafik-masuk') ?>">Pengisian BBM</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Grafik-keluar') ?>">Pengeluaran BBM</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-layout-accordion-merged"></i>
                            <span class="hide-menu">Laporan Pengisian</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="<?= base_url('Pengisian-pertalite') ?>">Pengisian Pertalite</a>
                            </li>
                            <li>
                                <a href="<?= ('Pengisian-pertamax') ?>">Pengisian Pertamax</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-layout-accordion-merged"></i>
                            <span class="hide-menu">Laporan Pengeluaran</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="<?= base_url('Pengeluaran-pertalite') ?>">Pengeluaran Pertalite</a>
                            </li>
                            <li>
                                <a href="<?= ('Pengeluaran-pertamax') ?>">Pengeluaran Pertamax</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
<?php } ?>


<!-- --------------------- User ---------------------------------- -->
<?php if (session()->get('status') == 2) { ?>
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User Profile-->
            <div class="user-profile">
                <div class="user-pro-body">
                    <div>
                        <img src="<?= base_url('public/assets/images/user.png') ?>" alt="user-img" class="img-circle">
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?= session()->get('fullname') ?> / <?= $status ?>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item">
                                <i class="ti-user"></i> My Profile</a>
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="<?= base_url('login/logout') ?>" class="dropdown-item">
                                <i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <a class="waves-effect waves-dark" href="<?= base_url('/') ?>" aria-expanded="false">
                            <i class="icon-home"></i>
                            <span class="hide-menu">Home
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="<?= base_url('/') ?>" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span class="hide-menu">My Profile
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
<?php } ?>