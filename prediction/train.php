<?php

use Phpml\Regression\LeastSquares;
use Phpml\FeatureScaling\StandardScaler;

require_once '../vendor/autoload.php';
require_once 'data.php';

$scaler = new StandardScaler();
$scaler->fit($samples);
$samples = $scaler->transform($samples);

$regression = new LeastSquares();
$regression->train($samples, $targets);

file_put_contents('model.phpml', serialize($regression));
file_put_contents('scaler.phpml', serialize($scaler));

echo "Modèle entraîné avec succès.";
