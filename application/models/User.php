<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

    public function get_admin() {
        $this->load->database('controle-estoque');
        $query = $this->db->query("SELECT * FROM users WHERE nome LIKE 'admin' ");
        $this->db->close();
        return $query->row();
    }

}