<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>
    <meta name="description" content="Deskripsi singkat halaman ini yang relevan dan mengandung kata kunci.">
    <meta name="keywords" content="koperasi pegawai">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>back/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>back/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h1 class="text-center">Login</h1>
                                    </div>


                                    <?php
                                    if ($this->session->flashdata('error')) {
                                        echo '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <h5><i class="bi bi-sign-stop"></i> Alert!</h5>';
                                        echo $this->session->flashdata('error');
                                        echo '</div>';
                                    }

                                    if ($this->session->flashdata('pesan')) {
                                        echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <h5><i class="bi bi-check-lg"></i> Sukses!</h5>';
                                        echo $this->session->flashdata('pesan');
                                        echo '</div>';
                                    }



                                    echo form_open('auth/login') ?>

                                    <div class="col-12 my-3">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend" style="background-color: dimgrey; color: white;"><i class="bi bi-person"></i></span>
                                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 my-3">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend" style="background-color: dimgrey; color: white;"><i class="bi bi-file-earmark-lock2"></i></span>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your Password.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn w-100" style="background-color: dimgrey; color: white;" type="submit">Login</button>
                                    </div>

                                    <?php echo form_close() ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>back/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>back/assets/js/main.js"></script>
</body>

</html>