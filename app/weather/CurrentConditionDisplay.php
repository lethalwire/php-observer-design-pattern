<?php
namespace App\Weather;
/**
 * Class CurrentConditionDisplay
 * Displays the current weather conditions.
 *
 * @package App\Weather
 */
class CurrentConditionDisplay implements Observer, Display 
{

    private $weatherData;
    private $humidity;
    private $temperature;

    public function __construct(Subject $weatherData) {
        $this->weatherData = $weatherData;
        $weatherData->registerObserver($this);
    }

    /**
     * Displays data
     *
     * @return mixed
     */
    public function display()
    {
        echo "Current conditions: Temperature is " . $this->temperature .
            "F, humidity is " . $this->humidity . "%";
    }

    /**
     * Called when a subject changes that this observer is registered to.
     *
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     * @return mixed
     */
    public function update($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }
}