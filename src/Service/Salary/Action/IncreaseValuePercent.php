<?php


namespace App\Service\Salary\Action;

class IncreaseValuePercent implements RuleInterface
{
    public static function update(&$var, $percent): void
    {
        $var *= (100 + $percent);
        $var /= 100;
    }
}
