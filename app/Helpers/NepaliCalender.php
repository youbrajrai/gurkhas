<?php
use Nilambar\NepaliDate\NepaliDate;
if (!function_exists('toNepaliDate')) {

function toNepaliDate($date)
{
    $date = \Carbon\Carbon::parse($date);
    $year = $date->year;
    $month = $date->month;
    $day = $date->day;
    $dc = new NepaliDate();
    $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
    return $nd['year']."-".$nd['month']."-".$nd['day'];

}

}
