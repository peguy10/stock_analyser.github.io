<?php

$server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "stock_analyser";
    
    $id = $_GET['id'];
    


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "DELETE FROM product_list WHERE id = '$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:productlist.php');



?>