<?php // Connexion à la base de données


include('../inc/connect.php');
if (isset($_GET['sku'])) {
    $sku = $_GET['sku'];
    $sql = "SELECT * FROM product_list,categories,supplier,users 
                                   WHERE product_list.id_fournisseur=supplier.id_f 
                                   AND product_list.id_categorie=categories.id_cat 
                                   AND product_list.id_user=users.id 
                                   AND sku = :sku";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':sku', $sku);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
class GET
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Fonction pour récupérer toutes les Fournisseur
    public function getAllF()
    {
        $stmt = $this->pdo->query('SELECT * FROM supplier');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fonction pour récupérer toutes les catégories
    public function getAllC()
    {
        $stmt = $this->pdo->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
$fournisseur = new GET($pdo);
$fournisseurs = $fournisseur->getAllF();

$category = new GET($pdo);
$categories = $category->getAllC();
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
                                        <input type="text" value="<?php echo $product['product_name']; ?>" id="product_name" name="product_name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select" type="text" id="id_cat" name="id_cat" required="required">
                                            <option value="<?php echo $product['id_categorie']; ?>"><?php echo $product['name_category']; ?></option>
                                            <?php foreach ($categories as $category) : ?>

                                                <option value="<?php echo $category['id_cat']?>"><?php echo $category['name_category']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="select" type="text" id="id_f" name="id_f" required="required">
                                            <option value="<?php echo $product['id_fournisseur']; ?>"><?php echo $product['name_supplier']; ?></option>
                                            <?php foreach ($fournisseurs as $fournisseur) : ?>

                                                <option value="<?php echo $fournisseur['id_f']?>"><?php echo $fournisseur['name_supplier']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" readonly value="<?php echo $product['sku']; ?>" id="sku" name="sku" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" value="<?php echo $product['quantity']; ?>" id="quantity" name="quantity" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" type="text" id="descriptions" name="descriptions" required="required"><?php echo $product['descriptions']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tax(%)</label>
                                        <input type="text" id="tax" name="tax" value="<?php echo $product['tax']; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" value="<?php echo $product['price']; ?>" id="price" name="price" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Status</label>
                                        <select class="select" type="text" id="statuss" name="status" required="required">
                                            <option><?php echo $product['status']; ?></option>
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
                                                        <img src="<?php echo $product['product_image']; ?>" alt="img">
                                                    </div>
                                                    <div class="productviewscontent">
                                                        <div class="productviewsname">
                                                            <input type="hidden" value="<?php echo $product['product_image']; ?>" id="old_product_image" name="old_product_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>SKU <?php echo $product['sku']; ?></label>
                                    <input type="hidden" value="<?php echo $product['sku']; ?>" id="id" name="id">
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