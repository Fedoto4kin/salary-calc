<?php

namespace App\Service\Salary;

use App\Service\Salary\Action\DecreaseValue;
use App\Service\Salary\Action\IncreaseValuePercent;


class Person implements PersonInterface
{

    const MSG_TPL =  "Salary of %s after all bonuses, deductions and tax is %01.2f";

    private string $name;
    private Salary $Salary;

    /**
     * Person constructor.
     * @param string $name Name of employee
     * @param float $gross Gross salary
     */
    public function __construct(string $name, float $gross)
    {
        $this->name = $name;
        $this->Salary = new Salary($gross);
    }

    public function salaryCalc(): void
    {
        $this->Salary->calc();
    }

    /**
     * @param integer $age
     * @return Person
     */
    public function age(int $age): Person
    {
        if ($age > 50) {
            $this->Salary->updateSalary(IncreaseValuePercent::class, 7);
        }
        return $this;
    }

    /**
     * @param int $kids
     * @return Person
     */
    public function kids(int $kids): Person
    {
        if ($kids > 2) {
            $this->Salary->updateTax(DecreaseValue::class, 2);
        }
        return $this;
    }

    /**
     * @param bool $use_car
     * @return Person
     */
    public function useCar(bool $use_car): Person
    {
        if ($use_car) {
            $this->Salary->updateSalary(DecreaseValue::class, 500);
        }
        return $this;
    }

    public function getMessage(): string
    {
        return sprintf(self::MSG_TPL, $this->name, $this->getPersonSalary());
    }

    public function getPersonSalary(): float
    {
        return $this->Salary->getSalary();
    }
}
