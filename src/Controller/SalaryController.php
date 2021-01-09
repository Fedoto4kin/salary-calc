<?php

namespace App\Controller;

use App\Service\Salary\PersonInterface;
use http\Env\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Salary\Person;

/**
 * Class SalaryController
 * @package App\Controller
 */
class SalaryController extends AbstractController
{

    /**
     * @Route("/")
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->getMethod() == 'POST') {
            //TODO: Add validation
            $name = $request->request->get('name');
            $age = (int) $request->request->get('age');
            $kids = (int) $request->request->get('kids', 0);
            $use_car = $request->request->has('use_car');
            $gross = (int) $request->request->get('gross');

            $person = new Person($name, $gross);

            $person
                ->age($age)
                ->useCar($use_car)
                ->kids($kids)
                ->salaryCalc();

            return $this->json([
                'message' => $person->getMessage()
            ]);
        } else {
            return $this->json(['message' =>
                "For Salary calculate you need to make a POST request"
            ]);
        }
    }
}
