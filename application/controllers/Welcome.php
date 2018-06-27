<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index',array("view"=>"main"));
	}

	public function catalogo_procesos(){
		$this->load->model('model_selects/model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_proceso(); 
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

}
