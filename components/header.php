<div class="header">
    <div class="header-left active">
        <a href="index.html" class="logo">
            <!-- <img src="assets/img/logo.png" alt=""> -->
            STOCK ANALYTIC
        </a>
        <a href="index.html" class="logo-small">
            <!-- <img src="assets/img/logo-small.png" alt=""> -->
            STOCK ANALYTIC
        </a>
        <a id="toggle_btn" href="javascript:void(0);"></a>
    </div>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <ul class="nav user-menu">

        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search"><i class="fa fa-search"></i></a>
                <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search Here ...">
                        <div class="search-addon">
                            <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                        </div>
                    </div>
                    <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                </form>
            </div>
        </li>


        <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                <img src="assets/img/flags/us1.png" alt="" height="20">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="?lang=en" class="dropdown-item">
                    <img src="assets/img/flags/us.png" alt="" height="16"> English
                </a>
                <a href="?lang=fr" class="dropdown-item">
                    <img src="assets/img/flags/fr.png" alt="" height="16"> French
                </a>
                <a href="?lang=es" class="dropdown-item">
                    <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                </a>
                <a href="?lang=de" class="dropdown-item">
                    <img src="assets/img/flags/de.png" alt="" height="16"> German
                </a>
            </div>
        </li>


        <?php 
    $sname = "localhost"; // mysql server name
    $uname = "root"; // user name
    $password = ""; // password
    $db_name = "stock_analyser"; // database name

    $conn = mysqli_connect($sname, $uname, $password, $db_name); // connect to the database

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur lors de la connexion à la base de données : " . $conn->connect_error);
    }

    include('inc/connect.php');
  $sql = "SELECT * FROM product_list WHERE quantity < 5";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $qty = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  $count=count($qty);

$date=date('Y-m-d');
  $sql2 = "SELECT * FROM purchases, product_list WHERE purchases.id_p = product_list.id AND purchases.date_buy = '$date' AND status_buy = 'completed'";
  $stmt2 = $pdo->prepare($sql2);
  $stmt2->execute();
  $pur = $stmt2->fetchAll(PDO::FETCH_ASSOC);
   $count2=count($pur);

   
        $total_tout = $count + $count2;
?>



        <li class="nav-item dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <img src="assets/img/icons/notification-bing.svg" alt="img"> <span class="badge rounded-pill"> 

          <?php echo $total_tout;?>
                </span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <?php
                    // Connexion à la base de données
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "stock_analyser";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Erreur de connexion à la base de données : " . $conn->connect_error);
                    }

                    ?>

                    <ul class="notification-list">
                        <?php
                        // Requête pour récupérer les produits dont la quantité est inférieure à 5
                        $query = "SELECT * FROM product_list WHERE quantity < 5";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $productName = $row['product_name'];
                            $notificationTime = $row['date_entree'];
                            $descriptions = $row['descriptions'];
                            $image = $row['product_image'];
                            $sku = $row['sku'];
                            // Obtenir le chemin absolu de l'image
                            $absolute_path = realpath($image);


                            echo '   <li class="notification-message">';
                            echo '        <a href="product/product-details.php?sku=' . $sku . '">';
                            echo '            <div class="media d-flex">';

                            echo '                <span class="avatar flex-shrink-0">';
                            echo '                    <img alt="" src="' . $absolute_path . '">';
                            echo '                </span>';
                            echo '                <div class="media-body flex-grow-1">';
                            echo '                    <p class="noti-details"><span class="noti-title">' . $productName . '</span> <span class="text-warning">Has reached the minimum threshold.</span>';
                            echo '                  ';
                            echo '                    </p>';
                            echo '                    <p class="noti-time"><span class="notification-time">' . $notificationTime . '</span></p>';
                            echo '                </div>';
                            echo '            </div>';
                            echo '        </a>';
                            echo '    </li>';
                        }


                        // Requête pour récupérer les commandes en cours
                        $date = date('Y-m-d');
                        $query = "SELECT * FROM purchases, product_list WHERE purchases.id_p = product_list.id AND purchases.date_buy = '$date' AND status_buy = 'completed'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $orderId = $row['ref_buy'];
                            $orderDate = $row['date_buy'];
                            $status = $row['status_buy'];
                            $image = $row['product_image'];

                            $sku = $row['sku'];
                            $absolute_path = realpath($image);


                            echo '   <li class="notification-message">';
                            echo '        <a href="product/product-details.php?sku=' . $sku . '">';
                            echo '            <div class="media d-flex">';

                            echo '                <span class="avatar flex-shrink-0">';
                            echo '                    <img alt="" src="' . $absolute_path . '">';
                            echo '                </span>';
                            echo '                <div class="media-body flex-grow-1">';
                            echo '                    <p class="noti-details"><span class="noti-title">' . $orderId . '</span> est';
                            echo '                        <span class="noti-title">' . $status . '</span>';
                            echo '                    </p>';
                            echo '                    <p class="noti-time"><span class="notification-time">' . $orderDate . '</span></p>';
                            echo '                </div>';
                            echo '            </div>';
                            echo '        </a>';
                            echo '    </li>';
                        }

                        mysqli_close($conn);
                        ?>

                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
       <?php 
       $sname = "localhost";// mysql server name
       $uname = "root"; // user name
       $password = ""; // password
       $db_name = "stock_analyser"; // database name
       
       $conn = mysqli_connect($sname, $uname, $password, $db_name);
       $query = "SELECT * FROM users ";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo'<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="'.$row['user_image'].'" alt="">
                    <span class="status online"></span></span>
            </a>'; ?>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6><?php
                                echo $nom; ?></h6>
                            <h5>Admin</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="users/profile.php"> <i class="me-2" data-feather="user"></i> My
                        Profile</a>
                    <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="logout.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                </div>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="users/profile.php">My Profile</a>
            <a class="dropdown-item" href="generalsettings.html">Settings</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</div>