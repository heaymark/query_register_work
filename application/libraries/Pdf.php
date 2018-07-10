<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf.php";
    // require_once(str_replace("\\","/",APPPATH).'/third_party/fpdf.php';
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
      public function __construct() {
        parent::__construct();
      }
        // El encabezado del PDF
      public function Header(){
          //Primer encabezado de prueba
            /*
              $this->Image(APPPATH.'/third_party/imagenes/logo.png',10,8,22);
              $this->SetFont('Arial','B',13);
              $this->Cell(30);
              $this->Cell(120,10,'ESCUELA X',0,0,'C');
              $this->Ln('5');
              $this->SetFont('Arial','B',8);
              $this->Cell(30);
              $this->Cell(120,10,'INFORMACION DE CONTACTO',0,0,'C');
              $this->Ln(20);
            */
          if ($this->page == 1){
            //Segundo encabezado formato
            $this->Image(APPPATH.'/third_party/imagenes/logocdmx.png',15,13,35);
            $this->Image(APPPATH.'/third_party/imagenes/logoseduvi.png',58,12,26);
            $this->Image(APPPATH.'/third_party/imagenes/atencionciudadana.png',92,12,26);
            $this->SetFont('Arial','B',8);
            $this->Cell(100);
            $this->Cell(90,10,'Folio: ',0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(92);
            $this->Cell(90,10,'Clave de formato: ',0,0,'C');
            $this->Ln(10);
          }

      }
       // El pie del pdf
      public function Footer(){
           $this->SetY(-35);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }

      //***** Aquí comienza código para ajustar texto *************
      //***********************************************************
      public function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
      {
          //Get string width
          $str_width=$this->GetStringWidth($txt);
   
          //Calculate ratio to fit cell
          if($w==0)
              $w = $this->w-$this->rMargin-$this->x;
          $ratio = ($w-$this->cMargin*2)/$str_width;
   
          $fit = ($ratio < 1 || ($ratio > 1 && $force));
          if ($fit)
          {
              if ($scale)
              {
                  //Calculate horizontal scaling
                  $horiz_scale=$ratio*100.0;
                  //Set horizontal scaling
                  $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
              }
              else
              {
                  //Calculate character spacing in points
                  $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                  //Set character spacing
                  $this->_out(sprintf('BT %.2F Tc ET',$char_space));
              }
              //Override user alignment (since text will fill up cell)
              $align='';
          }
   
          //Pass on to Cell method
          $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
   
          //Reset character spacing/horizontal scaling
          if ($fit)
              $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
      }
 
      public function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
      {
      
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
      }
   
      //Patch to also work with CJK double-byte text
      public function MBGetStringLength($s)
      {
          if($this->CurrentFont['type']=='Type0')
          {
              $len = 0;
              $nbbytes = strlen($s);
              for ($i = 0; $i < $nbbytes; $i++)
              {
                  if (ord($s[$i])<128)
                      $len++;
                  else
                  {
                      $len++;
                      $i++;
                  }
              }
              return $len;
          }
          else
              return strlen($s);
      }
      //************** Fin del código para ajustar texto *****************

      //MultiCell with bullet
      public function MultiCellBlt($w, $h, $blt, $txt, $border=0, $align='J', $fill=false)
      {
          //Get bullet width including margins
          $blt_width = $this->GetStringWidth($blt)+$this->cMargin*2;

          //Save x
          $bak_x = $this->x;

          //Output bullet
          $this->Cell($blt_width,$h,$blt,0,'',$fill);

          //Output text
          $this->MultiCell($w-$blt_width,$h,$txt,$border,$align,$fill);

          //Restore x
          $this->x = $bak_x;
      }
    }
?>