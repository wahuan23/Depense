<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_workdays_in_month')) {
    function get_workdays_in_month($year, $month) {
        $workdays = 0;
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($day = 1; $day <= $total_days; $day++) {
            $date = $year . '-' . $month . '-' . $day;
            $weekday = date('N', strtotime($date));
            if ($weekday >= 1 && $weekday <= 5) { // Lundi (1) à Vendredi (5)
                $workdays++;
            }
        }

        return $workdays;
    }
}
