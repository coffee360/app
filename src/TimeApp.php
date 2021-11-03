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
     * 月详情
     * @param string $date
     * @return array
     */
    public function getMonthByDate($date = '')
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }

        $year            = date('Y', strtotime($date));
        $month           = date('m', strtotime($date));
        $day             = date('d', strtotime($date));
        $month_day_max   = date('t', strtotime($date));
        $month_date_from = $year . "-" . $month . "-01";
        $month_date_to   = $year . "-" . $month . "-" . $month_day_max;
        $month_time_from = strtotime($month_date_from . ' 00:00:00');
        $month_time_to   = strtotime($month_date_to . ' 23:59:59');

        return [
            "date"            => $date,
            "year"            => $year,
            "month"           => $month,
            "day"             => $day,
            "month_day_max"   => $month_day_max,
            "month_date_from" => $month_date_from,
            "month_date_to"   => $month_date_to,
            "month_time_from" => $month_time_from,
            "month_time_to"   => $month_time_to,
        ];
    }


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
        $month          = date('m', strtotime($date));
        $day            = date('d', strtotime($date));
        $week_rank      = date('W', strtotime($date));
        $week_day       = date('N', strtotime($date));
        $week_date_from = date('Y-m-d', strtotime('-' . ($week_day - 1) . ' day', strtotime($date)));
        $week_date_to   = date('Y-m-d', strtotime("+6 day", strtotime($week_date_from)));
        $week_time_from = strtotime($week_date_from . ' 00:00:00');
        $week_time_to   = strtotime($week_date_to . ' 23:59:59');

        return [
            "date"           => $date,
            "year"           => $year,
            "month"          => $month,
            "day"            => $day,
            "week_rank"      => $week_rank,
            "week_day"       => $week_day,
            "week_date_from" => $week_date_from,
            "week_date_to"   => $week_date_to,
            "week_time_from" => $week_time_from,
            "week_time_to"   => $week_time_to,
        ];
    }
}



