<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$this->load->view('index',array("view"=>"main"));
	}

	public function catalogo_procesos(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_proceso();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

	public function catalogo_perfil(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_perfil();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}	

	public function manifestacion_tipob(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_subproceso_tipoB();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

	public function manifestacion_tipoc(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_subproceso_tipoC();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

	public function licencia_construccion(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_subproceso_licencia_construccion();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

	public function otras_responsivas(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_subproceso_otras_responsivas();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

	public function reconstruccion_multifamiliar(){
		$this->load->model('Model_selects/Model_selects','modelSelects');
		$expediente=$this->modelSelects->catalogo_subproceso_reconstruccion_vivienda();
		$data['items']=$expediente;
		$this->load->view('components/selects',$data);
	}

  	public function gettramites(){
		$tipoformato = $_POST["tformato"];
  		$tiposubformato = $_POST["tsubformato"];
		$this->load->model('Tramite_model/Tramite_model','tramitemodel');
		$expediente=$this->tramitemodel->get_tramites($tipoformato,$tiposubformato);
		$ids_tramites = "";
		foreach ($expediente as $key => $value) {
			$ids_tramites .= $value["IDPROCESO"].",";
		}
		$ids_tramites = trim($ids_tramites,",");
		echo $ids_tramites;
  	}

  	public function gettimetramites(){
		$tipoformato = $_POST["tformato"];
  		$tiposubformato = $_POST["tsubformato"];
  		// print_r($_POST); exit();
		$this->load->model('Tramite_model/Tramite_model','tramitemodel');
		$expediente=$this->tramitemodel->get_time_tramites($tipoformato,$tiposubformato);
		echo json_encode($expediente);
  	}

  	public function getdro(){
		$num_dro = $_POST["ndro"];
		$tipo_dro = $_POST["tdro"];
		$this->load->model('Tramite_model/Tramite_model','tramitemodel');
		$resultado=$this->tramitemodel->get_dro($num_dro,$tipo_dro);

		echo json_encode($resultado);
  	}

  	public function getInfoTramite(){
		$num_proceso = $_GET["idproceso"];
		// echo $num_proceso; exit();
		$this->load->model('Tramite_model/Tramite_model','tramitemodel');
		$resultado=$this->tramitemodel->info_direccion($num_proceso);

		echo json_encode($resultado[0]);
  	}
}
