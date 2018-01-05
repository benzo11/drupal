<?php
use Zend\Diactoros\Response;

/**
 * Created by PhpStorm.
 * User: benzo
 * Date: 5. 01. 2018
 * Time: 11:44
 */
class EventTimerController
{
    public function getTimeLeft($param)
    {
        $time = '1000';

        return new Response($time);
    }
}