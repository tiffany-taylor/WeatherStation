<?php


namespace WeatherStation;


interface Observer
{
    public function update($temperature, $humidity, $pressure);
}