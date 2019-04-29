<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Model{

    public function get_fornecedores() {
        $this->load->database('controle-estoque');
        $query = $this->db->query("SELECT *, fornecedores.nome as fornecedor, produto.nome as produto from `fornecedores`, `produto`, `produto_fornecedor` where fornecedores.cod_fornecedor = produto_fornecedor.cod_fornacedore and produto.id = produto_fornecedor.id_produto GROUP BY fornecedores.cod_fornecedor");
        $this->db->close();
        return $query->result_array();
    }

    public function insert_fornecedor($data){
        return $this->db->insert('fornecedores', $data);
    }

    public function inactive($id){
        $this->load->database('controle-estoque');
        $query = $this->db->query("UPDATE `fornecedores` SET `status`='inativo' WHERE fornecedores.cod_fornecedor = ".$id);
        $this->db->close();
        return true;
    }

    public function select_search( $text ){
        $this->load->database('controle-estoque');
        $q = $this->db->query("SELECT *, fornecedores.nome as fornecedor, produto.nome as produto from `fornecedores`, 
        `produto`, `produto_fornecedor` where  fornecedores.nome like '%.$text.%' 
        or produto.nome like '%".$text."%' and fornecedores.cod_fornecedor = produto_fornecedor.cod_fornecedor and 
        produto.id = produto_fornecedor.id_produto GROUP BY produto_fornecedor.id");
        $this->db->close();
        return $q->result_array();
    }

    public function select_by_id($id){
        $q = $this->db->select('*')->from('fornecedores')->where('cod_fornecedor',$id)->get();
        return $q->result();
    }

    public function update($id, $data){
        return $this->db->update('fornecedores', $data, "cod_fornecedor =".$id);
    }
}