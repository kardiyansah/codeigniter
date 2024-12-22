<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Example extends BaseController
{
	public function index()
	{
		// property name is from BaseController
		// return 'This is example controller and method index, ' . $this->name;
	}

	public function about($name = '', $age = 0)
	{
		// return "My name is $this->name";
		
		return "Hello my name is $name, and my age is $age";
	}
}
