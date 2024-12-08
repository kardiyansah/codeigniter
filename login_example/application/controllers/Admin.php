<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->admin->getAllMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ( $this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu has been added</div>');
            redirect('admin');
        }
    }


    public function subMenu()
    {
        $data['user'] = $this->data;
        $data['title'] = 'Submenu Management';
        $data['menu'] = $this->admin->getAllMenu();
        $data['submenu'] = $this->admin->getAllSubMenu();

        $this->form_validation->set_rules('submenu', 'Submenu', 'required|trim');
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ( $this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createSubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New submenu has been added</div>');
            redirect('admin/submenu');
        }
    }


    public function deleteMenu($menu_id)
    {
        $menu = $this->admin->getMenuById($menu_id);

        $this->admin->deleteMenu($menu_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu '. $menu['menu'] .' has been deleted</div>');
        redirect('admin');
    }
    
    
    public function deleteSubmenu($submenu_id)
    {
        $submenu = $this->admin->getSubmenuById($submenu_id);

        $this->admin->deleteSubmenu($submenu_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu '. $submenu['title'] .' has been deleted</div>');
        redirect('admin/submenu');
    }


    public function updateMenu($menu_id)
    {
        $menu = $this->admin->getMenuById($menu_id);

        $this->admin->updateMenu($menu_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu '. $menu['menu'] .' has been updated</div>');
        redirect('admin');
    }


    public function getMenuById()
    {
        $menu_id = $this->input->post('id');
        echo json_encode($this->admin->getMenuById($menu_id));
    }


    public function getSubmenuById()
    {
        $submenu_id = $this->input->post('id');
        echo json_encode($this->admin->getSubmenuById($submenu_id));
    }


    public function updateSubmenu($submenu_id)
    {
        $submenu = $this->admin->getSubmenuById($submenu_id);

        $this->admin->updateSubmenu($submenu_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu '. $submenu['title'] .' has been updated</div>');
        redirect('admin');
    }

}