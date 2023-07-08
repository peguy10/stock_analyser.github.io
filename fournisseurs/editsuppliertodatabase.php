<?php
    //MANAGE IMAGE


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if($_FILES['avatar_supplier']['size']==0){

        $file_path = $_POST['old_supplier_image']; 

    }else{

        $target_dir = "../assets/img/uploads/";
        $file_name = $_FILES['avatar_supplier']['name'];
        $destination = $target_dir . $file_name; 
        $target_file = $target_dir . basename($file_name);
        $fileTmpName  = $_FILES['avatar_supplier']['tmp_name'];
        $fileSize = $_FILES['avatar_supplier']['size'];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $file_path=0;

        
        $check = getimagesize($fileTmpName);
        if($check !== false) {  
            echo "File is an image - " . $check['mime'] . ".";
            $uploadOk = 1;
            // // Check if file already exists
            // if (file_exists($target_file)) {
            //     $file_path = "Sorry, file already exists.";
            //     $uploadOk = 0;
            // }else{
            
                // Check file size
                if ($fileSize > 1500000) //If the file is larger than 500KB
                {
                    $file_path = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }else{
                
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        $file_path = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }else{
                    
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            $file_path = "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                                $didUpload = move_uploaded_file($fileTmpName, $destination);
                                if ($didUpload) {
                                $file_path = $target_dir . basename( $_FILES['avatar_supplier']['name']) ;
                                } else {
                                    $file_path = "Sorry, there was an error uploading your file.";
                                }
                        }
                    }
                }
            // }
        } else {
                $file_path = "File is not an image.";
                $uploadOk = 0;
        }
    }        
}

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "stock_analyser";
    
    $avatar_supplier = $file_path;
    $name_supplier = $_POST['name_supplier'];
    $email_supplier = $_POST['email_supplier'];
    $phone_supplier = $_POST['phone_supplier'];
    $country_supplier = $_POST['country_supplier'];
    $city_supplier = $_POST['city_supplier'];
    $address_supplier = $_POST['address_supplier'];
    $description_supplier = $_POST['description_supplier'];
    $id = $_POST['id'];


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "UPDATE supplier
        SET avatar_supplier = '$avatar_supplier', 
        name_supplier = '$name_supplier',
        email_supplier = '$email_supplier',
        phone_supplier = '$phone_supplier',
        country_supplier = '$country_supplier',
        city_supplier = '$city_supplier',
        address_supplier = '$address_supplier',
        description_supplier = '$description_supplier'
        
        WHERE id='$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:supplierlist.php');
    
?>