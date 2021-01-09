<?php

namespace App\Service\Salary;

interface PersonInterface
{
    public function salaryCalc(): void;

    /**
     * @param integer $age
     * @return Person
     */
    public function age(int $age): Person;

    /**
     * @param int $kids
     * @return Person
     */
    public function kids(int $kids): Person;

    /**
     * @param bool $use_car
     * @return Person
     */
    public function useCar(bool $use_car): Person;

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @return float
     */
    public function getPersonSalary(): float;
}
