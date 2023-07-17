<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>

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



<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>