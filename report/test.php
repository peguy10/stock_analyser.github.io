<?php 
  $con = new mysqli('localhost','root','','stock_analyser');

  // Récupérer les produits par mois
  $query = $con->query("
    SELECT 
      date_format(date_entree, '%Y-%m') as month,
      product_name,
      COUNT(*) as orders_count
    FROM transactions
    INNER JOIN product_list ON transactions.product_id = product_list.id
    GROUP BY month, product_name
    ORDER BY month, product_name
  ");

  $data = array();
  while ($row = $query->fetch_assoc()) {
    $month = $row['month'];
    $product = $row['product_name'];
    $count = $row['orders_count'];

    // Stocker les données dans un tableau multidimensionnel
    $data[$month][$product] = $count;
  }

  // Préparer les données pour le diagramme
  $products = array();
  $months = array();
  foreach ($data as $month => $productCounts) {
    $months[] = $month;

    foreach ($productCounts as $product => $count) {
      if (!in_array($product, $products)) {
        $products[] = $product;
      }
    }
  }

  // Générer le diagramme
  echo "<table>";
  echo "<tr><th>Produit</th>";

  foreach ($months as $month) {
    echo "<th>$month</th>";
  }

  echo "</tr>";

  foreach ($products as $product) {
    echo "<tr>";
    echo "<td>$product</td>";

    foreach ($months as $month) {
      $count = isset($data[$month][$product]) ? $data[$month][$product] : 0;
      echo "<td>$count</td>";
    }

    echo "</tr>";
  }

  echo "</table>";
?>
