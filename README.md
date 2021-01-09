<!-- ABOUT -->

This is a very simple API-app for calculting a salary according task description.


> Here you need to build an application that can calculate the salary of employees.
> We need to have an expandable system of bonuses or deductions.
> Explanation
>  * Country Tax for salaries is 20%
>  * If an employee older than 50 we want to add 7% to his salary
>  * If an employee has more than 2 kids we want to decrease his Tax by 2%
>  * If an employee wants to use a company car we need to deduct $500



<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* PHP >= 7.2
* [Composer](https://getcomposer.org/)
* Optionally, you can also install [Symfony CLI](https://symfony.com/download)

### Installation


1. Clone the repo
```sh
git clone git@github.com:Fedoto4kin/salary-calc.git %you-target-install-dir%
```
2. Install symfony framework
```sh
cd %you-target-install-dir%
composer update
```

### Tests (Optional)

Set "framework.test" config to true

```sh
cd %you-target-install-dir%
bin/phpunit
```

### Run 

If you use the symfony-cli run develop server
```sh
symfony server:start
```
Or [configure the Web-server for run Symfony](https://symfony.com/doc/current/setup/web_server_configuration.html)


### Usage 

Call an API  using POST method on base url.
Request must contain the following information in Request Body:

Field | Type | Description
--- | --- | --- 
`name` | String |  Name of person [**required**]
`gross` | Int |  Gross salary before all bonuses, deductions and tax [**required**]
`age` | Int |  Age of person [**required**]
`kids` | Int |  Count of person's children [**optional**]
`use_car` | Bool |  If field exists and has ANY value(Note: including 0, False etc) it means person is using a company car [**optional**]

Response will be JSON
```json
{"message": "Salary of %NAME%  after all bonuses, deductions and tax is %1234%"}
```
#### Usage samples (using Curl and server run on 127.0.0.1 and port 8000)

>Alice is 26 years old, she has 2 kids and her salary is $6000


```sh
curl -d 'name=Alice&age=26&kids=2&gross=6000' -X POST https://127.0.0.1:8000/
{"message":"Salary of Alice  after all bonuses, deductions and tax is 4800"}
```

>Bob is 52, he is using a company car and his salary is $4000
```sh
curl -d 'name=Bob&age=49&use_car&gross=4000' -X POST https://127.0.0.1:8000/
{"message":"Salary of Bob  after all bonuses, deductions and tax is 2800"}
```
>Charlie is 36, he has 3 kids, company car and his salary is $5000
```sh
curl -d 'name=Charlie&age=36&use_car=1&kids=3&gross=5000' -X POST https://127.0.0.1:8000/
{"message":"Salary of Charlie  after all bonuses, deductions and tax is 3690"}
```
