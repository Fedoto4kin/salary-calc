<?php

namespace App\Salary;

interface iSalary
{
    public function updateSalary($method, $value);

    public function updateTax($method, $value);

    public function calc();
}
