<?php

namespace App\Controllers;

class User extends BaseController
{
  public function index()
  {
    $data['title'] = 'Manage Profile';
    return view('user/index', $data);
  }

  public function edit()
  {
    $data['title'] = 'Edit Profile';
    return view('user/edit', $data);
  }
}
