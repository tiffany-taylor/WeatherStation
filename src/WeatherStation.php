<?php declare(strict_types=1);

use WeatherStation\CurrentConditionDisplay;
use WeatherStation\WeatherData;
use WeatherStation\Observer;

require_once __DIR__ . '/../vendor/autoload.php';


$weatherData = new WeatherData();

$currentDisplay = new CurrentConditionDisplay($weatherData);

$weatherData->registerObserver($currentDisplay);


