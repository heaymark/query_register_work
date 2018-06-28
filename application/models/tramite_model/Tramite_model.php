<?php
class Tramite_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

  public function get_tramites($tipoformato,$tiposubformato){
    if ($tiposubformato == "") {
      $sql = "SELECT IDPROCESO FROM PROCESO WHERE IDTIPOPROCESO = ".$tipoformato." ORDER BY IDPROCESO";
    }else{
      $sql = "SELECT IDPROCESO FROM PROCESO WHERE IDTIPOPROCESO = ".$tipoformato." AND IDTIPOSUBPROCESO = ".$tiposubformato." ORDER BY IDPROCESO";
    }
    $result = $this->db->query($sql)->result_array();
     	return $result;
  }

}
?>
