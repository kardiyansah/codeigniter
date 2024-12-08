<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function createUser()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
            'role_id' => 3,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }

    public function getDataByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

}