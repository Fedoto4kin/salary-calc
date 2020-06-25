<?php

namespace App\Salary;

use App\Salary\Action;


class PersonAttribute {

    public $name;
    public $value;

    public function __construct(string $name, $value) {
        $this->name = $name;
        $this->value = $value;
    }

    public function getValue() {
        return  $this->value;
    }

}

class Person {

    private $name;

    private $age;
    private $kids;
    private $use_car;
    /* Allow to add more properties for bonus, deduction or tax change */

    private $Salary;

    /**
     * Person constructor.
     * @param string $name Name of employee
     * @param $gross Gross salary before bonuses, deductions and tax
     */
    public function __construct(string $name, $gross) {
        $this->name = $name;
        $this->Salary = new Salary($gross);
    }

    public function calc() {
        return $this->Salary->calc();
    }

    /**
     * @param integer $age
     * @return Person
     */
    public function age(int $age): Person {
        if ($age > 0)
            $this->age = new PersonAttribute('Age', $age);
            if ($age > 50)
                $this->Salary->updateSalary(Action\IncreaseValuePercent::class, 7);
        return $this;
    }

    /**
     * @param int $kids
     * @return Person
     */
    public function kids(int $kids): Person {
        if ($kids >= 0)
            $this->kids = new PersonAttribute('Kids', $kids);
            if ($kids > 2)
                $this->Salary->updateTax(Action\DecreaseValue::class, 2);
        return $this;
    }

    /**
     * @param bool $use_car
     * @return Person
     */
    public function useCar(bool $use_car): Person {
        $this->use_car = new PersonAttribute('useCar', $use_car);
        if ($use_car)
            $this->Salary->updateSalary(Action\DecreaseValue::class, 500);
        return $this;
    }

}