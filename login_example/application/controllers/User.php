<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $email = $this->session->userdata('email');
        $this->data = $this->user->getDataByEmail($email);
        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->data;
        $data['title'] = 'My Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function editProfile()
    {
        $data['user'] = $this->data;
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ( $this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ( $upload_image ) {
                $config['upload_path'] = './assets/img/profile';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if (  $this->upload->do_upload('image') ) {
                    $old_image = $data['user']['image'];

                    if ( $old_image != 'default.jpg' ) {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->user->updateProfile($new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->user->updateProfile();
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated</div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['user'] = $this->data;
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[3]|matches[repeat_password]');
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|trim|matches[new_password]');

        if ( $this->form_validation->run() == false ) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $curr_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if ( !password_verify($curr_password, $data['user']['password']) ) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid password</div>');
                redirect('user/changepassword');           
            } else {
                if ( $curr_password == $new_password ) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be same as current password</div>');
                    redirect('user/changepassword'); 
                } else {
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $email = $this->session->userdata('email');

                    $this->user->updatePassword($new_password, $email);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your password has been updated</div>');
                    redirect('user/changepassword');           
                }
            }
            
        }
    }

}