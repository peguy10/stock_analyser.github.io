<?php

use Phpml\Regression\LeastSquares;


require_once('../inc/connect.php');
require_once('../vendor/autoload.php');

// Connexion à la base de données

if (isset($_POST['analyser'])) {
    $mois = $_POST['mois'];
    // Récupération des données de ventes pour le mois de juillet 2023
    $stmt = $pdo->prepare('SELECT SUM(quantity_sale * sale_price) AS chiffre_affaires, DAY(sale_date) AS jour FROM sales WHERE MONTH(sale_date) = :mois AND YEAR(sale_date) = 2023 GROUP BY DAY(sale_date)');
    $stmt->bindParam(':mois', $mois);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calcul du chiffre d'affaires total pour le mois de juillet 2023
    $stmt = $pdo->prepare('SELECT SUM(quantity_sale * sale_price) AS chiffre_affaires FROM sales WHERE MONTH(sale_date) = :mois AND YEAR(sale_date) = 2023');
    $stmt->bindParam(':mois', $mois);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $chiffre_affaires = $result['chiffre_affaires'];

    // Calcul de la quantité totale de produits vendus pour le mois de juillet 2023
    $stmt = $pdo->prepare('SELECT SUM(quantity_sale) AS quantite_vendue FROM sales WHERE MONTH(sale_date) = :mois AND YEAR(sale_date) = 2023');
    $stmt->bindParam(':mois', $mois);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $quantite_vendue = $result['quantite_vendue'];

    // Création du tableau de données pour le graphique
    $data = array();
    foreach ($results as $result) {
        $data[] = array('label' => $result['jour'], 'value' => $result['chiffre_affaires']);
    }
    switch ($mois) {
        case '1':
            $month = 'Janvier';
            break;
        case '2':
            $month = 'Fevrier';
            break;
        case '3':
            $month = 'Mars';
            break;
        case '4':
            $month = 'Avril';
            break;
        case '5':
            $month = 'Mai';
            break;
        case '6':
            $month = 'Juin';
            break;
        case '7':
            $month = 'Juillet';
            break;
        case '8':
            $month = 'Aout';
            break;
        case '9':
            $month = 'Septembre';
            break;
        case '10':
            $month = 'Octobre';
            break;
        case '11':
            $month = 'Novembre';
            break;
        case '12':
            $month = 'Decembre';
            break;
        default:
            $month = '';
            break;
    }

    // Récupération des données de ventes pour le mois en cours
    $stmt1 = $pdo->prepare('SELECT SUM(quantity_sale * sale_price) AS chiffre_affaires, DAY(sale_date) AS jour FROM sales WHERE MONTH(sale_date) = :mois AND YEAR(sale_date) = YEAR(CURRENT_DATE()) GROUP BY DAY(sale_date)');
    $stmt1->bindParam(':mois', $mois);
    $stmt1->execute();
    $result1s = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    // Calcul de la moyenne des ventes par jour
    $total_ventes = 0;
    $nb_jours = count($results);
    foreach ($result1s as $result) {
        $total_ventes += $result['chiffre_affaires'];
    }
    $moyenne_ventes_jour = $total_ventes / $nb_jours;

    // Prévision des ventes pour le reste du mois
    $jour_actuel = date('j');
    $nb_jours_restants = cal_days_in_month(CAL_GREGORIAN, $mois, date('Y')) - $jour_actuel;
    $ventes_prevues = $moyenne_ventes_jour * $nb_jours_restants;
} else {

    // Récupération des données de ventes pour le mois de juillet 2023
    $stmt = $pdo->prepare('SELECT SUM(quantity_sale * sale_price) AS chiffre_affaires, DAY(sale_date) AS jour FROM sales WHERE MONTH(sale_date) = 7 AND YEAR(sale_date) = 2023 GROUP BY DAY(sale_date)');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calcul du chiffre d'affaires total pour le mois de juillet 2023
    $stmt = $pdo->prepare('SELECT SUM(quantity_sale * sale_price) AS chiffre_affaires FROM sales WHERE MONTH(sale_date) = 7 AND YEAR(sale_date) = 2023');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $chiffre_affaires = $result['chiffre_affaires'];

    // Calcul de la quantité totale de produits vendus pour le mois de juillet 2023
    $stmt = $pdo->prepare('SELECT SUM(quantity_sale) AS quantite_vendue FROM sales WHERE MONTH(sale_date) = 7 AND YEAR(sale_date) = 2023');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $quantite_vendue = $result['quantite_vendue'];

    // Création du tableau de données pour le graphique
    $data = array();
    foreach ($results as $result) {
        $data[] = array('label' => $result['jour'], 'value' => $result['chiffre_affaires']);
    }
    $month = 'Juillet';
    // Récupération des données de ventes pour le mois en cours
    $stmt1 = $pdo->prepare('SELECT SUM(quantity_sale * sale_price) AS chiffre_affaires, DAY(sale_date) AS jour FROM sales WHERE MONTH(sale_date) = 7 AND YEAR(sale_date) = YEAR(CURRENT_DATE()) GROUP BY DAY(sale_date)');
    $stmt1->execute();
    $result1s = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    // Calcul de la moyenne des ventes par jour
    $total_ventes = 0;
    $nb_jours = count($results);
    foreach ($result1s as $result) {
        $total_ventes += $result['chiffre_affaires'];
    }
    $moyenne_ventes_jour = $total_ventes / $nb_jours;

    // Prévision des ventes pour le reste du mois
    $jour_actuel = date('j');
    $nb_jours_restants = cal_days_in_month(CAL_GREGORIAN, 7, date('Y')) - $jour_actuel;
    $ventes_prevues = $moyenne_ventes_jour * $nb_jours_restants;
}


// Affichage du chiffre d'affaires total et de la quantité de produits vendus
echo 'Le chiffre d\'affaires total pour le mois ' . $month . '  2023 est de : <strong>' . number_format($chiffre_affaires, '0', ',', ' ')  . ' FCFA </strong><br>';
echo 'La quantité totale de produits vendus pour le mois ' . $month . '   2023 est de : <strong>' . $quantite_vendue . '</strong><br>';

// Affichage du graphique à barres avec Chart.js
echo '<canvas id="myChart"></canvas>';
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<script>';
echo 'var data = {';
echo 'labels: [';
foreach ($data as $item) {
    echo '"' . $item['label'] . '",';
}
echo '],';
echo 'datasets: [{';
echo 'label: "Chiffre d\'affaires (FCFA)",';
echo 'backgroundColor: "rgb(255, 165, 0,0.2)",';
echo 'borderColor: "rgb(255, 165, 0)",';
echo 'borderWidth: 1,';
echo 'data: [';
foreach ($data as $item) {
    echo $item['value'] . ',';
}
echo ']';
echo '}]';
echo '};';
echo 'var options = {';
echo 'scales: {';
echo 'yAxes: [{';
echo 'ticks: {';
echo 'beginAtZero:true';
echo '}';
echo '}]';
echo '}';
echo '};';
echo 'var ctx = document.getElementById("myChart").getContext("2d");';
echo 'var myBarChart = new Chart(ctx, {';
echo 'type: "bar",';
echo 'data: data,';
echo 'options: options';
echo '});';
echo '</script>';







// Affichage des résultats
echo "La moyenne des ventes par jour pour le mois <strong>" . $month . "</strong> est de <strong>" . number_format($moyenne_ventes_jour, '0', ',', ' ') . " FCFA</strong>.\n";
echo "<br>Si cette tendance se maintient, les ventes prévues pour le reste du mois sont de<strong> " . number_format($ventes_prevues, '0', ',', ' ') . " FCFA</strong>.";

