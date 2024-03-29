<div class="row">

                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Purchase & Sales</h5>
                                <div class="graph-sets">
                                    <ul>
                                        <li>
                                            <span>Sales</span>
                                        </li>
                                        <li>
                                            <span>Purchase</span>
                                        </li>
                                    </ul>
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                           2022 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                       </button>
                                       <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id=""> 
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
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mars',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'July',
            8 => 'Aug',
            9 => 'Sept',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec'
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
                    label: 'Total of sales',
                    data: <?= json_encode($achats) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Total of purchase',
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
    </script></div>
                        </div>
                    </div>
                </div>