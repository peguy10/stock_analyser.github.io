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
                        <h4>Product Edit</h4>
                        <h6>Update your product</h6>
                    </div>
                </div>

                <!-- formulaire -->
                <form name="main" action="editproducttodatabase.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">

                                        <label>Product Name</label>
                                        <input type="text" value="<?php echo $_GET['product_name']; ?>" id="product_name" name="product_name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select" type="text" id="category" name="category" required="required">
                                            <option><?php echo $_GET['category']; ?></option>

                                            <?php
                                            $sname = "localhost"; // mysql server name
                                            $uname = "root"; // user name
                                            $password = ""; // password
                                            $db_name = "stock_analyser"; // database name

                                            $conn = mysqli_connect($sname, $uname, $password, $db_name); // connect to the database
                                            // if($conn==True){
                                            //     echo "GOOD";
                                            // } else{
                                            //     echo "NOT_GOOD"; 
                                            // }

                                            $sql_get = "SELECT * FROM categories"; // sql script
                                            $report = mysqli_query($conn, $sql_get); // inserting sql script in mysql server
                                            if ($report == TRUE) {

                                                // creating a table to insert all the data gotten from the table product_list
                                                while ($row = mysqli_fetch_array($report)) {
                                                    echo " <option>
                                                  " . $row['name_category'] . "
                                                   </option>";
                                                }
                                            }
                                            mysqli_close($conn);

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="select" type="text" id="sub_category" name="sub_category" required="required">
                                            <option><?php echo $_GET['sub_category']; ?></option>
                                            <option>option1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="select" type="text" id="brand" name="brand" required="required">
                                            <option><?php echo $_GET['brand']; ?></option>
                                            <option>option1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <select class="select" type="text" id="unit" name="unit" required="required">
                                            <option><?php echo $_GET['unit']; ?></option>
                                            <option>Kg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" value="<?php echo $_GET['sku']; ?>" id="sku" name="sku" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Minimum Qty</label>
                                        <input type="number" value="<?php echo $_GET['minimum_quantity']; ?>" id="minimum_quantity" name="minimum_quantity" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" value="<?php echo $_GET['quantity']; ?>" id="quantity" name="quantity" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" type="text" id="descriptions" name="descriptions" required="required"><?php echo $_GET['descriptions']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tax(%)</label>
                                        <select class="select" type="number" id="tax" name="tax" required="required">
                                            <option><?php echo $_GET['tax']; ?></option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Discount Type(%)</label>
                                        <select class="select" type="number" id="discount_type" name="discount_type" required="required">
                                            <option><?php echo $_GET['discount_type']; ?></option>
                                            <option>10</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" value="<?php echo $_GET['price']; ?>" id="price" name="price" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Status</label>
                                        <select class="select" type="text" id="statuss" name="statuss" required="required">
                                            <option><?php echo $_GET['statuss']; ?></option>
                                            <option>Closed</option>
                                            <option>Open</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Upload Product Image</label>
                                        <div>
                                            <input type="file" id="product_image" name="product_image" accept=".jpg, .jpeg, .png">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="product-list">
                                        <ul class="row">
                                            <li>
                                                <div class="productviews">
                                                    <div class="productviewsimg">
                                                        <img src="<?php echo $_GET['product_image']; ?>" alt="img">
                                                    </div>
                                                    <div class="productviewscontent">
                                                        <div class="productviewsname">
                                                            <input type="hidden" value="<?php echo $_GET['product_image']; ?>" id="old_product_image" name="old_product_image">
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