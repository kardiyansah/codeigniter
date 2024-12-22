<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Index Page'
		];

		return view('pages/index', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About Page'
		];

		echo view('layout/header', $data);
		echo view('pages/about');
		echo view('layout/footer');
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact Us',
			'personalData' => [
				[
					'name' => 'John Doe',
					'address' => 'Coos Bay, Oregon(OR), 97420',
					'phone_numbers' => '(541) 266-7321'
				],
				[
					'name' => 'Victor',
					'address' => 'Lexington, Kentucky(KY), 40505',
					'phone_numbers' => '(859) 299-8651'
				]
			]
		];

		return view('pages/contact', $data);
	}
}
