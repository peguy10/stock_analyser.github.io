<?php // Connexion à la base de données
include('../inc/connect.php');
// Classe Categorie pour la gestion des catégories
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id= $_SESSION['user_id'];
}
class Categorie
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Fonction pour récupérer toutes les catégories
    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Fournisseur
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Fonction pour récupérer toutes les catégories
    public function getAllF()
    {
        $stmt = $this->pdo->query('SELECT * FROM supplier');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
// Utilisation de la classe Categorie pour récupérer toutes les catégories
$categorie = new Categorie($pdo);
$fournisseur = new Fournisseur($pdo);
$categories = $categorie->getAll();
$fournisseurs = $fournisseur->getAllF();

// Affichage des catégories

$nbr = rand(100, 999);
$nbsku = "PRO" . $nbr;
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
                        <h4>Product Add</h4>
                        <h6>Create new product</h6>
                    </div>
                </div>

                <form name="main" action="addproducttodatabase.php" method="post" enctype="multipart/form-data">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
                                    </div>

                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" id="product_name" name="product_name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select" type="text" id="id_cat" name="id_cat" required="required">
                                            <?php foreach ($categories as $categorie) { ?>
                                                <option value="<?php echo $categorie['id_cat'] ?>"><?php echo $categorie['name_category'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Fournisseur</label>
                                        <select class="select" type="text" id="id_f" name="id_f" required="required">
                                            <?php foreach ($fournisseurs as $fournisseur) { ?>
                                                <option value="<?php echo $fournisseur['id_f'] ?>"><?php echo $fournisseur['name_supplier'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" class="disabled" id="sku" name="sku" value="<?php echo $nbsku; ?>" required="required" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" id="quantity" name="quantity" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" id="price" name="price" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>tax</label>
                                        <input type="text" id="tax" name="tax" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Status</label>
                                        <select class="select" type="text" id="status" name="status" required="required">
                                            <option>Open</option>
                                            <option>Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" type="text" id="descriptions" name="descriptions" required="required"></textarea>
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
                                <div class="col-lg-12">
                                    <input type="submit" name="submit" value="submit" class="btn btn-submit me-2"></input>
                                    <!-- <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a> -->
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