<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Clickso extends MY_Controller {

	 public $klasor = "";


	public function __construct()
	{
		parent::__construct();

		$this->klasor = "clickso_v";


		if(!get_active_user()){
			redirect(base_url("login"));
		}



	}

	public function index()
	{

		$viewData =new stdClass() ;
		$uploads=ceil(foldersize("uploads",)/1024/1024);
		$application=ceil(foldersize("application")/1024/1024);
		$assets=ceil(foldersize("assets")/1024/1024);
		$system=ceil(foldersize("system")/1024/1024);
		$toplam=$uploads+$application+$assets+$system;


		$viewData->toplam=$toplam;
		$viewData->klasor=$this->klasor;
		$this->load->view("{$this->klasor}/index",$viewData);



	}

	public function dildegistir($dil) {

		$this->session->set_userdata('lang',$dil);
		redirect($_SERVER['HTTP_REFERER']);
	}
}


