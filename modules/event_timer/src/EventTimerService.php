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
    public function getDate($eventDate)
    {
        $currentDate = new DateTime('Today');
        $currentDate->setTime(0, 0, 0);

        $eDate = new DateTime($eventDate);
        $eDate->setTime(0, 0, 0);

        $diff = $currentDate->diff($eDate);
        $diffDays = (integer)$diff->format("%R%a");

        if ($diffDays == 0) {
            $result = 1;
        }

        if ($diffDays < 0) {
            $result = 2;
        }

        if ($diffDays > 0) {
            $result = 3;
        }

        return compact('result', 'diffDays');
    }
}