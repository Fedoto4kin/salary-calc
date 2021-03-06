<?php

namespace Tests\Salary\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Service\Salary\Person;

class SalaryControllerTest extends WebTestCase
{
    public function testPageShow()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            ' "Content-Type" header is not "application/json"'
        );

        $this->assertJson($client->getResponse()->getContent());
        $this->assertStringContainsString('message', $client->getResponse()->getContent());
    }

    public function testCalculateSalary()
    {
        $client = static::createClient();

        $Alice =  array(
            'data' => [
                'name' => 'Alice',
                'age' => 26,
                'kids' => 2,
                'gross' => 6000
                ],
            'net' => 4800.00
            );

        $Bob =  array(
             'data' => [
                'name' => 'Bob',
                'age' => 49,
                'use_car' => true,
                'gross' => 4000,
                 ],
             'net' => 2800.00
            );

        $Charlie =  array(
            'data' => [
                'name' => 'Charlie',
                'age' => 36,
                'use_car' => true,
                'kids' => 3,
                'gross' => 5000
                ],
            'net' => 3690.00
            );

        foreach (array($Alice, $Bob, $Charlie) as $case) {
            $client->request(
                'POST',
                '/',
                $case['data']
            );
            $this->assertEquals(
                Response::HTTP_OK,
                $client->getResponse()->getStatusCode()
            );
            $this->assertJson($client->getResponse()->getContent());
            $this->assertStringContainsString('message', $client->getResponse()->getContent());

            $message = sprintf(Person::MSG_TPL, $case['data']['name'], $case['net']);
            $this->assertJsonStringEqualsJsonString(
                json_encode(['message' => $message]),
                $client->getResponse()->getContent()
            );
        }
    }
}
