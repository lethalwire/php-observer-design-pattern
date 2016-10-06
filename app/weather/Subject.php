<?php
namespace App\Weather;

/**
 * Interface Subject
 * An abstraction of a subject that is observed.
 *
 * @package App\Weather
 */
interface Subject
{
    /**
     * Registers an observer object on this subject.
     *
     * @param Observer $observer
     * @return void
     */
    public function registerObserver(Observer $observer);

    /**
     * Removes an observer object from this subject.
     *
     * @param Observer $observer
     * @return void
     */
    public function removeObserver(Observer $observer);

    /**
     * Notifies all registered observers.
     * @return void
     */
    public function notifyObservers();
}