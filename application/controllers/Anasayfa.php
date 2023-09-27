<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Anasayfa extends MY_Controller {

	 public $klasor = "";


	public function __construct()
	{
		parent::__construct();

		$this->klasor = "anasayfa_v";
		$this->load->model("user_model");
        $this->load->model("siparisler_model");
        $this->load->model("adresler_model");


		if(!get_active_user()){
			redirect(base_url("login"));
		}





	}

	public function index()
	{

		$viewData =new stdClass() ;

        $items = $this->siparisler_model->tumu(
            array('odeme_durum'=>1), // Where koşulu
        // Siralama koşulu
        );


		$viewData->items=$items;
		$viewData->yonlendirme="anasayfa";
		$viewData->klasor=$this->klasor;
		$this->load->view("{$this->klasor}/index",$viewData);



	}



	public function dildegistir($dil) {

		$this->session->set_userdata('lang',$dil);
		redirect($_SERVER['HTTP_REFERER']);
	}
}


