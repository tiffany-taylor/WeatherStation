<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Observer\CurrentConditionDisplay;
use Subject\WeatherData;

$weatherData = new WeatherData();

$currentDisplay = new CurrentConditionDisplay($weatherData);

$weatherData->registerObserver($currentDisplay);

