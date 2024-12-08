<?php

class Home extends CI_Controller {
    public function index( $key = 'World')
    {
        $data['title'] = 'Home/index';
        $data['key'] = $key;     

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}