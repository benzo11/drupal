<?php
/**
 * @file providing the service that return number of days left to event.
 *
 */

namespace Drupal\event_timer;

use DateTime;

class EventTimerService
{
    /**
     * Function calculate days until event.
     * $result = 1 in progress
     * $result = 2 event will happend in X days
     * $result = 3 the event has ended
     *
     * @param DateTime|null $eventDate
     * @return array
     */
    public function getDate($eventDate = null)
    {
        $currentDate = new DateTime('NOW');
        $eventDate = new DateTime($eventDate);

        $interval = date_diff($currentDate, $eventDate)->format("%a");

        if ($eventDate->format("Y-m-d") <= $currentDate->format("Y-m-d")) {
            if ($interval == 0) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }

        return compact('result', 'interval');
    }
}