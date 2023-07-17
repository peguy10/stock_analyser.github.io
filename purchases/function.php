<?php
if (isset($_POST['save'])) {
    $user = $_POST['id_user'];
    $fournisseur = $_POST['id_f'];
    $status = $_POST['status'];
    $dates = date('Y-m-d');
    $produits = isset($_POST['purchases']) ? $_POST['purchases'] : array();
    $price = array();
    $qty = array();

    foreach ($produits as $produit) {
        $price[$produit] = $_POST['price' . $produit];
        $qty[$produit] = $_POST['qty' . $produit];
    }
    //     foreach ($produits as $produit) {
    //         echo "<script>
    //     alert('id : " . $produit. " qty: ".$qty[$produit]." price: ". $price[$produit]. " fournisseur : ".$fournisseur." date : ".$dates." ');
    // </script>";
    //     }
    if ($qty > 0) {
        $sql = "INSERT INTO purchases (id_p,id_f,qty_buy,id_user,price_buy,status_buy,date_buy,ref_buy) 
        VALUES (:purchase, :fournisseur, :qty, :user, :price, :status, :dates, :ref)";

        $sql2 = "UPDATE `product_list` SET `quantity` = quantity + :qty WHERE `product_list`.`id` = :purchase";
        foreach ($produits as $produit) {

            $nbr = rand(1000, 99999);
            $ref = "PT" . $nbr;
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':purchase', $produit);
            $stmt->bindParam(':qty', $qty[$produit]);
            $stmt->bindParam(':price', $price[$produit]);
            $stmt->bindParam(':dates', $dates);
            $stmt->bindParam(':ref', $ref);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':fournisseur', $fournisseur);
            $stmt->bindParam(':user', $user);

            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindParam(':purchase', $produit);
            $stmt2->bindParam(':qty', $qty[$produit]);

            $result = $stmt->execute();
            $result2 = $stmt2->execute();
        }

        if ($result) {
            echo "<script>
        alert('insertion ok')
    </script>";
        } else {
            echo "<script>
        alert('echec D'
                insertion ')
    </script>";
        }
    } else {
        header('Location: addpurchase.php');
    }
}

function getID()
{
    include('../inc/connect.php');
    $stmt = $pdo->query('SELECT DISTINCT purchases.id_f FROM supplier,purchases WHERE purchases.id_f=supplier.id_f');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAll()
{
    include('../inc/connect.php');
    $stmt = $pdo->query('SELECT * FROM supplier,purchases,users WHERE purchases.id_f=supplier.id_f AND purchases.id_user=users.id');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getTotal($id)
{
    include('../inc/connect.php');
    $sql = "SELECT * FROM purchases WHERE id_f=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$purchases = getAll();
$id_clt = getID();
$total = 0;
