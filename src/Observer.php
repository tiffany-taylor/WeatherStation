<?php

require_once __DIR__ . '/../vendor/autoload.php';

interface Observer
{
    public function update($temperature, $humidity, $pressure);
}