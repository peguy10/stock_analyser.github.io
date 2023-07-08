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

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<?php // Connexion à la base de données
include('../inc/connect.php');
session_start();

if (isset($_POST['search'])) {
    // $product_name = $_POST['product_name'];
    $id_f = $_POST['id_f'];
    $id_cat = $_POST['id_cat'];
    $id_c = $_POST['id_c'];

    $sql = "SELECT * FROM product_list WHERE id_categorie = :id_cat AND id_fournisseur = :id_f";
    $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':product_name', '%' . $product_name . '%');
    $stmt->bindValue(':id_cat', $id_cat);
    $stmt->bindValue(':id_f', $id_f);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include('function.php');
class GET
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Fonction pour récupérer touts les Fournisseurs
    public function getAllF()
    {
        $stmt = $this->pdo->query('SELECT * FROM supplier');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fonction pour récupérer touts les Fournisseurs
    public function getAllC()
    {
        $stmt = $this->pdo->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fonction pour récupérer touts les Clients
    public function getAllCLT()
    {
        $stmt = $this->pdo->query('SELECT * FROM customer');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fonction pour récupérer touts les Produits
    public function getAllP()
    {
        $stmt = $this->pdo->query('SELECT * FROM product_list,categories,supplier,users 
                                   WHERE product_list.id_fournisseur=supplier.id_f 
                                   AND product_list.id_categorie=categories.id_cat 
                                   AND product_list.id_user=users.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
$fournisseur = new GET($pdo);
$fournisseurs = $fournisseur->getAllF();

$produit = new GET($pdo);
$produits = $produit->getAllP();

$client = new GET($pdo);
$clients = $client->getAllCLT();
// Affichage des catégories

$categorie = new GET($pdo);
$categories = $categorie->getAllC();

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
                        <h4>Add Sale</h4>
                        <h6>Add your new sale</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <div class="input-groupicon">
                                            <input type="text" placeholder="Choose Date" class="datetimepicker">
                                            <a class="addonset">
                                                <img src="../assets/img/icons/calendars.svg" alt="img">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="select" name="id_f">
                                            <option>Choose</option>
                                            <?php foreach ($fournisseurs as $fournisseur) : ?>
                                                <option value="<?php echo $fournisseur['id_f']; ?>"><?php echo $fournisseur['name_supplier']; ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <select class="select" name="id_cat">
                                            <option>Choose</option>
                                            <?php foreach ($categories as $categorie) : ?>
                                                <option value=" <?php echo $categorie['id_cat']; ?>"><?php echo $categorie['name_category']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <div class="row">
                                            <div class="col-lg-10 col-sm-10 col-10">
                                                <select class="select" name="id_c" required>
                                                    <option></option>
                                                    <?php foreach ($clients as $client) : ?>
                                                        <option value="<?php echo $client['id_c']; ?>"><?php echo $client['name_customer']; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Product</label>
                                        <div class="row">
                                            <div class="col-lg-10 col-sm-10 col-10">
                                                <select class="select" name="product_name" required>
                                                    <option>Choose</option>
                                                    <?php foreach ($produits as $produit) : ?>
                                                        <option value="<?php echo $produit['product_name']; ?>"><?php echo $produit['product_name']; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>.</label>
                                        <div class="row">
                                            <div class="col-lg-10 col-sm-10 col-10">
                                                <input type="submit" value="search" class="btn btn-submit" name="search">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <form action="" method="post">
                            <input type="hidden" name="clt_id" value="<?php if (isset($products)) echo $id_c; ?>">
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id']; ?>">
                            <div class="row">
                                <div class="table-responsive mb-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>QTY</th>
                                                <th>Price</th>
                                                <th>Tax</th>
                                                <th>unit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($products)) {
                                                $total = 0;
                                                if (count($products) > 0) { ?>


                                                    <?php foreach ($products as $product) :
                                                        $ben =  ($product['price'] * $product['tax']) / 100;
                                                        $price = $product['price'] + $ben;
                                                        $qty = $product['quantity'];
                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="id_p" id="" value="<?php echo $product['id']; ?>">
                                                                <input type="checkbox" name="sales[]" value="sale<?php echo $product['id'] ?>" id="sale<?php echo $product['id'] ?>" class="checkbox checkboxs">
                                                            </td>
                                                            <td class="productimgname">
                                                                <a class="product-img">
                                                                    <img src="<?php echo $product['product_image']; ?>" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);"><?php echo $product['product_name']; ?></a>
                                                            </td>
                                                            <td><input type="number" class="form-control form-control-sm" value="<?php echo $product['quantity'] ?>" name="qty" min="1" max="<?php echo $product['quantity'] ?>"></td>
                                                            <td><?php echo $product['price']; ?></td>
                                                            <td><?php echo $product['tax']; ?>%</td>
                                                            <td><?php echo $price; ?> <input type="hidden" name="price" id="" value="<?php echo $price ?>"></td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php  } else { ?>
                                                    <td colspan="8" align="center" class="text-danger">Aucun produit trouvé</td>
                                                <?php
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="8" align="center" class="text-danger">Aucun produit selectionné</td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Order Tax</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Shipping</label>
                                        <input type="text">
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
                                </div> -->
                                <div class="row">
                                    <div class="col-lg-6 ">
                                        <!-- <div class="total-order w-100 max-widthauto m-auto mb-4">
                                            <ul>
                                                <li>
                                                    <h4>Order Tax</h4>
                                                    <h5>$ 0.00 (0.00%)</h5>
                                                </li>
                                                <li>
                                                    <h4>Discount </h4>
                                                    <h5>$ 0.00</h5>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <!-- <div class="col-lg-6 ">
                                        <div class="total-order w-100 max-widthauto m-auto mb-4">
                                            <ul>
                                                <li>
                                                    <h4>Shipping</h4>
                                                    <h5>$ 0.00</h5>
                                                </li>
                                                <li class="total">
                                                    <h4>Grand Total</h4>
                                                    <h5><?php echo $total ?> FCFA</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-lg-12">
                                    <button href="javascript:void(0);" class="btn btn-submit me-2" type="submit" name="sale">Submit</button>
                                    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submitbtn').addEventListener("click", function() {
            var qty = document.getElementById("qty").value;
            alert("you selected" + qty + "items");
        });
    </script>
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