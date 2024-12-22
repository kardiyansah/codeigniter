<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Person;

class People extends ResourceController
{
	protected $personModel;

	public function __construct()
	{
		$this->personModel = new Person;
		service('pager');
		session();
	}

	/**
	 * Return an array of resource objects, themselves in array format.
	 *
	 * @return ResponseInterface
	 */
	public function index()
	{
		$currentPage = ($this->request->getVar('page_people')) ? $this->request->getVar('page_people') : 1;
		// if (isset($_POST['submit'])) {
		// 	$keyword = $this->request->getVar('keyword');
		// 	session()->setFlashdata('keyword', $keyword);
		// 	$poeple = $this->personModel->search($keyword);
		// } else {
		// 	session()->getFlashdata('keyword');
		// 	$poeple = $this->personModel;
		// }

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$poeple = $this->personModel->search($keyword);
		} else {
			$poeple = $this->personModel;
		}

		$data = [
			'title' => 'List People',
			'people' => $poeple->paginate(6, 'people'),
			'pager' => $this->personModel->pager,
			'currentPage' => $currentPage
		];

		return view('people/index', $data);
	}

	/**
	 * Return the properties of a resource object.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Return a new resource object, with default properties.
	 *
	 * @return ResponseInterface
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters.
	 *
	 * @return ResponseInterface
	 */
	public function create()
	{
		//
	}

	/**
	 * Return the editable properties of a resource object.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function delete($id = null)
	{
		//
	}
}
