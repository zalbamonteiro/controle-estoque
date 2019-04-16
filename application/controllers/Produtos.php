<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
    
    public $action;
	
	function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->model('produto');
        $data['produtos'] = $this->produto->get_produtos();
        $this->load->view('includes/header');
		$this->load->view('produtos_list', $data);
    }

    public function authenticate(){
        $password = md5($this->input->post('password'));
        $prod_id  = $this->input->post('prod_id');
        
        $this->load->model('user');
        $this->load->model('produto');
        $user = $this->user->get_admin();
        if($user->password == $password){
            
            if($this->input->post('action') == "editar"){
                redirect('/produtos/editar/'.$prod_id, 'location');
                return true;
            }

            if($this->input->post('action') == "adicionar"){
                redirect('/produtos/adicionar');
                return true;
            }

            redirect('/produtos/delete/'.$prod_id, 'location');
            return true;
        }
        
        redirect('/produtos', 'location');
        return true;
    }

    public function delete(){
        $prod_id = $this->uri->segment('3');
        $this->load->model('produto');
        $data = $this->produto->remove_prod_id($prod_id);
		redirect('/produtos', 'location');
        return true;
    }

    public function adicionar(){
        $this->load->view('includes/header');
        $this->load->view('produtos_add');   
    }

    public function add(){        
        $this->load->model('produto');
        
        $data = array(
            'nome'  => $this->input->post('nome'),
            'tipo'  => $this->input->post('tipo'),
            'valor' => $this->input->post('valor'),
            'estoque' => $this->input->post('estoque')
        );
    
        $data = $this->produto->insert_prod($data);   
        redirect('/produtos', 'location'); 
        return true;
    }

    public function editar(){
        $prod_id = $this->uri->segment('3');        
        $this->load->model('produto');
        $data['prod'] = $this->produto->select_by_id($prod_id);   
        $this->load->view('includes/header');
        $this->load->view('produtos_edit', $data);   
    }

    public function update(){        
        $this->load->model('produto');  
        $id = $this->input->post('id');      
        $data = array(
            'nome'  => $this->input->post('nome'),
            'tipo'  => $this->input->post('tipo'),
            'id'    => $this->input->post('id'),
            'valor' => $this->input->post('valor'),
            'estoque' => $this->input->post('estoque')
        );
    
        $this->produto->update_prod($id, $data);   
        redirect('/produtos', 'location'); 
        return true;
    }

    public function search(){
        $text = $this->input->post('search');      
        $this->load->model('produto');  
        $data['produtos'] = $this->produto->select_search($text);
        $this->load->view('includes/header');
        $this->load->view('produtos_list', $data);
    }

}
