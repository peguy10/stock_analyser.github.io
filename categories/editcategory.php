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
                        <h4>Product Edit Category</h4>
                        <h6>Edit a product Category</h6>
                    </div>
                </div>
                <!-- formulaire -->
                <form name="main" action="editcategorytodatabase.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">

                                        <label>Category Name</label>
                                        <input type="text" value="<?php echo $_GET['name_category']; ?>" id="name_category" name="name_category">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category Code</label>
                                        <input type="text" value="<?php echo $_GET['code_category']; ?>" id="code_category" name="code_category">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" value="<?php echo $_GET['description_category']; ?>" id="description_category" name="description_category">Computers Description</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Product Image</label>
                                        <div>
                                            <input type="file" id="image_category" name="image_category">
                                            <div>
                                                <img src="<?php echo $_GET['image_category']; ?>" alt="img" accept=".jpg, .jpeg, .png">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="product-list">
                                        <ul class="row">
                                            <li class="ps-0">

                                                <div class="productviewscontent">

                                                    <div class="productviewsname">
                                                        <input type="hidden" value="<?php echo $_GET['image_category']; ?>" id="old_product_image" name="old_category_image">
                                                    </div>
                                                </div>
                                    </div>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ID <?php echo $_GET['id']; ?></label>
                                <input type="hidden" value="<?php echo $_GET['id']; ?>" id="id" name="id">
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="submit" value="submit" class="btn btn-submit me-2"></input>
                                <!-- <a href="javascript:void(0);" class="btn btn-submit me-2">Update</a> -->
                                <a href="productlist.php" class="btn btn-cancel">Cancel</a>
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