<?php

namespace App\Service\Salary\Action;

class DecreaseValue implements RuleInterface
{
    public static function update(&$var, $value): void
    {
        $var -= $value;
    }
}
