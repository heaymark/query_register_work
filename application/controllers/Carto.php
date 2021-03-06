<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carto extends CI_Controller {

   /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    *        http://example.com/index.php/welcome
    * - or -
    *        http://example.com/index.php/welcome/index
    * - or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */
   public function index()
   {

   }

  public function sql(){
     $this->load->model('Carto_model/Carto_model','objCarto');
     $response = $this->objCarto->toSql("select nombre from basedel");
     print_r($response);
  }

  public function getDelegaciones(){
     $this->load->model('Carto_model/Carto_model','objCarto');
     $response = $this->objCarto->toSql("select * from basedel order by nombre asc");
     echo $response;
  }

  public function getColonias(){
     $this->load->model('Carto_model/Carto_model','objCarto');
     $response = $this->objCarto->toSql("select * from basecol order by delegacion asc,nombre asc");
     echo $response;
  }

}
