<?php
namespace App\Weather;

class HeatIndexDisplay implements Observer, Display
{
    private $weatherData;
    private $heatIndex;

    public function __construct(Subject $weatherData) {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
        $this->heatIndex = 0;
    }

    /**
     * Displays data
     *
     * @return mixed
     */
    public function display()
    {
        echo "Heat Index: " . $this->heatIndex;
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
        $this->heatIndex = $this->computeHeatIndex($temperature, $humidity);
        $this->display();
    }

    private function computeHeatIndex($t, $rh) {
        $index = ((16.923 + (0.185212 * $t) + (5.37941 * $rh) - (0.100254 * $t * $rh)
                    + (0.00941695 * ($t * $t)) + (0.00728898 * ($rh * $rh))
                    + (0.000345372 * ($t * $t * $rh)) - (0.000814971 * ($t * $rh * $rh))
                    + (0.0000102102 * ($t * $t * $rh * $rh)) - (0.000038646 * ($t * $t * $t))
                    + (0.0000291583 * ($rh * $rh * $rh)) + (0.00000142721 * ($t * $t * $t * $rh))
                    + (0.000000197483 * ($t * $rh * $rh * $rh)) - (0.0000000218429 * ($t * $t * $t * $rh * $rh))
                    + 0.000000000843296 * ($t * $t * $rh * $rh * $rh))
                    - (0.0000000000481975 * ($t * $t * $t * $rh * $rh * $rh))
                );
        return $index;
    }
}