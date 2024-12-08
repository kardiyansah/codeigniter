<?php

class Book extends CI_Controller {
    public function __construct()
    {
        // Wajib memanggil method construct punya parentnya
        parent::__construct();
        $this->load->model('Book_model', 'book');
        $this->load->library('form_validation');
    }
    
    public function index()
    {    
        $data['title'] = 'Book/index';
        $data['books'] = $this->book->getAllBook();
        if ( $this->input->post('keyword') ) {
            $data['books'] = $this->book->searchBook();
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('book/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {   
        if ( isset($_POST['submit']) ) {
            $image = $this->upload();
        } else {
            $image = null;
        }
        
        $data['title'] = 'Book/create';

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('writer', 'writer', 'required');
        $this->form_validation->set_rules('publication_year', 'publication year', 'required|numeric');
        $this->form_validation->set_rules('total_pages', 'total pages', 'required|numeric');
        if ( $this->form_validation->run() == FALSE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('book/create');
            $this->load->view('templates/footer');
        } else {
            $this->book->createBook($image);
            $this->session->set_flashdata('flash', 'ditambahkan');
            // Cuma tulis nama controllernya saja
            redirect('book');
        }
    }

    public function delete($id)
    {
        $this->book->deleteBook($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('book');
    }

    public function detail($id)
    {
        $data['title'] = 'Book/detail';
        $data['book'] = $this->book->getBookById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('book/detail', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $image = $this->input->post('oldimage');
        if ( isset($_POST['submit']) ) {
            if ( $_FILES['images']['error'] === 4 ) {
                $image = $image;
            } else {
                $image = $this->upload();
            }
        }

        $data['title'] = 'Book/update';
        $data['books'] = $this->book->getBookbyId($id);
        
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('writer', 'writer', 'required');
        $this->form_validation->set_rules('publication_year', 'publication year', 'required|numeric');
        $this->form_validation->set_rules('total_pages', 'total pages', 'required|numeric');
        if ( $this->form_validation->run() == FALSE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('book/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->book->updateBook($image);
            $this->session->set_flashdata('flash', 'diubah');
            // Cuma tulis nama controllernya saja
            redirect('book');
        }
    }

    public function upload() {

        $name_file = $_FILES["images"]["name"];
        $size_file = $_FILES["images"]["size"];
        $error = $_FILES["images"]["error"];
        $tmp_name = $_FILES["images"]["tmp_name"];
    
        // Cek apakah gambar sudah diupload
        // if ( $error === 4 ) {
        //     echo "
        //     <script>
        //         alert('pilih gambar terlebih dahulu');
        //     </script>
        // ";
        // return false;
        // }
    
        // Cek apakah file yang diupload adalah gamabar
        $extension_images = ['jpg', 'jpeg', 'png'];
        $extension = explode('.', $name_file);
        $extension = strtolower(end($extension));
        if ( !in_array($extension, $extension_images) ) {
            echo "
            <script>
                alert('yang anda upload bukan gambar');
            </script>
        ";
        }
        
        // Cek batas ukuran gambar
        if ( $size_file > 5000000 ) {
            echo "
            <script>
                alert('ukuran gambar terlalu besar');
            </script>
        ";
        }
    
        // upload gambar
        // Generate nama gambar baru
        $new_name = uniqid();
        $new_name .= '.';
        $new_name .= $extension;
    
        move_uploaded_file($tmp_name, 'assets/img/' . $new_name);
    
        return $new_name;
    
    }

}