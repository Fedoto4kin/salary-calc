<?php


namespace App\Salary;


class Salary {

    private $tax = 20;
    private $amount;

    public function __construct($gross) {
        $this->amount = $gross;
    }

    public function updateSalary($method, $value) {
        $method::up($this->amount, $value);
    }

    public function updateTax($method, $value) {
        $method::up($this->tax, $value);
    }

    public function calc() {
        $this->applyTax();
        return $this->amount;
    }

    private function applyTax() {
        $this->amount -= $this->amount * ($this->tax/100);
    }

}