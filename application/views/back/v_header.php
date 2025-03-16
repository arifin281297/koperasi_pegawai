<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>back/logoWeb/logo.png" rel="icon">
    <link href="<?= base_url() ?>back/logoWeb/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>back/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- dropzone -->
    <link rel="stylesheet" href="<?= base_url() ?>back/assets/ajax/dropzone/dropzone.css">

    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>back/assets/ajax/sweetalert2/sweetalert2.min.css">
    <script src="<?= base_url() ?>back/assets/ajax/sweetalert2/sweetalert2.min.js"></script>


    <!-- jQuery 2.1.4 -->
    <script src="<?= base_url() ?>back/assets/ajax/load/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?= base_url() ?>back/assets/ajax/load/jQueryUI/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- kendo-ui -->
    <link rel="stylesheet" href="<?= base_url() ?>back/assets/ajax/load/KendoUI/styles/kendo.common-material.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>back/assets/ajax/load/KendoUI/styles/kendo.material.min.css">

    <script src="<?= base_url() ?>back/assets/ajax/load/KendoUI/kendo.all.new.min.js"></script>
    <script src="<?= base_url() ?>back/assets/ajax/load/KendoUI/kendo.custom.min.js"></script>
    <script src="<?= base_url() ?>back/assets/ajax/load/KendoUI/jszip1.min.js"></script>


    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>back/assets/css/style.css" rel="stylesheet">


    <style>
        @import url(https://fonts.googleapis.com/css?family=Poppins);

        body,
        .main-header .logo,
        .swal2-modal {
            font-family: 'Poppins', sans-serif;
        }

        .modal-body {
            padding: 15px 15px 0 15px;
        }

        .swal2-container.swal2-in {
            background-color: rgba(0, 0, 0, .7);
        }

        body {
            zoom: 90.5%;
        }

        @media (max-width: 1366px) {
            body {
                zoom: 85%;
            }
        }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center" style="color: black;">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= urlencode(base64_encode(site_url('dashboard'))) ?>" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block" style="font-family: cursive; color: black;"> SISTEM KOPERASI</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn" style="color: black;"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" style="color: black;">
                        <span class="d-none d-md-block dropdown-toggle ps-2" style="font-family: cursive;"><?= $this->session->userdata('nama_user') ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6 style="font-family: cursive;"><?= $this->session->userdata('nama_user') ?></h6>
                            <span style="font-family: cursive;">Login Sebagai : <?php if ($this->session->userdata('level') == 1) {
                                                                                    echo '<span class="badge bg-primary">Admin</span>';
                                                                                }
                                                                                if ($this->session->userdata('level') == 2) {
                                                                                    echo '<span class="badge bg-danger">User</span>';
                                                                                } ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= urlencode(base64_encode(site_url('auth/logout'))) ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->