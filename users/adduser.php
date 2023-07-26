<?php include '../inc/connect.php';
if (isset($_POST['inscription'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (nom, email, mot_de_passe, phone_user) VALUES (:nom, :email, :mot_de_passe, :phone)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->bindParam(':phone', $phone);
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "echec d'insertion";
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
    <title><a href="../assets/img/logo.png"></a></title>

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
                        <h4>User Management</h4>
                        <h6>Add/Update User</h6>
                    </div>
                </div>
                <form name="main" action="addusertodatabase.php" method="post">
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group" id="nom">
                        <label>User Name</label>
                        <input type="text" name="nom">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Password</label>
                        <div class="pass-group">
                            <input type="password" class="pass-input" id="mot_de_passe" name="mot_de_passe">
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email" name="email">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>User Image</label>
                        <input type="file" id="user_image" name="user_image" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <div class="col-lg-12">
                            <input type="submit" name="submit" value="submit" class="btn btn-submit me-2"></input> 
                                <!-- <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a> -->
                                <a href="userlist.php" class="btn btn-cancel">Cancel</a>
                            </div>
            </div>
        </div>
    </div>
</form>

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