<?php declare(strict_types=1);


namespace WeatherStation;

require_once __DIR__ . '/Subject.php';
require_once __DIR__ . '/Observer.php';
require_once __DIR__ . '/DisplayElement.php';
require_once __DIR__ . '/CurrentConditionDisplay.php';

class WeatherData implements Subject
{
    private array $observers = [];
    private float $temperature;
    private float $humidity;
    private float $pressure;

    public function registerObserver(Observer $o)
    {
        $this->observers[spl_object_id($o)] = $o;
    }

    public function removeObserver(Observer $o)
    {
        foreach ($this->observers as $observer) {
            if ($observer === $o) {
                unset($this->observers[spl_object_id($observer)]);
            }
        }
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    public function measurementsChanged()
    {
        $this->notifyObservers();
    }

    public function setMeasurements(float $temperature, float $humidity, float $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}