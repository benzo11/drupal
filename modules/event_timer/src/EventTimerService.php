<?php
/**
 * @file providing the service that say hello world and hello 'given name'.
 *
 */

namespace Drupal\event_timer;

class EventTimerService
{
    public function getDate($d)
    {
        $d = rand();

        return $d;
    }
}