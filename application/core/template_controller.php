<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Template_controller extends Controller_grid{

	var $CONFIG_TEMPLATE;
	var $MENU;
	var $CONTENT;
	var $NO_SBAR;
	var $USR_VAL;
	function __construct(){
		parent::__construct();
		
		//CONFIGURACION ORIGINAL
		/*
		if(!isset($_SESSION)){
			session_start();}
		$var_session = 'app'.md5(base_url()).'_access';
		if(!isset($_SESSION[$var_session])){
			redirect(base_url());}
		*/
		
		$this->CONFIG_TEMPLATE['theme'] = 'base/template_modern/';
	}

	public function init_doc(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/init_doc');
	}
		
	public function end_doc(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/end_doc');
	}
	
	public function container_body(){
		if($this->NO_SBAR == TRUE)
			return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/container_body',array('no_sbar'=>TRUE,'top_nav'=>$this->top_nav(),'page_content'=>$this->page_content()),TRUE);
		else
			return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/container_body',array('sidebar_menu'=>$this->sidebar_menu(),'sidebar_footer'=>$this->sidebar_footer(),'top_nav'=>$this->top_nav(),'page_content'=>$this->page_content()),TRUE);
	}
	
	public function sidebar_menu(){
		if($this->USR_VAL == TRUE)
			return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/'.$this->MENU,array('usr_val' => $this->USR_VAL),TRUE);
		else
			return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/'.$this->MENU,'',TRUE);
	}
	
	public function sidebar_footer(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/sidebar_footer','',TRUE);
	}
	
	public function body(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/body',array('container_body'=>$this->container_body(),'scripts'=>$this->scripts()));
	}
	
	public function head(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/head');
	}
	
	public function set_menu($menu, $usr_val = FALSE){
		$this->MENU = $menu;
		$this->USR_VAL = $usr_val;
	}
	
	public function top_nav(){
		if($this->NO_SBAR)
			return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/top_nav',array('mod' => $this->NO_SBAR),TRUE);
		else
			return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/top_nav','',TRUE);
	}
	
	public function build(){
		$this->init_doc();
		$this->head();
		$this->body();
		$this->end_doc();
	}
	
	public function scripts(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/scripts','',TRUE);
	}
	
	public function page_content(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/page_content',array('content'=>$this->CONTENT),TRUE);
	}

	public function set_content($content,$mod = FALSE){
		$this->CONTENT = $content;
		if($mod == 1)
			$this->NO_SBAR = TRUE;
	}
	
	public function session_kill(){
		if(isset($_SESSION)){
			session_destroy();
			redirect(base_url(''));
		}
	}
	
}
	