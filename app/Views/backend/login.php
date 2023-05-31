<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('global/favicon.png') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('global/favicon.png') ?>">
    <title>
        Login Page
    </title>

    <link rel="canonical" href="<?= base_url() ?>" />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="<?= base_url('backend/css/nucleo-icons.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('backend/css/nucleo-svg.css') ?>" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link id="pagestyle" href="<?= base_url('backend/css/material-dashboard.min.css?v=3.0.6') ?>" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" class="text-start" fLogin method="POST" action="<?= base_url('landingpage/login') ?>">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" bLogin class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?= base_url('backend/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('backend/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('backend/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('backend/js/plugins/smooth-scrollbar.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= base_url('backend/js/material-dashboard.min.js?v=3.0.6') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="<?= base_url('backend/js/login.js') ?>"></script>
</body>

</html>