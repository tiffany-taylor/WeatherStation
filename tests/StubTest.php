<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Subject\WeatherData;
use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
    public function testObserversAreUpdated(): void
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

    public function testObserversAreNotUpdated(): void
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