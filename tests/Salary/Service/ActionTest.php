<?php

namespace App\Tests\Salary;

use App\Service\Salary\Action;
use PHPUnit\Framework\TestCase;

class SalaryActionTest extends TestCase
{
    public function testIncreaseValuePercent()
    {
        $val = 100;
        $percents = 5;
        Action\IncreaseValuePercent::update($val, $percents);
        $this->assertEquals(105, $val);
    }

    public function testDecreaseSalaryPercent()
    {
        $val = 100;
        $percents = 5;
        Action\DecreaseValuePercent::update($val, $percents);
        $this->assertEquals(95, $val);
    }

    public function testDecreaseValue()
    {
        $val = 100;
        $decr = 50;
        Action\DecreaseValue::update($val, $decr);
        $this->assertEquals(50, $val);
    }

    public function testIncreaseValue()
    {
        $val = 100;
        $incr = 50;
        Action\IncreaseValue::update($val, $incr);
        $this->assertEquals(150, $val);
    }
}
