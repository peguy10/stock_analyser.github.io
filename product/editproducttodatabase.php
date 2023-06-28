<?php
//MANAGE IMAGE


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if($_FILES['product_image']['size']==0){

        $file_path = $_POST['old_category_image']; 

    }else{

        $target_dir = "../assets/img/uploads/";
        $file_name = $_FILES['product_image']['name'];
        $destination = $target_dir . $file_name; 
        $target_file = $target_dir . basename($file_name);
        $fileTmpName  = $_FILES['product_image']['tmp_name'];
        $fileSize = $_FILES['product_image']['size'];
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
                                $file_path = $target_dir . basename( $_FILES['product_image']['name']) ;
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
    
    $product_image = $file_path;
    $product_name = $_POST['product_name'];
    $sku = $_POST['sku'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $quantity = $_POST['quantity'];
    $created_by = 'MILLENA';
    $id = $_POST['id'];
    $sub_category = $_POST['sub_category'];
    $minimum_quantity = $_POST['minimum_quantity'];
    $descriptions = $_POST['descriptions'];
    $tax = $_POST['tax'];
    $discount_type = $_POST['discount_type'];
    $statuss = $_POST['statuss'];


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "UPDATE product_list
        SET product_image = '$product_image', 
        product_name = '$product_name',
        sku = '$sku',
        category = '$category',
        brand = '$brand',
        price = '$price',
        unit = '$unit',
        quantity = '$quantity',
        created_by = '$created_by',
        sub_category = '$sub_category',
        minimum_quantity = '$minimum_quantity',
        descriptions = '$descriptions',
        tax = '$tax',
        statuss = '$statuss',
        discount_type = '$discount_type'
        WHERE id='$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:productlist.php');
    
?>