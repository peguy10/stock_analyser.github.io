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
                         <h4>Sales Return List</h4>
                         <h6>Manage your Returns</h6>
                     </div>
                     <div class="page-btn">
                         <a href="createsalesreturn.html" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add New Sales Return</a>
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
                                             <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <input type="text" placeholder="Enter Reference">
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <select class="select">
                                                 <option>Choose Customer</option>
                                                 <option>Customer</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <select class="select">
                                                 <option>Choose Status</option>
                                                 <option>Inprogress</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <select class="select">
                                                 <option>Choose Payment Status</option>
                                                 <option>Payment Status</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-sm-6 col-12">
                                         <div class="form-group">
                                             <a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="table-responsive">
                             <table class="table datanew">
                                 <thead>
                                     <tr>
                                         <th>
                                             <label class="checkboxs">
                                                 <input type="checkbox" id="select-all">
                                                 <span class="checkmarks"></span>
                                             </label>
                                         </th>
                                         <th>Product Name</th>
                                         <th>Date</th>
                                         <th>Customer</th>
                                         <th>Status</th>
                                         <th>Grand Total ($)</th>
                                         <th>Paid ($)</th>
                                         <th>Due ($)</th>
                                         <th>Payment Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td>
                                             <label class="checkboxs">
                                                 <input type="checkbox">
                                                 <span class="checkmarks"></span>
                                             </label>
                                         </td>
                                         <td class="productimgname">
                                             <a href="javascript:void(0);" class="product-img">
                                                 <img src="../assets/img/product/product1.jpg" alt="product">
                                             </a>
                                             <a href="javascript:void(0);">Macbook pro</a>
                                         </td>
                                         <td>19 Nov 2022</td>
                                         <td>Thomas</td>
                                         <td><span class="badges bg-lightgreen">Received</span></td>
                                         <td>550</td>
                                         <td>120</td>
                                         <td>550</td>
                                         <td><span class="badges bg-lightgreen">Paid</span></td>
                                         <td>
                                             <a class="me-3" href="editsalesreturn.html">
                                                 <img src="../assets/img/icons/edit.svg" alt="img">
                                             </a>
                                             <a class="me-3 confirm-text" href="javascript:void(0);">
                                                 <img src="../assets/img/icons/delete.svg" alt="img">
                                             </a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <label class="checkboxs">
                                                 <input type="checkbox">
                                                 <span class="checkmarks"></span>
                                             </label>
                                         </td>
                                         <td class="productimgname">
                                             <a href="javascript:void(0);" class="product-img">
                                                 <img src="../assets/img/product/product2.jpg" alt="product">
                                             </a>
                                             <a href="javascript:void(0);">Orange</a>
                                         </td>
                                         <td>19 Nov 2022</td>
                                         <td>Benjamin</td>
                                         <td><span class="badges bg-lightred">Pending</span></td>
                                         <td>550</td>
                                         <td>120</td>
                                         <td>550</td>
                                         <td><span class="badges bg-lightred">Unpaid</span></td>
                                         <td>
                                             <a class="me-3" href="editsalesreturn.html">
                                                 <img src="../assets/img/icons/edit.svg" alt="img">
                                             </a>
                                             <a class="me-3 confirm-text" href="javascript:void(0);">
                                                 <img src="../assets/img/icons/delete.svg" alt="img">
                                             </a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <label class="checkboxs">
                                                 <input type="checkbox">
                                                 <span class="checkmarks"></span>
                                             </label>
                                         </td>
                                         <td class="productimgname">
                                             <a href="javascript:void(0);" class="product-img">
                                                 <img src="../assets/img/product/product3.jpg" alt="product">
                                             </a>
                                             <a href="javascript:void(0);">Pineapple</a>
                                         </td>
                                         <td>19 Nov 2022</td>
                                         <td>James</td>
                                         <td><span class="badges bg-lightred">Pending</span></td>
                                         <td>210</td>
                                         <td>120</td>
                                         <td>210</td>
                                         <td><span class="badges bg-lightred">Unpaid</span></td>
                                         <td>
                                             <a class="me-3" href="editsalesreturn.html">
                                                 <img src="../assets/img/icons/edit.svg" alt="img">
                                             </a>
                                             <a class="me-3 confirm-text" href="javascript:void(0);">
                                                 <img src="../assets/img/icons/delete.svg" alt="img">
                                             </a>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>
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

     <script src="../assets/js/moment.min.js"></script>
     <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

     <script src="../assets/plugins/select2/js/select2.min.js"></script>

     <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
     <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

     <script src="../assets/js/script.js"></script>
 </body>

 </html>