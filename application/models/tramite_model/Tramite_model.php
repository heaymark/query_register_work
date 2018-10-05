<?php
class Tramite_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

  public function get_tramites($tipoformato,$tiposubformato){
    if($tipoformato == 0 || $tipoformato == ""){

      $sql = "SELECT IDPROCESO FROM PROCESO ORDER BY IDPROCESO";
    }elseif ($tipoformato > 0 &&  $tiposubformato == "") {

      $sql = "SELECT IDPROCESO FROM PROCESO WHERE IDTIPOPROCESO = ".$tipoformato." ORDER BY IDPROCESO";
    }elseif ($tipoformato == 1 &&  $tiposubformato == 0){

      $sql = "SELECT IDPROCESO FROM PROCESO WHERE IDTIPOPROCESO = ".$tipoformato." AND IDTIPOSUBPROCESO IN(1,2,3,4) ORDER BY IDPROCESO";
    }elseif ($tipoformato == 2 &&  $tiposubformato == 0){

      $sql = "SELECT IDPROCESO FROM PROCESO WHERE IDTIPOPROCESO = ".$tipoformato." AND IDTIPOSUBPROCESO IN(7,8,9,10) ORDER BY IDPROCESO";
    }elseif ($tipoformato > 0 &&  $tiposubformato > 0){
      $sql = "SELECT IDPROCESO FROM PROCESO WHERE IDTIPOPROCESO = ".$tipoformato." AND IDTIPOSUBPROCESO = ".$tiposubformato." ORDER BY IDPROCESO";
    }
    $result = $this->db->query($sql)->result_array();
     	return $result;
  }

  public function get_status_tramites($status_mc){
    // print_r($status_mc);
    if($status_mc == "0" || $status_mc == ""){
      $sql = "SELECT
                  PROCESO.IDPROCESO,
                  PROCESO.FOLIO,
                  COUNT(CAT_FASE.IDFASE) AS  ID_FASE,
                  CASE COUNT(CAT_FASE.IDFASE)
                    WHEN 1 THEN 'Captura Datos Predio/Obra'
                    WHEN 2 THEN 'Aceptacion Participantes'
                    WHEN 3 THEN 'Firma Participantes'
                    WHEN 4 THEN 'Carga Firma Autografa'
                    WHEN 5 THEN 'Obra en ejecucion'
                    WHEN 6 THEN 'Prorroga'
                    WHEN 7 THEN 'Terminacion de obra'
                    ELSE 'SIN ESTADO'
                    END AS DESCRIPCION
              FROM
                  CAT_FASE
                  INNER JOIN FASE_PROCESO ON CAT_FASE.IDFASE = FASE_PROCESO.IDFASE
                  INNER JOIN PROCESO ON PROCESO.IDPROCESO = FASE_PROCESO.IDPROCESO
              GROUP BY PROCESO.IDPROCESO,PROCESO.FOLIO
              ORDER BY  PROCESO.IDPROCESO ASC";
    }else if($status_mc == '1234'){
      $sql = "WITH OBRAS_ESTADO AS ( SELECT
                  PROCESO.IDPROCESO,
                  PROCESO.FOLIO,
                  COUNT(CAT_FASE.IDFASE) AS  ID_FASE,
                  CASE COUNT(CAT_FASE.IDFASE)
                    WHEN 1 THEN 'Captura Datos Predio/Obra'
                    WHEN 2 THEN 'Aceptacion Participantes'
                    WHEN 3 THEN 'Firma Participantes'
                    WHEN 4 THEN 'Carga Firma Autografa'
                    WHEN 5 THEN 'Obra en ejecucion'
                    WHEN 6 THEN 'Prorroga'
                    WHEN 7 THEN 'Terminacion de obra'
                    ELSE 'SIN ESTADO'
                    END AS DESCRIPCION
              FROM
                  CAT_FASE
                  INNER JOIN FASE_PROCESO ON CAT_FASE.IDFASE = FASE_PROCESO.IDFASE
                  INNER JOIN PROCESO ON PROCESO.IDPROCESO = FASE_PROCESO.IDPROCESO
              GROUP BY PROCESO.IDPROCESO,PROCESO.FOLIO
              ORDER BY  PROCESO.IDPROCESO ASC)
              SELECT  IDPROCESO, FOLIO, ID_FASE, DESCRIPCION 
              FROM OBRAS_ESTADO
              WHERE ID_FASE IN (1,2,3,4)";

    }else{

      $sql = "WITH OBRAS_ESTADO AS ( SELECT
                  PROCESO.IDPROCESO,
                  PROCESO.FOLIO,
                  COUNT(CAT_FASE.IDFASE) AS  ID_FASE,
                  CASE COUNT(CAT_FASE.IDFASE)
                    WHEN 1 THEN 'Captura Datos Predio/Obra'
                    WHEN 2 THEN 'Aceptacion Participantes'
                    WHEN 3 THEN 'Firma Participantes'
                    WHEN 4 THEN 'Carga Firma Autografa'
                    WHEN 5 THEN 'Obra en ejecucion'
                    WHEN 6 THEN 'Prorroga'
                    WHEN 7 THEN 'Terminacion de obra'
                    ELSE 'SIN ESTADO'
                    END AS DESCRIPCION
              FROM
                  CAT_FASE
                  INNER JOIN FASE_PROCESO ON CAT_FASE.IDFASE = FASE_PROCESO.IDFASE
                  INNER JOIN PROCESO ON PROCESO.IDPROCESO = FASE_PROCESO.IDPROCESO
              GROUP BY PROCESO.IDPROCESO,PROCESO.FOLIO
              ORDER BY  PROCESO.IDPROCESO ASC)
              SELECT  IDPROCESO, FOLIO, ID_FASE, DESCRIPCION 
              FROM OBRAS_ESTADO
              WHERE ID_FASE = ".$status_mc."";
    }
    // print_r($sql);
    $result = $this->db->query($sql)->result_array();
    // print_r($result); exit();
      return $result;
  }


  public function get_time_tramites($tipoformato,$tiposubformato){

    if($tipoformato == "" || $tipoformato == 0){
      $sql = "SELECT
                  COUNT(*) AS TOTAL,
                  TIPO_SUBPROCESO.DESCRIPCION AS SUBPROCESO,
                  EXTRACT(YEAR FROM PROCESO.FECHACREACION) AS ANIO,
                  EXTRACT(MONTH FROM PROCESO.FECHACREACION) AS MES,
                  EXTRACT(DAY FROM PROCESO.FECHACREACION) AS DIA,
                  TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY') AS FECHA
              FROM
                  PROCESO
                  INNER JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO
                  INNER JOIN TIPO_PROCESO ON TIPO_PROCESO.IDTIPOPROCESO = PROCESO.IDTIPOPROCESO
              GROUP BY TIPO_SUBPROCESO.DESCRIPCION, EXTRACT(YEAR FROM PROCESO.FECHACREACION), EXTRACT(MONTH FROM PROCESO.FECHACREACION), EXTRACT(DAY FROM PROCESO.FECHACREACION), TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')
              ORDER BY TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')";

    }elseif ($tipoformato > 0 &&  $tiposubformato == "") {

      $sql = "SELECT
                  COUNT(*) AS TOTAL,
                  TIPO_SUBPROCESO.DESCRIPCION AS SUBPROCESO,
                  EXTRACT(YEAR FROM PROCESO.FECHACREACION) AS ANIO,
                  EXTRACT(MONTH FROM PROCESO.FECHACREACION) AS MES,
                  EXTRACT(DAY FROM PROCESO.FECHACREACION) AS DIA,
                  TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY') AS FECHA
              FROM
                  PROCESO
                  INNER JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO
                  INNER JOIN TIPO_PROCESO ON TIPO_PROCESO.IDTIPOPROCESO = PROCESO.IDTIPOPROCESO
              WHERE TIPO_PROCESO.IDTIPOPROCESO = ".$tipoformato."
              GROUP BY TIPO_SUBPROCESO.DESCRIPCION, EXTRACT(YEAR FROM PROCESO.FECHACREACION), EXTRACT(MONTH FROM PROCESO.FECHACREACION), EXTRACT(DAY FROM PROCESO.FECHACREACION), TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')
              ORDER BY TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')";
    }elseif ($tipoformato == 1 &&  $tiposubformato == 0){
    
      $sql = "SELECT
                  COUNT(*) AS TOTAL,
                  TIPO_SUBPROCESO.DESCRIPCION AS SUBPROCESO,
                  EXTRACT(YEAR FROM PROCESO.FECHACREACION) AS ANIO,
                  EXTRACT(MONTH FROM PROCESO.FECHACREACION) AS MES,
                  EXTRACT(DAY FROM PROCESO.FECHACREACION) AS DIA,
                  TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY') AS FECHA
              FROM
                  PROCESO
                  INNER JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO
                  INNER JOIN TIPO_PROCESO ON TIPO_PROCESO.IDTIPOPROCESO = PROCESO.IDTIPOPROCESO
              WHERE TIPO_PROCESO.IDTIPOPROCESO = ".$tipoformato." AND TIPO_SUBPROCESO.IDTIPOSUBPROCESO IN(1,2,3,4)
              GROUP BY TIPO_SUBPROCESO.DESCRIPCION, EXTRACT(YEAR FROM PROCESO.FECHACREACION), EXTRACT(MONTH FROM PROCESO.FECHACREACION), EXTRACT(DAY FROM PROCESO.FECHACREACION), TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')
              ORDER BY TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')";
    }elseif ($tipoformato == 2 &&  $tiposubformato == 0){

      $sql = "SELECT
                  COUNT(*) AS TOTAL,
                  TIPO_SUBPROCESO.DESCRIPCION AS SUBPROCESO,
                  EXTRACT(YEAR FROM PROCESO.FECHACREACION) AS ANIO,
                  EXTRACT(MONTH FROM PROCESO.FECHACREACION) AS MES,
                  EXTRACT(DAY FROM PROCESO.FECHACREACION) AS DIA,
                  TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY') AS FECHA
              FROM
                  PROCESO
                  INNER JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO
                  INNER JOIN TIPO_PROCESO ON TIPO_PROCESO.IDTIPOPROCESO = PROCESO.IDTIPOPROCESO
              WHERE TIPO_PROCESO.IDTIPOPROCESO = ".$tipoformato." AND TIPO_SUBPROCESO.IDTIPOSUBPROCESO IN(7,8,9,10)
              GROUP BY TIPO_SUBPROCESO.DESCRIPCION, EXTRACT(YEAR FROM PROCESO.FECHACREACION), EXTRACT(MONTH FROM PROCESO.FECHACREACION), EXTRACT(DAY FROM PROCESO.FECHACREACION), TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')
              ORDER BY TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')";
    }elseif ($tipoformato > 0 &&  $tiposubformato > 0){

      $sql = "SELECT
                  COUNT(*) AS TOTAL,
                  TIPO_SUBPROCESO.DESCRIPCION AS SUBPROCESO,
                  EXTRACT(YEAR FROM PROCESO.FECHACREACION) AS ANIO,
                  EXTRACT(MONTH FROM PROCESO.FECHACREACION) AS MES,
                  EXTRACT(DAY FROM PROCESO.FECHACREACION) AS DIA,
                  TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY') AS FECHA
              FROM
                  PROCESO
                  INNER JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO
                  INNER JOIN TIPO_PROCESO ON TIPO_PROCESO.IDTIPOPROCESO = PROCESO.IDTIPOPROCESO
              WHERE TIPO_PROCESO.IDTIPOPROCESO = ".$tipoformato." AND TIPO_SUBPROCESO.IDTIPOSUBPROCESO = ".$tiposubformato."
              GROUP BY TIPO_SUBPROCESO.DESCRIPCION, EXTRACT(YEAR FROM PROCESO.FECHACREACION), EXTRACT(MONTH FROM PROCESO.FECHACREACION), EXTRACT(DAY FROM PROCESO.FECHACREACION), TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')
              ORDER BY TO_CHAR(PROCESO.FECHACREACION,'DD/MM/YYYY')";
    }

    $result = $this->db->query($sql)->result_array();
      return $result;
  }

  public function get_dro($num_dro,$tipo_dro){

    $sql = "SELECT
                PROCESO.IDPROCESO,
                PROCESO.FOLIO,
                TIPO_SUBPROCESO.DESCRIPCION,
                PERSONA_FISICA.APELLIDO_PATERNO,
                PERSONA_FISICA.APELLIDO_MATERNO,
                PERSONA_FISICA.NOMBRE,
                PROCESO_PERSONA.IDPERSONA,
                CAT_PERFIL.ABREVIATURA,
                DRO.NUMEROREGISTRO,
                PREDIO.SUPERFICIE,
                OBRACARACTERISTICA.SUPERFICIETOTAL_M2
            FROM
                PROCESO
                INNER JOIN PROCESO_PERSONA ON PROCESO.IDPROCESO = PROCESO_PERSONA.IDPROCESO
                INNER JOIN CAT_PERFIL ON PROCESO_PERSONA.IDPERFIL = CAT_PERFIL.IDPERFIL
                INNER JOIN PERSONA_FISICA ON PROCESO_PERSONA.IDPERSONA = PERSONA_FISICA.IDPERSONA
                INNER JOIN DRO ON PERSONA_FISICA.IDPERSONA = DRO.IDPERSONA
                INNER JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO
                INNER JOIN PREDIO ON PROCESO.IDPROCESO = PREDIO.IDPROCESO
                INNER JOIN OBRA ON PREDIO.IDPREDIO = OBRA.IDPREDIO
                INNER JOIN OBRACARACTERISTICA ON OBRA.IDOBRA = OBRACARACTERISTICA.IDOBRA
            WHERE
                DRO.NUMEROREGISTRO = ".$num_dro." AND  CAT_PERFIL.ABREVIATURA ='".$tipo_dro."'";


    $result = $this->db->query($sql)->result_array();
    // print_r($result);exit();
    $total_result = count($result);
    if ($total_result > 0) {

      $ids_procesos = "";
      foreach ($result as $key => $value) {
        $ids_procesos .= $value["IDPROCESO"].",";
      }
      $ids_procesos = trim($ids_procesos,",");

      $this->load->model('Carto_model/Carto_model','objCarto');
      $rs = $this->objCarto->toSql("SELECT calle, codigo_postal, colonia, cuenta_predial, delegacion, id_proceso, latitud, longitud, num_exterior, num_interior FROM dro_tramites WHERE id_proceso IN (".$ids_procesos.")");
      $json_rs = json_decode($rs, true);
      // print_r($result);
      // print_r($json_rs); exit();
      $total_result = array_merge($result, $json_rs);
    }else{

      $total_result = array();
    }

    return $total_result;
  }

  public function info_direccion($id_proceso){

    if(empty($id_proceso)){

      $sql_criterio = "ORDER BY PROCESO.IDPROCESO ASC";

    }else{

      $sql_criterio = "WHERE PROCESO.IDPROCESO = ".$id_proceso." ORDER BY PROCESO.IDPROCESO ASC";

    }

    $sql="SELECT
        PROCESO.IDPROCESO,
        PROCESO.IDTIPOPROCESO,
        PROCESO.FOLIO,
        TIPO_SUBPROCESO.DESCRIPCION AS DESCRIPCION_SUBPROCESO,
        TIPO_SUBPROCESO.IDSUBPROCESO,
        PROCESO.IDTIPOSUBPROCESO,
        PREDIO.CUENTAPREDIO,
        DIRECCION.CALLE,
        DIRECCION.DELEGACION,
        DIRECCION.COLONIA,
        DIRECCION.CODIGOPOSTAL,
        DIRECCION.NUMEROINTERNO,
        DIRECCION.NUMEROEXTERNO,
        TIPO_PROCESO.DESCRIPCION AS DESCRIPCION_PROCESO,
        PREDIO.IDPREDIO,
        PREDIO.SUPERFICIE,
        DIRECCION.IDDIRECCION,
        DIRECCION_PREDIO.IDDIRECCIONPREDIO
    FROM
        TIPO_SUBPROCESO
        INNER JOIN PROCESO ON PROCESO.IDTIPOSUBPROCESO = TIPO_SUBPROCESO.IDTIPOSUBPROCESO
        INNER JOIN PREDIO ON PROCESO.IDPROCESO = PREDIO.IDPROCESO
        INNER JOIN TIPO_PROCESO ON TIPO_PROCESO.IDTIPOPROCESO = PROCESO.IDTIPOPROCESO 
        INNER JOIN DIRECCION_PREDIO ON PREDIO.IDPREDIO = DIRECCION_PREDIO.IDPREDIO
        INNER JOIN DIRECCION ON DIRECCION_PREDIO.IDDIRECCION = DIRECCION.IDDIRECCION ".$sql_criterio;

        $result1 = $this->db->query($sql)->result_array();

        return $result1;
  }

  public function info_pdf($id_proceso){
    if(empty($id_proceso)){

      $sql_criterio = "ORDER BY PROCESO.IDPROCESO ASC";

    }else{

      $sql_criterio = "WHERE PROCESO.IDPROCESO = ".$id_proceso." ORDER BY PROCESO.IDPROCESO ASC";

    }

    $sql="SELECT
          PROCESO.IDPROCESO,
          PROCESO.IDTIPOPROCESO,
          PROCESO.FOLIO,
          PROCESO.CLAVE,
          PROCESO.IDTIPOSUBPROCESO,
          PREDIO.IDPREDIO,
          PREDIO.CUENTAPREDIO,
          PREDIO.ZONIFICACION,
          PREDIO.SUPERFICIE,
          PREDIO.USODESTINO,
          PAGO.IDPAGO,
          OBRA.IDOBRA,
          OBRA.IDTIPOOBRA,
          OBRA.IMPACTOURBANO,
          OBRA.IMPACTOMEDIOAMBIENTE,
          OBRA.FECHAIMPACTOURBANO,
          OBRA.FECHAIMPACTOMEDIOAMBIENTE,
          OBRAAMPLIACION.IDOBRAAMPLIACION,
          OBRAAMPLIACION.SUPERFICIECONTRUIDA,
          OBRAAMPLIACION.SUPERFICIEEXPANSION,
          OBRAAMPLIACION.SUPERFICIEMODIFICADA,
          OBRAAMPLIACION.SUPERFICIETOTAL,
          OBRARECONSTRUCCION.IDOBRARECONSTRUCCION,
          OBRARECONSTRUCCION.SUPERFICIECONTRUIDA AS SUPERFICIECONTRUIDA1,
          OBRARECONSTRUCCION.SUPERFICIEREPARACION,
          OBRARECONSTRUCCION.REPARACIONABULLADURAS,
          OBRARECONSTRUCCION.NUMERO_LRM,
          OBRARECONSTRUCCION.FECHA_EXPEDICION,
          OBRACARACTERISTICA.IDOBRACARACTERISTICA,
          OBRACARACTERISTICA.SUPERFICIEPREDIO,
          OBRACARACTERISTICA.SUPERFICIETOTAL AS SUPERFICIETOTAL1,
          OBRACARACTERISTICA.SUPERFICIEDESPLANTE,
          OBRACARACTERISTICA.SUPERFICIESOBREBANQUETA,
          OBRACARACTERISTICA.SUPERFICIEBAJOBANQUETA,
          OBRACARACTERISTICA.SUPERFICIECONSTSOBREBANQ,
          OBRACARACTERISTICA.ALTURAMAXIMABANQUETA,
          OBRACARACTERISTICA.SUPERFICIECONSTBAJOBANQ,
          OBRACARACTERISTICA.SUPERFICIEHABITACIONAL,
          OBRACARACTERISTICA.SUPERFICIENOHABITACIONAL,
          OBRACARACTERISTICA.NUMERONIVELES,
          OBRACARACTERISTICA.NUMEROSOTANOS,
          OBRACARACTERISTICA.SEMISOTANO,
          OBRACARACTERISTICA.NUMEROVIVIENDAS,
          OBRACARACTERISTICA.VIVIENDAA,
          OBRACARACTERISTICA.VIVIENDAB,
          OBRACARACTERISTICA.VIVIENDAC,
          OBRACARACTERISTICA.ESTACIONAMIENTOCUBIERTO,
          OBRACARACTERISTICA.ESTACIONAMIENTONOCUBIERTO,
          OBRACARACTERISTICA.CAJONESESTACIONAMIENTO,
          OBRACARACTERISTICA.AREALIBRE,
          OBRACARACTERISTICA.AREALIBRE_M2,
          OBRACARACTERISTICA.SUPERFICIETOTAL_M2,
          PAGO.CANTIDADART181,
          PAGO.CANTIDADART182,
          PAGO.CANTIDADART185,
          PAGO.CANTIDADART300,
          PAGO.CANTIDADART301,
          PAGO.CANTIDADART302,
          PAGO.OTRACANTIDAD,
          PAGO.CANTIDADTOTAL,
          PAGO.CANTIDADOTRO,
          TITULOPREDIO.IDTITULOPREDIO,
          TITULOPREDIO.NOTARIO,
          TITULOPREDIO.FOLIO AS FOLIO1,
          TITULOPREDIO.NUMERONOTARIO,
          TITULOPREDIO.ESTADO,
          TITULOPREDIO.FOLIORRP,
          TITULOPREDIO.FECHACREACION,
          TITULOPREDIO.OTRODOCUMENTO,
          DIRECCION_PREDIO.IDDIRECCIONPREDIO,
          DIRECCION.IDDIRECCION,
          DIRECCION.CALLE,
          DIRECCION.COLONIA,
          DIRECCION.NUMEROEXTERNO,
          DIRECCION.NUMEROINTERNO,
          DIRECCION.CIUDAD,
          DIRECCION.DELEGACION,
          DIRECCION.CODIGOPOSTAL,
          TIPO_SUBPROCESO.IDSUBPROCESO
          
      FROM
          PROCESO
          INNER JOIN PREDIO ON PROCESO.IDPROCESO = PREDIO.IDPROCESO
          LEFT JOIN PAGO ON PROCESO.IDPROCESO = PAGO.IDPROCESO
          LEFT JOIN OBRA ON PREDIO.IDPREDIO = OBRA.IDPREDIO
          LEFT JOIN OBRAAMPLIACION ON OBRA.IDOBRA = OBRAAMPLIACION.IDOBRA
          LEFT JOIN OBRARECONSTRUCCION ON OBRA.IDOBRA = OBRARECONSTRUCCION.IDOBRA
          LEFT JOIN OBRACARACTERISTICA ON OBRA.IDOBRA = OBRACARACTERISTICA.IDOBRA 
          LEFT JOIN TITULOPREDIO ON PREDIO.IDPREDIO = TITULOPREDIO.IDPREDIO
          LEFT JOIN DIRECCION_PREDIO ON PREDIO.IDPREDIO = DIRECCION_PREDIO.IDPREDIO
          LEFT JOIN DIRECCION ON DIRECCION_PREDIO.IDDIRECCION = DIRECCION.IDDIRECCION 
          LEFT JOIN TIPO_SUBPROCESO ON TIPO_SUBPROCESO.IDTIPOSUBPROCESO = PROCESO.IDTIPOSUBPROCESO ".$sql_criterio;

        $result1 = $this->db->query($sql);

        return $result1;
  }

  public function info_total_estado(){
    $sql = "SELECT ESTADO,COUNT(*) AS TOTAL FROM (
              SELECT F.IDPROCESO, CASE MAX(F.IDFASE)
                  WHEN  1  THEN 'Obra en proceso'
                  WHEN 2  THEN 'Obra en proceso'
                  WHEN 3  THEN 'Obra en proceso'
                  WHEN 4 THEN 'Obra en proceso'
                  WHEN 5 THEN 'Obra en ejecucion'
                  WHEN  6 THEN 'Prorroga'
                  WHEN  7 THEN 'Terminacion de obra'
                  ELSE 'SIN ESTADO'
                  END AS ESTADO FROM FASE_PROCESO  F INNER JOIN CAT_FASE C
              ON F.IDFASE = C.IDFASE GROUP BY F.IDPROCESO )  ESTAD 
              GROUP BY ESTADO";
    $result = $this->db->query($sql)->result_array();
    return $result;
  }

}
?>
