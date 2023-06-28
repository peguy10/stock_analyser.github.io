<?php
    

    //MANAGE IMAGE


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if($_FILES['avatar_customer']['size']==0){

        $file_path = $_POST['old_customer_image']; 

    }else{

        $target_dir = "../assets/img/uploads/";
        $file_name = $_FILES['avatar_customer']['name'];
        $destination = $target_dir . $file_name; 
        $target_file = $target_dir . basename($file_name);
        $fileTmpName  = $_FILES['avatar_customer']['tmp_name'];
        $fileSize = $_FILES['avatar_customer']['size'];
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
                if ($fileSize > 500000) //If the file is larger than 500KB
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
                                $file_path = $target_dir . basename( $_FILES['avatar_customer']['name']) ;
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




   //INSERTING DATA INTO DATABASE
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "stock_analyser";
    
    $avatar_customer = $file_path;
    $name_customer = $_POST['name_customer'];
    $email_customer = $_POST['email_customer'];
    $phone_customer = $_POST['phone_customer'];
    $country_customer = $_POST['country_customer'];
    $city_customer = $_POST['city_customer'];
    $adress_customer = $_POST['adress_customer'];
    $description_customer = $_POST['description_customer'];
    
    $id = $_POST['id'];


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "UPDATE product_list
        SET name_customer = '$name_customer', 
        email_customer = '$email_customer',
        phone_customer = '$phone_customer',
        country_customer = '$country_customer',
        city_customer = '$city_customer',
        adress_customer = '$adress_customer',
        description_customer = '$description_customer',
        avatar_customer = '$avatar_customer'
        WHERE id='$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:customerlist.php');
    
?>