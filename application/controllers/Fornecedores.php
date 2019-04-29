<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller {
	
	function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->model('fornecedor');
        
        $data['fornecedores']  = $this->fornecedor->get_fornecedores();
        $this->load->view('includes/header');
		$this->load->view('fornecedores_list', $data);
    }

    public function adicionar(){
        $this->load->model('produto');
        $data['produtos'] = $this->produto->get_produtos(); 
        $this->load->view('includes/header');
		$this->load->view('fornecedores_add', $data);
    }

    public function add(){
        $this->load->model('fornecedor');
        
        $data = array(
            'nome'  => $this->input->post('nome'),
            'endereco'  => $this->input->post('endereco'),
            'cnpj'  => $this->input->post('cnpj'),
            'email'  => $this->input->post('email'),
            'estado'  => $this->input->post('estado'),
        );
    
        $data = $this->fornecedor->insert_fornecedor($data);           
        redirect('/fornecedores', 'location'); 
        return true;
    }

    public function authenticate(){
        $password = md5($this->input->post('password'));
        $forn_id  = $this->input->post('forn_id');
        
        $this->load->model('user');
        $this->load->model('fornecedor');
        $user = $this->user->get_admin();
        if($user->password == $password){

            redirect('/fornecedores/delete/'.$forn_id, 'location');
            return true;
        }
        
        redirect('/fornecedores', 'location');
        return true;
    }

    public function delete(){
        $forn_id = $this->uri->segment('3');
        $this->load->model('fornecedor');
        $data = $this->fornecedor->inactive($forn_id);
		redirect('/fornecedores', 'location');
        return true;
    }

    public function editar(){
        $prod_id = $this->uri->segment('3');        
        $this->load->model('fornecedor');
        $data['forn'] = $this->fornecedor->select_by_id($prod_id);   
        $this->load->view('includes/header');
        $this->load->view('fornecedores_edit', $data);   
    }

    public function update(){
        $this->load->model('fornecedor');
        $id = $this->input->post('id');   
        
        $data = array(
            'nome'  => $this->input->post('nome'),
            'endereco'  => $this->input->post('endereco'),
            'cnpj'  => $this->input->post('cnpj'),
            'email'  => $this->input->post('email'),
            'estado'  => $this->input->post('estado'),
        );
    
        $data = $this->fornecedor->update($id,$data);   
        redirect('/fornecedores', 'location'); 
        return true;
    }

    public function search(){
        $text = $this->input->post('search');      
        $this->load->model('fornecedor');  
        $data['fornecedores'] = $this->fornecedor->select_search($text);
        $this->load->view('includes/header');
        $this->load->view('fornecedores_list', $data);
    }

}
