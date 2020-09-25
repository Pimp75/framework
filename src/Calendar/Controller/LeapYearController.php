<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index($year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->is_leap_year($year)) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('This is not a lap year');
    }
}
