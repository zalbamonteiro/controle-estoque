<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->model('produto');
        $produtos = $this->produto->get_produtos();
        $this->load->view('includes/header');
		$this->load->view('dashboard', $produtos);
    }
}
