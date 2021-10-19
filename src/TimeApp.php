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

        $week_rank = date('W', strtotime($date));
        $week_day  = date('w', strtotime($date));
        $week_from = date('Y-m-d', strtotime('-' . $week_day));
        $week_to   = date('Y-m-d', strtotime("+7 day", $week_from));

        return [
            "week_rank" => $week_rank,
            "week_day"  => $week_day,
            "week_from" => $week_from,
            "week_to"   => $week_to,
        ];
    }
}



