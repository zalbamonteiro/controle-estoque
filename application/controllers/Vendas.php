<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller {
	
	function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->model('venda');
        $data['vendas']  = $this->venda->get_vendas();
        $this->load->view('includes/header');
		$this->load->view('vendas_list', $data);
    }

    public function authenticate(){
        $password = md5($this->input->post('password'));
        $prod_id  = $this->input->post('prod_id');
        
        $this->load->model('user');
        $user = $this->user->get_admin();
        if($user->password == $password){

            redirect('/vendas/delete/'.$prod_id, 'location');
            return true;
        }
        
        redirect('/vendas', 'location');
        return true;
    }

    public function adicionar(){
        $this->load->view('includes/header');
		$this->load->view('vendas_add');
    }

    public function add(){
        $this->load->model('venda');
        
        $data = array(
            'id_produto'  => $this->input->post('id'),
            'quantidade'  => $this->input->post('tipo')
        );
    
        $data = $this->venda->insert_venda($data);   
        redirect('/vendas', 'location'); 
        return true;
    }

    public function delete(){
        $venda_id = $this->uri->segment('3');
        $this->load->model('venda');
        $data = $this->venda->remove_venda_id($venda_id);
		redirect('/vendas', 'location');
        return true;
    }

    public function search(){
        $text = $this->input->post('search'); 
        $this->load->model('venda'); 
        switch($text){
            case 'estoque-positivo':
               $data['vendas'] = $this->venda->filter_positive_estoque();
            break;
            case 'estoque-negativo':
               $data['vendas'] = $this->venda->filter_negative_estoque();
            break;
            case 'estoque-zerado':
               $data['vendas'] = $this->venda->filter_empty_estoque();
            break;
            case 'mais-vendido':
               $data['vendas'] = $this->venda->filter_more_sold();
            break;
            case 'menos-vendido':
               $data['vendas'] = $this->venda->filter_less_sold();
            break;
            default:
                $data['vendas']  = $this->venda->get_vendas();


        }

        $this->load->view('includes/header');
        $this->load->view('vendas_list', $data);
    }

    public function search_prod(){
        $text = $this->input->post('search');      
        $this->load->model('produto');  
        $data['produtos'] = $this->produto->select_search($text);
        $this->load->view('includes/header');        
		$this->load->view('vendas_add', $data);
    }
}
