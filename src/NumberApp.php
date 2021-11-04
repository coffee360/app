<?php

namespace Phpfunction\App;

/**
 * 数字
 * Class Number
 * @package Phpfunction\App
 */
class NumberApp
{

    /**
     * 整型转两位小数
     * @param      $num
     * @param bool $chu_100_is
     * @return string
     */
    public function num2point($num, $chu_100_is = false)
    {
        if ($chu_100_is) {
            $num = $num / 100;
        }

        return sprintf("%.2f", $num);
    }

}