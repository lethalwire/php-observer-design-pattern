<?php
namespace App\Weather;

/**
 * Interface Display
 * @package App\Weather
 */
interface Display
{
    /**
     * Displays data
     *
     * @return mixed
     */
    public function display();
}