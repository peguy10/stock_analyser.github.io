<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=stock_analyser', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
    die();
}

// depot distant dbname :eksd0256_stock_analyser user :eksd0256_pm  pwd : stockanalyser10