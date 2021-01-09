<?php


namespace App\Service\Salary\Action;

class DecreaseValuePercent implements RuleInterface
{
    public static function update(&$var, $percent): void
    {
        $var *= (100 - $percent);
        $var /= 100;
    }
}
