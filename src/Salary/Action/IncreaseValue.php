<?php


namespace App\Salary\Action;

use App\Salary\iRule;

class IncreaseValue implements iRule {

    public static function up(&$var, $value) {
        $var += $value ;

    }

}