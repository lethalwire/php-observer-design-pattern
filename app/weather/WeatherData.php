<?php
namespace App\Weather;

class WeatherData implements Subject
{
    /**
     * @var Observer[] $observers
     */
    private $observers;

    /**
     * @var float $temperature
     */
    private $temperature;

    /**
     * @var float $humidity
     */
    private $humidity;

    /**
     * @var float $pressure
     */
    private $pressure;

    public function __construct() {
        $this->observers = array();
    }

    /**
     * Registers an observer object on this subject.
     *
     * @param Observer $observer
     * @return void
     */
    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    /**
     * Removes an observer object from this subject.
     *
     * @param Observer $observer
     * @return void
     */
    public function removeObserver(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if($key) {
            unset($key, $this->observers);
        }
    }

    /**
     * Notifies all registered observers.
     * @return void
     */
    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature,
                $this->humidity,
                $this->pressure);
        }
    }

    /**
     * This method is called automatically when measurements have changed.
     * However, for demonstration purposes, we'll call this method manually.
     */
    public function measurementsChanged() {
        $this->notifyObservers();
    }

    /**
     * We'll manually set the measurements that are read in from a sensor.
     * However, in a real world scenario, we might use data repositories
     * to pull in live data.
     *
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     */
    public function setMeasurements($temperature, $humidity, $pressure) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->measurementsChanged();
    }
}