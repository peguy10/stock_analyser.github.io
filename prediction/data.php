<?php
require_once '../inc/connect.php';

$query = "SELECT product_id, quantity_sale, sale_price, sale_date, id_client, id_user FROM sales WHERE status_sale = 1";
$stmt = $pdo->prepare($query);
$stmt->execute();

$salesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$samples = [];
$targets = [];

foreach ($salesData as $row) {
    $date = strtotime($row['sale_date']);
    $dayOfWeek = date('N', $date);
    $dayOfMonth = date('j', $date);
    $month = date('n', $date);

    $samples[] = [
        (int)$row['product_id'],
        (float)$row['quantity_sale'],
        (float)$row['sale_price'],
        (int)$dayOfWeek,
        (int)$dayOfMonth,
        (int)$month,
        (int)$row['id_client'],
        (int)$row['id_user']
    ];
    $targets[] = (float)$row['quantity_sale'];
}