<?php


namespace App\Salary\Action;

use App\Salary\iRule;

class IncreaseValuePercent implements iRule
{
    public static function up(&$var, $percent)
    {
        $var *= (100 + $percent);
        $var /= 100;
    }
}
