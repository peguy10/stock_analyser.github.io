<?php

$server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "stock_analyser";
    
    $id = $_POST['id'];
    


    
    $conn = mysqli_connect($server, $user, $pass,$bd);
   
        $sql = "DELETE FROM customer WHERE id_c = '$id'";
        
        mysqli_query($conn, $sql);
    
    
    mysqli_close($conn);

    header('location:customerlist.php');



?>