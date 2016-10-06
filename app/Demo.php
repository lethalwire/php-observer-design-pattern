<?php

namespace App;

use App\Weather\CurrentConditionDisplay;
use App\Weather\HeatIndexDisplay;
use App\Weather\WeatherData;

class Demo {

    public function __construct()
    {
        echo 'In Demo <br />';
        $this->run();
    }

    public function run() {
        // Instantiate the subject
        $weatherData = new WeatherData();

        // instantiate a weather display which registers itself as an observer
        $currentConditionDisplay = new CurrentConditionDisplay($weatherData);
        $heatIndexDisplay = new HeatIndexDisplay($weatherData);

        // Manually change the weather measurements which triggers the observer to display.
        $weatherData->setMeasurements(78.3, 65.3, 30.025);

        echo "<br />";
        // Manually trigger the observer again
        $weatherData->setMeasurements(50.3, 25.3, 28.79);
    }
}