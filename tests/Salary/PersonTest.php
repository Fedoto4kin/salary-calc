<?php

namespace App\Tests\Salary;

use App\Salary;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase {

    public function testPersonPlainTax() {
        /**
         * Calculate salary after tax 20%
         */
        $John = new Salary\Person('John', 1000);
        $salary = $John->calc();
        $this->assertEquals(800, $salary);
    }

    public function testPersonChildTax() {
        /**
         * Calculate salary after tax 18% (-2%)
         * when kids >= 2
         */
        $John = new Salary\Person('John', 1000);
        $salary = $John->kids(3)->calc();
        $this->assertEquals(820, $salary);

    }

    public function testPersonCarDeduct() {
        /**
         * Calculate salary after -500 deduct for using a company car
         * and ordered tax 20%
         */
        $John = new Salary\Person('John', 1000);
        $salary = $John->useCar(true)->calc();
        $this->assertEquals(400, $salary);

    }

    public function testPersonAgeBonus() {
        /**
         * Calculate salary after 7% bonus for ages more then 50
         * and ordered tax 20%
         */
        $John = new Salary\Person('John', 1000);
        $salary = $John->age(51)->calc();
        $this->assertEquals(856, $salary);

    }

}
