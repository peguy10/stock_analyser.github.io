<?php

$server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "stock_analyser";
    
    $id = $_GET['id'];
    


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "DELETE FROM categories WHERE id_cat = '$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:categorylist.php');



?>