<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index($year)
    {
        $leapYear = new LeapYear();

        return $leapYear->is_leap_year($year) ?
            'Yep, this is a leap year!' :
            'This is not a lap year';
    }
}
