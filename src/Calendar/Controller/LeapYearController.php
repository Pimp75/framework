<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index($year)
    {
        $leapYear = new LeapYear();

        $response = $leapYear->is_leap_year($year) ?
            new Response('Yep, this is a leap year!') :
            new Response('This is not a lap year');

        $response->setTtl(10);

        return $response;
    }
}
