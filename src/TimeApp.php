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

        $year           = date('Y', strtotime($date));
        $week_rank      = date('W', strtotime($date));
        $week_day       = date('w', strtotime($date));
        $week_date_from = date('Y-m-d', strtotime('-' . ($week_day - 1) . ' day', strtotime($date)));
        $week_date_to   = date('Y-m-d', strtotime("+6 day", strtotime($week_date_from)));
        $week_time_from = strtotime($week_date_from . ' 00:00:00');
        $week_time_to   = strtotime($week_date_to . ' 23:59:59');

        return [
            "date"           => $date,
            "year"           => $year,
            "week_rank"      => $week_rank,
            "week_day"       => $week_day,
            "week_date_from" => $week_date_from,
            "week_date_to"   => $week_date_to,
            "week_time_from" => $week_time_from,
            "week_time_to"   => $week_time_to,
        ];
    }
}



