<?php

$server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "stock_analyser";
    
    $id = $_POST['id'];
    


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "DELETE FROM supplier WHERE id_f = '$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:supplierlist.php');



?>