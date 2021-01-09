<?php


namespace App\Service\Salary\Action;

class IncreaseValue implements RuleInterface
{
    public static function update(&$var, $value): void
    {
        $var += $value;
    }
}
