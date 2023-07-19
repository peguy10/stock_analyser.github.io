<!DOCTYPE html>
<html>
<head>
    <title>Diagramme de données</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "stock_analyser";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Récupération des compteurs des achats par mois
        $queryPurchases = "SELECT COUNT(*) AS total, MONTH(date_buy) AS mois FROM purchases GROUP BY mois";
        $resultPurchases = $conn->query($queryPurchases);

        if ($resultPurchases->num_rows > 0) {
            while($row = $resultPurchases->fetch_assoc()) {
                $mois = $row["mois"]; // Mois
                $totalAchats = $row["total"]; // Total des achats pour le mois en cours
                
                echo "Mois : " . $mois . " - Total des achats : " . $totalAchats . "<br>";
                $achatsParMois[$mois] = $totalAchats;
            }
        } else {
            echo "Pas de données d'achats disponibles.";
        }

        // Récupération des compteurs des ventes par mois
        $querySales = "SELECT COUNT(*) AS total, MONTH(sale_date) AS mois FROM sales GROUP BY mois";
        $resultSales = $conn->query($querySales);

        if ($resultSales->num_rows > 0) {
            while($row = $resultSales->fetch_assoc()) {
                $mois = $row["mois"]; // Mois
                $totalVentes = $row["total"]; // Total des ventes pour le mois en cours
                
                echo "Mois : " . $mois . " - Total des ventes : " . $totalVentes . "<br>";
                $ventesParMois[$mois] = $totalVentes;
            }
        } else {
            echo "Pas de données de ventes disponibles.";
        }

        $conn->close();

        // Création du tableau de données pour les 12 mois
        $labels = [];
        $achats = [];
        $ventes = [];

        $moisNoms = [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre'
        ];
        
        foreach ($moisNoms as $mois => $nom) {
            $labels[] = ucfirst($nom);
        
            if (isset($achatsParMois[$mois])) {
                $achats[] = $achatsParMois[$mois];
            } else {
                $achats[] = 0;
            }
        
            if (isset($ventesParMois[$mois])) {
                $ventes[] = $ventesParMois[$mois];
            } else {
                $ventes[] = 0;
            }
        }
    ?>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Nombre d\'achats',
                    data: <?= json_encode($achats) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Nombre de ventes',
                    data: <?= json_encode($ventes) ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
