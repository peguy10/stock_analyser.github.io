<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title><i class="ri-stock-fill"></i></title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/plugins/owlcarousel/owl.carousel.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
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
        $id = $_GET['id'];
        $sql = 'SELECT * FROM product_list,categories,supplier,users 
                                   WHERE product_list.id_fournisseur=supplier.id_f 
                                   AND product_list.id_categorie=categories.id_cat 
                                   AND product_list.id_user=users.id
                                   AND product_list.id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
$product = new Product($pdo);
$products = $product->getAll();

// Affichage des catégories

?>

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
                        <h4>Product Details</h4>
                        <h6>Full details of a product</h6>
                    </div>
                </div>

                <div class="row" id='myDiv'>
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="bar-code-view">
                                    <img src="../assets/img/barcode1.png" alt="barcode">
                                    <a class="printimg" href="#" onclick="printDiv()">
                                        <img src="../assets/img/icons/printer.svg" alt="print">
                                    </a>
                                </div>
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Product</h4>
                                            <h6><?php echo $product['product_name']; ?> </h6>
                                        </li>
                                        <li>
                                            <h4>Category</h4>
                                            <h6><?php echo $product['category']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Sub Category</h4>
                                            <h6><?php echo $product['sub_category']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Brand</h4>
                                            <h6><?php echo $product['brand']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Unit</h4>
                                            <h6><?php echo $product['unit']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>SKU</h4>
                                            <h6><?php echo $product['sku']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Minimum Qty</h4>
                                            <h6><?php echo $product['minimum_quantity']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Quantity</h4>
                                            <h6><?php echo $product['quantity']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Tax(%)</h4>
                                            <h6><?php echo $product['tax']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Discount Type(%)</h4>
                                            <h6><?php echo $product['discount_type']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Price</h4>
                                            <h6><?php echo $product['price']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Status</h4>
                                            <h6><?php echo $product['statuss']; ?></h6>
                                        </li>
                                        <li>
                                            <h4>Description</h4>
                                            <h6><?php echo $product['descriptions']; ?></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="owl-carousel owl-theme product-slide">
                                        <div class="slider-product">
                                            <img src="<?php echo $product['product_image']; ?>" alt="img">

                                        </div>
                                        <div class="slider-product">
                                            <img src="<?php echo $product['product_image']; ?>" alt="img">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function printDiv() {
                            var printContents = document.getElementById("myDiv").innerHTML;
                            var originalContents = document.body.innerHTML;

                            document.body.innerHTML = printContents;

                            window.print();

                            document.body.innerHTML = originalContents;
                        }
                    </script>
                </div>

            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>