<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Reporte extends CI_Controller {
// class Reporte extends Template_controller {
    function __construct(){
        parent::__construct();
        // if(!existe_sesion()){ redirect(''); }
    } 

  public function Index(){
    // $id_proceso = $_POST["idproceso_"];
    $id_proceso = $_GET["idproceso_"];
    $this->load->model('Tramite_model/Tramite_model','tramitemodel');
    $rs=$this->tramitemodel->info_pdf($id_proceso);
    // print_r($rs); exit();
        $contador = count($rs);
        // echo $contador;


        if($contador > 0){

            // echo count($rs[0]); // 93
            // print_r($rs[0]); exit
            if (array_key_exists('0', $rs)){
                $contador1 = count($rs[0]);

                if ($contador1 > 0){
                    $idproceso = $rs[0]["IDPROCESO"];
                    $folio = $rs[0]["FOLIO"];
                    $fechacreacion1 = $rs[0]["FECHACREACION1"];
                    $fechavalidacion = $rs[0]["FECHAVALIDACION"];
                    $idtiposubproceso = $rs[0]["IDTIPOSUBPROCESO"];
                    $idtipoproceso = $rs[0]["IDTIPOPROCESO"];
                    $fechavigencia = $rs[0]["FECHAVIGENCIA"];
                    $constbajonorma = $rs[0]["CONST_BAJO_NORMA"];
                    $idpredio = $rs[0]["IDPREDIO"];
                    $cuentapredio = $rs[0]["CUENTAPREDIO"];
                    $zonificacion = $rs[0]["ZONIFICACION"];
                    $superficie = $rs[0]["SUPERFICIE"];
                    $usodestino = $rs[0]["USODESTINO"];
                    $idpago = $rs[0]["IDPAGO"];
                    $idobra = $rs[0]["IDOBRA"];
                    $idtipoobra = $rs[0]["IDTIPOOBRA"];
                    $impactourbano = $rs[0]["IMPACTOURBANO"];
                    $impactomedioambiente = $rs[0]["IMPACTOMEDIOAMBIENTE"];
                    $fechaimpactourbano = $rs[0]["FECHAIMPACTOURBANO"];
                    $fechaimpactomedioambiente = $rs[0]["FECHAIMPACTOMEDIOAMBIENTE"];
                    $idobraampliacion = $rs[0]["IDOBRAAMPLIACION"];
                    $superficiecontruida = $rs[0]["SUPERFICIECONTRUIDA"];
                    $superficieexpansion = $rs[0]["SUPERFICIEEXPANSION"];
                    $superficiemodificada = $rs[0]["SUPERFICIEMODIFICADA"];
                    $superficietotal = $rs[0]["SUPERFICIETOTAL"]; //calculo para DRO
                    $idobrareconstruccion = $rs[0]["IDOBRARECONSTRUCCION"];
                    $superficiecontruida1 = $rs[0]["SUPERFICIECONTRUIDA1"];  //SUPERFICIECONTRUIDA AS 
                    $superficiereparacion = $rs[0]["SUPERFICIEREPARACION"];
                    $reparacionabulladuras = $rs[0]["REPARACIONABULLADURAS"];
                    $numero_lrm = $rs[0]["NUMERO_LRM"];
                    $fecha_expedicion = $rs[0]["FECHA_EXPEDICION"];
                    $idobracaracteristica = $rs[0]["IDOBRACARACTERISTICA"];
                    $superficiepredio = $rs[0]["SUPERFICIEPREDIO"];
                    $superficietotal1 = $rs[0]["SUPERFICIETOTAL1"];  //SUPERFICIETOTAL AS 
                    $superficiedesplante = $rs[0]["SUPERFICIEDESPLANTE"];
                    $superficiesobrebanqueta = $rs[0]["SUPERFICIESOBREBANQUETA"];
                    $superficiebajobanqueta = $rs[0]["SUPERFICIEBAJOBANQUETA"];
                    $superficieconstsobrebanq = $rs[0]["SUPERFICIECONSTSOBREBANQ"];
                    $alturamaximabanqueta = $rs[0]["ALTURAMAXIMABANQUETA"];
                    $superficieconstbajobanq = $rs[0]["SUPERFICIECONSTBAJOBANQ"];
                    $superficiehabitacional = $rs[0]["SUPERFICIEHABITACIONAL"];
                    $superficienohabitacional = $rs[0]["SUPERFICIENOHABITACIONAL"];
                    $numeroniveles = $rs[0]["NUMERONIVELES"];
                    $numerosotanos = $rs[0]["NUMEROSOTANOS"];
                    $semisotano = $rs[0]["SEMISOTANO"];
                    $numeroviviendas = $rs[0]["NUMEROVIVIENDAS"];
                    $viviendaa = $rs[0]["VIVIENDAA"];
                    $viviendab = $rs[0]["VIVIENDAB"];
                    $viviendac = $rs[0]["VIVIENDAC"];
                    $estacionamientocubierto = $rs[0]["ESTACIONAMIENTOCUBIERTO"];
                    $estacionamientonocubierto = $rs[0]["ESTACIONAMIENTONOCUBIERTO"];
                    $cajonesestacionamiento = $rs[0]["CAJONESESTACIONAMIENTO"];
                    $arealibre = $rs[0]["AREALIBRE"];
                    $arealibre_m2 = $rs[0]["AREALIBRE_M2"];
                    $superficietotal_m2 = $rs[0]["SUPERFICIETOTAL_M2"];
                    $cantidadart181 = $rs[0]["CANTIDADART181"];
                    $cantidadart182 = $rs[0]["CANTIDADART182"];
                    $cantidadart185 = $rs[0]["CANTIDADART185"];
                    $cantidadart300 = $rs[0]["CANTIDADART300"];
                    $cantidadart301 = $rs[0]["CANTIDADART301"];
                    $cantidadart302 = $rs[0]["CANTIDADART302"];
                    $otracantidad = $rs[0]["OTRACANTIDAD"];
                    $cantidadtotal = $rs[0]["CANTIDADTOTAL"];
                    $cantidadotro = $rs[0]["CANTIDADOTRO"];
                    $idtitulopredio = $rs[0]["IDTITULOPREDIO"];
                    $notario = $rs[0]["NOTARIO"];
                    $folio1 = $rs[0]["FOLIO1"];
                    $numeronotario = $rs[0]["NUMERONOTARIO"];
                    // $estado = $rs[0]["ESTADO"];
                    $estado = $rs[0]["NOMBRE1"];
                    $foliorrp = $rs[0]["FOLIORRP"];
                    $fechacreacion = $rs[0]["FECHACREACION"];
                    $otrodocumento = $rs[0]["OTRODOCUMENTO"];
                    $iddireccionpredio = $rs[0]["IDDIRECCIONPREDIO"];
                    $iddireccion = $rs[0]["IDDIRECCION"];
                    $calle = $rs[0]["CALLE"];
                    $colonia = $rs[0]["COLONIA"];
                    $numeroexterno = $rs[0]["NUMEROEXTERNO"];
                    $numerointerno = $rs[0]["NUMEROINTERNO"];
                    // $ciudad = $rs[0]["CIUDAD"];
                    $delegacion = $rs[0]["DELEGACION"];
                    $codigopostal = $rs[0]["CODIGOPOSTAL"];
                    $idsubproceso = $rs[0]["IDSUBPROCESO"];
                    $id_desc_clave = $rs[0]["IDCLAVEFORMATO"];
                    $desc_clave = $rs[0]["DESCRIPCION_CLAVE"];
                    // $descripcion_clave = $rs[0]["DESCRIPCION_CLAVE"];
                    $apellido_paterno = $rs[0]["APELLIDO_PATERNO"];
                    $apllido_materno = $rs[0]["APELLIDO_MATERNO"];
                    $nombre = $rs[0]["NOMBRE"];
                    $calle1 = $rs[0]["CALLE1"];
                    $n_exterior = $rs[0]["N_EXTERIOR"];
                    $n_interior = $rs[0]["N_INTERIOR"];
                    $colonia1 = $rs[0]["COLONIA1"];
                    $delegacion1 = $rs[0]["DELEGACION1"];
                    $cod_pos = $rs[0]["COD_POS"];
                    $telefono = $rs[0]["TELEFONO"];
                    $correo_elect = $rs[0]["CORREO_ELEC"];
                    // $ASIGNO = $this->asigno($id_proceso);
                    // $factual = $this->mcp->faseActual($id_proceso)->IDFASE;
                }

            }

            if (array_key_exists('99', $rs)){
            // print_r($rs[99]); exit();
                $contador2 = count($rs[99]);//Capturista
                if ($contador2 > 0){
                    $cap_desc_perfil = $rs[99]["DESC_PERFIL"];
                    $cap_idperfil = $rs[99]["IDPERFIL"];
                    $cap_rfc = $rs[99]["RFC"];
                    $cap_apellido_paterno = $rs[99]["APELLIDO_PATERNO"];
                    $cap_apellido_materno = $rs[99]["APELLIDO_MATERNO"];
                    $cap_nombre = $rs[99]["NOMBRE"];
                    $cap_curp = $rs[99]["CURP"];
                    $cap_razon_social = $rs[99]["RAZON_SOCIAL"];
                    $cap_idproceso = $rs[99]["IDPROCESO"];
                    $cap_email = $rs[99]["EMAIL"];
                    $cap_idpersona = $rs[99]["IDPERSONA"];
                    $cap_descripcion = $rs[99]["DESCRIPCION"];
                    $cap_numeroidentificacion = $rs[99]["NUMEROIDENTIFICACION"];
                    $cap_nacionalidad = $rs[99]["NACIONALIDAD"];
                    $cap_numero = $rs[99]["NUMERO"];
                    $cap_telefonoarea = $rs[99]["TELEFONOAREA"];
                    $cap_telefono = $rs[99]["TELEFONO"];
                    $cap_extension = $rs[99]["EXTENSION"];
                    $cap_celular = $rs[99]["CELULAR"];
                    $cap_documento = $rs[99]["DOCUMENTO"];
                    $cap_fechavencimiento = $rs[99]["FECHAVENCIMIENTO"];
                    $cap_actividadautorizada = $rs[99]["ACTIVIDADAUTORIZADA"];
                    $cap_folio = $rs[99]["FOLIO"];
                    $cap_fecha_otorgamiento = $rs[99]["FECHA_OTORGAMIENTO"];
                    $cap_notario = $rs[99]["NOTARIO"];
                    $cap_numero_notario = $rs[99]["NUMERO_NOTARIO"];
                    $cap_nombre1 = $rs[99]["NOMBRE1"];
                    $cap_folio1 = $rs[99]["FOLIO1"];
                    $cap_notario1 = $rs[99]["NOTARIO1"];
                    $cap_numeronotario = $rs[99]["NUMERONOTARIO"];
                    $cap_inscripcion_rppc = $rs[99]["INSCRIPCION_RPPC"];
                    $cap_calle = $rs[99]["CALLE"];
                    $cap_num_ext = $rs[99]["NUM_EXT"];
                    $cap_num_int = $rs[99]["NUM_INT"];
                    $cap_colonia_alt = $rs[99]["COLONIA_ALT"];
                    $cap_fecha_alta = $rs[99]["FECHA_ALTA"];
                    $cap_colonia = $rs[99]["COLONIA"];
                    $cap_codpos = $rs[99]["CODPOS"];
                    $cap_del = $rs[99]["DELEGACION"];
                }
            }

            if (array_key_exists('1', $rs)){
                // print_r($rs[1]); exit();
                $contador3 = count($rs[1]);//Propietario
                // echo $contador3; exit();
                if ($contador3 > 0){
                    $prop_desc_perfil = $rs[1]["DESC_PERFIL"];
                    $prop_idperfil = $rs[1]["IDPERFIL"];
                    $prop_rfc = $rs[1]["RFC"];
                    $prop_apellido_paterno = $rs[1]["APELLIDO_PATERNO"];//
                    $prop_apellido_materno = $rs[1]["APELLIDO_MATERNO"];//
                    $prop_nombre = $rs[1]["NOMBRE"];//
                    $prop_curp = $rs[1]["CURP"];
                    $prop_razon_social = $rs[1]["RAZON_SOCIAL"];
                    $prop_idproceso = $rs[1]["IDPROCESO"];
                    $prop_email = $rs[1]["EMAIL"];
                    $prop_idpersona = $rs[1]["IDPERSONA"];
                    $prop_descripcion = $rs[1]["DESCRIPCION"];
                    $prop_numeroidentificacion = $rs[1]["NUMEROIDENTIFICACION"];//
                    $prop_nacionalidad = $rs[1]["NACIONALIDAD"];//
                    $prop_numero = $rs[1]["NUMERO"];//
                    $prop_telefonoarea = $rs[1]["TELEFONOAREA"];
                    $prop_telefono = $rs[1]["TELEFONO"];
                    $prop_extension = $rs[1]["EXTENSION"];
                    $prop_celular = $rs[1]["CELULAR"];
                    $prop_documento = $rs[1]["DOCUMENTO"];//
                    $prop_fechavencimiento = $rs[1]["FECHAVENCIMIENTO"];//
                    $prop_actividadautorizada = $rs[1]["ACTIVIDADAUTORIZADA"];//
                    $prop_folio = $rs[1]["FOLIO"];//
                    $prop_fecha_otorgamiento = $rs[1]["FECHA_OTORGAMIENTO"];//
                    $prop_notario = $rs[1]["NOTARIO"];//
                    $prop_numero_notario = $rs[1]["NUMERO_NOTARIO"];//
                    $prop_nombre1 = $rs[1]["NOMBRE1"];//
                    $prop_folio1 = $rs[1]["FOLIO1"];
                    $prop_notario1 = $rs[1]["NOTARIO1"];
                    $prop_numeronotario = $rs[1]["NUMERONOTARIO"];
                    $prop_inscripcion_rppc = $rs[1]["INSCRIPCION_RPPC"];
                    $prop_calle = $rs[1]["CALLE"];
                    $prop_num_ext = $rs[1]["NUM_EXT"];
                    $prop_num_int = $rs[1]["NUM_INT"];
                    $prop_colonia_alt = $rs[1]["COLONIA_ALT"];
                    $prop_fecha_alta = $rs[1]["FECHA_ALTA"];
                    $prop_colonia = $rs[1]["COLONIA"];
                    $prop_codpos = $rs[1]["CODPOS"];
                    $prop_del = $rs[1]["DELEGACION"];
                }
            }
            if (array_key_exists('2', $rs)){
                // print_r($rs[2]); exit();
                $contador4 = count($rs[2]);//Rep. Legal
                // echo $contador4; exit();
                if ($contador4 > 0){
                    $rep_desc_perfil = $rs[2]["DESC_PERFIL"];
                    $rep_idperfil = $rs[2]["IDPERFIL"];
                    $rep_rfc = $rs[2]["RFC"];
                    $rep_apellido_paterno = $rs[2]["APELLIDO_PATERNO"];//
                    $rep_apellido_materno = $rs[2]["APELLIDO_MATERNO"];//
                    $rep_nombre = $rs[2]["NOMBRE"];//
                    $rep_curp = $rs[2]["CURP"];
                    $rep_razon_social = $rs[2]["RAZON_SOCIAL"];
                    $rep_idproceso = $rs[2]["IDPROCESO"];
                    $rep_email = $rs[2]["EMAIL"];
                    $rep_idpersona = $rs[2]["IDPERSONA"];
                    $rep_descripcion = $rs[2]["DESCRIPCION"];
                    $rep_numeroidentificacion = $rs[2]["NUMEROIDENTIFICACION"];//
                    $rep_nacionalidad = $rs[2]["NACIONALIDAD"];//
                    $rep_numero = $rs[2]["NUMERO"];//
                    $rep_telefonoarea = $rs[2]["TELEFONOAREA"];
                    $rep_telefono = $rs[2]["TELEFONO"];
                    $rep_extension = $rs[2]["EXTENSION"];
                    $rep_celular = $rs[2]["CELULAR"];
                    $rep_documento = $rs[2]["DOCUMENTO"];
                    $rep_fechavencimiento = $rs[2]["FECHAVENCIMIENTO"];
                    $rep_actividadautorizada = $rs[2]["ACTIVIDADAUTORIZADA"];
                    $rep_folio = $rs[2]["FOLIO"];
                    $rep_fecha_otorgamiento = $rs[2]["FECHA_OTORGAMIENTO"];
                    $rep_notario = $rs[2]["NOTARIO"];
                    $rep_numero_notario = $rs[2]["NUMERO_NOTARIO"];
                    $rep_nombre1 = $rs[2]["NOMBRE1"];
                    $rep_folio1 = $rs[2]["FOLIO1"];//
                    $rep_notario1 = $rs[2]["NOTARIO1"];//
                    $rep_numeronotario = $rs[2]["NUMERONOTARIO"];//
                    $rep_inscripcion_rppc = $rs[2]["INSCRIPCION_RPPC"];//
                    $rep_idestado_2 = $rs[2]["IDESTADO_2"];//
                    $rep_calle = $rs[2]["CALLE"];
                    $rep_num_ext = $rs[2]["NUM_EXT"];
                    $rep_num_int = $rs[2]["NUM_INT"];
                    $rep_colonia_alt = $rs[2]["COLONIA_ALT"];
                    $rep_fecha_alta = $rs[2]["FECHA_ALTA"];
                    $rep_colonia = $rs[2]["COLONIA"];
                    $rep_codpos = $rs[2]["CODPOS"];
                    $rep_del = $rs[2]["DELEGACION"];
                    $rep_fecha = $rs[2]["FECHA"];//
                    $rep_folio_1 = $rs[2]["FOLIO_1"];//
                    $rep_idestado_1 = $rs[2]["IDESTADO_1"];//
                }
            }
            if (array_key_exists('3', $rs)){            
                // echo count($rs[3]); // 31
                // print_r($rs[3]); exit();
                $contador5 = count($rs[3]); //DRO
                if ($contador5 > 0){
                    $dro_desc_perfil = $rs[3]["DESC_PERFIL"];
                    $dro_idperfil = $rs[3]["IDPERFIL"];
                    $dro_rfc = $rs[3]["RFC"];
                    $dro_apellido_paterno = $rs[3]["APELLIDO_PATERNO"];
                    $dro_apellido_materno = $rs[3]["APELLIDO_MATERNO"];
                    $dro_nombre = $rs[3]["NOMBRE"];
                    $dro_curp = $rs[3]["CURP"];
                    $dro_razon_social = $rs[3]["RAZON_SOCIAL"];
                    $dro_idproceso = $rs[3]["IDPROCESO"];
                    $dro_email = $rs[3]["EMAIL"];
                    $dro_idpersona = $rs[3]["IDPERSONA"];
                    $dro_descripcion = $rs[3]["DESCRIPCION"];
                    $dro_numeroidentificacion = $rs[3]["NUMEROIDENTIFICACION"];
                    $dro_nacionalidad = $rs[3]["NACIONALIDAD"];
                    $dro_numero = $rs[3]["NUMERO"];
                    $dro_telefonoarea = $rs[3]["TELEFONOAREA"];
                    $dro_telefono = $rs[3]["TELEFONO"];
                    $dro_extension = $rs[3]["EXTENSION"];
                    $dro_celular = $rs[3]["CELULAR"];
                    $dro_documento = $rs[3]["DOCUMENTO"];
                    $dro_fechavencimiento = $rs[3]["FECHAVENCIMIENTO"];
                    $dro_actividadautorizada = $rs[3]["ACTIVIDADAUTORIZADA"];
                    $dro_folio = $rs[3]["FOLIO"];
                    $dro_fecha_otorgamiento = $rs[3]["FECHA_OTORGAMIENTO"];
                    $dro_notario = $rs[3]["NOTARIO"];
                    $dro_numero_notario = $rs[3]["NUMERO_NOTARIO"];
                    $dro_nombre1 = $rs[3]["NOMBRE1"];
                    $dro_folio1 = $rs[3]["FOLIO1"];
                    $dro_notario1 = $rs[3]["NOTARIO1"];
                    $dro_numeronotario = $rs[3]["NUMERONOTARIO"];
                    $dro_inscripcion_rppc = $rs[3]["INSCRIPCION_RPPC"];
                    $dro_calle = $rs[3]["CALLE"];
                    $dro_num_ext = $rs[3]["NUM_EXT"];
                    $dro_num_int = $rs[3]["NUM_INT"];
                    $dro_colonia_alt = $rs[3]["COLONIA_ALT"];
                    $dro_fecha_alta = $rs[3]["FECHA_ALTA"];
                    $dro_colonia = $rs[3]["COLONIA"];
                    $dro_codpos = $rs[3]["CODPOS"];
                    $dro_del = $rs[3]["DELEGACION"];
                }
            }
            if (array_key_exists('4', $rs)){
                // echo count($rs[4]); // 31
                // print_r($rs[4]); exit();
                $contador6 = count($rs[4]); //CSE
                // echo $contador6; exit();
                if ($contador6 > 0){
                    $cse_desc_perfil = $rs[4]["DESC_PERFIL"];
                    $cse_idperfil = $rs[4]["IDPERFIL"];
                    $cse_rfc = $rs[4]["RFC"];
                    $cse_apellido_paterno = $rs[4]["APELLIDO_PATERNO"];
                    $cse_apellido_materno = $rs[4]["APELLIDO_MATERNO"];
                    $cse_nombre = $rs[4]["NOMBRE"];
                    $cse_curp = $rs[4]["CURP"];
                    $cse_razon_social = $rs[4]["RAZON_SOCIAL"];
                    $cse_idproceso = $rs[4]["IDPROCESO"];
                    $cse_email = $rs[4]["EMAIL"];
                    $cse_idpersona = $rs[4]["IDPERSONA"];
                    $cse_descripcion = $rs[4]["DESCRIPCION"];
                    $cse_numeroidentificacion = $rs[4]["NUMEROIDENTIFICACION"];
                    $cse_nacionalidad = $rs[4]["NACIONALIDAD"];
                    $cse_numero = $rs[4]["NUMERO"];
                    $cse_telefonoarea = $rs[4]["TELEFONOAREA"];
                    $cse_telefono = $rs[4]["TELEFONO"];
                    $cse_extension = $rs[4]["EXTENSION"];
                    $cse_celular = $rs[4]["CELULAR"];
                    $cse_documento = $rs[4]["DOCUMENTO"];
                    $cse_fechavencimiento = $rs[4]["FECHAVENCIMIENTO"];
                    $cse_actividadautorizada = $rs[4]["ACTIVIDADAUTORIZADA"];
                    $cse_folio = $rs[4]["FOLIO"];
                    $cse_fecha_otorgamiento = $rs[4]["FECHA_OTORGAMIENTO"];
                    $cse_notario = $rs[4]["NOTARIO"];
                    $cse_numero_notario = $rs[4]["NUMERO_NOTARIO"];
                    $cse_nombre1 = $rs[4]["NOMBRE1"];
                    $cse_folio1 = $rs[4]["FOLIO1"];
                    $cse_notario1 = $rs[4]["NOTARIO1"];
                    $cse_numeronotario = $rs[4]["NUMERONOTARIO"];
                    $cse_inscripcion_rppc = $rs[4]["INSCRIPCION_RPPC"];
                    $cse_calle = $rs[4]["CALLE"];
                    $cse_num_ext = $rs[4]["NUM_EXT"];
                    $cse_num_int = $rs[4]["NUM_INT"];
                    $cse_colonia_alt = $rs[4]["COLONIA_ALT"];
                    $cse_fecha_alta = $rs[4]["FECHA_ALTA"];
                    $cse_colonia = $rs[4]["COLONIA"];
                    $cse_codpos = $rs[4]["CODPOS"];
                    $cse_del = $rs[4]["DELEGACION"];
                }
            }
            if (array_key_exists('5', $rs)){
                // echo count($rs[5]); // 31
                // print_r($rs[5]); exit();
                $contador7 = count($rs[5]); //CDUyA
                if ($contador7 > 0){
                    $cdu_desc_perfil = $rs[5]["DESC_PERFIL"];
                    $cdu_idperfil = $rs[5]["IDPERFIL"];
                    $cdu_rfc = $rs[5]["RFC"];
                    $cdu_apellido_paterno = $rs[5]["APELLIDO_PATERNO"];
                    $cdu_apellido_materno = $rs[5]["APELLIDO_MATERNO"];
                    $cdu_nombre = $rs[5]["NOMBRE"];
                    $cdu_curp = $rs[5]["CURP"];
                    $cdu_razon_social = $rs[5]["RAZON_SOCIAL"];
                    $cdu_idproceso = $rs[5]["IDPROCESO"];
                    $cdu_email = $rs[5]["EMAIL"];
                    $cdu_idpersona = $rs[5]["IDPERSONA"];
                    $cdu_descripcion = $rs[5]["DESCRIPCION"];
                    $cdu_numeroidentificacion = $rs[5]["NUMEROIDENTIFICACION"];
                    $cdu_nacionalidad = $rs[5]["NACIONALIDAD"];
                    $cdu_numero = $rs[5]["NUMERO"];
                    $cdu_telefonoarea = $rs[5]["TELEFONOAREA"];
                    $cdu_telefono = $rs[5]["TELEFONO"];
                    $cdu_extension = $rs[5]["EXTENSION"];
                    $cdu_celular = $rs[5]["CELULAR"];
                    $cdu_documento = $rs[5]["DOCUMENTO"];
                    $cdu_fechavencimiento = $rs[5]["FECHAVENCIMIENTO"];
                    $cdu_actividadautorizada = $rs[5]["ACTIVIDADAUTORIZADA"];
                    $cdu_folio = $rs[5]["FOLIO"];
                    $cdu_fecha_otorgamiento = $rs[5]["FECHA_OTORGAMIENTO"];
                    $cdu_notario = $rs[5]["NOTARIO"];
                    $cdu_numero_notario = $rs[5]["NUMERO_NOTARIO"];
                    $cdu_nombre1 = $rs[5]["NOMBRE1"];
                    $cdu_folio1 = $rs[5]["FOLIO1"];
                    $cdu_notario1 = $rs[5]["NOTARIO1"];
                    $cdu_numeronotario = $rs[5]["NUMERONOTARIO"];
                    $cdu_inscripcion_rppc = $rs[5]["INSCRIPCION_RPPC"];
                    $cdu_calle = $rs[5]["CALLE"];
                    $cdu_num_ext = $rs[5]["NUM_EXT"];
                    $cdu_num_int = $rs[5]["NUM_INT"];
                    $cdu_colonia_alt = $rs[5]["COLONIA_ALT"];
                    $cdu_fecha_alta = $rs[5]["FECHA_ALTA"];
                    $cdu_colonia = $rs[5]["COLONIA"];
                    $cdu_codpos = $rs[5]["CODPOS"];
                    $cdu_del = $rs[5]["DELEGACION"];
                }
            }
            if (array_key_exists('6', $rs)){
                // echo count($rs[6]); // 31
                // print_r($rs[6]); exit();
                $contador8 = count($rs[6]); //CI
                if ($contador8 > 0){
                    $ci_desc_perfil = $rs[6]["DESC_PERFIL"];
                    $ci_idperfil = $rs[6]["IDPERFIL"];
                    $ci_rfc = $rs[6]["RFC"];
                    $ci_apellido_paterno = $rs[6]["APELLIDO_PATERNO"];
                    $ci_apellido_materno = $rs[6]["APELLIDO_MATERNO"];
                    $ci_nombre = $rs[6]["NOMBRE"];
                    $ci_curp = $rs[6]["CURP"];
                    $ci_razon_social = $rs[6]["RAZON_SOCIAL"];
                    $ci_idproceso = $rs[6]["IDPROCESO"];
                    $ci_email = $rs[6]["EMAIL"];
                    $ci_idpersona = $rs[6]["IDPERSONA"];
                    $ci_descripcion = $rs[6]["DESCRIPCION"];
                    $ci_numeroidentificacion = $rs[6]["NUMEROIDENTIFICACION"];
                    $ci_nacionalidad = $rs[6]["NACIONALIDAD"];
                    $ci_numero = $rs[6]["NUMERO"];
                    $ci_telefonoarea = $rs[6]["TELEFONOAREA"];
                    $ci_telefono = $rs[6]["TELEFONO"];
                    $ci_extension = $rs[6]["EXTENSION"];
                    $ci_celular = $rs[6]["CELULAR"];
                    $ci_documento = $rs[6]["DOCUMENTO"];
                    $ci_fechavencimiento = $rs[6]["FECHAVENCIMIENTO"];
                    $ci_actividadautorizada = $rs[6]["ACTIVIDADAUTORIZADA"];
                    $ci_folio = $rs[6]["FOLIO"];
                    $ci_fecha_otorgamiento = $rs[6]["FECHA_OTORGAMIENTO"];
                    $ci_notario = $rs[6]["NOTARIO"];
                    $ci_numero_notario = $rs[6]["NUMERO_NOTARIO"];
                    $ci_nombre1 = $rs[6]["NOMBRE1"];
                    $ci_folio1 = $rs[6]["FOLIO1"];
                    $ci_notario1 = $rs[6]["NOTARIO1"];
                    $ci_numeronotario = $rs[6]["NUMERONOTARIO"];
                    $ci_inscripcion_rppc = $rs[6]["INSCRIPCION_RPPC"];
                    $ci_calle = $rs[6]["CALLE"];
                    $ci_num_ext = $rs[6]["NUM_EXT"];
                    $ci_num_int = $rs[6]["NUM_INT"];
                    $ci_colonia_alt = $rs[6]["COLONIA_ALT"];
                    $ci_fecha_alta = $rs[6]["FECHA_ALTA"];
                    $ci_colonia = $rs[6]["COLONIA"];
                    $ci_codpos = $rs[6]["CODPOS"];
                    $ci_del = $rs[6]["DELEGACION"];
                }
            }

        }

    $this->load->model('model_control_proceso/Model_control_proceso');
    $res = $this->Model_control_proceso->faseActual($idproceso);

    if ($res->IDFASE >= 4) {
        $borrador = 0; // incluye la marca de agua
        
    }else{

        $borrador = 1; // incluye la marca de agua
    }

    $tipo =  ($idtiposubproceso > 6 && $idtiposubproceso <= 12) ? "C" : "B";

    // Se carga la libreria fpdf
    $this->load->library('pdf');
    /*Se crea un objeto de la clase Pdf, recuerda que la clase Pdf heredó todos las variables y métodos de fpdf*/
    $this->pdf = new Pdf();    
    $this->pdf->header = 1;
    // Agregamos una página
    // AliasNbPages
    // $headerVisible="true";
    $this->pdf->AddPage();

    switch($id_desc_clave) {
        case 0:
            $this->pdf->Image(APPPATH.'/third_party/imagenes/logoseduvi.png',58,12,26);
            break;
        // case "MAGDALENA CONTRERAS":
        case 1:
            $this->pdf->Image(APPPATH.'/third_party/imagenes/MAGDALENA.jpg',64,12,11);
            break;
        // case "ALVARO OBREGON":
        case 2:
            $this->pdf->Image(APPPATH.'/third_party/imagenes/ALVARO.jpg',64,12,11);
            break;
        // case "TLALPAN":
        case 3:
            // $("#clave_formato").val('TTLALPAN_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/TLALPAN.jpg',64,12,11);
            break;
        // case "XOCHIMILCO":
        case 4:
            // $("#clave_formato").val('TXOCH_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/XOCHIMILCO.jpg',64,12,11);
            break;
        // case "BENITO JUAREZ":
        case 5:
            // $("#clave_formato").val('TBJUAREZ_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/BENITO.jpg',64,12,11);
            break;
        // case "MIGUEL HIDALGO":
        case 6:
            // $("#clave_formato").val('TMHIDALGO_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/MIGUEL.jpg',64,12,11);
            break;
        // case "MILPA ALTA":
        case 7:
            // $("#clave_formato").val('TMILPAALTA_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/MILPALTA.jpg',64,12,11);
            break;
        // case "CUAUHTEMOC":
        case 8:
            // $("#clave_formato").val('TCUH_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/CUAUHTEMOC.jpg',64,12,11);
            break;
        // case "GUSTAVO A. MADERO":
        case 9:
            // $("#clave_formato").val('TGAM_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/GUSTAVO.jpg',64,12,11);
            break;
        // case "VENUSTIANO CARRANZA":
        case 10:
            // $("#clave_formato").val('TVCARRANZA_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/VENUSTIANO.jpg',64,12,11);
            break;
        // case "IZTAPALAPA":
        case 11:
            // $("#clave_formato").val('TIZTAPALAPA_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/IZTAPALAPA.jpg',64,12,11);
            break;
        // case "CUAJIMALPA DE MORELOS":
        case 12:
            // $("#clave_formato").val('TCUAJIMALPA_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/CUAJIMALPA.jpg',64,12,11);
            break;
        // case "IZTACALCO":
        case 13:
            // $("#clave_formato").val('TIZTAC_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/IZTACALCO.jpg',64,12,11);
            break;
        // case "COYOACAN":
        case 14:
            $this->pdf->Image(APPPATH.'/third_party/imagenes/COYOACAN.jpg',64,12,11);
            break;
        // case "TLAHUAC":
        case 15:
            // $("#clave_formato").val('TTLH_RMC_2');
            $this->pdf->Image(APPPATH.'/third_party/imagenes/TLAHUAC.jpg',64,12,11);
            break;
        // case "AZCAPOTZALCO":
        case 16:
            $this->pdf->Image(APPPATH.'/third_party/imagenes/AZCAPOTZALCO.jpg',64,12,11);
            break;
        // default:
        //     $("#clave_formato").val('NO SE ENCONTRO');
    }

    if($borrador == 1){
        $this->pdf->SetFont('Arial','B',50);
        $this->pdf->SetTextColor(255,192,203);
        $this->pdf->RotatedText(35,190,'     B  O  R  R  A  D  O  R     ',45);
        $this->pdf->SetTextColor(0,0,0);
    }

    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();

    // Se define el titulo, márgenes izquierdo, derecho y el color de relleno predeterminado
    $this->pdf->SetTitle(utf8_decode("Manifiestación de contrucción"));
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    // $this->pdf->SetFont('Arial', 'B', 7);

    $clave_formato = $desc_clave;//"TSEDUVI-CGDAU_RMC_2";
    $nombre_tramite = "REGISTRO DE MANIFESTACION DE CONTRUCCION TIPO 'B' O 'C' ";

    if ($idtipoproceso == 1){
        $manifiestoB = "'SI'";
        $manifiestoC = "'NO'";
    }else{
        $manifiestoB = "'NO'";
        $manifiestoC = "'SI'";
    }

    if ($constbajonorma == 1) {
        $respuestaSI = "'X'"; 
        $respuestaNO = " "; 
    }else{
        $respuestaSI = " "; 
        $respuestaNO = "'X'"; 
    }

    $dato = explode("-", $fechacreacion1);  
    // echo $fechacreacion; exit();
    $fechaDia = $dato[0];//date('d'); // es la fecha en que le da imprimir ¿? 
    $fechaMes = $dato[1];//date('F'); // es la fecha en que le da imprimir ¿? 
    $fechaAnio =  "20".$dato[2];//date('Y'); // es la fecha en que le da imprimir ¿? 
    $director = '';// "Pedro Valdes"; // ¿Quien es ? 

    $this->pdf->SetFont('Arial', '', 6.5);
    $this->pdf->SetXY(160, 12);
    $this->pdf->Cell(15, 6, $folio, 0 , 1);//dato Folio
    $this->pdf->SetXY(160, 17);
    $this->pdf->Cell(15, 6, utf8_decode($clave_formato), 0 , 1);//dato Clave

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(15,6,utf8_decode("NOMBRE DEL TRÁMITE: "));
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->SetXY(70, 23);
    $this->pdf->Cell(15, 6, utf8_decode($nombre_tramite), 0 , 1);//dato Nombre Tramite
    $this->pdf->Ln(2);

    $this->pdf->SetXY(30, 30);
    $this->pdf->Cell(15, 6, utf8_decode("MANIFESTACIÓN DE CONSTRUCCIÓN 'B' "), 0 , 1);
    $this->pdf->SetXY(90, 30);
    $this->pdf->Cell(15, 6, utf8_decode($manifiestoB), 0 , 1);//dato B
    $this->pdf->SetXY(115, 30);
    $this->pdf->Cell(15, 6, utf8_decode("MANIFESTACIÓN DE CONSTRUCCIÓN 'C' "), 0 , 1);
    $this->pdf->SetXY(170, 30);
    $this->pdf->Cell(15, 6, utf8_decode($manifiestoC), 0 , 1);//dato C
    $this->pdf->Ln(2);
    $txt = utf8_decode("CONSTRUCCIÓN BAJO LA NORMA PARA IMPULSAR Y FACILITAR LA CONSTRUCCIÓN DE VIVIENDA PARA LOS TRABAJADORES DERECHOHABIENTES DE LOS ORGANISMOS NACIONALES DE VIVIVENDA EN EL SUELO URBANO                        SI                        NO");
    $this->pdf->MultiCell(0,3,$txt);
    $this->pdf->SetXY(156, 39.5);
    $this->pdf->Cell(15, 6, utf8_decode($respuestaSI), 0 , 1);//dato NO 
    $this->pdf->SetXY(175, 39.5);
    $this->pdf->Cell(15, 6, utf8_decode($respuestaNO), 0 , 1);//dato SI 
    // $this->pdf->Ln(2);

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(15, 7, utf8_decode("Ciudad de México,  a "), 0 , 1);
    $this->pdf->SetXY(43, 46);
    $this->pdf->Cell(15, 6, $fechaDia, 0 , 1);//dato dia
    $this->pdf->SetXY(55, 46);
    $this->pdf->Cell(15, 6, 'de', 0 , 1);
    $this->pdf->SetXY(68, 46);
    $this->pdf->Cell(15, 6, $fechaMes, 0 , 1);//dato mes
    $this->pdf->SetXY(85, 46);
    $this->pdf->Cell(15, 6, 'de', 0 , 1);
    $this->pdf->SetXY(90, 46);
    $this->pdf->Cell(15, 6, $fechaAnio, 0 , 1);//dato año 
    // $this->pdf->Ln(1);

    $this->pdf->Cell(15, 6, utf8_decode("Director General de Administración Urbana "), 0 , 1);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->SetXY(70, 52);
    $this->pdf->Cell(15, 6, utf8_decode($director), 0 , 1);//dato Director
    $this->pdf->Cell(15, 4, utf8_decode("Presente "), 0 , 1);
    // $this->pdf->Ln(1);

    $this->pdf->SetFont('Arial', '', 6);
    $txt2 = utf8_decode("Declaro bajo protesta de decir la verdad que la información y documentación proporcionada es verídica, por lo que en caso de existir falsedad en ella, tengo pleno conocimiento que se aplicarán las sanciones administratias y penas establecidas en los ordenamientos respectivos para quienes se conden con la falseda ante la autoridad competente, en términos del artículo 32 de la Ley de Procedimiento Administrativo, con relación al 311 del Código Penal, ambos del Distrito Federal.");
    $this->pdf->MultiCell(0,3,$txt2);
    // $this->pdf->Ln(2);

    ## Informacion al interesado  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('Información al interesado sobre el tratamiento de sus datos personales'),1,0,'C','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 6);
    $variable1 = "De la PLataforma del SIG CDMX "; // de donde sale esto ¿?
    $variable2 = "recabar toda la informacion de las dependencias de gobierno respectiva a las afectaciones del sismo  "; // de donde sale esto ¿?
    $variable3 = "brindar informacion a la ciudadania con respecto a los hogares afectados por el sismo"; // de donde sale esto ¿?
    $variable4 = "traves de la pagina web o portal web "; // de donde sale esto ¿?
    $variable5 = "para poder obtener su apoyo "; // de donde sale esto ¿?
    $variable6 = "Pedro"; // de donde sale esto ¿?
    $variable7 = "De la persona  que los brindo Mario Rivera "; // de donde sale esto ¿?
    $txt3 = utf8_decode("Los datos personales recabados seran protegidos, incorporados y tratados en el Sistema de Datos Personales ".$variable1." el cual tiene su fundamento en ".$variable2.", y cuya finalidad es ".$variable3." y podrán ser transmitidos a ".$variable4.", además de otras trasmisiones previstas en la Ley de Protección de Datos Personales para el Distrito Federal. Con excepción del teléfono y correo electrónico particulares, los demás datos son obligatorios y sin ellos no podrá acceder al servicio o completar el trámite".$variable5." Asimismo, se le informa que sus datos no podrán ser difundidos sin su consentimiento expreso salvo excepciones  previstas en la ley. El responsable del Sistema de Datos Personales es ".$variable6.", y la dirección donde podrá ejercer los derechos de acceso, rectificación, cancelación y oposición, asi como la revoacion del consentimiento es ".$variable7." El titular de los datos podrá dirigirse al Instituto de Acceso a la Información Pública y Protección de Datos Personales del Distrito Federal, donde recibirá asesoría sobre los derechos que tutela la Ley de Protección de Datos Personales para el Distrito Federal al teléfono 56 36 46 36; correo electrónico: datospersonales@infodf.org.mx o en la pagina 'www.infodf.org.mx'.");
    $this->pdf->MultiCell(0,2.5,$txt3,1,'L',0);
    $this->pdf->Ln(1);
    ##########################

    ## DATOS DEL INTERESADO  ####
    $nombreInteresado =  $prop_nombre;//'Mario Antonio'; 
    $apellidoPaternoI = $prop_apellido_paterno; //'Rivera';
    $apellidoMaternoI = $prop_apellido_materno; //'Jacinto';
    $idOficialI = $prop_numeroidentificacion;//'4GT35DDE';
    $numFolioI = $prop_numero;//'14262637737373';
    $nacionI = $prop_nacionalidad;//"Mexicana";
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('DATOS DEL INTERESADO, PROPIETARIO O POSEEDOR (PERSONA FÍSICA)'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);
    $this->pdf->Cell(0, 6, utf8_decode("* Los datos solicitados en este bloque son obligatorios. "),'LR',1,'L');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(16,5, utf8_decode("Nombre(s): "),'L',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($nombreInteresado),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);
    
    $this->pdf->Cell(20,5,"Apellido Paterno:",'L',0,'L',0);
    $this->pdf->Cell(70,5,utf8_decode($apellidoPaternoI),0,0,'L',0);//dato Nombres

    $this->pdf->Cell(20,5,"Apellido Materno:",0,0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($apellidoMaternoI),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(5);

    $this->pdf->Cell(25,5,utf8_decode("Identificación Oficial:"),'L',0,'L',0);
    $this->pdf->Cell(65,5,utf8_decode($idOficialI),0,0,'L',0);//dato Nombres

    $this->pdf->Cell(18,5,utf8_decode("Número/Folio:"),0,0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($numFolioI),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Cell(0,5,utf8_decode("(carta de naturalización o cartilla de servicio militar o cédula profecional o pasaporte o certificado de nacionalidad  mexicana o credencial para votar o licencia para conducir)"),'RL',0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5,"Nacionalidad:",'LB',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($nacionI),'BR',0,'L',0); //dato
    $this->pdf->Ln(6);
    ##########################

    ## En su caso  ####
    $documentoacredita = $prop_documento;//"Documento que acredita";
    $fechavencimiento = $prop_fechavencimiento;//'11 de Abril del 2018 ';
    $actividad = $prop_actividadautorizada;//"Actividad Mexicana";
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('En su caso'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Ln(5);
    $this->pdf->Cell(55,5, utf8_decode("Documento con el que acredita la situacion"),'L',1,'L');
    $this->pdf->SetXY(70, 139);
    $this->pdf->Cell(0,5, utf8_decode($documentoacredita),'R',1,'L');
    $this->pdf->Cell(0,3, utf8_decode("migratorao y estancia legal en el pais "),'LR',0,'L',0);
    $this->pdf->Ln(3);
    $this->pdf->Cell(30,5,"Fecha vencimiento:",'LB',0,'L',0);
    $this->pdf->Cell(30,5,utf8_decode($fechavencimiento),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(40,5,"Actividad autorizada a realizar:",'B',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($actividad),'BR',0,'L',0); //dato
    $this->pdf->Ln(6);
    ##########################

    ## DATOS DEL INTERESADO MORAL ####
    $denominacionRS = $prop_razon_social;//'Mario Antonio';
    $numero_poliza = $prop_folio;//'Rivera';
    $fecha_otrogamiento = $prop_fecha_otorgamiento;//'Jacinto';
    $nombreNotario = $prop_notario;//'Pet Valdez ';
    $num_notaria = $prop_numero_notario;//'2345432';
    $entidadfederativa = $prop_nombre1;//'Jacinto';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('DATOS DEL INTERESADO, PROPIETARIO O POSEEDOR (PERSONA MORAL)'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);
    $this->pdf->Cell(0, 6, utf8_decode("* Los datos solicitados en este bloque son obligatorios. "),'LR',1,'L');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(35,5, utf8_decode("Denominación o razón social: "),'L',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($denominacionRS),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('Acta Cosntitutiva o Póliza'),'LR',0,'L','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 7);
    
    $this->pdf->Cell(40,5,utf8_decode("Número o Folio del Acta o Póliza:"),'L',0,'L',0);
    $this->pdf->Cell(70,5,utf8_decode($numero_poliza),0,0,'L',0);//dato Nombres

    $this->pdf->Cell(30,5,utf8_decode("Fecha de otorgamiento:"),0,0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($fecha_otrogamiento),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(5);

    $this->pdf->Cell(50,5,utf8_decode("Nombre del notario o Corredor Público:"),'L',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($nombreNotario),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(5);

    $this->pdf->Cell(40,5,utf8_decode("Número de Notaría o Correduría:"),'BL',0,'L',0);
    $this->pdf->Cell(70,5,utf8_decode($num_notaria),'B',0,'L',0);//dato Nombres

    $this->pdf->Cell(30,5,utf8_decode("Entidad Federativa:"),'B',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($entidadfederativa),'BR',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################

    ## Inscripción  ####
    $folio_numero_ins = $rep_folio_1;//'284DEDE ';
    $fecha_ins = $rep_fecha;//"11 de Abril del 2018";
    $entidad_fed_ins = $rep_idestado_1;//" Mexico";

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('Inscripción en el Registro Público de la Propiedad y de Comercio'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Ln(5);
    $this->pdf->Cell(30,7,utf8_decode("Folio o Número:"),'L',0,'L',0);
    $this->pdf->Cell(30,7,utf8_decode($folio_numero_ins),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(40,7,"Fecha:",0,0,'L',0);
    $this->pdf->Cell(0,7,utf8_decode($fecha_ins),'R',0,'L',0); //dato
    $this->pdf->Ln(5);
    $this->pdf->Cell(40,5,utf8_decode("Entidad Federativa:"),'LB',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($entidad_fed_ins),'BR',0,'L',0); //dato
    $this->pdf->Ln(6);
    ##########################

    ## DATOS DEL REPRESENTANTE  ####
    $nombreRepresentante = $rep_nombre;//'Mario Antonio'; 
    $apellidoPaternoR = $rep_apellido_paterno;//'Rivera';
    $apellidoMaternoR = $rep_apellido_materno;//'Jacinto';
    $idOficialR =$rep_numeroidentificacion;//'4GT35DDE';
    $numFolioR = $rep_numero;//'14262637737373';
    $nacionR = $rep_nacionalidad;//"Mexicana";
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('DATOS DEL REPRESENTANTE LEGAL O APODERADO'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(6);
    $this->pdf->Cell(0, 6, utf8_decode("* Los datos solicitados en este bloque son obligatorios en caso de actuan en calidad de representante legal, apoderado, mandatario. "),'LR',1,'L');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(16,4, utf8_decode("Nombre(s): "),'L',0,'L',0);
    $this->pdf->Cell(0,4, utf8_decode($nombreRepresentante),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(4);
    
    $this->pdf->Cell(20,5,"Apellido Paterno:",'L',0,'L',0);
    $this->pdf->Cell(70,5,utf8_decode($apellidoPaternoR),0,0,'L',0);//dato Nombres

    $this->pdf->Cell(20,5,"Apellido Materno:",0,0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($apellidoMaternoR),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(5);

    $this->pdf->Cell(25,5,utf8_decode("Identificación Oficial:"),'L',0,'L',0);
    $this->pdf->Cell(65,5,utf8_decode($idOficialR),0,0,'L',0);//dato Nombres

    $this->pdf->Cell(18,5,utf8_decode("Número/Folio:"),0,0,'L',0);
    $this->pdf->Cell(0,5,$numFolioR,'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5,utf8_decode("Nacionalidad:"),'LB',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($nacionR),'BR',0,'L',0); //dato
    $this->pdf->Ln(6);
    ##########################
    
    ## INSTURMENTO  ####
    $folioInstrumento = $rep_folio1;//'37dudu';
    $nombrenotario_Inst = $rep_notario1;//'Jacinto';
    $num_notaria_Inst = $rep_numeronotario;//'4GT35DDE';
    $entidad_fed_Inst = $rep_idestado_2;//'14262637737373';
    $inscripcion_Inst = $rep_inscripcion_rppc;//"Mexicana";
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('Instrumento o documento con el que acredita la representación'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Ln(5);
    
    $this->pdf->Cell(20,6, utf8_decode("Número o Folio:"),'L',0,'L',0);
    $this->pdf->Cell(70,6, utf8_decode($folioInstrumento),0,0,'L',0);//dato Nombres

    // $this->pdf->CellFitSpace(30,7, utf8_decode("Nombre del Notario, corredor Público o Juez:"),1, 0 , 'L', 0 );
    $this->pdf->Cell(25,6, utf8_decode("Nombre del Notario,"),0,0,'L',0);
    $this->pdf->Cell(0,6,utf8_decode($nombrenotario_Inst),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(2.5);
    $this->pdf->Cell(90,5, utf8_decode(""),'L',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode("Corredor Público o Juez:"),'R',0,'L',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(25,5,utf8_decode("Número de Notaría,"),'L',0,'L',0);
    $this->pdf->Cell(65,5,utf8_decode($num_notaria_Inst),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(27,5,utf8_decode("Entidad Federativa:"),0,0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($entidad_fed_Inst),'R',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(2.5);
    $this->pdf->Cell(0,5, utf8_decode("Correduría o Juzgado:"),'LR',0,'L',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(73,5,utf8_decode("Inscripción en el Registro Público de la Propiedad y de Comercio:"),'LB',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($inscripcion_Inst),'BR',0,'L',0); //dato

    $this->pdf->Ln(5);
    ##########################
    $this->pdf->addPage();//Salto
    if($borrador == 1){
        $this->pdf->SetFont('Arial','B',50);
        $this->pdf->SetTextColor(255,192,203);
        $this->pdf->RotatedText(35,190,'     B  O  R  R  A  D  O  R     ',45);
        $this->pdf->SetTextColor(0,0,0);
    }
    

    ## DOMICILIO PARA OIR  ####
    $calle_oir = strtoupper($calle1);//'Cincel';
    $no_ext_oir = $n_exterior;//'85';
    $no_int_oir = $n_interior;//"'B'";
    $colonia_oir = strtoupper($colonia1);//"Sevilla";
    $delegacion_oir = strtoupper($delegacion1);//'Venustiano Carranza';
    $cp_oir = $cod_pos;//'91680';
    $tel_oir = $telefono;//"28383948488";
    $correo_oir = $correo_elect;//"maro.rivera@gmail.com";
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('DOMICILIO PARA OIR Y RECIBIR NOTIFICACIONES Y DOCUMENTOS EN LA CIUDAD DE MÉXICO'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(6);
    $this->pdf->Cell(0, 6, utf8_decode("* Los datos solicitados en este bloque son obligatorios. "),'LR',1,'L');
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(10,5, utf8_decode("Calle: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode($calle_oir),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("No. Exterior: "),0,0,'L',0);
    $this->pdf->Cell(26,5, utf8_decode($no_ext_oir),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("No. Interior: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($no_int_oir),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(15,5,utf8_decode("Colonia:"),'L',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($colonia_oir),'R',0,'L',0); //dato
    $this->pdf->Ln(5);

    $this->pdf->Cell(20,5, utf8_decode("Delegación: "),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($delegacion_oir),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("C.P.: "),0,0,'L',0);
    $this->pdf->Cell(26,5, utf8_decode($cp_oir),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("Tel: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($tel_oir),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);
        
    $this->pdf->Cell(55,5,utf8_decode("Correo electrónico para recibir notificaciones:"),'LB',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($correo_oir),'BR',0,'L',0); //dato
    $this->pdf->Ln(7);
    ##########################

    ## PERSONA AUTORIZADA  ####
    $nombre_autoriza = strtoupper($nombre);//'Mario Antonio';
    $ap_autoriza = strtoupper($apellido_paterno);//'Rivera';
    $am_autoriza = strtoupper($apllido_materno);//'Jacinto';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('Persona autorizada para oír y recibir notificaciones y documentos'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(16,5, utf8_decode("Nombre(s): "),'L',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($nombre_autoriza),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);
    
    $this->pdf->Cell(20,5,"Apellido Paterno:",'LB',0,'L',0);
    $this->pdf->Cell(70,5,utf8_decode($ap_autoriza),'B',0,'L',0);//dato Nombres

    $this->pdf->Cell(20,5,"Apellido Materno:",'B',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($am_autoriza),'RB',0,'L',0);//dato Nombres
    $this->pdf->Ln(7);
    ##########################

    ## REQUISITOS  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('REQUISITOS'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);
    // $column_width = ($this->pdf->GetPageWidth()-30)/2;
    $sample_text ="1.Formato de solicitud TSEDUVI-CGDAU_RMC_2 por duplicado, debidamente requisitados, con firmas autógrafas.                                                                                                ";
    // $this->pdf->SetXY(13,63);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text),'L','L');
    $this->pdf->MultiCell(90,5,utf8_decode($sample_text),'BLR','J',0);
    
    $sample_text2="2.Comprobante de Pago de los derechos establecidos en el Código Fiscal de la Ciudad de México. (Original y copia).";
    $this->pdf->SetXY(105,67);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text2),'R','L');
    $this->pdf->MultiCell(90,5,utf8_decode($sample_text2),'BR','J',0);
    // $this->pdf->Cell(90,5,"",'BR',0,'C',0);

    $sample_text3="3.Constancia de alineamiento y número oficial vigente. (Original y copia).";
    // $this->pdf->SetXY(15,60);
    // $this->pdf->MultiCellBlt(86,15,"",utf8_decode($sample_text3),'L','L');
    $this->pdf->MultiCell(90,13,utf8_decode($sample_text3),'BLR','J',0);
    
    $sample_text4="4.Certificado Único de Zonificación de Uso del Suelo o Certificado Único de Zonificación del Suelo Digital o Certificado de Acreditación de Uso del Suelo por Derechos Adquiridos, los cuales deberán ser verificados y firmados por el Director Responsable de Obra y/o Corresponsable en Diseño Urbano y Arquitectónico, en su caso. (Original y copia).";
    $this->pdf->SetXY(105,78);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text4),'R','L');
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text4),'BR','J',0);
    // $this->pdf->Ln(5);

    $sample_text5="5.Dos tantos del proyecto arquitectónico de la obra en planos a escala, debidamente acotados y con las especificaciones de los materiales, acabados y equipos a utilizar, en los que se debe incluir, como mínimo: croquis de localización del predio, levantamiento del estado actual, indicando las construcciones y árboles existentes; planta de conjunto, mostrando los límites del predio y la localización y uso de las diferentes partes edificadas y áreas exteriores; plantas arquitectónicas, indicando el uso de los distintos locales y las circulaciones, con el mobiliario fijo que se requiera y en su caso, espacios para estacionamiento de automóviles y/o bicicletas y/o motocicletas; cortes y fachadas; cortes por fachada, cuando colinden en vía pública y detalles arquitectónicos interiores y de obra exterior.";
    $this->pdf->Cell(90,40, utf8_decode(" "),1,0,'L',0);
    $this->pdf->Ln(1);
    $this->pdf->SetXY(15,95);  
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text5),0,'J',0);

    $sample_text6="6.Memoria Descriptiva del proyecto, la cual contendrá como mínimo: el listado de locales construidos y las áreas libres, superficie y número de ocupantes o usuarios de cada uno; el análisis del cumplimiento de los Programas Delegacionales o Parcial, incluyendo coeficientes de ocupación y utilización del suelo; cumpliendo con los requerimientos del Reglamento, sus Normas Técnicas Complementarias y demás disposiciones referentes a: accesibilidad para personas con discapacidad, cantidad de estacionamientos y su funcionalidad, patios de  iluminación y ventilación, niveles de iluminación y ventilación en cada local, circulaciones horizontales y verticales, salidas y muebles hidrosanitarios, visibilidad en salas de espectáculos, resistencia de los materiales al fuego, circulaciones y salidas de emergencia, equipos de extinción de fuego y otras que se requieran; y en su caso, de las restricciones o afectaciones del predio. Estos documentos deben estar firmados por el propietario o poseedor, por el proyectista indicando su número de cédula profesional, por el Director Responsable de Obra y el Corresponsable en Instalaciones, en su caso. (Original y copia)";
    $this->pdf->SetXY(105,91);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text6),'R','L');
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text6),'BR','J',0);

    $sample_text7="7.Dos tantos de los proyectos de las instalaciones hidráulicas incluyendo el uso de sistemas para calentamiento de agua por medio del aprovechamiento de la energía solar conforme a los artículos 82, 83 y 89 del Reglamento de Construcciones, sanitarias, eléctricas, gas e instalaciones especiales y otras que se requieran, en los que se debe incluir como mínimo: plantas, cortes e isométricos en su caso, mostrando las trayectorias de tuberías, alimentaciones, así como el diseño y memorias correspondientes, que incluyan la descripción de los dispositivos conforme a los requerimientos establecidos por el Reglamento y sus Normas en cuanto a salidas y muebles hidráulicos y sanitarios, equipos de extinción de fuego, sistema de captación y aprovechamiento de aguas pluviales en azotea y otras que considere el proyecto. Estos documentos deben estar firmados por el propietario o poseedor, por el proyectista indicando su número de cédula profesional, por el Director Responsable de Obra y el Corresponsable en Instalaciones, en su caso.";
    $this->pdf->Cell(90,72, utf8_decode(" "),1,0,'L',0);
    $this->pdf->Ln(1);
    $this->pdf->SetXY(15,143);  
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text7),0,'J',0);
    $sample_text8="8.Dos tantos del proyecto estructural de la obra en planos debidamente acotados, con especificaciones que contengan una descripción completa y detallada de las características de la estructura incluyendo su cimentación. Se especificarán en ellos los datos esenciales del diseño como las cargas vivas y los coeficientes sísmicos considerados y las calidades de materiales. Se indicarán los procedimientos de construcción recomendados, cuando éstos difieran de los tradicionales. Deberán mostrarse en planos los detalles de conexiones, cambios de nivel y aberturas para ductos. En particular, para estructuras de concreto se indicarán mediante dibujos acotados los detalles de colocación y traslapes de refuerzo de las conexiones entre miembros estructurales. En los planos de estructuras de acero se mostrarán todas las conexiones entre miembros, así como la manera en que deben unirse entre sí los diversos elementos que integran un miembro estructural. Cuando se utilicen remaches o tornillos se indicará su diámetro, número, colocación y calidad, y cuando las conexiones sean soldadas se mostrarán las características completas de la soldadura; éstas se indicarán utilizando una simbología apropiada y, cuando sea necesario, se complementará la descripción con dibujos acotados y a escala. En el caso de que la estructura esté formada por elementos prefabricados o de patente, los planos estructurales deberán indicar las condiciones que éstos deben cumplir en cuanto a su resistencia y otros requisitos de comportamiento. Deben especificarse los herrajes y dispositivos de anclaje, las tolerancias dimensionales y procedimientos de montaje. Deberán indicarse, asimismo, los procedimientos de apuntalamiento, erección de elementos prefabricados y conexiones de una estructura nueva con otra existente. En los planos de fabricación y en los de montaje de estructuras de acero o de concreto prefabricado, se proporcionará la información necesaria para que la estructura se fabrique y monte de manera que se cumplan los requisitos indicados en los planos estructurales.";
    $this->pdf->SetXY(105,130);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text8),'R','L');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text8),'BR','J',0);

    $sample_text9="9.Memoria de Cálculo Estructural, será expedida en papel membretado de la Empresa o del proyectista, en donde conste su número de cédula profesional y firma, así como, la descripción del proyecto, localización, número de niveles subterráneos y uso conforme a lo establecido en el artículo 53 inciso e), séptimo párrafo del Reglamento de Construcciones para el Distrito Federal. (Original y copia).";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text9),'BLR','J',0);

    $sample_text10="10.Proyecto de protección a colindancias firmados por el proyectista indicando su número de cédula profesional, así como el Director Responsable de Obra y el Corresponsable en Seguridad Estructural, en su caso. (Original y copia).";
    $this->pdf->SetXY(105,202);
    $this->pdf->Cell(90,20, utf8_decode(" "),1,0,'L',0);
    $this->pdf->SetXY(105,202);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text10),0,'J',0);
    $this->pdf->Ln(11);

    $sample_text11="11.Estudio de mecánica de suelos del predio de acuerdo con los alcances y lo establecido en las Normas Técnicas Complementarias para Diseño y Construcción de Cimentaciones del Reglamento, incluyendo los procedimientos constructivos de la excavación, muros de contención y cimentación, así como las recomendaciones de protección a colindancias. El estudio debe estar firmado por el especialista indicando su número de cédula profesional, así como por el Director Responsable de Obra y por el Corresponsable en Seguridad Estructural, en su caso. (por duplicado).";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text11),1,'J',0);

    $sample_text12="12.Para el caso de las edificaciones que pertenezcan al grupo A o subgrupo B1, según el artículo 139 del Reglamento, o para las edificaciones del subgrupo B2, acuse de ingreso de la orden de revisión del proyecto estructural emitido por el Instituto para la Seguridad de las Construcciones de la Ciudad de México. (Original y copia).";
    $this->pdf->SetXY(105,222);
    $this->pdf->Cell(90,21, utf8_decode(" "),1,0,'L',0);
    $this->pdf->SetXY(105,222);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text12),0,'J',0);
    $this->pdf->Ln(9);

    $sample_text13="13.Libro de bitácora de obra foliado, para ser sellado por la Secretaría de Desarrollo Urbano y Vivienda o la Delegación, el cual debe conservarse en la obra, realizando su apertura en el sitio con la presencia de los autorizados para usarla, quienes lo firmarán en ese momento. (original).";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text13),'BLR','J',0);

    $sample_text14="14.Responsiva del Director Responsable de Obra del proyecto de la obra, así como de los Corresponsables en los supuestos señalados en el artículo 36 del Reglamento. (se encuentra en este formato de solicitud).";
    $this->pdf->SetXY(105,243);
    $this->pdf->Cell(90,16, utf8_decode(" "),1,0,'L',0);
    $this->pdf->SetXY(105,245);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text14),0,'J',0);

    $this->pdf->addPage();//Salto
    if($borrador == 1){
        $this->pdf->SetFont('Arial','B',50);
        $this->pdf->SetTextColor(255,192,203);
        $this->pdf->RotatedText(35,190,'     B  O  R  R  A  D  O  R     ',45);
        $this->pdf->SetTextColor(0,0,0);
    }
    $this->pdf->SetFont('Arial', '', 6);

    $sample_text15="15.Póliza vigente del seguro de responsabilidad civil por daños a terceros en las obras clasificadas en el grupo A y subgrupo B1, según el artículo 139 del Reglamento, por un monto asegurado no menor del 10% del costo total de la obra construida por el tiempo de vigencia de la Manifestación de Construcción. (Original y copia).";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text15),'TBLR','J',0);

    $sample_text16="16.Para el caso de construcciones que requieran la instalación de tomas de agua y conexión a la red de drenaje, la solicitud y comprobante del pago de derechos. (Original y copia).";
    $this->pdf->SetXY(105,10);
    $this->pdf->Cell(90,12, utf8_decode(" "),1,0,'L',0);
    $this->pdf->SetXY(105,10);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text16),0,'J',0);
    $this->pdf->Ln(6);
    // $this->pdf->Ln(5);

    $sample_text17="17.Dictamen de Factibilidad de Servicios Hidráulicos. (Original y copia).";
    $this->pdf->MultiCell(90,6,utf8_decode($sample_text17),'BLR','J',0);

    $sample_text18="18.Dictamen favorable del estudio del impacto urbano o impacto urbano- ambiental, en su caso. (original y copia).";
    $this->pdf->SetXY(105,22);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text18),'BR','J',0);

    $sample_text19="19.Presentar acuse de recibo de la Declaratoria Ambiental ante la Secretaría del Medio Ambiente, cuando se trate de proyectos habitacionales de más de 20 viviendas. (Original y copia).";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text19),'BLR','J',0);

    $sample_text20="20.En zonas de conservación patrimonial con valor histórico, artístico o arqueológico, licencia del Instituto Nacional de Antropología e Historia, visto bueno del Instituto Nacional de Bellas Artes o dictamen de la Secretaría de Desarrollo Urbano y Vivienda, en su caso. (Original y copia).";
    $this->pdf->SetXY(105,28);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text20),'BR','J',0);

    $sample_text21="21.Constancia de Adeudos de Predial y Agua emitida por la Administración Tributaria y el Sistema de Aguas de la Ciudad de México en la que se acredite que se encuentran al corriente de sus obligaciones. (Original y copia.";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text21),'BLR','J',0);

    $sample_text22="22.Identificación oficial con fotografía (carta de naturalización o cartilla de servicio militar o cédula profesional o pasaporte o certificado de nacionalidad mexicana o credencial para votar o licencia para conducir) Original y copia.";
    $this->pdf->SetXY(105,40);
    $this->pdf->MultiCell(0,4,utf8_decode($sample_text22),'BR','J',0);

    $sample_text23="23.Documento con el que se acredite la personalidad, en los casos de representante legal. (Original y copia).";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text23),'BLR','J',0);

    $sample_text24=" ";
    $this->pdf->SetXY(105,52);
    $this->pdf->MultiCell(0,8,utf8_decode($sample_text24),'BR','J',0);
    $this->pdf->Ln(1);

    ##########################

    ## FUNDAMENTO  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('FUNDAMENTO JURÍDICO'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);

    $sample_text ="Ley Orgánica de la Administración Pública del Distrito Federal.- Artículo 39 fracción II.";
    // $this->pdf->SetXY(13,63);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text),'L','L');
    $this->pdf->MultiCell(90,10,utf8_decode($sample_text),1,'J',0);
    
    $sample_text2="Reglamento Interior de la Administración Pública del Distrito Federal.- Artículo 50 A fracción XXIX.";
    $this->pdf->SetXY(105,66);
    // $this->pdf->MultiCellBlt(86,3,"",utf8_decode($sample_text2),'R','L');
    $this->pdf->MultiCell(90,5,utf8_decode($sample_text2),1,'J',0);

    $sample_text3 ="Reglamento de Construcciones para el Distrito Federal.- Artículos 3 fracciones IV y VIII, 36, 38, 47, 48, 51 fracciones II y III, 53, 54 fracción III, 61, 64, 65 y 70.";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text3),1,'J',0);
    
    $sample_text4="Ley de Desarrollo Urbano del Distrito Federal.- Artículos 7 fracción VII, XVIII, 8 fraccion IV, 47 Quater fracción XVI, inciso c) y 87 fracción VI.";
    $this->pdf->SetXY(105,76);
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text4),1,'J',0);

    $sample_text5 ="Código Fiscal de la Ciudad de México.- Artículos 20, 181, 182, 300, 301 y 302.";
    $this->pdf->MultiCell(90,5,utf8_decode($sample_text5),1,'J',0);
    
    $sample_text6=" ";
    $this->pdf->SetXY(105,84);
    $this->pdf->MultiCell(90,5,utf8_decode($sample_text6),1,'J',0);
    $this->pdf->Ln(1);

    ##########################
    
    #### Segunda parte #######
    $sample_text17="Costo: Artículo, fracción, inciso, subinciso del Código Fiscal de la Ciudad de México.";
    $this->pdf->MultiCell(70,3,utf8_decode($sample_text17),1,'J',0);

    $sample_text18="Artículo 185 apartado A) fracción II, incisos a), b), fracción III, incisos a), b), apartado B) fracción I, incisos a), b), fracción II, incisos a) y b) del Código Fiscal de la Ciudad de México.";
    $this->pdf->SetXY(85,90);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text18),1,'J',0);

    $sample_text19="Documento a obtener.";
    $this->pdf->MultiCell(70,4,utf8_decode($sample_text19),1,'J',0);

    $sample_text20="Registro de manifestación de construcción tipo B o C.";
    $this->pdf->SetXY(85,95);
    $this->pdf->MultiCell(0,5,utf8_decode($sample_text20),'R','J',0);

    $sample_text20="Vigencia del documento a obtener.";
    $this->pdf->MultiCell(70,5,utf8_decode($sample_text20),'L','J',0);

    $sample_text21="de 1 a 3 años.";
    $this->pdf->SetXY(85,100);
    $this->pdf->MultiCell(0,5,utf8_decode($sample_text21),1,'J',0);

    $sample_text22="Procedencia de la Afirmativa o Negativa Ficta.";
    $this->pdf->MultiCell(70,4,utf8_decode($sample_text22),1,'J',0);

    $sample_text23="Afirmativa ficta, No procede; Negativa ficta, No procede.";
    $this->pdf->SetXY(85,105);
    $this->pdf->MultiCell(0,4,utf8_decode($sample_text23),1,'J',0);
    $this->pdf->Ln(1);
    ##########################

    ## DATOS DEL PREDIO  ####
    // $calle_predio = 'Cincel';
    // $no_ext_predio = '85';
    // $no_int_predio = "'B'";
    // $colonia_predio = "Sevilla";
    // $delegacion_predio = 'Venustiano Carranza';
    // $cp_predio = '91680';
    // $cuenta_predio = '12312312' ;
    // $superficie_predio = '30';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('DATOS DEL PREDIO'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(10,5, utf8_decode("Calle: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode($calle),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("No. Exterior: "),0,0,'L',0);
    $this->pdf->Cell(26,5, utf8_decode($numeroexterno),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("No. Interior: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($numerointerno),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(15,5,utf8_decode("Colonia:"),'L',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($colonia),'R',0,'L',0); //dato
    $this->pdf->Ln(5);

    $this->pdf->Cell(20,5, utf8_decode("Delegación: "),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($delegacion),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("C.P.: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($codigopostal),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode("Cuenta Catastral: "),'BL',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($cuentapredio),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode("Superficie(m2): "),'B',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($superficie),'RB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################

    ## Título de propiedad ####
    // $escritura_publica_prop = "Sevilla";
    // $notario_prop = 'Cincel';
    // $num_prop = '85';
    // $entidad_prop = 'Venustiano Carranza';
    // $folio_prop = 'Venustiano Carranza';
    // $fecha_prop = '12312312';
    // $otro_doc_prop = '30';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('Título de propiedad o documento con el que se acredita la legal posesión'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(25,5,utf8_decode("Escritura Pública No:"),'L',0,'L',0);
    $this->pdf->Cell(0,5,utf8_decode($folio1 ),'R',0,'L',0); //dato
    $this->pdf->Ln(5);

    $this->pdf->Cell(10,5, utf8_decode("Notario: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode(strtoupper($notario)),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode("No.: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($numeronotario),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(27,5, utf8_decode("Entidad Federativa: "),'L',0,'L',0);
    $this->pdf->Cell(00,5, utf8_decode(strtoupper($estado)),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(85,5, utf8_decode("Folio de Inscripción en el Registro Público de la Propiedad y de Comercio: "),'L',0,'L',0);
    $this->pdf->Cell(00,5, utf8_decode($foliorrp),'R',0,'L',0);//dato Nombres

    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode("Fecha: "),'BL',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($fechacreacion),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode("Otro documento: "),'B',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode(strtoupper($otrodocumento)),'RB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################
    ## DRO  ####
    $nombre_dro = strtoupper($dro_nombre." ".$dro_apellido_paterno." ".$dro_apellido_materno);//'Cincel';
    $registro_dro = $dro_idpersona;//'85';
    $domicilio_completo_dro = strtoupper($dro_calle." #".$dro_num_ext." ".$dro_num_int." ".$dro_colonia." ".$dro_del." CP".$dro_codpos);//'Venustiano Carranza';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('DIRECTOR RESPONSABLE DE OBRA'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(10,5, utf8_decode("Nombre: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode($nombre_dro),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode("Registro No.: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($registro_dro),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,5, utf8_decode("Domicilio completo, incluyendo calle, número, colonia, Delegación y C.P.: "),'LR',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(00,5, utf8_decode($domicilio_completo_dro),'RLB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################

    ## Corresponsable SE ####
    $nombre_se = strtoupper($cse_nombre." ".$cse_apellido_paterno." ".$cse_apellido_materno);//'Cincel';
    $registro_se = $cse_idpersona;//'85';
    $domicilio_completo_se = strtoupper($cse_calle." #".$cse_num_ext." ".$cse_num_int." ".$cse_colonia." ".$cse_del." CP".$cse_codpos);//'Venustiano Carranza';    
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('CORRESPONSABLE EN SEGURIDAD ESTRUCTURAL'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(10,5, utf8_decode("Nombre: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode($nombre_se),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode("Registro No.: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($registro_se),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,5, utf8_decode("Domicilio completo, incluyendo calle, número, colonia, Delegación y C.P.: "),'LR',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(00,5, utf8_decode($domicilio_completo_se),'RLB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################
    #
    ## Corresponsable DUyA ####
    $nombre_DUyA = strtoupper($cdu_nombre." ".$cdu_apellido_paterno." ".$cdu_apellido_materno);//'Cincel';
    $registro_DUyA = $cdu_idpersona;//'85';
    $domicilio_completo_DUyA = strtoupper($cdu_calle." #".$cdu_num_ext." ".$cdu_num_int." ".$cdu_colonia." ".$cdu_del." CP".$cdu_codpos);//'Venustiano Carranza';    
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('CORRESPONSABLE EN DISEÑO URBANO Y ARQUITECTÓNICO'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(10,5, utf8_decode("Nombre: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode($nombre_DUyA),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode("Registro No.: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($registro_DUyA),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,5, utf8_decode("Domicilio completo, incluyendo calle, número, colonia, Delegación y C.P.: "),'LR',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(00,5, utf8_decode($domicilio_completo_DUyA),'RLB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################
    #
    ## Corresponsable Instalaciones ####
    $nombre_CeI = strtoupper($ci_nombre." ".$ci_apellido_paterno." ".$ci_apellido_materno);//'Cincel';
    $registro_CeI = $ci_idpersona;//'85';
    $domicilio_completo_CeI = strtoupper($ci_calle." #".$ci_num_ext." ".$ci_num_int." ".$ci_colonia." ".$ci_del." CP".$ci_codpos);//'Venustiano Carranza';    
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('CORRESPONSABLE EN INSTALACIONES'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(10,5, utf8_decode("Nombre: "),'L',0,'L',0);
    $this->pdf->Cell(90,5, utf8_decode($nombre_CeI),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode("Registro No.: "),0,0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($registro_CeI),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,5, utf8_decode("Domicilio completo, incluyendo calle, número, colonia, Delegación y C.P.: "),'LR',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(00,5, utf8_decode($domicilio_completo_CeI),'RLB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################
    
    $this->pdf->addPage();//Salto
    if($borrador == 1){
        $this->pdf->SetFont('Arial','B',50);
        $this->pdf->SetTextColor(255,192,203);
        $this->pdf->RotatedText(35,190,'     B  O  R  R  A  D  O  R     ',45);
        $this->pdf->SetTextColor(0,0,0);
    }
    ## Caracteristicas de la obra ####
    // echo $idsubproceso; exit();
    switch ($idsubproceso) {
        case 1:
            $tipo_obraN = "X";
            $tipo_obraA = " ";
            $tipo_obraM = " ";
            $tipo_obraR = " ";
        break;
        case 2:
            $tipo_obraN = " ";
            $tipo_obraA = "X";
            $tipo_obraM = " ";
            $tipo_obraR = " ";
        break;
        case 3:
            $tipo_obraN = " ";
            $tipo_obraA = " ";
            $tipo_obraM = "X";
            $tipo_obraR = " ";
        break;
        case 4:
            $tipo_obraN = " ";
            $tipo_obraA = " ";
            $tipo_obraM = " ";
            $tipo_obraR = "X";
        break;
    }
    // $zonificacion = '85'; 
    // $destino =  '85';
    // $dictamenIUN = 'Dictamen numero 12312312';
    // $fechaIUN = '30/11/2018';
    // $manifestacionIUA ='Dictamen numero 12312312';
    // $fechaIUA = '30/11/2018';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('CARACTERÍSTICAS GENERALES DE LA OBRA'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(35,5, utf8_decode("Tipo de obra"),1,0,'L',0);
    $this->pdf->Cell(5,5, utf8_decode($tipo_obraN),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode('Nueva'),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(5,5, utf8_decode($tipo_obraA),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(35,5, utf8_decode('Ampliacipon'),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(5,5, utf8_decode($tipo_obraR),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(35,5, utf8_decode('Reparación'),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(5,5, utf8_decode($tipo_obraM),1,0,'L',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('Modificación'),1,0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(20,5, utf8_decode("Zonificación: "),'L',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode(strtoupper($zonificacion)),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(20,5, utf8_decode("Uso o destino: "),'L',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode(strtoupper($usodestino)),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(42,5, utf8_decode("Dictamen de Impacto urbano número: "),'L',0,'L',0);
    $this->pdf->Cell(82,5, utf8_decode(strtoupper($impactourbano) ),'',0,'L',0);//dato Nombres
    $this->pdf->Cell(12,5, utf8_decode("de fecha: "),'',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($fechaimpactourbano ),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(54,5, utf8_decode("Manifestación o Dictamén de Impacto Ambiental: "),'BL',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode(strtoupper($impactomedioambiente) ),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(12,5, utf8_decode("de fecha: "),'B',0,'L',0);
    $this->pdf->Cell(0,5, utf8_decode($fechaimpactomedioambiente ),'RB',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################
    
    ## Caracteristicas de la obra ####
    // $superficie_predio_CEO = '100x499x20';
    // $superficie_total_CEO ='85' ;
    // $superfice_desplante_CEO = '100';
    // $porcentaje_desplante_CEO = "100 ";
    // $area_libre_desplante_CEO = '22';
    // $porcentaje_area_desplante_CEO ='50';
    // $numero_niveles_CEO = '12';
    if ($semisotano == 1) {
        $si_CEO = 'X';
        $no_CEO = ' ';
    }else{
        $si_CEO = ' ';
        $no_CEO = 'X';
    }
    // $numero_sotano_CEO = '4';
    // $num_viviendas_CEO = "100";
    // $esta_cub_CEO ='1';
    // $esta_descub_CEO ='85';
    // $cajones_esta_CEO = '500';
    // $altura_max_CEO = '85';
    // $super_habi_CEO ='10';
    // $super_const_CEO='85';
    // $super_habi_sob_CEO = '500 metros';
    // $super_const_sob_CEO = '85';
    // $super_uso_hab_CEO='500 metros';
    // $super_uso_dis_CEO='85';
    // $viviendaA='900';
    // $viviendaB='85';
    // $viviendaC='85';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('CARACTERÍSTICAS ESPECÍFICAS DE LA OBRA'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(24,5, utf8_decode("Superficie del predio: "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($superficiepredio),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(36,5, utf8_decode("Superficie total por construir: "),0,0,'R',0);
    $this->pdf->Cell(37,5, utf8_decode($superficietotal_m2),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(24,5, utf8_decode("Superficie de desplante: "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($superficiedesplante),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(15,5, utf8_decode($superficietotal1),0,0,'R',0);
    $this->pdf->Cell(26,5, utf8_decode('%'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode('Area libre'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(16,5, utf8_decode($arealibre_m2),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode($arealibre),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('%'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(23,5, utf8_decode("Número de niveles: "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($numeroniveles),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(35,5, utf8_decode('Semisótano'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(20,5, utf8_decode(''),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode("Si "),0,0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($si_CEO),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode('No'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($no_CEO),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(24,5, utf8_decode("Número de sótanos: "),'L',0,'L',0);
    $this->pdf->Cell(39,5, utf8_decode($numerosotanos),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(14,5, utf8_decode('  '),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(64,5, utf8_decode('Número de viviendas'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($numeroviviendas),'R',0,'L',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(24,5, utf8_decode("Estacionamiento cubierto: "),'L',0,'L',0);
    $this->pdf->Cell(39,5, utf8_decode($estacionamientocubierto),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(14,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(39,5, utf8_decode("Estacionamiento descubierto: "),0,0,'L',0);
    $this->pdf->Cell(31,5, utf8_decode($estacionamientonocubierto),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(33,5, utf8_decode("Cajones de estacionamiento: "),'L',0,'L',0);
    $this->pdf->Cell(32,5, utf8_decode($cajonesestacionamiento),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(58,5, utf8_decode("Altura máxima sobre nivel de banqueta: "),0,0,'R',0);
    $this->pdf->Cell(24,5, utf8_decode($alturamaximabanqueta),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('ml'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(50,5, utf8_decode("Superficie habitable bajo nivel de banqueta: "),'L',0,'L',0);
    $this->pdf->Cell(14,5, utf8_decode($superficiebajobanqueta),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(13,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(50,5, utf8_decode("Superficie de construcción total bajo nivel de banqueta: "),0,0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($superficieconstbajobanq),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(50,5, utf8_decode("Superficie habitable sobre nivel de banqueta: "),'L',0,'L',0);
    $this->pdf->Cell(14,5, utf8_decode($superficiesobrebanqueta),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(13,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(50,5, utf8_decode("Superficie de construcción total sobre nivel de banqueta: "),0,0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($superficieconstsobrebanq),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(23,5, utf8_decode("Superficie de uso habitaciona: "),'L',0,'L',0);
    $this->pdf->Cell(41,5, utf8_decode($superficiehabitacional),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(13,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(50,5, utf8_decode("Superficie de uso distinto al habitacional: "),0,0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($superficienohabitacional),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(14,5, utf8_decode("Vivienda Tipo 'A' "),'LB',0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($vivienda),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(15,5, utf8_decode('m2'),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(14,5, utf8_decode("Vivienda Tipo 'B': "),'B',0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($viviendab),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(15,5, utf8_decode('m2'),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(14,5, utf8_decode("Vivienda Tipo 'C': "),'B',0,'L',0);
    $this->pdf->Cell(20,5, utf8_decode($viviendac),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'BR',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################
    #
    ## En caso ampliacion ####
    // $superficie_const = '100x499x20';
    // $superficie_apliar = '85';
    // $superficie_modificar = '100x499x20';
    // $superficei_total = '85';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('En caso de ampliación y/o modificación:'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(30,5, utf8_decode("Superficie de construcción existente: "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($superficiecontruida),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(8,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(36,5, utf8_decode("Superficie a ampliar: "),0,0,'L',0);
    $this->pdf->Cell(37,5, utf8_decode($superficieexpansion),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(30,5, utf8_decode("Superficie a modificar: "),'BL',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($superficiemodificada),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(8,5, utf8_decode('m2'),'B',0,'L',0);//dato Nombres
    $this->pdf->Cell(36,5, utf8_decode("Superficie total (existente + ampliación): "),'B',0,'L',0);
    $this->pdf->Cell(37,5, utf8_decode($superficietotal),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'BR',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################

    ## En caso de rerparacion ####
    // $superficie_const_exist = '100x499x20';
    // $superfice_repara = '85';
    // $reparacion_consi = 'La reparacion consite en .................';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('En caso de reparación:'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(30,5, utf8_decode("Superficie de construcción existente: "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($superficiecontruida1),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(8,5, utf8_decode('m2'),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(36,5, utf8_decode("Superficie a reparar: "),0,0,'L',0);
    $this->pdf->Cell(37,5, utf8_decode($superficiereparacion),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode('m2'),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,5, utf8_decode("Reparación consistente en: "),'RL',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(0,5, utf8_decode($reparacionabulladuras),'RBL',0,'L',0);//dato Nombres
    
    $this->pdf->Ln(6);
    ##########################

    ## En caso de rerparacion ####
    // $nume_licencia = '100x499x20';
    // $fecha_licencia = '85';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('Licencia de Construcción o Registro de Obra Ejecutada o Manifestación de Construcción anterior, en su caso:'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(30,5, utf8_decode("Número: "),'LB',0,'R',0);
    $this->pdf->Cell(40,5, utf8_decode($numero_lrm),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(60,5, utf8_decode("Fecha de expedición: "),'B',0,'C',0);
    $this->pdf->Cell(0,5, utf8_decode($fecha_expedicion),'BR',0,'L',0);//dato Nombres
    $this->pdf->Ln(6);
    ##########################

    ## Importe  de los pagos ####
    // $costo1 = 40502020;
    // $costo2 = 40502020;
    // $costo3 = 40502020;
    // $costo4 = 40502020;
    // $costo5 = 40502020;
    // $costo6 = 40502020;
    // $costo7 = 40502020;
    // $costo_total = $costo1+$costo2+$costo3+$costo4+$costo5+$costo6+$costo7;
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('IMPORTE DE LOS PAGOS PREVISTOS EN EL CODIGO FISCAL DE LA CIUDAD DE MÉXICO:'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(120,5, utf8_decode("Instalación de toma de agua de y drenaje (Art. 181 del Código Fiscal de la Ciudad de México): "),'L',0,'L',0);
    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadart181),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(120,5, utf8_decode("Autorización de uso de las redes de agua y drenaje (Art. 182 del Código Fiscal de la Ciudad de México): "),'L',0,'L',0);
    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadart182),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(120,5, utf8_decode("Registro de Manifestación tipo B o C (Art. 185 apartado A fracciones II y III y apartado B del Código Fiscal de la Ciudad de México): "),'L',0,'L',0);
    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadart185),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(120,5, utf8_decode("Aprovechamientos para mitigar afectaciones ambientales (Art. 300 del Código Fiscal de la Ciudad de México): "),'L',0,'L',0);
    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadart300),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(120,5, utf8_decode("Aprovechamientos para mitigar afectaciones viales (Art. 301 del Código Fiscal de la Ciudad de México): "),'L',0,'L',0);
    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadart301),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,5, utf8_decode("Aprovechamientos para prestar servicios relacionados en la infraestructura hidráulica, construcción de nuevas conexiones de "),'LR',0,'L',0);
    $this->pdf->SetXY(15,186);
    $this->pdf->Cell(120,5, utf8_decode("agua y drenaje o ampliaciones (Art. 302 del Código Fiscal de la Ciudad de México): "),'L',0,'L',0);

    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadart302),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(120,5, utf8_decode("Otros: ".$otracantidad),'L',0,'L',0);
    // $this->pdf->MultiCell(10,1, "prueba",0,'J',0);
    $this->pdf->Cell(30,5, utf8_decode('$'),0,0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadotro),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(120,5, utf8_decode("Importe total"),'BL',0,'R',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(30,5, utf8_decode('$'),'B',0,'R',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode($cantidadtotal),'BR',0,'C',0);
    $this->pdf->Ln(6);
    ##########################

    ## Texto de declaracion ####
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->MultiCell(0,3, utf8_decode("Declaro haber cumplido con todas y cada una de las disposiciones que se establecen en el Reglamento de Construcciones para el Distrito Federal y demás ordenamientos legales aplicables en la materia."),0,'J',0);
    $this->pdf->Ln(1);
    ##########################

    ## En caso de rerparacion ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('NOMBRES Y FIRMAS:'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(60,5, utf8_decode(" "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode('Nombre'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode("Firma"),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->SetXY(15, 220);
    $this->pdf->Cell(60,10, utf8_decode("Propietario, poseedor o interesado: "),'L',0,'L',0);
    $this->pdf->SetXY(75, 222);
    $this->pdf->Cell(40,5, utf8_decode(strtoupper($prop_nombre." ".$prop_apellido_paterno." ".$prop_apellido_materno)),0,0,'C',0);//dato Nombres
    $this->pdf->SetXY(75, 220);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->SetXY(15, 227);
    $this->pdf->Cell(60,10, utf8_decode("Representante legal: "),'L',0,'L',0);
    $this->pdf->SetXY(75, 229);
    $this->pdf->Cell(40,5, utf8_decode(strtoupper($rep_nombre." ".$rep_apellido_paterno." ".$rep_apellido_materno)),0,0,'C',0);//dato Nombres
    $this->pdf->SetXY(75, 227);
    $this->pdf->Cell(40,10, utf8_decode("________________________________"),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->SetXY(15, 234);
    $this->pdf->Cell(60,10, utf8_decode("Director responsable de obra: "),'L',0,'L',0);
    $this->pdf->SetXY(75, 234);
    $this->pdf->Cell(40,10, utf8_decode(strtoupper($dro_nombre." ".$dro_apellido_paterno." ".$dro_apellido_materno)),0,0,'C',0);//dato Nombres
    $this->pdf->SetXY(75, 234);
    $this->pdf->Cell(40,10, utf8_decode("________________________________"),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->SetXY(15, 241);
    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en seguridad estructura: "),'L',0,'L',0);
    $this->pdf->SetXY(75, 241);
    $this->pdf->Cell(40,10, utf8_decode(strtoupper($cse_nombre." ".$cse_apellido_paterno." ".$cse_apellido_materno)),0,0,'C',0);//dato Nombres
    $this->pdf->SetXY(75, 241);
    $this->pdf->Cell(40,10, utf8_decode("________________________________"),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->SetXY(15, 248);
    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en diseño urbano y arquitectónico: "),'L',0,'L',0);
    $this->pdf->SetXY(75, 248);
    $this->pdf->Cell(40,10, utf8_decode(strtoupper($cdu_nombre." ".$cdu_apellido_paterno." ".$cdu_apellido_materno)),0,0,'C',0);//dato Nombres
    $this->pdf->SetXY(75, 248);
    $this->pdf->Cell(40,10, utf8_decode("________________________________"),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->SetXY(15, 255);
    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en instalaciones: "),'BL',0,'L',0);
    $this->pdf->SetXY(75, 255);
    $this->pdf->Cell(40,10, utf8_decode(strtoupper($ci_nombre." ".$ci_apellido_paterno." ".$ci_apellido_materno)),0,0,'C',0);//dato Nombres
    $this->pdf->SetXY(75, 255);
    $this->pdf->Cell(40,10, utf8_decode("________________________________"),'B',0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'BR',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->addPage();//Salto
    if($borrador == 1){
        $this->pdf->SetFont('Arial','B',50);
        $this->pdf->SetTextColor(255,192,203);
        $this->pdf->RotatedText(35,190,'     B  O  R  R  A  D  O  R     ',45);
        $this->pdf->SetTextColor(0,0,0);
    }
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Ln(7);
    $this->pdf->SetXY(15, 14);  
    $this->pdf->MultiCell(0,72, utf8_decode("Observaciones"),1,'L',0);
    $this->pdf->SetXY(35, 15);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->MultiCell(0,3, utf8_decode("a) Es obligación del director responsable de obra, colocar en la obra, en lugar visible y legible desde la vía pública, un letrero con el número de registro de la manifestación de construcción, datos generales de la obra, ubicación y vigencia de la misma.    
b) Presentado el aviso de terminación de obra, en caso de proceder, la autoridad otorgará la autorización de uso y ocupación.
c) Sí el predio se localiza en dos o más Delegaciones se gestionará en la Ventanilla Única de la Secretaría de Desarrollo Urbano y Vivienda.
d) El plazo máximo de respuesta en los siguientes supuestos es: Registro.- Inmediato; Prórroga.- 3 días hábiles; Aviso de Terminación de Obra.- 5 días hábiles.
e) En el Registro de Manifestación de Construcción tipo B o C procede la negativa ficta, mientras que en la autorización de la prórroga, procederá la afirmativa ficta.
f) Es obligación del solicitante informar a la Secretaría de Desarrollo Urbano y Vivienda o a la Delegación, correspondiente, el cambio de alguna de las circunstancias de origen.
g) Dentro de los 15 días hábiles anteriores al vencimiento de la vigencia del registro de manifestación de construcción, el propietario o poseedor, en caso necesario, podrá presentar ante la Secretaría de Desarrollo Urbano y Vivienda o la Delegación en el formato que la misma establezca, la solicitud de prórroga.
h) Por cada manifestación de construcción podrán otorgarse hasta dos prórrogas.
i) De la documentación se requerirán dos tantos, uno quedará en poder de la Secretaría de Desarrollo Urbano y Vivienda o la Delegación y el otro en poder del propietario o poseedor, quien entregará una copia de los mismos para su uso en la obra.
j) Se podrá dar aviso de terminación de obra parcial, para ocupación en edificaciones que operen y funcionen independientemente del resto de la obra, las cuales deben garantizar que cuentan con los equipos de seguridad necesarios y que cumplen con los requerimientos de habitabilidad y seguridad establecidos en el Reglamento.
k) No se registrará la manifestación de construcción cuando le falte cualquiera de los datos o documentos requeridos en este formato, o cuando el predio o inmueble se localice en suelo de conservación, de conformidad con los artículos 47 y 48 del Reglamento de Construcciones para el Distrito Federal y quedarán sin efecto los registros de manifestación registrados, cuando se reincida en falsedad de los datos o documentos proporcionados de acuerdo con la Ley de Procedimiento Administrativo del Distrito Federal."),0,'J',0);
    $this->pdf->Ln(5);
    ##########################

    ## Texto presente hoja ####
    $datov = explode("-", $fecha_venc);  
    $fechaVDia = $datov[0];//date('d'); // es la fecha en que le da imprimir ¿? 
    $fechaVMes = $datov[1];//date('F'); // es la fecha en que le da imprimir ¿? 
    $fechaVAnio =  "20".$datov[2];//date('Y'); // es la fecha en que le da imprimir ¿? 

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->MultiCell(0,3, utf8_decode("LA PRESENTE HOJA FORMA PARTE INTEGRANTE DE LA SOLICITUD DEL TRÁMITE REGISTRO DE MANIFESTACIÓN DE CONSTRUCCIÓN TIPO ".$tipo.", N° ".$folio." DE FECHA DE EXPEDICIÓN ".$fechaDia." DE ".$fechaMes." DE ".$fechaAnio.", CON VIGENCIA AL ".$fechaVDia." DE ".$fechaVMes." DE ".$fechaVAnio."."),0,'J',1);
    $this->pdf->Ln(6);
    ##########################
    #
    ## Texto presente hoja ####
    $area = "";//'INFORMATICA';
    $nombrecompleto = "";//'Mario Antonio Rivera Jacinto';
    $cargo = "";//'Analista Programador';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(20,6, utf8_decode('Recibió '),'LT',0,'R','1');
    $this->pdf->SetFont('Arial', 'I', 7);
    $this->pdf->Cell(70,6, utf8_decode('(para ser llenado por la autoridad)'),'TR',0,'L','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(20,5, utf8_decode('Área'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($area),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Nombre'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($nombrecompleto),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Cargo'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($cargo),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Firma'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode(' '),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,15, utf8_decode(''),'LB',0,'L',0);
    $this->pdf->Cell(70,15, utf8_decode(' '),'RB',0,'L',0);

    $this->pdf->SetXY(108,101);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->MultiCell(87,5,utf8_decode("Sello de recepción"),'LTR','J',1);
    $this->pdf->SetXY(108,105);
    $this->pdf->MultiCell(0,36, utf8_decode(' '),'RBL','L',0);
    $this->pdf->Ln(6);
    ##########################
    #
    ## Texto presente hoja ####
    $this->pdf->SetXY(70,150);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Image(APPPATH.'/third_party/imagenes/telefonito.JPG',55,150,15);
    // $this->pdf->Image(APPPATH.'../temp/qrcode.png',15,150,27);
    // echo '<img src="'.base_url().'temp/qrcode.png" />';
    $this->pdf->Cell(0,5, utf8_decode("    QUEJAS O DENUNCUAS"),0,0,'L',0);
    $this->pdf->SetXY(70,154);
    $this->pdf->Cell(0,4, utf8_decode(" "),0,0,'L',1);
    $this->pdf->SetXY(70,158);
    $this->pdf->Cell(27,5, utf8_decode("QUEJATEL LOCATEL "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(15,5, utf8_decode("56 58 11 11, "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(17,5, utf8_decode("HONESTEL  "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(0,5, utf8_decode("55 33 55 33."),0,0,'L',0);
    $this->pdf->Ln(4);
    $this->pdf->SetXY(70,163);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(14,5, utf8_decode("DENUNCIA "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(31,5, utf8_decode("irregularidades a través del "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(39,5, utf8_decode("Sistema de Denuncia Ciudadana "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(35,5, utf8_decode("vía Internet a la dirección "),0,0,'L',0);
    $this->pdf->Ln(4);
    $this->pdf->SetXY(70,168);
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Cell(12,5, utf8_decode("electrónica "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode("http://www.anticorrupcion.cdmx.gob.mx/index.php/sistema-de-denuncia-ciudadana"),0,0,'L',0);
    $this->pdf->Ln(6);
    ##########################

    $this->pdf->Ln(9);   
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("MANIFESTACION_CONSTRUCCIO.pdf", 'I');
  }

  public function Prorroga($folio,$clave,$nombre_tramite,$manifiestoB,$manifiestoC,$fechaDia,$fechaMes,$fechaAnio,$director,$numero1,$fecha_exp,$fecha_venc,$num_pro_sol,$porcenta_avan,$txt3,$num_registro,$tipo_manifestacion,$dia,$mes,$anio,$numero,$fecha,$area,$nombrecompleto,$cargo)
  {
    // Se carga el modelo alumno
    // $this->load->model('alumno_modelo');
    // Se carga la libreria fpdf
    $this->load->library('pdf');
 
    $this->pdf = new Pdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    $this->pdf->SetTitle(utf8_decode("Prórroga del registro"));
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
    
    $folio = "TSEDUVI-CGDAU";
    $clave = "TSEDUVI-CGDAU_RMC_2";
    $nombre_tramite = "REGISTRO DE MANIFESTACION DE CONTRUCCION TIPO 'B' O 'C' ";
    $manifiestoB = "'SI'";
    $manifiestoC = "'NO'";
    $fechaDia = date('d');
    $fechaMes = date('F');
    $fechaAnio =  date('Y');
    $director = "Pedro Valdes";
    $numero1 = "98765456";
    $fecha_exp = "18/30/2019 ";
    $fecha_venc = "24/03/2019 ";
    $num_pro_sol = "0987893";
    $porcenta_avan = " 50% ";
    $this->pdf->SetFont('Arial', '', 6.5);
    $this->pdf->SetXY(160, 12);
    $this->pdf->Cell(15, 6, utf8_decode($folio), 0 , 1);//dato Folio
    $this->pdf->SetXY(160, 17);
    $this->pdf->Cell(15, 6, utf8_decode($clave), 0 , 1);//dato Clave

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(15,6,utf8_decode("NOMBRE DEL TRÁMITE: "));
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->SetXY(70, 23);
    $this->pdf->Cell(15, 6, utf8_decode($nombre_tramite), 0 , 1);//dato Nombre Tramite
    $this->pdf->Ln(2);

    $this->pdf->SetXY(30, 30);
    $this->pdf->Cell(15, 6, utf8_decode("MANIFESTACIÓN DE CONSTRUCCIÓN 'B' "), 0 , 1);
    $this->pdf->SetXY(90, 30);
    $this->pdf->Cell(15, 6, utf8_decode($manifiestoB), 0 , 1);//dato B
    $this->pdf->SetXY(115, 30);
    $this->pdf->Cell(15, 6, utf8_decode("MANIFESTACIÓN DE CONSTRUCCIÓN 'C' "), 0 , 1);
    $this->pdf->SetXY(170, 30);
    $this->pdf->Cell(15, 6, utf8_decode($manifiestoC), 0 , 1);//dato C
    $this->pdf->Ln(1);

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(15, 7, utf8_decode("Ciudad de México,  a "), 0 , 1);
    $this->pdf->SetXY(43, 37.5);
    $this->pdf->Cell(15, 6, $fechaDia, 0 , 1);//dato dia
    $this->pdf->SetXY(55, 37.5);
    $this->pdf->Cell(15, 6, 'de', 0 , 1);
    $this->pdf->SetXY(68, 37.5);
    $this->pdf->Cell(15, 6, $fechaMes, 0 , 1);//dato mes
    $this->pdf->SetXY(85, 37.5);
    $this->pdf->Cell(15, 6, 'de', 0 , 1);
    $this->pdf->SetXY(90, 37.5);
    $this->pdf->Cell(15, 6, $fechaAnio, 0 , 1);//dato año 

    $this->pdf->Cell(15, 6, utf8_decode("Director General de Administración Urbana "), 0 , 1);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->SetXY(70, 43.4);
    $this->pdf->Cell(15, 6, utf8_decode($director), 0 , 1);//dato Director

    $this->pdf->SetFont('Arial', '', 7);
    $txt2 = utf8_decode("Los que suscribimos la presente con la personalidad que tenemos reconocida en este expediente, venimos a prorrogar el registro de manifestación de construcción tipo B o C: ");
    $this->pdf->MultiCell(0,3,$txt2);

    $this->pdf->Cell(6, 3, utf8_decode("No. "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode($numero1),0,0,'L',0);
    $this->pdf->Cell(30, 3, utf8_decode("con fecha de expedición "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode($fecha_exp),0,0,'L',0);
    $this->pdf->Cell(30, 3, utf8_decode("y fecha de vencimiento "),0,0,'L',0);
    $this->pdf->Cell(0, 3, utf8_decode($fecha_venc),0,0,'L',0);
    $this->pdf->Ln(5);

    // $this->pdf->Cell(6, 3, utf8_decode("No. "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode("Número de Prórroga solicitada "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode($num_pro_sol),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode("Porcentaje de avance de la obra "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode($porcenta_avan),0,0,'L',0);
    $this->pdf->Cell(0, 3, utf8_decode("%"),0,0,'L',0);
    $this->pdf->Ln(5);

    ## Informacion al interesado  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('Descripción de los trabajos que se van a llevar a cabo para concluir la obra'),1,0,'L','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 6);
    $variable1 = "De la PLataforma del SIG CDMX ";
    $variable2 = "recabar toda la informacion de las dependencias de gobierno respectiva a las afectaciones del sismo  ";
    $variable3 = "brindar informacion a la ciudadania con respecto a los hogares afectados por el sismo";
    $variable4 = "traves de la pagina web o portal web ";
    $variable5 = "para poder obtener su apoyo ";
    $variable6 = "Pedro";
    $variable7 = "De la persona  que los brindo Mario Rivera ";
    $txt3 = utf8_decode("Los datos personales recabados seran protegidos, incorporados y tratados en el Sistema de Datos Personales ".$variable1." el cual tiene su fundamento en ".$variable2.", y cuya finalidad es ".$variable3." y podrán ser transmitidos a ".$variable4.", además de otras trasmisiones previstas en la Ley de Protección de Datos Personales para el Distrito Federal. Con excepción del teléfono y correo electrónico particulares, los demás datos son obligatorios y sin ellos no podrá acceder al servicio o completar el trámite".$variable5." Asimismo, se le informa que sus datos no podrán ser difundidos sin su consentimiento expreso salvo excepciones  previstas en la ley. El responsable del Sistema de Datos Personales es ".$variable6.", y la dirección donde podrá ejercer los derechos de acceso, rectificación, cancelación y oposición, asi como la revoacion del consentimiento es ".$variable7." El titular de los datos podrá dirigirse al Instituto de Acceso a la Información Pública y Protección de Datos Personales del Distrito Federal, donde recibirá asesoría sobre los derechos que tutela la Ley de Protección de Datos Personales para el Distrito Federal al teléfono 56 36 46 36; correo electrónico: datospersonales@infodf.org.mx o en la pagina 'www.infodf.org.mx'.");
    $this->pdf->MultiCell(0,3,$txt3,1,'L',0);
    $this->pdf->Ln(1);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('Motivos que impidieron la terminación de la obra'),1,0,'L','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->MultiCell(0,3,$txt3,1,'L',0);
    $this->pdf->Ln(1);
    ##########################

    ## REQUISITOS  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('REQUISITOS'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);
    // $column_width = ($this->pdf->GetPageWidth()-30)/2;
    $sample_text ="1. Formato de solicitud TSEDUVI-CGDAU_RMC_2, por duplicado debidamente requisitado en el apartado de Prórroga con firmas autógrafas";
    $this->pdf->SetXY(15,130.4);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(15,130.4);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text),0,'J',0);
    
    $sample_text2="2. 2. Comprobante de pago de derechos por la prórroga, equivalente al 25% de los derechos que se causarían por el registro, análisis y estudio de la manifestación de construcción. (Original y copia).";
    $this->pdf->SetXY(105,130.5);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(105,130.5);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text2),0,'J',0);

    $sample_text3="3.Constancia de alineamiento y número oficial vigente. (Original y copia).";
    $this->pdf->SetXY(15,143.4);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(15,143.4);
    $this->pdf->MultiCell(90,13,utf8_decode($sample_text3),0,'J',0);
    
    $sample_text4="4.Certificado Único de Zonificación de Uso del Suelo o Certificado Único de Zonificación del Suelo Digital o Certificado de Acreditación de Uso del Suelo por Derechos Adquiridos, los cuales deberán ser verificados y firmados por el Director Responsable de Obra y/o Corresponsable en Diseño Urbano y Arquitectónico, en su caso. (Original y copia).";
    $this->pdf->SetXY(105,143.4);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(105,144);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text4),0,'J',0);
    $this->pdf->Ln(2);

    ##########################

    ## FUNDAMENTO  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('FUNDAMENTO JURÍDICO'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);

    $sample_text ="Reglamento de Construcciones para el Distrito Federal.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text),1,'J',0);
    
    $sample_text2="Artículos 54 fracción III y 64.";
    $this->pdf->SetXY(105,163);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text2),1,'J',0);

    $sample_text3 ="Costo: Artículo, fracción, inciso, subinciso del Código Fiscal de la Ciudad de México.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text3),'LB','J',0);
    
    $sample_text4="Artículo 185, último párrafo.";
    $this->pdf->SetXY(105,166);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text4),1,'J',0);

    $sample_text5 ="Documento a obtener.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text5),1,'J',0);
    
    $sample_text6="Prórroga de Registro de manifestación de construcción tipo B o C.";
    $this->pdf->SetXY(105,169);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text6),1,'J',0);

    $sample_text7 ="Vigencia del documento a obtene.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text7),1,'J',0);
    
    $sample_text8="1 a 3 años.";
    $this->pdf->SetXY(105,172);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text8),1,'J',0);

    $sample_text9 ="Procedencia de la Afirmativa o Negativa Ficta.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text9),1,'J',0);
    
    $sample_text10="Afirmativa ficta, Procede;";
    $this->pdf->SetXY(105,175);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text10),1,'J',0);
    $this->pdf->Ln(1);
    ##########################

    ## Nombres  y firmas ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('NOMBRES Y FIRMAS:'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(60,5, utf8_decode(" "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode('Nombre'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode("Firma"),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(60,10, utf8_decode("Propietario, poseedor o interesado: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Representante legal: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Director responsable de obra: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en seguridad estructura: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en diseño urbano y arquitectónico: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en instalaciones: "),'BL',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),'B',0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'BR',0,'C',0);
    $this->pdf->Ln(7);
    ##########################

    $this->pdf->SetXY(15, 241);  
    $this->pdf->MultiCell(0,10, utf8_decode("Observaciones"),1,'L',0);
    $this->pdf->SetXY(50, 243);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->MultiCell(0,3, utf8_decode("Es obligación del solicitante informar a la Secretaría de Desarrollo Urbano y Vivienda o a la Delegación, según sea el caso, el cambio de alguna de las circunstancias de origen."),0,'J',0);
    $this->pdf->Ln(5);
    ##########################
    
    $this->pdf->addPage();//Salto

    ######Para ser llenado por la autoridad ##########
    $num_registro = ' 2345678';
    $tipo_manifestacion =' Tipo de manifestacion';
    $dia = ' 18 ';
    $mes = ' Abril  ';
    $anio = ' 2018 ';
    $numero = ' 09876543456';
    $fecha = ' 18/04/2018  ';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,6, utf8_decode('PARA SER LLENADO POR LA AUTORIDAD'),1,0,'L','1');
    $this->pdf->Ln(6);
    $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(30,5, utf8_decode("No. de registro "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($num_registro),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(23,5, utf8_decode("Manifestación tipo"),0,0,'R',0);
    $this->pdf->Cell(0,5, utf8_decode($tipo_manifestacion),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(30,5, utf8_decode("Vigencia "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode($dia),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(10,5, utf8_decode(", del"),0,0,'R',0);
    $this->pdf->Cell(20,5, utf8_decode($mes),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(8,5, utf8_decode("al"),0,0,'R',0);
    $this->pdf->Cell(0,5, utf8_decode($anio),'R',0,'C',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,3, utf8_decode("Toda vez que fueron cubiertos los derechos respectivos establecidos en el Código Fiscal de la Ciudad de México en el recibo "),'RL',0,'L',0);
    $this->pdf->Ln(3);

    $this->pdf->Cell(8,5, utf8_decode("No "),'L',0,'L',0);
    $this->pdf->Cell(50,5, utf8_decode($numero),0,0,'L',0);//dato Nombres
    $this->pdf->Cell(15,5, utf8_decode("de fecha "),0,0,'R',0);
    $this->pdf->Cell(0,5, utf8_decode($fecha),'R',0,'L',0);//dato Nombres
    $this->pdf->Ln(5);

    $this->pdf->Cell(0,15, utf8_decode("AUTORIZA "),'RL',0,'C',0);
    $this->pdf->Ln(15);

    $this->pdf->Cell(0,15, utf8_decode("______________________________________ "),'RL',0,'C',0);
    $this->pdf->Ln(10);
    $this->pdf->Cell(0,5, utf8_decode("NOMBRE, FIRMA Y CARGO "),'B',0,'C',0);
    $this->pdf->Ln(6);
    ##########################

    ## Texto presente hoja ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->MultiCell(0,3, utf8_decode("LA PRESENTE HOJA Y LA FIRMA QUE APARECE AL CALCE, FORMAN PARTE INTEGRANTE DE LA SOLICITUD DEL TRÁMITE PRÓRROGA DEL REGISTRO DE MANIFESTACIÓN DE CONSTRUCCIÓN TIPO _____, N°_____________________________ DE FECHA DE EXPEDICIÓN_________ DE _________________ DE _____, CON VIGENCIA AL __________________ DE ________________DE _____________."),0,'J',1);
    $this->pdf->Ln(2);
    ##########################
    #
    ## Texto presente hoja ####
    $area = 'INFORMATICA';
    $nombrecompleto = 'Mario Antonio Rivera Jacinto';
    $cargo = 'Analista Programador';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(20,6, utf8_decode('Recibió '),'LT',0,'R','1');
    $this->pdf->SetFont('Arial', 'I', 7);
    $this->pdf->Cell(70,6, utf8_decode('(para ser llenado por la autoridad)'),'TR',0,'L','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(20,5, utf8_decode('Área'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($area),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Nombre'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($nombrecompleto),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Cargo'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($cargo),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Firma'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode(' '),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,15, utf8_decode(''),'LB',0,'L',0);
    $this->pdf->Cell(70,15, utf8_decode(' '),'RB',0,'L',0);

    $this->pdf->SetXY(108,76);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->MultiCell(87,5,utf8_decode("Sello de recepción"),'LTR','J',1);
    $this->pdf->SetXY(108,80);
    $this->pdf->MultiCell(0,36, utf8_decode(' '),'RBL','L',0);
    $this->pdf->Ln(6);
    ##########################
    #
    ## Texto presente hoja ####
    $this->pdf->SetXY(70,121);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Image(APPPATH.'/third_party/imagenes/telefonito.jpg',55,121,15);
    $this->pdf->Cell(0,5, utf8_decode("    QUEJAS O DENUNCUAS"),0,0,'L',0);
    $this->pdf->SetXY(70,125);
    $this->pdf->Cell(0,4, utf8_decode(" "),0,0,'L',1);
    $this->pdf->SetXY(70,128);
    $this->pdf->Cell(27,5, utf8_decode("QUEJATEL LOCATEL "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(15,5, utf8_decode("56 58 11 11, "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(17,5, utf8_decode("HONESTEL  "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(0,5, utf8_decode("55 33 55 33."),0,0,'L',0);
    $this->pdf->Ln(4);
    $this->pdf->SetXY(70,131);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(14,5, utf8_decode("DENUNCIA "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(31,5, utf8_decode("irregularidades a través del "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(39,5, utf8_decode("Sistema de Denuncia Ciudadana "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(35,5, utf8_decode("vía Internet a la dirección "),0,0,'L',0);
    $this->pdf->Ln(4);
    $this->pdf->SetXY(70,134);
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Cell(12,5, utf8_decode("electrónica "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode("http://www.anticorrupcion.cdmx.gob.mx/index.php/sistema-de-denuncia-ciudadana"),0,0,'L',0);
    $this->pdf->Ln(6);
    ##########################

    $this->pdf->Ln(9);   

    $this->pdf->Output("PRÓRROGA_MANIFESTACIÓN.pdf", 'I');
  }


  public function Terminacion($folio,$clave,$nombre_tramite,$manifiestoB,$manifiestoC,$fechaDia,$fechaMes,$fechaAnio,$director,$fecha,$fecha_expedicion,$numero,$area,$nombrecompleto,$cargo)
  {
    // Se carga el modelo alumno
    // $this->load->model('alumno_modelo');
    // Se carga la libreria fpdf
    $this->load->library('pdf');
 
    // Se obtienen los alumnos de la base de datos

    $this->pdf = new Pdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    $this->pdf->SetTitle(utf8_decode("Terminación de obra"));
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    $folio = "TSEDUVI-CGDAU";
    $clave = "TSEDUVI-CGDAU_RMC_2";
    $nombre_tramite = "REGISTRO DE MANIFESTACION DE CONTRUCCION TIPO 'B' O 'C' ";
    $manifiestoB = "'SI'";
    $manifiestoC = "'NO'";
    $fechaDia = date('d');
    $fechaMes = date('F');
    $fechaAnio =  date('Y');
    $director = "Pedro Valdes";
    $fecha = "18/30/2019 ";
    $fecha_expedicion = "24/03/2019 ";
    $numero = "0987893";
    $this->pdf->SetFont('Arial', '', 6.5);
    $this->pdf->SetXY(160, 12);
    $this->pdf->Cell(15, 6, utf8_decode($folio), 0 , 1);//dato Folio
    $this->pdf->SetXY(160, 17);
    $this->pdf->Cell(15, 6, utf8_decode($clave), 0 , 1);//dato Clave

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(15,6,utf8_decode("NOMBRE DEL TRÁMITE: "));
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->SetXY(70, 23);
    $this->pdf->Cell(15, 6, utf8_decode($nombre_tramite), 0 , 1);//dato Nombre Tramite
    $this->pdf->Ln(1);

    $this->pdf->SetXY(30, 28);
    $this->pdf->Cell(15, 6, utf8_decode("MANIFESTACIÓN DE CONSTRUCCIÓN 'B' "), 0 , 1);
    $this->pdf->SetXY(90, 28);
    $this->pdf->Cell(15, 6, utf8_decode($manifiestoB), 0 , 1);//dato B
    $this->pdf->SetXY(115, 28);
    $this->pdf->Cell(15, 6, utf8_decode("MANIFESTACIÓN DE CONSTRUCCIÓN 'C' "), 0 , 1);
    $this->pdf->SetXY(170, 28);
    $this->pdf->Cell(15, 6, utf8_decode($manifiestoC), 0 , 1);//dato C
    $this->pdf->Ln(1);

    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->SetXY(15, 33);
    $this->pdf->Cell(15, 7, utf8_decode("Ciudad de México,  a "), 0 , 1);
    $this->pdf->SetXY(43, 33.5);
    $this->pdf->Cell(15, 6, $fechaDia, 0 , 1);//dato dia
    $this->pdf->SetXY(55, 33.5);
    $this->pdf->Cell(15, 6, 'de', 0 , 1);
    $this->pdf->SetXY(68, 33.5);
    $this->pdf->Cell(15, 6, $fechaMes, 0 , 1);//dato mes
    $this->pdf->SetXY(85, 33.5);
    $this->pdf->Cell(15, 6, 'de', 0 , 1);
    $this->pdf->SetXY(90, 33.5);
    $this->pdf->Cell(15, 6,$fechaAnio, 0 , 1);//dato año 

    $this->pdf->Cell(15, 6, utf8_decode("Director General de Administración Urbana "), 0 , 1);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->SetXY(70, 39.4);
    $this->pdf->Cell(15, 6, utf8_decode($director), 0 , 1);//dato Director
    $this->pdf->Cell(15, 4, utf8_decode("Presente "), 0 , 1);

    $this->pdf->Cell(30, 3, utf8_decode("Con fecha "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode($fecha),0,0,'L',0);
    $this->pdf->Cell(0, 3, utf8_decode("se da aviso de terminación de obra con registro de manifestación de construcción tipo B o C "),0,0,'L',0);
    $this->pdf->Ln(3);

    $this->pdf->Cell(40, 3, utf8_decode("No. "),0,0,'L',0);
    $this->pdf->Cell(40, 3, utf8_decode($numero),0,0,'L',0);
    $this->pdf->Cell(35, 3, utf8_decode("con fecha de expedición "),0,0,'L',0);
    $this->pdf->Cell(0, 3, utf8_decode($fecha_expedicion),0,0,'L',0);
    $this->pdf->Ln(5);

    ## REQUISITOS  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,4, utf8_decode('REQUISITOS'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(2); 
    $sample_text ="1. Formato de solicitud TSEDUVI-CGDAU_RMC_2, por duplicado debidamente requisitado en el apartado de Aviso con firmas autógrafas";
    $this->pdf->SetXY(15,61.3);
    $this->pdf->Cell(90,20, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(15,67);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text),0,'J',0);
    
    $sample_text2="2. En caso de existir diferencias entre la obra ejecutada y los planos registrados, se deberá anexar dos copias de los planos que contengan dichas modificaciones; siempre y cuando no se afecten las condiciones de seguridad, estabilidad, destino, uso, servicios, habitabilidad e higiene, se respeten las restricciones indicadas en el Certificado Único de Zonificación de Uso del Suelo, la Constancia de Alineamiento y las características de la manifestación registrada, así como, las tolerancias que fija el Reglamento y sus Normas.";
    $this->pdf->SetXY(105,61.3);
    $this->pdf->Cell(90,20, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(105,62);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text2),0,'J',0);

    $sample_text3="3. Identificación oficial con fotografía (carta de naturalización o cartilla de servicio militar o cédula profesional o pasaporte o certificado de nacionalidad mexicana o credencial para votar o licencia para conducir) Original y copia.";
    $this->pdf->SetXY(15,81.2);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(15,84);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text3),0,'J',0);
    
    $sample_text4="4.Documento con el que se acredite la personalidad, en los casos de representante legal. (Original y copia).";
    $this->pdf->SetXY(105,81.2);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(105,84);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text4),0,'J',0);
    $this->pdf->Ln(2);

    $sample_text5="5. En caso de modificaciones, comprobante de pago de derechos equivalente al 20% de los derechos causados por el registro, análisis y estudio de la manifestación de construcción. (Original y copia).";
    $this->pdf->SetXY(15,94.2);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(15,97);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text5),0,'J',0);
    
    $sample_text6=" ";
    $this->pdf->SetXY(105,94.2);
    $this->pdf->Cell(90,13, utf8_decode(' '),1,0,'L',0);
    $this->pdf->SetXY(105,98.2);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text6),0,'J',0);
    $this->pdf->Ln(8);

    ##########################

    ## FUNDAMENTO  ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode('FUNDAMENTO JURÍDICO'),1,0,'L','1');
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Ln(5);

    $sample_text ="Reglamento de Construcciones para el Distrito Federal.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text),1,'J',0);
    
    $sample_text2="Artículos 65 y 70.";
    $this->pdf->SetXY(105,114.2);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text2),1,'J',0);

    $sample_text3 ="Costo: Artículo, fracción, inciso, subinciso del Código Fiscal de la Ciudad de México.";
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text3),1,'J',0);
    
    $sample_text4="No aplica.";
    $this->pdf->SetXY(105,117.2);
    $this->pdf->MultiCell(90,4,utf8_decode($sample_text4),1,'J',0);

    $sample_text5 ="Documento a obtener.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text5),1,'J',0);
    
    $sample_text6="Autorización de uso y ocupación.";
    $this->pdf->SetXY(105,121.2);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text6),1,'J',0);

    $sample_text7 ="Tiempo de respuesta.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text7),1,'J',0);
    
    $sample_text8="5 días hábiles.";
    $this->pdf->SetXY(105,124.2);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text8),1,'J',0);

    $sample_text9 ="Vigencia del documento a obtener.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text9),1,'J',0);
    
    $sample_text10="Permanente.";
    $this->pdf->SetXY(105,127.2);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text10),1,'J',0);

    $sample_text11 ="Procedencia de la Afirmativa o Negativa Ficta.";
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text11),1,'J',0);
    
    $sample_text12="Afirmativa ficta, procede; Negativa ficta, no procede.";
    $this->pdf->SetXY(105,130.2);
    $this->pdf->MultiCell(90,3,utf8_decode($sample_text12),1,'J',0);

    $sample_text13 ="Observaciones";
    $this->pdf->MultiCell(35,6,utf8_decode($sample_text13),'BL','J',0);
    
    $sample_text14="Es obligación del solicitante informar a la Secretaría de Desarrollo Urbano y Vivienda o a la Delegación, según sea el caso, el cambio de alguna de las circunstancias de origen.";
    $this->pdf->SetXY(50,133.2);
    $this->pdf->MultiCell(0,3,utf8_decode($sample_text14),1,'J',0);
    $this->pdf->Ln(2);
    ##########################

    ## Nombres  y firmas ####
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->MultiCell(0,3, utf8_decode('Declaramos haber cumplido con todas y cada una de las disposiciones que se establecen en el Reglamento de Construcciones para el Distrito  Federal y demás ordenamientos legales vigentes aplicables en la materia'),'TRL','J',0);
    // $this->pdf->Ln(6);
    // $this->pdf->SetFont('Arial', '', 7);

    $this->pdf->Cell(60,5, utf8_decode(" "),'L',0,'L',0);
    $this->pdf->Cell(40,5, utf8_decode('Nombre'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,5, utf8_decode("Firma"),'R',0,'C',0);
    $this->pdf->Ln(5);

    $this->pdf->Cell(60,10, utf8_decode("Propietario, poseedor o interesado: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Representante legal: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Director responsable de obra: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en seguridad estructura: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en diseño urbano y arquitectónico: "),'L',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),0,0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'R',0,'C',0);
    $this->pdf->Ln(7);

    $this->pdf->Cell(60,10, utf8_decode("Corresponsable en instalaciones: "),'BL',0,'L',0);
    $this->pdf->Cell(40,10, utf8_decode('________________________________'),'B',0,'C',0);//dato Nombres
    $this->pdf->Cell(0,10, utf8_decode("________________________________"),'BR',0,'C',0);
    $this->pdf->Ln(11);
    ##########################
    
    ## Texto presente hoja ####
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->MultiCell(0,3, utf8_decode("LA PRESENTE HOJA FORMA PARTE INTEGRANTE DE LA SOLICITUD DEL TRÁMITE AVISO DE TERMINACIÓN DE OBRA DE MANIFESTACIÓN DE CONSTRUCCIÓN TIPO _____, N°_____________________________ DE FECHA DE EXPEDICIÓN_________ DE _________________ DE _____, CON VIGENCIA AL __________________ DE ________________DE _____________."),0,'J',1);
    $this->pdf->Ln(1);
    ##########################
    #
    ## Texto presente hoja ####
    $area = 'INFORMATICA';
    $nombrecompleto = 'Mario Antonio Rivera Jacinto';
    $cargo = 'Analista Programador';
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(20,6, utf8_decode('Recibió '),'LT',0,'R','1');
    $this->pdf->SetFont('Arial', 'I', 7);
    $this->pdf->Cell(70,6, utf8_decode('(para ser llenado por la autoridad)'),'TR',0,'L','1');
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(20,5, utf8_decode('Área'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($area),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Nombre'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($nombrecompleto),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Cargo'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode($cargo),'R',0,'L',0);
    $this->pdf->Ln(5);
    $this->pdf->Cell(20,5, utf8_decode('Firma'),'L',0,'L',0);
    $this->pdf->Cell(70,5, utf8_decode(' '),'R',0,'L',0);
    $this->pdf->Ln(3);
    $this->pdf->Cell(20,15, utf8_decode(''),'LB',0,'L',0);
    $this->pdf->Cell(70,15, utf8_decode(' '),'RB',0,'L',0);

    $this->pdf->SetXY(108,208.2);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->MultiCell(87,5,utf8_decode("Sello de recepción"),'LTR','J',1);
    $this->pdf->SetXY(108,210);
    $this->pdf->MultiCell(0,36, utf8_decode(' '),'RBL','L',0);
    $this->pdf->Ln(6);
    ##########################
    #
    ## Texto presente hoja ####
    $this->pdf->SetXY(70,248);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Image(APPPATH.'/third_party/imagenes/telefonito.jpg',55,248,15);
    $this->pdf->Cell(0,5, utf8_decode("    QUEJAS O DENUNCUAS"),0,0,'L',0);
    $this->pdf->SetXY(70,252);
    $this->pdf->Cell(0,2, utf8_decode(" "),0,0,'L',1);
    $this->pdf->SetXY(70,253);
    $this->pdf->Cell(27,5, utf8_decode("QUEJATEL LOCATEL "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(15,5, utf8_decode("56 58 11 11, "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(17,5, utf8_decode("HONESTEL  "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(0,5, utf8_decode("55 33 55 33."),0,0,'L',0);
    $this->pdf->Ln(4);
    $this->pdf->SetXY(70,256);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(14,5, utf8_decode("DENUNCIA "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(31,5, utf8_decode("irregularidades a través del "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(39,5, utf8_decode("Sistema de Denuncia Ciudadana "),0,0,'L',0);
    $this->pdf->SetFont('Arial', '', 7);
    $this->pdf->Cell(35,5, utf8_decode("vía Internet a la dirección "),0,0,'L',0);
    $this->pdf->Ln(4);
    $this->pdf->SetXY(70,259);
    $this->pdf->SetFont('Arial', '', 6);
    $this->pdf->Cell(12,5, utf8_decode("electrónica "),0,0,'L',0);
    $this->pdf->SetFont('Arial', 'B', 7);
    $this->pdf->Cell(0,5, utf8_decode("http://www.anticorrupcion.cdmx.gob.mx/index.php/sistema-de-denuncia-ciudadana"),0,0,'L',0);
    $this->pdf->Ln(6);
    ##########################

    $this->pdf->Ln(9);   

    $this->pdf->Output("PRÓRROGA_MANIFESTACIÓN.pdf", 'I');
  }


  public function reportepdf(){
    $this->load->view('reporte/reportes');
  }
}

?>