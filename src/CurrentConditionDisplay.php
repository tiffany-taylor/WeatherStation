<?php declare(strict_types=1);


namespace WeatherStation;


class CurrentConditionDisplay implements Observer, DisplayElement
{
    private float $temperature;
    private float $humidity;
    private Subject $weatherData;

    public function __construct(Subject $weatherData)
    {
        $this->weatherData = $weatherData;
    }

    public function display()
    {
        echo "Current conditions: " . $this->temperature . "F degrees and " . $this->humidity . "% humidity\n";
    }

    public function update($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }
}