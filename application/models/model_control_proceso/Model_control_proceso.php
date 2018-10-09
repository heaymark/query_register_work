<?php
class Model_control_proceso extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	private function validaAcepta()
	{
		// var_dump("Hola pinshi mundo");
		// exit();
		$sql_c_valace = "SELECT COUNT(*) AS ACTUALES
		FROM OWDRO.ESTADO_PROCESO_PERSONA EPP
		LEFT JOIN OWDRO.PROCESO_PERSONA PP ON EPP.IDPROCESO_PERSONA=PP.IDPROCESO_PERSONA
		WHERE PP.IDPROCESO = ? AND EPP.IDFASE = ?";
		$dat_c_valace = array($this->IDPROCESO, $this->FACTUAL);
		$res_c_valace = $this->db->query($sql_c_valace, $dat_c_valace)->result_object();

		$sql_c_valace2 = "SELECT COUNT(*) AS ACEPTADOS
		FROM OWDRO.ESTADO_PROCESO_PERSONA EPP
		LEFT JOIN OWDRO.PROCESO_PERSONA PP ON EPP.IDPROCESO_PERSONA=PP.IDPROCESO_PERSONA
		WHERE PP.IDPROCESO = ? AND EPP.IDFASE = ? AND EPP.ACTIVO = ? AND PP.ACEPTADO = ?";
		$dat_c_valace2 = array($this->IDPROCESO, $this->FACTUAL, 1, 1);
		$res_c_valace2 = $this->db->query($sql_c_valace2, $dat_c_valace2)->result_object();

		$sql_c_has_dro = "SELECT COUNT(*) AS HASDRO 
		FROM OWDRO.ESTADO_PROCESO_PERSONA EPP
		LEFT JOIN OWDRO.PROCESO_PERSONA PP ON EPP.IDPROCESO_PERSONA=PP.IDPROCESO_PERSONA 
    	WHERE PP.IDPROCESO = ? AND EPP.IDFASE = ?
    	AND IDPERFIL = (SELECT SCP.IDPERFIL FROM OWDRO.CAT_PERFIL SCP WHERE SCP.ABREVIATURA = 'DRO')";
    	$dat_c_has_dro = array($this->IDPROCESO, $this->FACTUAL);
    	$res_c_has_dro = $this->db->query($sql_c_has_dro, $dat_c_has_dro)->result_object();

		if(!empty($res_c_valace) && !empty($res_c_valace2))
		{
			// var_dump($res_c_valace[0]);
			// var_dump($res_c_valace2[0]);
			if(($res_c_valace[0]->ACTUALES == $res_c_valace2[0]->ACEPTADOS) && $res_c_has_dro[0]->HASDRO == 1)
			{
				// echo "enro aqui?";
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	private function validaFirma()
	{
		$sql_c_valace = "SELECT COUNT(*) AS ACTUALES
		FROM OWDRO.ESTADO_PROCESO_PERSONA EPP
		LEFT JOIN OWDRO.PROCESO_PERSONA PP ON EPP.IDPROCESO_PERSONA=PP.IDPROCESO_PERSONA
		WHERE PP.IDPROCESO = ? AND EPP.IDFASE = ?";
		$dat_c_valace = array($this->IDPROCESO, $this->FACTUAL);
		$res_c_valace = $this->db->query($sql_c_valace, $dat_c_valace)->result_object();

		$sql_c_valace2 = "SELECT COUNT(*) AS FIRMADOS
		FROM OWDRO.ESTADO_PROCESO_PERSONA EPP
		LEFT JOIN OWDRO.PROCESO_PERSONA PP ON EPP.IDPROCESO_PERSONA=PP.IDPROCESO_PERSONA
		WHERE PP.IDPROCESO = ? AND EPP.IDFASE = ? AND EPP.ACTIVO = ? AND PP.FIRMADO = ?";
		$dat_c_valace2 = array($this->IDPROCESO, $this->FACTUAL, 1, 1);
		$res_c_valace2 = $this->db->query($sql_c_valace2, $dat_c_valace2)->result_object();

		if(!empty($res_c_valace) && !empty($res_c_valace2))
		{
			if($res_c_valace[0]->ACTUALES == $res_c_valace2[0]->FIRMADOS)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	/*
	Funcion que controla el paso entre fases con base en los parametros del array establecido
	Argumentos: 
		Arreglo con la siguiente estructura variable:
		['idProceso'] = X //El id del proceso del cual se esta tratando de avanzar en fases.
		['callback'] = funcNom //Nombre de la funcion que realizara la validacion la cual debe ser agregada a este modelo
		['reqVal'] = X //Si requiere validaciones adicionales propias
		['valFase'] = X //la fase concreta donde se requiere realizar la validacion
		['ffase'] = X //variable usada para forzar el paso a una fase especifica

	Variables de clase usadas:
		$this->FFASE //Numero de la fase hacia la que forzaremos el paso viene 
		$this->IDPROCESO //Viene del arreglo que se pasa a la funcion principal cambiarFase y es requerido para funcionar
		$this->FACTUAL //Numero de la fase actual en la que nos encontramos
		$this->FSIGUIENTE //Numero de la fase siguiente
		$this->INI //TRUE si es el primer avance de fase sin una pre-existente, FALSE si se avanza a una fase nueva desde una existente.
		$this->OFFSET //Implementacion para retoceder fases (no implementada)
	*/
	public function cambiarFase($datos)
	{
		$this->procesaDatos($datos);
		$this->compruebaFase();

		if($this->INI)
		{
			$result = $this->iniciaFase();
		}
		else
		{
			if(!empty($this->OFFSET) && $this->OFFSET == -1)
				$result = $this->regresaFase();
			else
			{
				if(!empty($this->REQVAL) && $this->REQVAL && !empty($this->FSIGUIENTE) && !empty($this->VALFASE) && $this->FSIGUIENTE == $this->VALFASE)
				{
					// var_dump($this->CALLBACK_FUNC);
					if(method_exists($this,$this->CALLBACK_FUNC))
					{
						$this->VALIDATED = $this->{$this->CALLBACK_FUNC}();
						// var_dump($this->VALIDATED);
						// echo "enttro ai";
						if($this->VALIDATED){
							// echo "enttro aqui";
							// var_dump("validado");
							// exit();
							$result = $this->avanzaFase();
						}else{
							return 1;
						}
					}else{
						return 1;
					}
					// var_dump($funcVar);
					// $this->funcVar();
					// exit();
				}
				else
				{
					$result = $this->avanzaFase();
				}
			}
		}
		return $result;
	}

	public function faseActual($idproceso)
	{
		$sql_c_factual = "SELECT FP.IDPROCESO, FP.IDFASE, FP.ACTIVO, CF.DESC_FASE
		FROM OWDRO.FASE_PROCESO  FP
		LEFT JOIN OWDRO.CAT_FASE CF ON FP.IDFASE=CF.IDFASE
		WHERE FP.IDPROCESO = ? AND FP.ACTIVO = 1 ORDER BY 2 DESC";
		$dat_c_factual = array($idproceso);
		$sec_factual = $this->db->query($sql_c_factual, $dat_c_factual)->result_object();

		return $sec_factual[0];
	}

	private function compruebaFase()
	{
		$sql_c_factual = "SELECT IDPROCESO, IDFASE, ACTIVO FROM OWDRO.FASE_PROCESO WHERE IDPROCESO = ? AND ACTIVO = 1 ORDER BY 2 DESC";
		$dat_c_factual = array($this->IDPROCESO);
		$sec_factual = $this->db->query($sql_c_factual, $dat_c_factual)->result_object();

		$sql_c_fases = "SELECT IDFASE FROM OWDRO.CAT_FASE ORDER BY 1 ASC";
		$dat_c_fases = array($this->IDPROCESO);
		$fases = $this->db->query($sql_c_fases, $dat_c_fases)->result_object();

		if(empty($fases))
			$this->FSIGUIENTE = -1; // SIN CATALOGO DE FASES
		if(empty($sec_factual))
		{
			$fases = $fases[0];
			$this->INI = TRUE;
			$this->FSIGUIENTE = $fases->IDFASE;
			$this->FACTUAL = $fases->IDFASE;
		}
		else
		{
			$fase = null;
			$i = 0;
			$sec_factual = $sec_factual[0];

			while($fases[$i]->IDFASE <= $sec_factual->IDFASE)
			{
				$i += 1;
				if(isset($fases[$i])){
					$fase = $fases[$i];
				}
				else{
					$fase = $fases[$i-1];
					break;
				}
			}

			$this->INI = FALSE;
			$this->FSIGUIENTE = $fase->IDFASE;
			$this->FACTUAL = $sec_factual->IDFASE;

			if(!empty($this->FFASE))
			{
				$this->FSIGUIENTE = $this->FFASE;
			}
		}
	}

	private function iniciaFase()
	{
		$this->db->trans_start();

		$sql_i_principio = "INSERT INTO OWDRO.FASE_PROCESO(IDPROCESO, IDFASE, FECHA_INICIO, ACTIVO) VALUES(?, ?, LOCALTIMESTAMP, ?)";
		$dat_i_principio = array($this->IDPROCESO, $this->FACTUAL, 1);
		$this->db->query($sql_i_principio, $dat_i_principio);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ return 1; }
		else
		{ return 0; }
	}

	private function avanzaFase()
	{
		$this->db->trans_start();

		$sql_u_fase = "UPDATE OWDRO.FASE_PROCESO SET FECHA_FIN=LOCALTIMESTAMP, ACTIVO = ? WHERE IDPROCESO = ? AND IDFASE = ?";
		$dat_u_fase = array(0, $this->IDPROCESO, $this->FACTUAL);
		$this->db->query($sql_u_fase, $dat_u_fase);

		/*Incluir secuencia*/

		$sql_i_principio = "INSERT INTO OWDRO.FASE_PROCESO(IDPROCESO, IDFASE, FECHA_INICIO, ACTIVO) VALUES(?, ?, LOCALTIMESTAMP, ?)";
		$dat_i_principio = array($this->IDPROCESO, $this->FSIGUIENTE, 1);
		$this->db->query($sql_i_principio, $dat_i_principio);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ return 1; }
		else
		{ return 0; }
	}

	/*IMPOSIBLE SU IMPLEMENTACION DEBIDO A LA FORMA DEL DIAGRAM E-R QUE NO ADMITE DUPLICIDAD DE LAS LLAVES, FALTA LLAVE PRIMARIA EN LA TABLA PARA EL CONTROL (Y SECUENCIOA)*/
	private function regresaFase()
	{
		$this->db->trans_start();
		
		$sql_u_fase = "UPDATE OWDRO.FASE_PROCESO SET FECHA_FIN=LOCALTIMESTAMP, ACTIVO=? WHERE IDPROCESO=? AND IDFASE=?";
		$dat_u_fase = array(0, $this->IDPROCESO, $this->FACTUAL);
		$this->db->query($sql_u_fase, $dat_u_fase);

		$sql_i_principio = "INSERT INTO OWDRO.FASE_PROCESO(IDPROCESO, IDFASE, FECHA_INICIO, ACTIVO) VALUES(?, ?, LOCALTIMESTAMP, ?)";
		$dat_i_principio = array($this->IDPROCESO, $this->FSIGUIENTE, 1);
		$this->db->query($sql_i_principio, $dat_i_principio);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ return 1; }
		else
		{ return 0; }
	}

	private function procesaDatos($datos)
	{
		foreach($datos as $this->key => $this->value)
			$this->{strtoupper($this->key)} = $this->value;
	}
}
?>