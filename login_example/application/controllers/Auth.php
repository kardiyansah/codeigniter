<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }


    public function index()
    {
        if ( $this->session->userdata('email') ) {
            redirect('user');
        }

        $data['title'] = 'Login Page';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ( $this->form_validation->run() == false ) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->auth->getDataByEmail($email);

        if ( $user ) {

            if ( $user['is_active'] == 1 ) {
                
                if ( password_verify($password, $user['password']) ) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);

                    if ( $user['role_id'] == 1 ) {
                        redirect('super_admin');
                    } elseif ( $user['role_id'] == 2 ) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid password!</div>');
                    redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Emsil has not been activated!</div>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Emsil has not registered!</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        if ( $this->session->userdata('email') ) {
            redirect('user');
        }

        $data['title'] = 'Registration Page';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short'
        ]);
        
        if ( $this->form_validation->run() == false ) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $this->auth->createUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations your account has been created! please login</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}