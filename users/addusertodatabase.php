<?php
//MANAGE IMAGE
$target_dir = "../assets/img/uploads/";
$file_name = $_FILES['user_image']['name'];
$destination = $target_dir . $file_name;
$target_file = $target_dir . basename($file_name);
$fileTmpName  = $_FILES['user_image']['tmp_name'];
$fileSize = $_FILES['user_image']['size'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$file_path = 0;

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($fileTmpName);
    if ($check !== false) {
        echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
        // // Check if file already exists
        // if (file_exists($target_file)) {
        //     $file_path = "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }else{

        // Check file size
        if ($fileSize > 1000000) //If the file is larger than 500KB
        {
            $file_path = "Sorry, your file is too large.";
            $uploadOk = 0;
        } else {

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $file_path = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            } else {

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $file_path = "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $destination);
                    if ($didUpload) {
                        $file_path = $target_dir . basename($_FILES['user_image']['name']);
                    } else {
                        $file_path = "Sorry, there was an error uploading your file.";
                    }
                }
            }
            // }
        }
    } else {
        $file_path = "File is not an image.";
        $uploadOk = 0;
    }
}

include('../inc/connect.php');

$user_image = $file_path;
$nom = $_POST['nom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];


try {

    // Préparation de la requête SQL
    $sql = "INSERT INTO product_list(nom, email, mot_de_passe) 
            VALUES (:nom, :email, :mot_de_passe)";
    $stmt = $pdo->prepare($sql);

    // Liaison des valeurs des paramètres à la requête préparée
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
   
    // Exécution de la requête préparée
    $stmt->execute();

    header('location:userlist.php');
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}




//INSERTING DATA INTO DATABASE 
// $server = "localhost";
// $user = "root";
// $pass = "";
// $bd = "stock_analyser";



// $product_image = $file_path;
// $product_name = $_POST['product_name'];
// $sku = $_POST['sku'];
// $category = $_POST['id_cat'];
// $fournisseur = $_POST['id_f'];
// $price = $_POST['price'];
// $quantity = $_POST['quantity'];
// $created_by = $_POST['id_user'];;
// $descriptions = $_POST['descriptions'];
// $tax = $_POST['tax'];
// $date = date('Y-m-d');
// $statuss = $_POST['statuss'];

// try {
//     $conn = mysqli_connect($server, $user, $pass, $bd);

//     $sql = "INSERT INTO product_list(product_name,sku,id_categorie,price,quantity,id_user,product_image,descriptions,tax,status,id_fournisseur,date_entree) 
//         VALUES ('$product_name','$sku','$category','$price','$quantity','$created_by','$product_image','$descriptions','$tax','$statuss','$fournisseur','$date')";

//    $result= mysqli_query($conn, $sql);
   
//     header('location:productlist.php');
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
