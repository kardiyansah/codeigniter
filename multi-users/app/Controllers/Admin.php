<?php

namespace App\Controllers;

class Admin extends BaseController
{
  protected $model, $db, $builder;

  public function __construct()
  {
    // return $this->model = new \Myth\Auth\Models\UserModel();
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('users');
  }

  public function index()
  {
    $data['title'] = 'User List';
    // $data['users'] = $this->model->findAll();
    $this->builder->select('users.id as userId, username, email, name as roleName');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    $data['users'] = $this->builder->get()->getResult();
    return view('admin/index', $data);
  }

  public function show($id = 0)
  {
    $data['title'] = 'User Detail';
    $this->builder->select('users.id as userId, username, email, fullname, user_image, name as roleName');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    $this->builder->where('users.id', $id);
    $data['user'] = $this->builder->get()->getRow();

    if (empty($data['user'])) {
      return redirect()->back();
    }

    return view('admin/show', $data);
  }
}
