<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getDataByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function updateProfile($image = null)
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        if ( $image != null ) {
            $this->db->set('image', $image);
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function updatePassword($new_password, $email)
    {
        $this->db->set('password', $new_password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

}