<?php
class Model_selects extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	public  function catalogo_proceso(){
		$sql = "SELECT IDTIPOPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_PROCESO WHERE IDTIPOPROCESO IN (1,2) ORDER BY IDTIPOPROCESO ASC";
		// echo $sql;
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_estados_manifestaciones(){
		$sql = "SELECT IDFASE AS ID, DESC_FASE AS TEXT FROM CAT_FASE WHERE IDFASE NOT IN(8) ORDER BY IDFASE ASC";
		/*$sql = "SELECT IDFASE AS ID, 
				CASE (IDFASE)
				WHEN 1 THEN 'Obra en proceso'
				WHEN 2 THEN 'Obra en proceso'
				WHEN 3 THEN 'Obra en proceso'
				WHEN 4 THEN 'Obra en proceso'
				WHEN 5 THEN 'Obra en ejecucion'
				WHEN 6 THEN 'Prorroga'
				WHEN 7 THEN 'Terminacion de obra'
				ELSE 'SIN ESTADO'
				FROM CAT_FASE 
				WHERE IDFASE NOT IN(8) ORDER BY IDFASE ASC";*/
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_perfil(){
		$sql = "SELECT ABREVIATURA AS ID, DESC_PERFIL AS TEXT FROM CAT_PERFIL WHERE IDPERFIL NOT IN(1,2,99) ORDER BY IDPERFIL ASC";
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_subproceso_tipoB(){
		//$sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 1 ORDER BY IDTIPOSUBPROCESO ASC";
		$sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 1 AND IDTIPOSUBPROCESO IN (1,2,3,4) ORDER BY IDTIPOSUBPROCESO ASC";
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_subproceso_tipoC(){
		// $sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 2 ORDER BY IDTIPOSUBPROCESO ASC";
		$sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 2 AND IDTIPOSUBPROCESO IN (7,8,9,10) ORDER BY IDTIPOSUBPROCESO ASC";
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_subproceso_licencia_construccion(){
		$sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 3 ORDER BY IDTIPOSUBPROCESO ASC";
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_subproceso_otras_responsivas(){
		$sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 4 ORDER BY IDTIPOSUBPROCESO ASC";
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}

	public  function catalogo_subproceso_reconstruccion_vivienda(){
		$sql = "SELECT IDTIPOSUBPROCESO AS ID, DESCRIPCION AS TEXT FROM TIPO_SUBPROCESO WHERE IDTIPOPROCESO = 5 ORDER BY IDTIPOSUBPROCESO ASC";
		$result = $this->db->query($sql)->result_array();
     	return $result;		
	}
}
?>
