<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Salary;


class SalaryController extends AbstractController {

    /**
     * @Route("/")
     */
    public function index(Request $request) {

        if ($request->getMethod() == 'POST') {

            $name = $request->request->get('name');
            $age = (int) $request->request->get('age');
            $kids = (int) $request->request->get('kids', 0);

            $use_car = $request->request->has('use_car');
            $gross = (int) $request->request->get('gross');

            $salary = new Salary\Salary($gross);
            $Person = new Salary\Person($name, $salary);
            $Person->age($age)->useCar($use_car)->kids($kids);
            $net_salary = $Person->calc();

            return $this->json(['result' =>
                "Salary of $name  after all bonuses, deductions and tax is $net_salary"
            ]);
        } else {
            return $this->json(['result' =>
                "For Salary calculate you need to make a POST request"
            ]);
        }
    }
}