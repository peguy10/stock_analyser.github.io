<?php

// Connexion à la base de données
include('../inc/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="POS - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  <title>STOCK ANALYSER</title>

  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

  <link rel="stylesheet" href="../assets/css/animate.css">

  <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
  <!-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> -->

  <div class="main-wrapper">

    <?php
    include('../components/header2.php');
    include('../components/sidebar2.php');
    include('../inc/connect.php');

    $sql = "SELECT * FROM product_list";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);



    // Affichage du graphe
    ?>


    <div class="page-wrapper">
      <div class="content">
        <form action="" method="post">
          <div class="row">
            <div class="mb-3 col-md-4">
              <label for="" class="form-label">Produit</label>
              <select class="form-select form-select-sm" name="id_p" id="">
                <option value="">selectionner le Produit</option>
                <?php foreach ($products as $product) : ?>
                  <option value="<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3 col-md-4 mt-4">
              <label for="" class="form-label"></label>
              <button type="submit" class="btn btn-warning text-white" name="analyser">analyser</button>
            </div>

          </div>
        </form>
        <?php
        if (isset($_POST['analyser'])) {
          // Récupération des données de ventes pour le produit le plus vendu
          // $sku = $_POST['id_p'];
          // $stmt = $pdo->prepare('SELECT SUM(quantity_sale) AS quantite_vendue, DATE(sale_date) AS jour FROM sales WHERE product_id = :sku AND sale_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() GROUP BY jour');
          // $stmt->bindParam(':sku', $sku);
          // $stmt->execute();
          // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // // Calcul de la tendance de vente
          // $total_ventes = 0;
          // $nb_jours = count($results);
          // foreach ($results as $result) {
          //   $total_ventes += $result['quantite_vendue'];
          // }
          // $moyenne_ventes_jour = $total_ventes / $nb_jours;

          // // Prévision des ventes pour les 10 prochains jours
          // $jour_actuel = date('Y-m-d');
          // for ($i = 1; $i <= 10; $i++) {
          //   $jour_prevu = date('Y-m-d', strtotime($jour_actuel . ' +' . $i . ' day'));
          //   $ventes_prevues = round($moyenne_ventes_jour * ($nb_jours + $i), 2);
          //   echo "Prévision de vente pour le " . $jour_prevu . " : " . $ventes_prevues . " unités.<br>";
          // }
          // Récupération des données de ventes pour le produit le plus vendu
          // SKU du produit le plus vendu

          $sku = $_POST['id_p'];
          $query = "SELECT SUM(quantity_sale) AS quantite_vendue, DATE(sale_date) AS jour FROM sales WHERE product_id = '$sku' AND sale_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() GROUP BY jour";
          $stmt = $pdo->query($query);
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Calcul de la tendance de vente
          $total_ventes = 0;
          $nb_jours = count($results);

          foreach ($results as $result) {
            $total_ventes += $result['quantite_vendue'];
          }
          if($nb_jours > 0){
          $moyenne_ventes_jour = $total_ventes / $nb_jours;
          }else {
            $moyenne_ventes_jour = 0;
          }

          // Prévision des ventes pour les 10 prochains jours
          $jours_prevus = array();
          $ventes_prevues = array();
          $jour_actuel = date('Y-m-d');
          for ($i = 1; $i <= 10; $i++) {
            $jour_prevu = date('Y-m-d', strtotime($jour_actuel . ' +' . $i . ' day'));
            $jours_prevus[] = $jour_prevu;
            $ventes_prevues[] = round($moyenne_ventes_jour * ($nb_jours + $i), 2);
          }
        }


        ?>

        <canvas id="myChart" width="400" height="200"></canvas>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode(array_column($results, 'jour')); ?>.concat(<?php echo json_encode($jours_prevus); ?>),
        datasets: [{
          label: 'Ventes passées',
          data: <?php echo json_encode(array_column($results, 'quantite_vendue')); ?>,
          borderColor: 'blue',
          fill: false
        }, {
          label: 'Ventes prévues',
          data: <?php echo json_encode($ventes_prevues); ?>,
          borderColor: 'orange',
          fill: false
        }]
      },
      options: {
        scales: {
          xAxes: [{
            type: 'time',
            time: {
              unit: 'day',
              displayFormats: {
                day: 'DD/MM/YYYY'
              }
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Prévisions de vente pour le produit le plus vendu'
        }
      }
    });
  </script>


  <script src="../assets/js/jquery-3.6.0.min.js"></script>

  <script src="../assets/js/feather.min.js"></script>

  <script src="../assets/js/jquery.slimscroll.min.js"></script>

  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/js/moment.min.js"></script>
  <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

  <script src="../assets/plugins/select2/js/select2.min.js"></script>

  <script src="../assets/js/moment.min.js"></script>
  <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

  <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

  <script src="../assets/js/script.js"></script>
</body>

</html>