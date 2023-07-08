<?php
if (isset($_POST['sale'])) {
    $user = $_POST['id_user'];
    $client = $_POST['clt_id'];
    $product = $_POST['id_p'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $statuss = "en cour...";
    $dates = date('Y-m-d');
    $nbr = rand(1000, 99999);
    $ref = "SL" . $nbr;

    $sql = "INSERT INTO sales (product_id,quantity_sale,sale_price,sale_date,ref_sale,status_sale,id_client,id_user)
VALUES (:product, :qty, :price, :dates, :ref, :statuss, :client, :user)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':dates', $dates);
    $stmt->bindParam(':ref', $ref);
    $stmt->bindParam(':statuss', $statuss);
    $stmt->bindParam(':client', $client);
    $stmt->bindParam(':user', $user);
    $result = $stmt->execute();
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
}
