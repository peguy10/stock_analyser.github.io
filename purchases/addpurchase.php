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

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

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
                        <h4>Purchase Add</h4>
                        <h6>Add/Update Purchase</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <div class="row">
                                        <div class="col-lg-10 col-sm-10 col-10">
                                            <select class="select" type="text" id="category_supplier" name="category_supplier" required="required">
                                                <option></option>
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

                                                $sql_get = "SELECT * FROM supplier"; // sql script
                                                $report = mysqli_query($conn, $sql_get); // inserting sql script in mysql server
                                                if ($report == TRUE) {

                                                    // creating a table to insert all the data gotten from the table product_list
                                                    while ($row = mysqli_fetch_array($report)) {
                                                        echo " <option>
                                                  " . $row['name_supplier'] . "
                                                   </option>";
                                                    }
                                                }
                                                mysqli_close($conn);

                                                ?>
                                            </select>
                                        </div>




                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Purchase Date </label>
                                    <div class="input-groupicon" id="date_purchase" name="date_purchase">
                                        <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="../assets/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <select class="select" type="text" id="category_p" name="category_p" required="required">
                                        <option></option>
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

                                        $sql_get = "SELECT * FROM product_list"; // sql script
                                        $report = mysqli_query($conn, $sql_get); // inserting sql script in mysql server
                                        if ($report == TRUE) {

                                            // creating a table to insert all the data gotten from the table product_list
                                            while ($row = mysqli_fetch_array($report)) {
                                                echo " <option>
                                                  " . $row['product_name'] . "
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
                                    <label>Reference No.</label>
                                    <input type="text" id="reference_purchase" name="reference_purchase">
                                </div>
                            </div>
                            <form action="" method="post">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <div class="input-groupicon">
                                            <select class="select" type="text" id="category_poduct" name="category_product" required="required">
                                                <option></option>
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

                                                $sql_get = "SELECT * FROM product_list"; // sql script
                                                $report = mysqli_query($conn, $sql_get); // inserting sql script in mysql server
                                                if ($report == TRUE) {

                                                    // creating a table to insert all the data gotten from the table product_list
                                                    while ($row = mysqli_fetch_array($report)) {
                                                        echo " <option>
                                                  " . $row['product_name'] . "
                                                   </option>";
                                                    }
                                                }
                                                mysqli_close($conn);

                                                ?>
                                            </select>

                                        </div>
                                        <div class="addonset">
                                            <button type="submit" class="btn btn-submit me-2">Afficher les informations</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>QTY</th>
                                            <th>Purchase Price($) </th>
                                            <th>Discount($) </th>
                                            <th>Tax %</th>
                                            <th>Tax Amount($)</th>
                                            <th class="text-end">Unit Cost($)</th>
                                            <th class="text-end">Total Cost ($) </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="productimgname">
                                                <a class="product-img">
                                                    <img src="../assets/img/product/product7.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Apple Earpods</a>
                                            </td>
                                            <td>10.00</td>
                                            <td>2000.00</td>
                                            <td>500.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td class="text-end">2000.00</td>
                                            <td class="text-end">2000.00</td>
                                            <td>
                                                <a class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="productimgname">
                                                <a class="product-img">
                                                    <img src="../assets/img/product/product6.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Macbook Pro</a>
                                            </td>
                                            <td>15.00</td>
                                            <td>6000.00</td>
                                            <td>100.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td class="text-end">1000.00</td>
                                            <td class="text-end">1000.00</td>
                                            <td>
                                                <a class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 float-md-right">
                                <div class="total-order">
                                    <ul>
                                        <li>
                                            <h4>Order Tax</h4>
                                            <h5>$ 0.00 (0.00%)</h5>
                                        </li>
                                        <li>
                                            <h4>Discount </h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                        <li>
                                            <h4>Shipping</h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                        <li class="total">
                                            <h4>Grand Total</h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Order Tax</label>
                                    <input type="number" id="oder_purchase" name="oder_purchase">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="number" id="discount_purchase" name="discount_purchase">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Shipping</label>
                                    <input type="text" id="shipping_purchase" name="shipping_purchase">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Completed</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description_purchase" name="description_purchase"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                                <a href="purchaselist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
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

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>