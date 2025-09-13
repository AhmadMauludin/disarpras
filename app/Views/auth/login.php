<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Login Disarpras</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/lineicons.css" rel="stylesheet" type="text/css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />
</head>

<body>

    <div class="signin-wrapper">
        <div class="form-wrapper">
            <h1 class="mb-15">Login Disarprass</h1>


            <?php if (session()->getFlashdata('error')): ?>
                <p style="color:red"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <?php if (session()->getFlashdata('salahpw')): ?>
                <p style="color:red"><?= session()->getFlashdata('salahpw') ?></p>
            <?php endif; ?>


            <form action="<?= base_url('/proses-login') ?>" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="username" />
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>

                    <!-- end col -->
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button class="main-btn primary-btn btn-hover w-100 text-center">
                                Sign In
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </form>
        </div>
    </div>



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