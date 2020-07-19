<?php

namespace App\Tests\Salary;

use App\Salary\Action;
use PHPUnit\Framework\TestCase;

class SalaryActionTest extends TestCase
{
    public function testIncreaseValuePercent()
    {
        $val = 100;
        $percents = 5;
        Action\IncreaseValuePercent::up($val, $percents);
        $this->assertEquals(105, $val);
    }

    public function testDecreaseSalaryPercent()
    {
        $val = 100;
        $percents = 5;
        Action\DecreaseValuePercent::up($val, $percents);
        $this->assertEquals(95, $val);
    }

    public function testDecreaseValue()
    {
        $val = 100;
        $decr = 50;
        Action\DecreaseValue::up($val, $decr);
        $this->assertEquals(50, $val);
    }

    public function testIncreaseValue()
    {
        $val = 100;
        $incr = 50;
        Action\IncreaseValue::up($val, $incr);
        $this->assertEquals(150, $val);
    }
}
