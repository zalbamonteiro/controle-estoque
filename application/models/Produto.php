<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Model{

    public function get_produtos() {
        $this->load->database('controle-estoque');
        $query = $this->db->query("SELECT * FROM produto");
        $this->db->close();
        return $query->result_array();
    }

    public function remove_prod_id($id){
        $this->load->database('controle-estoque');
        $query = $this->db->query("DELETE FROM `produto` WHERE `produto`.`id` = ".$id);
        $this->db->close();
        return true;
    }

    public function insert_prod($data){
        return $this->db->insert('produto', $data);
    }

    public function select_by_id($id){
        $q = $this->db->select('*')->from('produto')->where('id',$id)->get();
        return $q;
    }

    public function update_prod($id, $data){
        return $this->db->update('produto', $data, "id =".$id);
    }

    public function select_search( $text ){
        $this->load->database('controle-estoque');
        $q = $this->db->query("select * from produto where produto.nome like '%".$text."%' or produto.tipo like '%".$text."%'");
        $this->db->close();
        return $q->result_array();
    }
    
	public function select_quantidade_vendas_by_produto_id($id){
        $q = $this->db->select('*')->from('vendas')->where('id_produto',$id)->get();
        return $q->result();
    }
}