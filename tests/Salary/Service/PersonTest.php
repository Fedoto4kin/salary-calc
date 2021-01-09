<?php

namespace App\Tests\Salary;

use App\Service\Salary\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private Person $john;

    protected function setUp()
    {
        $this->john = new Person('John', 1000.00);
    }

    public function testGetMessage()
    {
        $this->assertEquals(
             sprintf(Person::MSG_TPL, 'John', 1000.00),
             $this->john->getMessage()
        );
    }

    public function getPersonSalary()
    {
        $salary = $this->john->getPersonSalary();
        $this->assertEquals(1000.00, $salary);
    }

    public function testPersonPlainTax()
    {
        /**
         * Calculate salary after tax 20%
         */
        $this->john->salaryCalc();
        $salary = $this->john->getPersonSalary();
        $this->assertEquals(800, $salary);
    }

    public function testPersonChildTax()
    {
        /**
         * Calculate salary after tax 18% (-2%)
         * when kids >= 2
         */
        $this->john->kids(3)->salaryCalc();
        $salary = $this->john->getPersonSalary();
        $this->assertEquals(820, $salary);
    }

    public function testPersonCarDeduct()
    {
        /**
         * Calculate salary after -500 deduct for using a company car
         * and ordered tax 20%
         */
        $this->john->useCar(true)->salaryCalc();
        $salary = $this->john->getPersonSalary();
        $this->assertEquals(400, $salary);
    }

    public function testPersonAgeBonus()
    {
        /**
         * Calculate salary after 7% bonus for ages more then 50
         * and ordered tax 20%
         */
        $this->john->age(51)->salaryCalc();
        $salary = $this->john->getPersonSalary();
        $this->assertEquals(856, $salary);
    }

}
