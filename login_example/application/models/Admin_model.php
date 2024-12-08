<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getDataByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }
    
    public function getAllSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
                    FROM `user_sub_menu` JOIN `user_menu` 
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function createMenu()
    {
        $mneu_title = $this->input->post('menu');
        $this->db->insert('user_menu', ['menu' => $mneu_title]);
    }
    
    public function createSubMenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('submenu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('user_sub_menu', $data);
    }

    public function getSubmenuById($submenu_id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $submenu_id])->row_array();
    }

    public function updateSubmenu($submenu_id)
    {
        $data = [
            'title' => $this->input->post('submenu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => '1'
        ];
        
        $this->db->update('user_sub_menu', $data, ['id' => $submenu_id]);
    }

    public function getAllRole()
    {
        return $this->db->get('user_role')->result_array();
    }
    
    public function getRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }

    public function getAccessMenu()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        return $this->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ])->num_rows();
    }

    public function createAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $this->db->insert('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
    }

    public function deleteAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        return $this->db->delete('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
    }

    public function getMenuById($menu_id)
    {
        return $this->db->get_where('user_menu', ['id' => $menu_id])->row_array();
    }

    public function deleteMenu($menu_id)
    {
        $this->db->delete('user_menu', ['id' => $menu_id]);
    }
    
    public function deleteSubmenu($submenu_id)
    {
        $this->db->delete('user_sub_menu', ['id' => $submenu_id]);
    }

    public function updateMenu($menu_id)
    {
        $data = [
            'menu' => $this->input->post('menu')
        ];

        $this->db->update('user_menu', $data, ['id' => $menu_id]);
    }

}