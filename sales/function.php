<?php
if (isset($_POST['submit']) && isset($_POST['sales'])) {
    $user = $_POST['id_user'];
    $client = $_POST['clt_id'];
    $statuss = "en cour...";
    $dates = date('Y-m-d');
    $sales = $_POST['sales'];
    $sales = isset($_POST['sales']) ? $_POST['sales'] : array();
    $price = array();
    $qty = array();

    foreach ($sales as $sale) {
        $price[$sale] = $_POST['price' . $sale];
        $qty[$sale] = $_POST['qty' . $sale];
    }

    $sql = "INSERT INTO sales (product_id,quantity_sale,sale_price,sale_date,ref_sale,status_sale,id_client,id_user)
                VALUES (:sale, :qty, :price, :dates, :ref, :statuss, :client, :user)";

    $sql2 = "UPDATE `product_list` SET `quantity` = quantity - :qty WHERE `product_list`.`id` = :sale";

    foreach ($sales as $sale) {
        $nbr = rand(1000, 99999);
        $ref = "SL" . $nbr;

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sale', $sale);
        $stmt->bindParam(':qty', $qty[$sale]);
        $stmt->bindParam(':price', $price[$sale]);
        $stmt->bindParam(':dates', $dates);
        $stmt->bindParam(':ref', $ref);
        $stmt->bindParam(':statuss', $statuss);
        $stmt->bindParam(':client', $client);
        $stmt->bindParam(':user', $user);

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':sale', $sale);
        $stmt2->bindParam(':qty', $qty[$sale]);

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
}

function getID()
{
    include('../inc/connect.php');
    $stmt = $pdo->query('SELECT DISTINCT id_client FROM customer,sales WHERE sales.id_client=customer.id_c');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAll()
{
    include('../inc/connect.php');
    $stmt = $pdo->query('SELECT * FROM customer,sales,users WHERE sales.id_client=customer.id_c AND sales.id_user=users.id GROUP BY id_client');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getTotal($id)
{
    include('../inc/connect.php');
    $sql = "SELECT * FROM sales WHERE id_client=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sales = getAll();
$id_clt = getID();
$total = 0;
