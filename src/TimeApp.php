<?php

namespace Phpfunction\App;

/**
 * 时间
 * Class Time
 * @package Phpfunction\App
 */
class TimeApp
{


    /**
     * 周详情
     * @param string $date
     * @return array
     */
    public function getWeekByDate($date = '')
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }

        $year      = date('Y', strtotime($date));
        $week_rank = date('W', strtotime($date));
        $week_day  = date('w', strtotime($date));
        $date_from = date('Y-m-d', strtotime('-' . ($week_day - 1) . ' day'));
        $date_to   = date('Y-m-d', strtotime("+6 day", strtotime($date_from)));
        $time_from = strtotime($date_from . ' 00:00:00');
        $time_to   = strtotime($date_to . ' 23:59:59');

        return [
            "today"     => $date,
            "year"      => $year,
            "week_rank" => $week_rank,
            "week_day"  => $week_day,
            "date_from" => $date_from,
            "date_to"   => $date_to,
            "time_from" => $time_from,
            "time_to"   => $time_to,
        ];
    }
}



