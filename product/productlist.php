<?php // Connexion à la base de données
include('../inc/connect.php');
class Product
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Fonction pour récupérer toutes les catégories
    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM product_list,categories,supplier,users 
                                   WHERE product_list.id_fournisseur=supplier.id_f 
                                   AND product_list.id_categorie=categories.id_cat 
                                   AND product_list.id_user=users.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
$product = new Product($pdo);
$products = $product->getAll();
// Affichage des catégories

if (isset($_POST['send'])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));

    $newFileName = date("Y.m.d") . "-" . date("h.i.sa") . "." . $fileExtension;
    $targetDirectory = "uploadsExcel/" . $newFileName;
    move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors', 0);

    require "../ExcelReader/excel_reader2.php";
    require "../ExcelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach ($reader as $key => $row) {
        $name = $row[0];
        $sku = $row[1];
        $category = $row[2];
        $price = $row[3];
        $quantity = $row[4];
        $user = $row[5];
        $image = $row[6];
        $tax = $row[7];
        $status = $row[8];
        $description = $row[9];
        $fournisseur = $row[10];
        $date = $row[11];

        $sql = "INSERT INTO product_list VALUES('',:name,:sku,:category,:price,:quantity,:user,:image,:tax,)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':tax', $tax);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':fournisseur', $fournisseur);
        $stmt->bindParam(':date', $date);
        $result = $stmt->execute();
        if ($result) {
            echo "<script>
                    alert('insertion ok')
                 </script>";
        } else {
            echo "<script>
    alert('echec D'
            insertion ')
</script>";
        }
    }
}
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
        <?php include('../components/header2.php') ?>
        <?php include('../components/sidebar2.php') ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Product List</h4>
                        <h6>Manage your products</h6>
                    </div>
                    <div class="page-btn">

                        <!-- add product page -->

                        <a href="addproduct.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
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
                                    <!--we will put pdf function here-->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
                                    <script>
                                        function convertDivToPdf(divId) {
                                            // Récupère le contenu HTML de la div
                                            var html = document.getElementById(divId).innerHTML;

                                            // Crée un nouveau document PDF
                                            var doc = new jsPDF();

                                            // Ajoute le contenu HTML au document PDF
                                            doc.fromHTML(html);

                                            // Télécharge le fichier PDF
                                            doc.save('document.pdf');
                                        }
                                    </script>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf" href="#" onclick="convertDivToPdf()">
                                            <img src="../assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <!-- import file excel modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog        ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Excel File</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="file">Upload file</label>
                                                <input type="file" class="form-control" name="excel">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="send" class="btn btn-primary">Import File</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- import file excel modal -->




                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row" id="divId">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Macbook pro</option>
                                                        <option>Orange</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Brand</option>
                                                        <option>N/D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12 ">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>150.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
                                                </div>
                                            </div>
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
                                        <th>Product Name</th>
                                        <th>SKU</th>
                                        <th>Category </th>
                                        <th>price</th>
                                        <th>Qty</th>
                                        <th>Supplier</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td class="productimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="<?php echo $product['product_image']; ?>" alt="product">
                                                </a>
                                                <a href="javascript:void(0);"><?php echo $product['product_name']; ?></a>
                                            </td>
                                            <td><?php echo $product['sku']; ?></td>
                                            <td><?php echo $product['name_category']; ?></td>
                                            <td><?php echo $product['price']; ?> FCFA</td>
                                            <td><?php echo $product['quantity']; ?></td>
                                            <td><?php echo $product['name_supplier']; ?></td>
                                            <td><?php echo $product['nom']; ?></td>
                                            <td>

                                                <a class="me-3" href="product-details.php?sku=<?php echo $product['sku']; ?>">
                                                    <img src="../assets/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="editproduct.php?sku=<?php echo $product['sku']; ?>">
                                                    <img src="../assets/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a href="delete_product.php?sku=<?php echo $product['sku']; ?>" class="confirm-text" href="javascript:void(0);">
                                                    <img src="../assets/img/icons/delete.svg" alt="img">
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                    <!-- 
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
                                        <td>PT001</td>
                                        <td>Computers</td>
                                        <td>N/D</td>
                                        <td>1500.00</td>
                                        <td>pc</td>
                                        <td>100.00</td>
                                        <td>Admin</td>
                                        <td>
                                            <a class="me-3" href="product-details.html">
                                                <img src="../assets/img/icons/eye.svg" alt="img">
                                            </a>
                                            <a class="me-3" href="editproduct.html">
                                                <img src="../assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);">
                                                <img src="../assets/img/icons/delete.svg" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                   -->
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