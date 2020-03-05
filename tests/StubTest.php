<?php declare(strict_types=1);
use WeatherStation\CurrentConditionDisplay;
use WeatherStation\WeatherData;
use WeatherStation\Observer;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class StubTest extends TestCase
{
    public function testObserversAreUpdated()
    {
        $stub = $this->createMock(Observer::class);

        $stub
            ->expects($this->once())
            ->method('update')
        ;

        $weatherData = new WeatherData();

        $weatherData->registerObserver($stub);

        $weatherData->setMeasurements(75,60,25.2);

    }

    public function testObserversAreNotUpdated()
    {
        $stub = $this->createMock(Observer::class);

        $stub
            ->expects($this->never())
            ->method('update')
        ;

        $weatherData = new WeatherData();

        $weatherData->registerObserver($stub);
        $weatherData->removeObserver($stub);
    }
}