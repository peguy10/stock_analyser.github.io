<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <?php include('../components/header2.php') ?>
        <?php include('../components/sidebar2.php') ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Supplier Management</h4>
                        <h6>Edit/Update Customer</h6>
                    </div>
                </div>
                <!-- formulaire -->
                <form name="main" action="editsuppliertodatabase.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                        <input type="text" value="<?php echo $_GET['name_supplier']; ?>" id="name_supplier" name="name_supplier">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="<?php echo $_GET['email_supplier']; ?>" id="email_supplier" name="email_supplier">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" value="<?php echo $_GET['phone_supplier']; ?>" id="phone_supplier" name="phone_supplier">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Choose Country</label>
                                        <select class="select" value="<?php echo $_GET['country_supplier']; ?>" id="country_supplier" name="country_supplier">
                                            <option><?php echo $_GET['country_supplier']; ?></option>
                                            <option>India</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="select" value="<?php echo $_GET['city_supplier']; ?>" id="city_supplier" name="city_supplier">
                                            <option><?php echo $_GET['city_supplier']; ?></option>
                                            <option>City 1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" value="<?php echo $_GET['address_supplier']; ?>" id="address_supplier" name="address_supplier">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" id="description_supplier" name="description_supplier"><?php echo $_GET['description_supplier']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Avatar</label>
                                        <div>
                                            <input type="file">
                                            <div>
                                                <img src="<?php echo $_GET['avatar_supplier']; ?>" alt="img">
                                                <input type="hidden" value="<?php echo $_GET['avatar_supplier']; ?>" id="old_supplier_image" name="old_supplier_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>ID <?php echo $_GET['id']; ?></label>
                                    <input type="hidden" value="<?php echo $_GET['id']; ?>" id="id" name="id">
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" name="submit" value="submit" class="btn btn-submit me-2"></input>
                                    <!-- <a href="javascript:void(0);" class="btn btn-submit me-2">Update</a> -->
                                    <a href="supplierlist.php" class="btn btn-cancel">Cancel</a>
                                </div>

                            </div>

                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>