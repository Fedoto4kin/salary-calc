<?php

namespace App\Service\Salary;

interface SalaryInterface
{
    public function updateSalary($action, $value);

    public function calc();

    public function updateTax($action, $value);
}
