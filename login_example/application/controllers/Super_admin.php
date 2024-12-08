<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $email = $this->session->userdata('email');
        $this->data = $this->admin->getDataByEmail($email);
        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->data;
        $data['title'] = 'Access Menu';
        $data['role'] = $this->admin->getAllRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('super_admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['user'] = $this->data;
        $data['title'] = 'Role Access';
        $data['role'] = $this->admin->getRoleById($role_id);
        $this->db->where('id != ', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('super_admin/role_access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        if ( $this->admin->getAccessMenu() > 0 ) {
            $this->admin->deleteAccess();
        } else {
            $this->admin->createAccess();
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed</div>');
    }

}