<?php
// Inclure le fichier de fonctions CRUD
require_once('functions.php');



// Vérifier si le formulaire de mise à jour a été soumis
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['nom_cat'];
    $code = $_POST['code_cat'];
    $description = $_POST['description_cat'];
    updateCategory($id, $name, $code, $description);
}

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteCategory($id);
}

// Récupérer toutes les catégories
$categories = getCategories();
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

        <!-- header -->
        <?php include('../components/header2.php'); ?>
        <?php include('../components/sidebar2.php'); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Product Category list</h4>
                        <h6>View/Search product Category</h6>
                    </div>
                    <div class="page-btn">
                        <a href="addcategory.php" class="btn btn-added">
                            <img src="../assets/img/icons/plus.svg" class="me-1" alt="img">Add Category
                        </a>
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
                                            <select class="select">
                                                <option>Choose Category</option>
                                                <option>Computers</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Sub Category</option>
                                                <option>Fruits</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Sub Brand</option>
                                                <option>Iphone</option>
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
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Category name</th>
                                        <th>Category Code</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"><?php echo $category['nom_cat']; ?></a>
                                            </td>
                                            <td><?php echo $category['code_cat']; ?></td>
                                            <td><?php echo $category['description_cat']; ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="id" value="<?php echo $category['id_cat']; ?>">

                                                    <a class="me-3" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $category['id_cat']; ?>">
                                                        <img src="../assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <button type="submit" name="delete" - class="me-3 border-0 bg-transparent confirm-text" href="javascript:void(0);">
                                                        <img src="../assets/img/icons/delete.svg" alt="img">
                                                    </button>
                                                </form>
                                            </td>
                                            <?php include('editcategory.php'); ?>
                                        </tr>
                                    <?php endforeach; ?>
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

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>