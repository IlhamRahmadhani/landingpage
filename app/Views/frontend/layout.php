<?php
$settings = SETTINGS;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Home | Admisi - Pendaftaran Mahasiswa Baru</title>
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?= base_url('frontend/assets/images/fav.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('frontend/assets/images/fav.png') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/menus.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/owl.carousel.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/fonts/elegant-icon.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/magnific-popup.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/animations.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/custom-spacing.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/assets/css/responsive.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('frontend/w3.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <?php if (isset($showFixedButton)) : ?>
        <div class="fixed-button" style="">
            <div class="sub-buttons text-center">
                <span style="font-size: 14px; font-weight: bold;">Pendaftaran Mahasiswa Baru Tahun Akademik 2023/2024</span><br>
                <br> <a href="https://smart.bakrie.ac.id/registrasi/registrasiForm"><button style="background-color: #85171a;color: #fff; margin-bottom: 10px;" class="text-center">S1 Reguler</button></a>
                <a href="https://smart.bakrie.ac.id/registerkk"> <button class="text-center" style="background-color: #a1a1a1;color: #fff;margin-bottom: 10px;"> Kelas Karyawan</button>
                    <a href="https://smart.bakrie.ac.id/pendaftaran"> <button class="text-center" style="background-color: #f28f2f;color: #fff;margin-bottom: 10px;"> Magister</button></a>
                </a>
            </div>
        </div>
    <?php endif ?>
    <div id="react__preloader">
        <div id="react__circle_loader"></div>
    </div>
    <header id="react-header" class="react-header">
        <div class="topbar-area style1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="topbar-contact">
                            <ul>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    <a href="<?= base_url("tel:$settings[telephone]") ?>"> <?= $settings['telephone'] ?></a>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <a href="<?= base_url("mailto:$settings[email]") ?>"><?= $settings['email'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 text-right">
                        <div class="toolbar-sl-share">
                            <ul class="social-links">
                                <li><a href="<?= $settings['facebook'] ?>"><span aria-hidden="true" class="social_facebook"></span></a></li>
                                <li><a href="<?= $settings['twitter'] ?>"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                <li><a href="<?= $settings['linkedin'] ?>"><span aria-hidden="true" class="social_linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-part">
            <div class="container">
                <div class="react-main-menu">
                    <nav>
                        <div class="menu-toggle">
                            <a href="<?= base_url('') ?>">
                                <div class="logo"> <img src="<?= base_url('frontend/assets/images/logo-ub.png') ?>" alt="logo"></div>
                            </a>
                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="react-inner-menus">
                            <ul id="backmenu" class="react-menus home react-sub-shadow">
                                <li> <a href="<?= base_url('') ?>">Home</a>
                                </li>
                                </li>
                                <li> <a href="<?= base_url('fasilitas') ?>">Fasilitas</a>
                                </li>
                                <li> <a href="<?= base_url('biaya') ?>">Biaya</a>
                                </li>
                                <li> <a href="<?= base_url('kontak-kami') ?>">Kontak Kami</a></li>
                                <li>
                                    <div class="dropdown">
                                        <a href="https://smart.bakrie.ac.id/site"> <button class="btn btn-primary " style="background-color: #85171a; color: white; padding: 15px;margin-top:19px;border:none;" target="_blank">Login
                                            </button></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="react-wrapper">
        <div class="react-wrapper-inner"><?= $this->renderSection('content'); ?></div>
    </div>
    <div class="space" style="height:25vh"></div>
    <footer id="react-footer" class="react-footer home-main">
    </footer>
    <script src="<?= base_url('frontend/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/modernizr-2.8.3.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/jquery.magnific-popup.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/jquery.counterup.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/wow.min.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/menus.js') ?>"></script>
    <script src="<?= base_url('frontend/assets/js/plugins.js') ?>"></script>
    <script src="<?= base_url('frontend/script.js') ?>"></script>
    <script>
        const disableSticky = ('<?= isset($disableSticky) ? 'true' : 'false' ?>' == 'true');
    </script>
    <script src="<?= base_url('frontend/assets/js/main.js') ?>"></script>
    <script src="https://kit.fontawesome.com/11dd8dbdc4.js" crossorigin="anonymous"></script>
    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }
        <?php if (isset($showFixedButton)) : ?>
            var viewportHeight = window.innerHeight;
            var scrollPercentage = 70;
            var triggerScroll = (viewportHeight / 100) * scrollPercentage;
            window.addEventListener("scroll", function() {
                if (window.pageYOffset >= triggerScroll) {
                    document.querySelector(".fixed-button").classList.add("scrolled");
                } else {
                    document.querySelector(".fixed-button").classList.remove("scrolled");
                }
            });
        <?php endif ?>
    </script>
</body>

</html>