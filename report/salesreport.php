<?php

// Connexion à la base de données
include('../inc/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>STOCK ANALYSER</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <!-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> -->

    <div class="main-wrapper">

        <?php
        include('../components/header2.php');
        include('../components/sidebar2.php');
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Sales Report</h4>
                        <h6>Manage your Sales Report</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="" class="form-label">Mois</label>
                                    <select class="form-select form-select-sm" name="mois" id="">
                                        <option value="">selectionner le Mois</option>
                                        <option value="1">JANVIER</option>
                                        <option value="2">FEVRIER</option>
                                        <option value="3">MARS</option>
                                        <option value="4">AVRIL</option>
                                        <option value="5">MAI</option>
                                        <option value="6">JUIN</option>
                                        <option value="7">JUILLET</option>
                                        <option value="8">AOUT</option>
                                        <option value="9">SEPTEMBRE</option>
                                        <option value="10">OCTOBRE</option>
                                        <option value="11">NOVEMBRE</option>
                                        <option value="12">DECEMBRE</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4 mt-4">
                                    <label for="" class="form-label"></label>
                                    <button type="submit" class="btn btn-warning text-white" name="analyser">analyser</button>
                                </div>

                            </div>
                        </form>
                        <?php include('../prediction/prediction.php'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>