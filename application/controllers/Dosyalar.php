<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosyalar extends MY_Controller {

	public $klasor="";

	public function __construct()
	{
		parent::__construct();
		$this->klasor="dosyalar_v";
		$this->load->model("dosyalar_model");
		$this->load->model("dosyalar_resim_model");
		$this->load->model("dosyalar_medya_model");
		$this->load->model("dosyalar_pdf_model");
		$this->load->model("ayar_model");

		if(!get_active_user()){
			redirect(base_url("login"));
		}



	}

	//  Listeleme
	public function index()
	{

		/** Tablodan Verilerin Getirilmesi.. */
		$items = $this->dosyalar_model->tumu(
			array(), // Where koşulu
			"rank ASC" // Siralama koşulu
		);



		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="listele";
		$viewData->items=$items;
		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}


	//  Resim Ekleme
	public function resim($id)
	{
		$viewData =new stdClass() ;
		$viewData->item=$item=$this->dosyalar_model->cek(
			array(
				'id'=>$id
			)
		);
		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="resim";


		$viewData->resimler=$this->dosyalar_resim_model->tumu(
			array(
				'gallery_id'=>$id
			),
			"createdAt ASC"
		);

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	public function pdf($id)
	{
		$viewData =new stdClass() ;
		$viewData->item=$item=$this->dosyalar_model->cek(
			array(
				'id'=>$id
			)
		);
		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="pdf";


		$viewData->resimler=$this->dosyalar_pdf_model->tumu(
			array(
				'klasor_id'=>$id
			),
			"createdAt ASC"
		);

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	public function render_resim_upload($id){

		$viewData =new stdClass() ;

		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="resim";


		$viewData->resimler=$this->dosyalar_resim_model->tumu(
			array(
				'gallery_id'=>$id
			)
		);

		$render_html= $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/render_tablo/resimler",$viewData, true);

		echo $render_html;

	}

	public function render_pdf_upload($id){

		$viewData =new stdClass() ;

		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="pdf";


		$viewData->resimler=$this->dosyalar_resim_model->tumu(
			array(
				'gallery_id'=>$id
			)
		);

		$render_html= $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/render_tablo/resimler",$viewData, true);

		echo $render_html;

	}


	//---------> Aksiyonlar

	public function resim_upload($id){

		$file_name = seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
		$yolu="resimler";

		$orjinal = galeri_yukle($_FILES["file"]["tmp_name"], "uploads/$this->klasor", $file_name,$yolu);

		if($orjinal){

			$this->dosyalar_resim_model->vt_kayit(
				array(
					"url"       => $yolu."/".$file_name,
					"rank"          => 0,
					"isActive"      => 1,
					"createdAt"     => date("Y-m-d H:i:s"),
					"gallery_id"    => $id
				)
			);


		} else {
			echo "islem basarisiz";
		}

	}

	public function pdf_gonder($id)
	{

		$dosya_adi= seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME));
		$dosya_uzanti= pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		$dosya=$dosya_adi.".".$dosya_uzanti;

		$ayar["allowed_types"]="pdf";
		$ayar["upload_path"]="uploads/pdf/";
		$ayar["file_name"]=$dosya;

		$this->load->library("upload",$ayar);

		$yukle=$this->upload->do_upload("file");

		if($yukle){

			$this->dosyalar_pdf_model->vt_kayit(
				array(

					"url"				=> $dosya,
					"rank"          => 0,
					"isActive"      => 1,
					"createdAt"     => date("Y-m-d H:i:s"),
					"klasor_id"		=> $id

				)
			);


		}



	}



	public function Resimsil($id)
	{
		$eski_yol= $this->dosyalar_resim_model->cek(
			array(
				"id"=>$id
			)
		);

		$sil = $this->dosyalar_resim_model->vt_sil(
			array(
				'id'=>$id
			)

			);

		if($sil) {

			unlink("uploads/{$this->klasor}/$eski_yol->url");

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}else {

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}





	}

	public function Pdfsil($id)
	{
		$eski_yol= $this->dosyalar_pdf_model->cek(
			array(
				"id"=>$id
			)
		);

		$sil = $this->dosyalar_pdf_model->vt_sil(
			array(
				'id'=>$id
			)

		);

		if($sil) {

			unlink("uploads/pdf/$eski_yol->url");

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}else {

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}





	}









}
