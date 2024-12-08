<?php 

class Book_model extends CI_model {
    public function getAllBook()
    {
        return $this->db->get('books')->result_array();
    }

    public function createBook($image)
    {
        $data = [
            'title' => $this->input->post('title', true),
            'writer' => $this->input->post('writer', true),
            'publication_year' => $this->input->post('publication_year', true),
            'total_pages' => $this->input->post('total_pages', true),
            'images' => $image
        ];

        $this->db->insert('books', $data);
    }

    public function deleteBook($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('books', ['id' => $id]);
    }

    public function getBookById($id)
    {
        return $this->db->get_where('books', ['id' => $id])->row_array();
    }

    public function updateBook($image)
    {
        $data = [
            'title' => $this->input->post('title', true),
            'writer' => $this->input->post('writer', true),
            'publication_year' => $this->input->post('publication_year', true),
            'total_pages' => $this->input->post('total_pages', true),
            'images' => $image
        ];

        $this->db->where('id', $this->input->post('id'), true);
        $this->db->update('books', $data);
    }

    public function searchBook()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('title', $keyword);
        $this->db->or_like('writer', $keyword);

        return $this->db->get('books')->result_array();
    }

}