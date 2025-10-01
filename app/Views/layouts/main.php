<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg'); ?>" type="image/x-icon" />
    <title>Disarpras</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/lineicons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/materialdesignicons.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />
</head>

<body>

    <?php $idu = session('id_user'); ?>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="<?= site_url('/') ?>">
                <h2>Disarpras</h2>
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <?= view('layouts/menu') ?>
            </ul>
        </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-15">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <div class="image">
                                                <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" />
                                            </div>
                                            <div>
                                                <h6 class="fw-500"><?= session('nama'); ?></h6>
                                                <p><?= session('role'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="<?= site_url('users/edit/' . $idu) ?>"> <i class="lni lni-cog"></i> Settings </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('profil/edit/' . $idu) ?>"> <i class="lni lni-user"></i> Profil </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('/backup') ?>"> <i class="lni lni-cloud-download"></i> Backup DB </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('/logout') ?>"> <i class="lni lni-exit"></i> Sign Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <?= $this->renderSection('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                Designed and Developed by
                                <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                    PlainAdmin
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms d-flex justify-content-center justify-content-md-end">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dynamic-pie-chart.js'); ?>"></script>
    <script src="<?= base_url('assets/js/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fullcalendar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jvectormap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/world-merc.js'); ?>"></script>
    <script src="<?= base_url('assets/js/polyfill.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

</body>

</html>