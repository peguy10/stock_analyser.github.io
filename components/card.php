<div class="row">
<?php
$sname = "localhost";// mysql server name
$uname = "root"; // user name
$password = ""; // password
$db_name = "stock_analyser"; // database name

$conn = mysqli_connect($sname, $uname, $password, $db_name);// connect to the database

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur lors de la connexion à la base de données : " . $conn->connect_error);
}

// Requête pour compter le nombre de clients
$sql = "SELECT COUNT(*) AS total_clients FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Afficher le nombre de clients à l'écran
    $row = $result->fetch_assoc();
    $total_clients = $row['total_clients'];  
} 

$sql = "SELECT COUNT(*) AS total_suppliers FROM supplier";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Afficher le nombre de clients à l'écran
    $row = $result->fetch_assoc();
    $total_suppliers = $row['total_suppliers'];  
} 

$sql = "SELECT COUNT(*) AS total_sales FROM sales";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Afficher le nombre de clients à l'écran
    $row = $result->fetch_assoc();
    $total_sales = $row['total_sales'];  
} 

$sql = "SELECT COUNT(*) AS total_purchases FROM purchases";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Afficher le nombre de clients à l'écran
    $row = $result->fetch_assoc();
    $total_purchases = $row['total_purchases'];  
} 

$sql = "SELECT COUNT(*) AS total_purchases_due, SUM(qty_buy*price_buy) AS total_purchases_due FROM purchases";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Afficher le nombre de clients à l'écran
    $row = $result->fetch_assoc();
    $total_purchases_due = $row['total_purchases_due'];  
} 

$sql = "SELECT COUNT(*) AS total_sales_due, SUM(quantity_sale*sale_price) AS total_sales_due FROM sales";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Afficher le nombre de clients à l'écran
    $row = $result->fetch_assoc();
    $total_sales_due = $row['total_sales_due'];  
} 


// Fermer la connexion à la base de données
$conn->close();
?>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget">
            <div class="dash-widgetimg">
              <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="<?php echo $total_purchases_due; ?>"><?php echo $total_purchases_due; ?></span> XAF</h5>
                <h6>Total Purchase Due</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash1">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="<?php echo $total_sales_due; ?>"><?php echo $total_sales_due; ?></span> XAF</h5>
                <h6>Total Sales Due</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash2">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="385656.50">385,656.50</span> XAF</h5>
                <h6>Total Sale Amount</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash3">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><span class="counters" data-count="40000.00">400.00</span> XAF</h5>
                <h6>Total Sale Amount</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count">
            <div class="dash-counts">
                <h4> <?php echo $total_clients; ?></h4>
                <h5>Customers</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="user"></i>
            </div>
        </div>
        
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das1">
            <div class="dash-counts">
                <h4><?php echo $total_suppliers; ?></h4>
                <h5>Suppliers</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="user-check"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das2">
            <div class="dash-counts">
                <h4><?php echo $total_purchases; ?></h4>
                <h5>Purchase Invoice</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file-text"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das3">
            <div class="dash-counts">
                <h4><?php echo $total_sales; ?></h4>
                <h5>Sales Invoice</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file"></i>
            </div>
        </div>
    </div>
    
</div>


