<?php

namespace App\Service\Salary;

class Salary implements SalaryInterface
{
    private int $tax = 20;
    private float $amount;

    public function __construct($gross)
    {
        $this->amount = $gross;
    }

    public function updateSalary($action, $value): void
    {
        $action::update($this->amount, $value);
    }

    public function updateTax($action, $value): void
    {
        $action::update($this->tax, $value);
    }

    public function calc(): float
    {
        $this->applyTax();
        return $this->getSalary();
    }

    public function getSalary(): float
    {
        return $this->amount;
    }

    private function applyTax(): void
    {
        $this->amount -= $this->amount * ($this->tax / 100);
    }


}
