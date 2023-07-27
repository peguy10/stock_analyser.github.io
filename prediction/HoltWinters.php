<?php
// Connexion à la base de données
require_once('../inc/connect.php');
// Connexion à la base de données
require_once('../inc/connect.php');

// Récupération des données de ventes
$stmt = $pdo->prepare('SELECT sale_date, quantity_sale FROM sales');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Reformattage des données
$data = array();
foreach ($results as $result) {
    $data[] = array($result['sale_date'], intval($result['quantity_sale']));
}

// Classe HoltWinters
class HoltWinters
{
    private $data;
    private $alpha;
    private $beta;
    private $gamma;

    public function __construct($data, $alpha, $beta, $gamma)
    {
        $this->data = $data;
        $this->alpha = $alpha;
        $this->beta = $beta;
        $this->gamma = $gamma;
    }

    public function predict($num_predictions)
    {
        $season_length = 6;

        // Vérifier si nous avons suffisamment de données pour calculer la saisonnalité
        if (count($this->data) < $season_length) {
            throw new Exception('Not enough data to calculate seasonal component');
        }

        $level = reset($this->data);
        $trend = ($this->data[$season_length][1] - $this->data[0][1]) / $season_length;
        $seasonal = array();
        for ($i = 0; $i < $season_length; $i++) {
            $seasonal[$i] = array_sum(array_slice($this->data, $i, count($this->data) - $season_length, $season_length)) / $season_length;
        }
        $predictions = array();
        for ($i = 1; $i <= $num_predictions; $i++) {
            $last_level = $level;
            $last_trend = $trend;
            $last_seasonal = end($seasonal);
            $level = $this->alpha * ($this->data[count($this->data) - $season_length + ($i - 1)][1] - $last_seasonal) + (1 - $this->alpha) * ($last_level + $last_trend);
            if ($i > 1) {
                $trend = $this->beta * ($level - $last_level) + (1 - $this->beta) * $last_trend;
            }
            for ($j = 0; $j < $season_length; $j++) {
                if ($j == ($i % $season_length)) {
                    $seasonal[$j] = $this->gamma * ($this->data[count($this->data) - $season_length + ($i - 1)][1] - $level) + (1 - $this->gamma) * $seasonal[$j];
                }
            }
            $predictions[] = $last_level + $i * $last_trend + $seasonal[($i - 1) % $season_length];
        }
        return $predictions;
    }
}

// Utilisation de la classe HoltWinters
$hw = new HoltWinters($data, 0.2, 0.1, 0.3);
$predictions = $hw->predict(12); // Prédire les ventes pour les 12 prochains mois

// Affichage des prédictions
echo '<pre>';
print_r($predictions);
echo '</pre>';
