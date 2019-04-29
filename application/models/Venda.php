<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Model{

    public function get_vendas() {
        $this->load->database('controle-estoque');
        $query = $this->db->query("SELECT *, sum(vendas.quantidade) as vendas, produto.estoque - sum(vendas.quantidade) as estoque_loja  FROM `vendas`, `produto` WHERE vendas.id_produto = produto.id group by produto.id");
        $this->db->close();
        return $query->result_array();
    }

    public function insert_venda($data){
        return $this->db->insert('vendas', $data);
    }

    public function remove_venda_id($id){
        $this->load->database('controle-estoque');
        $query = $this->db->query("DELETE FROM `vendas` WHERE `vendas`.`id` = ".$id);
        $this->db->close();
        return true;
    }

    public function filter_positive_estoque(){        
        $this->load->database('controle-estoque');
        $query = $this->db->query("SELECT *, sum(vendas.quantidade) as vendas, produto.estoque - sum(vendas.quantidade) as estoque_loja  FROM `vendas`, `produto` WHERE vendas.id_produto = produto.id group by produto.id");        
        $arr_temp = array();
        foreach($query->result_array() as $arr){
           if($arr['estoque_loja'] > 0){
            array_push($arr_temp, $arr);
           } 
        }
        return $arr_temp;
        
    }

    public function filter_negative_estoque(){
        $query = $this->db->query("SELECT *, sum(vendas.quantidade) as vendas, produto.estoque - sum(vendas.quantidade) as estoque_loja  FROM `vendas`, `produto` WHERE vendas.id_produto = produto.id group by produto.id");        
        $arr_temp = array();
        foreach($query->result_array() as $arr){
           if($arr['estoque_loja'] < 0){
            array_push($arr_temp, $arr);
           } 
        }
        return $arr_temp;
    }

    public function filter_empty_estoque(){
        $query = $this->db->query("SELECT *, sum(vendas.quantidade) as vendas, produto.estoque - sum(vendas.quantidade) as estoque_loja  FROM `vendas`, `produto` WHERE vendas.id_produto = produto.id group by produto.id");        
        $arr_temp = array();
        foreach($query->result_array() as $arr){
           if($arr['estoque_loja'] == 0){
            array_push($arr_temp, $arr);
           } 
        }
        return $arr_temp;
    }

    public function filter_more_sold(){
        $query = 'SELECT *, sum(vendas.quantidade) as vendas, produto.estoque - sum(vendas.quantidade) as estoque_loja FROM `vendas`, `produto` WHERE vendas.id_produto = produto.id group by produto.id order by vendas.quantidade DESC';
        $this->load->database('controle-estoque');
        $query = $this->db->query($query);
        $this->db->close();
        return $query->result_array();
        
    }

    public function filter_less_sold(){
        $query = 'SELECT *, sum(vendas.quantidade) as vendas, produto.estoque - sum(vendas.quantidade) as estoque_loja FROM `vendas`, `produto` WHERE vendas.id_produto = produto.id group by produto.id order by vendas.quantidade ASC';
        $this->load->database('controle-estoque');
        $query = $this->db->query($query);
        $this->db->close();
        return $query->result_array();
        
    }
}