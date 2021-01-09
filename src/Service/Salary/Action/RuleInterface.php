<?php


namespace App\Service\Salary\Action;

interface RuleInterface
{
    public static function update(&$var, $value): void;
}
