<?php

require_once __DIR__ . '/../vendor/autoload.php';

interface Subject
{
    public function registerObserver(Observer $o);
    public function removeObserver(Observer $o);
    public function notifyObservers();
}