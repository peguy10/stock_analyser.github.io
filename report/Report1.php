<!DOCTYPE html>
<html lang="en">
<?php include 'components/css.php'; ?>
<?php include 'inc/connect.php';
session_start();
if (isset($_SESSION['username'])) {
    $nom = $_SESSION['username'];
?>

<body>
    <!-- loader 
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>-->
    <!-- end loader 
    <div class="main-wrapper">-->
        <!-- header -->
        <?php include 'components/header.php'; ?>
        <?php include 'components/sidebar.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <?php include 'components/card.php'; ?>

                <?php include 'components/chart.php'; ?>
                <div class="col-lg-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Recently Added Products</h4>
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="dropset">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="productlist.html" class="dropdown-item">Product List</a>
                                    </li>
                                    <li>
                                        <a href="addproduct.html" class="dropdown-item">Product Add</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dataview">
                            <table class="table datatable ">
    <thead>
        <tr>
            <th>Sno</th>
            <th>Products</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sname = "localhost"; // mysql server name
        $uname = "root"; // user name
        $password = ""; // password
        $db_name = "stock_analyser"; // database name

        $conn = mysqli_connect($sname, $uname, $password, $db_name); // connect to the database

        $query = "SELECT * FROM product_list ORDER BY date_entree DESC LIMIT 7";
        $resultat = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultat) > 0) {
            while ($row = mysqli_fetch_assoc($resultat)) {
                echo "<tr>";
                echo "<td>". $row["id"] ."</td>"; 
                echo "<td class='productimgname'>";
                //echo "   <a href='productlist.php' class='product-img'>";
               // echo "       <img src='". $row["product_image"]. "'  alt='product'>";
               // echo "   </a>";
                echo "    <a href='productlist.php'>". $row["product_name"] ."</a>";
                echo "</td>";
                echo "<td>$". $row["price"] ."</td>";
                echo "</tr>";
            }
        } else {
            echo "Aucun produit trouvé.";
        }

        // Fermeture de la connexion à la base de données
        mysqli_close($conn);
        ?>                                          
    </tbody>
</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-body">
                    <h4 class="card-title">Expired Products</h4>
                    <div class="table-responsive dataview">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>Category Name</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="javascript:void(0);">IT0001</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product2.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Orange</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>12-12-2022</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="javascript:void(0);">IT0002</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product3.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Pineapple</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>25-11-2022</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="javascript:void(0);">IT0003</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product4.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Stawberry</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>19-11-2022</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="javascript:void(0);">IT0004</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product5.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Avocat</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>20-11-2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'components/js.php'; ?>
</body>
<?php
} else {
    header("Location: signin.php");
}
?>



</html>