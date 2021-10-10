<?php declare(strict_types=1);

namespace Observer;

require_once __DIR__ . '/../../vendor/autoload.php';

use Observer;
use DisplayElement;
use Subject;

class CurrentConditionDisplay implements Observer, DisplayElement
{
    private float $temperature;
    private float $humidity;
    private float $pressure;
    private Subject $weatherData;

    public function __construct(Subject $weatherData)
    {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
    }

    public function display(): void
    {
        printf("Current conditions:\n%f F degrees\n%f%% humidity\n%f pressure", $this->temperature, $this->humidity, $this->pressure);
    }

    public function update($temperature, $humidity, $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->display();
    }
}