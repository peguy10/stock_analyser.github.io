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
 <div id="global-loader">
         <div class="whirly-loader"> </div>
     </div>

     <div class="main-wrapper">

         <?php
            include('../components/header2.php');
            include('../components/sidebar2.php');
            ?>

         <div class="page-wrapper">
             <div class="content">
                 <div class="page-header">
                     <div class="page-title">
                         <h4>Purchase Report</h4>
                         <h6>Manage your Purchase Report</h6>
                     </div>
                 </div>

                 <div class="card">
                     <div class="card-body">
                         <div class="table-top">
                             <div class="search-set">
                                 <div class="search-path">
                                     <a class="btn btn-filter" id="filter_search">
                                         <img src="../assets/img/icons/filter.svg" alt="img">
                                         <span><img src="../assets/img/icons/closes.svg" alt="img"></span>
                                     </a>
                                 </div>
                                 <div class="search-input">
                                     <a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg" alt="img"></a>
                                 </div>
                             </div>
                             <div class="wordset">
                                 <ul>
                                     <li>
                                         <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
                                     </li>
                                     <li>
                                         <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
                                     </li>
                                     <li>
                                         <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
                                     </li>
                                 </ul>
                             </div>
                         </div>

                         <div class="card" id="filter_inputs">
                             <div class="card-body pb-0">
                                 <div class="row">
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <div class="input-groupicon">
                                                 <input type="text" placeholder="From Date" class="datetimepicker">
                                                 <div class="addonset">
                                                     <img src="../assets/img/icons/calendars.svg" alt="img">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <div class="input-groupicon">
                                                 <input type="text" placeholder="To Date" class="datetimepicker">
                                                 <div class="addonset">
                                                     <img src="../assets/img/icons/calendars.svg" alt="img">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <select class="select">
                                                 <option>Choose Suppliers</option>
                                                 <option>Suppliers</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                         <div class="form-group">
                                             <a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="table-responsive">
                         <table class="table datanew">
    <thead>        <tr>
            <th>
                <label class="checkboxs">
 <input type="checkbox" id="select-all">
                    <span class="checkmarks"></span>
                </label>
            </th>
            <th>Product Name</th>
            <th>Purchased amount</th>
            <th>Purchased QTY</th>
            <th>Instock qty</th>
        </tr>
 </thead>
    <tbody>
        <?php
        // Connexion à base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname ="stock_analyser";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }

        
        $query = "SELECT product_list.product_name, SUM(purchases.qty_buy) AS total_qty_buy, product_list.quantity, purchases.price_buy
        FROM product_list
        JOIN purchases ON product_list.id = purchases.id_p
        WHERE DATE(purchases.date_buy) = CURDATE()
        GROUP BY product_list.product_name;";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $productName = $row['product_name'];
            $total_qty_buy = $row['total_qty_buy'];
            $price_buy = $row['price_buy'];
            $quantity = $row['quantity'];

            echo '<tr>
                    <td>
                        <label class="checkboxs">
                            <input type="checkbox">
                            <span class="checkmarks"></span>
                        </label>
                    </td>
                    <td class="productimgname">
                        <a class="product-img">
                            <img src="../assets/img/product/product1.jpg" alt="product">
                        </a>
                        <a href="javascript:void(0);">' . $productName . '</a>
                    </td>
                    <td>' . $price_buy . '</td>
                    <td>' . $total_qty_buy . '</td>
                    <td>' . $quantity . '</td>
                </tr>';
        }
        ?>
    </tbody>
</table>
                         </div>
                     </div>
                 </div>

             </div>
         </div>

         <div class="searchpart">
             <div class="searchcontent">
                 <div class="searchhead">
                     <h3>Search </h3>
                     <a id="closesearch"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                 </div>
                 <div class="searchcontents">
                     <div class="searchparts">
                         <input type="text" placeholder="search here">
                         <a class="btn btn-searchs">Search</a>
                     </div>
                     <div class="recentsearch">
                         <h2>Recent Search</h2>
                         <ul>
                             <li>
                                 <h6><i class="fa fa-search me-2"></i> Settings</h6>
                             </li>
                             <li>
                                 <h6><i class="fa fa-search me-2"></i> Report</h6>
                             </li>
                             <li>
                                 <h6><i class="fa fa-search me-2"></i> Invoice</h6>
                             </li>
                             <li>
                                 <h6><i class="fa fa-search me-2"></i> Sales</h6>
                             </li>
                         </ul>
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