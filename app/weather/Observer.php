<?php
namespace App\Weather;

/**
 * Interface Observer
 * An abstraction of an observer that observers a subject.
 *
 * @package App\Weather
 */
interface Observer
{
    /**
     * Called when a subject changes that this observer is registered to.
     *
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     * @return mixed
     */
    public function update($temperature, $humidity, $pressure);
}
