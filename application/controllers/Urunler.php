<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class

Urunler extends MY_Controller {

	public $klasor="";

	public function __construct()
	{
        // Not kopyaladıktan sonra view de bulunan modelleri klasör arayarak değiştirmeyi unutma.
		parent::__construct();
		$this->klasor="genel_v";
        $this->model="urun_detay_model";
		$this->load->model("dinamik/urunler_model");
		$this->load->model("dinamik/urun_detay_model");

        $this->baslik="Ürünler";
        $this->stamp_id=1;
        $this->yonlendirme="urunler";


        // Statikler
        $this->load->model("kategoriler_model");
        $this->load->model("varyant_model");
        $this->load->model("urun_varyant_model");
        $this->load->model("varyant_iliski_model");
        $this->load->model("urun_deger_model");
        $this->load->model("dosya_model");
		$this->load->model("resimler_model");
		$this->load->model("ayar_model");
		$this->load->model("diller_model");
		$this->load->model("cozunurluk_model");


		if(!get_active_user()){
			redirect(base_url("login"));
		}

	}

	//  Listeleme
	public function index()
	{

		$diller = $this->diller_model->tumu(
			array()
		);
		$items = $this->urunler_model->tumu(
			array(), // Where koşulu
			"rank ASC" // Siralama koşulu
		);

		$viewData =new stdClass() ;

		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->model=$this->model;
        $viewData->yonlendirme=$this->yonlendirme;
        $viewData->stamp_id=$this->stamp_id;
		$viewData->diller=$diller;
		$viewData->alt_klasor="listele";
		$viewData->items=$items;
		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	//  Ekleme
	public function ekle()
	{
		$diller = $this->diller_model->tumu(
			array()

		);
		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->stamp_id=$this->stamp_id;
        $viewData->yonlendirme=$this->yonlendirme;
		$viewData->diller=$diller;
		$viewData->alt_klasor="ekle";

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	public function dilekle($id)
	{

		$mevcut = $this->urunler_model->cek(
			array(
				'grup_id'=>$id
			)

		);


		$diller = $this->diller_model->tumu(
			array(

            ),"zaman DESC"
		);




		$eksikdil=$this->urun_detay_model->cek(
			array(
				'grup_id'=>$id,
				'dil'=>1
			)
		);

        $gruptakiler=$this->urun_detay_model->tumu(
            array(
                'grup_id'=>$id,

            )
        );




		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->yonlendirme=$this->yonlendirme;
		$viewData->mevcut=$mevcut;
		$viewData->diller=$diller;
		$viewData->eksikdil=$eksikdil;
		$viewData->alt_klasor="dilekle";
		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	//  Düzenle
    public function duzenle($id)
    {
        $diller = $this->diller_model->tumu(
            array()

        );
        $viewData =new stdClass() ;
        $item=$this->urun_detay_model->cek(
            array(
                'id'=>$id,

            )
        );



        $ana_urun=$this->urunler_model->cek(
            array(
                'grup_id'=>$item->grup_id,

            )
        );

        $varyant=$this->varyant_iliski_model->tumu(
            array(
                'kategori_id'=>$ana_urun->kategori_id,
                'dil_id' =>$item->dil

            )
        );






        $bayrak = $this->diller_model->cek(
            array(
                'id'=>$item->dil,
            )

        );
        $viewData->varyant=$varyant;
        $viewData->diller=$diller;
        $viewData->baslik=$this->baslik;
        $viewData->yonlendirme=$this->yonlendirme;
        $viewData->stamp_id=$this->stamp_id;
        $viewData->bayrak=$bayrak;
        $viewData->klasor=$this->klasor;
        $viewData->alt_klasor="duzenle";
        $viewData->item=$item;


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function grupduzenle($id)
    {

        $viewData =new stdClass() ;
        $item=$this->urunler_model->cek(
            array(
                'id'=>$id,

            )
        );


        $varyant=$this->varyant_model->tumu(
            array(

                'kategori_id'=>$item->kategori_id,
            )
        );



        $viewData->baslik=$this->baslik;
        $viewData->yonlendirme=$this->yonlendirme;
        $viewData->stamp_id=$this->stamp_id;

        $viewData->klasor=$this->klasor;
        $viewData->alt_klasor="grupduzenle";
        $viewData->item=$item;
        $viewData->varyant=$varyant;


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function altvaryantaktif($id)
    {
        echo "geldi";
        die();

    }



    public function varyantsend($id,$kat) {
        error_reporting(0);
        $varkat=$this->input->post("varyant");

        $this->urun_deger_model->vt_sil(
            array(
                'urun_id'=>$id,
                "varyant_kategori_id"=>$kat
            )
        );

       foreach ($varkat as $gelen) {
           $kayit = $this->urun_deger_model->vt_kayit(
               array(
                   "urun_id"		=> $id,
                   "varyant_id"   => $gelen,
                   "varyant_kategori_id"=>$kat
               )
           );
       }
        $geldigi_sayfa = $_SERVER['HTTP_REFERER'];
        $alert=alert("İşlem Başarılı","Varyant başarıyla güncellendi","success");
        $this->session->set_flashdata("alert",$alert);
        header("Refresh: 0; url=".$geldigi_sayfa."");


    }

	//  Resim Ekleme
	public function medya($id)
	{


		$viewData =new stdClass() ;
		$viewData->item=$item=$this->urunler_model->cek(
			array(
				'id'=>$id
			)
		);
		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->stamp_id=$this->stamp_id;
        $viewData->yonlendirme=$this->yonlendirme;
		$viewData->alt_klasor="medya";

		$viewData->resimler=$this->resimler_model->tumu(
			array(
				'product_id'=>$id,
				'grup_id'=>$item->grup_id,

				'cozunurluk_id'=>0
			), "rank ASC"

		);

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

    //  Resim Ekleme


	public function dokuman($id)
	{
		$viewData =new stdClass() ;
		$viewData->item=$item=$this->urunler_model->cek(
			array(
				'id'=>$id
			)
		);
		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->yonlendirme=$this->yonlendirme;

		$viewData->alt_klasor="dokuman";

		$viewData->diller = $this->diller_model->tumu(
			array(

			)
		);


		$viewData->resimler=$this->dosya_model->tumu(
			array(
				'product_id'=>$id
			),
			"rank ASC"
		);

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	public function render_medya_upload($id){

		$viewData =new stdClass() ;

		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->yonlendirme=$this->yonlendirme;
		$viewData->alt_klasor="medya";


		$viewData->resimler=$this->resimler_model->tumu(
			array(
				'product_id'=>$id
			), "rank ASC"
		);

		$render_html= $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/render_tablo/resimler",$viewData, true);

		echo $render_html;

	}


	public function render_dosya_upload($id){

		$viewData =new stdClass() ;

		$viewData->klasor=$this->klasor;
        $viewData->baslik=$this->baslik;
        $viewData->yonlendirme=$this->yonlendirme;
		$viewData->alt_klasor="medya";


		$viewData->resimler=$this->dosya_model->tumu(
			array(
				'product_id'=>$id
			)
		);

		$render_html= $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/render_tablo/resimler",$viewData, true);

		echo $render_html;

	}


	//---------> Aksiyonlar


	public function kaydet() // Yeni ürün ekleme
	{




        $kategori_id=$this->input->post("kategori");

        if($kategori_id) {
            $kategori_id=$this->input->post("kategori");
        } else {
            $kategori_id=99999;
        }

		$grup_id=rand(10000000,99999999);
		$diller = $this->diller_model->tumu(
			array()

		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules ("title","Ürün Adı", "required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "Lütfen, {field} Giriniz."
			)
		);

		$form_kontrol = $this->form_validation->run();

		if($form_kontrol) {


			$kayit = $this->urunler_model->vt_kayit(
				array(
					"title"			=> $this->input->post("title"),
					"grup_id"		=> $grup_id,
					"isActive"		=> 1,
                    "kategori_id"   => $kategori_id,
					"createdAt"		=> date("Y-m-d H:i:s"),
					"rank"			=>999999999999999999
				)
			);

			if($kayit) {

				foreach ($diller as $dil) {

                    $ozel_alan=array(
                        'urun_kodu'=>$this->input->post("title"),
                        'fiyat'=>$this->input->post("fiyat"),
                    );
                    $ozel=json_encode($ozel_alan);



                    $kaydet = $this->urun_detay_model->vt_kayit(
						array(
							"title" => $this->input->post("title"),
                            "aciklama" => $this->input->post("aciklama"),
                            "teknik" => $this->input->post("teknik"),
                            "seo_desc" => $this->input->post("seo_desc"),
                            "seo_title" => $this->input->post("seo_title"),
							"url" => seo($this->input->post("title")),
							"ozel_alan" => $ozel,
							"grup_id" => $grup_id,
							"dil" => $dil->id,
							"isActive" => 1,
							"createdAt" => date("Y-m-d H:i:s")
						)
					);
				}

				if($kaydet) {
					$alert=alert("İşlem Başarılı","Kayıt başarılı bir şekilde eklendi","success");

				}else {

					$alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");

				}
				$this->session->set_flashdata("alert",$alert);


                redirect(base_url($this->yonlendirme));

			}







		}
		else {
			$viewData =new stdClass() ;
			$viewData->klasor=$this->klasor;
			$viewData->alt_klasor="ekle";
			$viewData->form_error=true;

			$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
		}


	}

	public function dilkaydet($id) // Eksik Dil Kaydet
	{

		
		$diller = $this->diller_model->tumu(
			array()

		);


        $ozel_alan=array(
            'urun_kodu'=>$this->input->post("urun_kodu")
        );
        $ozel=json_encode($ozel_alan);



		$kaydet = $this->urun_detay_model->vt_kayit(
			array(

                "title" => $this->input->post("title"),
                "aciklama" => $this->input->post("aciklama"),
                "teknik" => $this->input->post("teknik"),
                "seo_desc" => $this->input->post("seo_desc"),
                "seo_title" => $this->input->post("seo_title"),
                "url" => seo($this->input->post("title")),
                "ozel_alan" => $ozel,
                "grup_id" => $id,

				"dil" => $this->input->post("yeni_dil"),
				"isActive" => 1,
				"createdAt" => date("Y-m-d H:i:s")
			)
		);

		if($kaydet) {
			$alert=alert("İşlem Başarılı","Kayıt başarılı bir şekilde eklendi","success");

		}else {

			$alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");

		}
		$this->session->set_flashdata("alert",$alert);
        redirect(base_url($this->yonlendirme));





	}

	//  Düzenle
	public function guncelle($id)
	{

        $ozel_alan=array(
            'urun_kodu'=>$this->input->post("urun_kodu"),
            'fiyat'=>$this->input->post("fiyat"),
        );
        $ozel=json_encode($ozel_alan);




        $update = $this->urun_detay_model->vt_guncelle(
            array(
                'id'=>$id
            ),

            array(
                "title" => $this->input->post("title"),
                "aciklama" => $this->input->post("aciklama"),
                "teknik" => $this->input->post("teknik"),
                "seo_desc" => $this->input->post("seo_desc"),
                "seo_title" => $this->input->post("seo_title"),
                "url" => seo($this->input->post("title")),
                "ozel_alan" => $ozel,
            )
        );

        if($update) {
            $alert=alert("İşlem Başarılı","Kayıt başarılı bir şekilde eklendi","success");

        }else {
            $alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");

        }
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url($this->yonlendirme."/duzenle/$id"));


	}

    public function grupguncelle($id)
    {


        $update = $this->urunler_model->vt_guncelle(
            array(
                'id'=>$id
            ),

            array(
                "title" => $this->input->post("title"),
                "kategori_id" => $this->input->post("kategori"),

                "url" => seo($this->input->post("title")),
            )
        );

        if($update) {
            $alert=alert("İşlem Başarılı","Kayıt başarılı bir şekilde eklendi","success");

        }else {
            $alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");

        }
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url($this->yonlendirme."/grupduzenle/$id"));


    }

	public function sil($id)
	{


			$bul = $this->urunler_model->cek(
			array(
				'id'=>$id
			)
			);

			$resimbul = $this->resimler_model->tumu(
			array(
				'product_id'=>$id
			)
			);



			foreach ($resimbul as $resim) {

				$size=$this->cozunurluk_model->tumu();

				foreach ($size as $ebat) {
					error_reporting(0);
					$orj_sil=unlink("uploads/{$this->klasor}/$resim->img_url");
					$boyut_sil=unlink("uploads/{$this->klasor}/$ebat->klasor/$resim->img_url");

					$this->resimler_model->vt_sil(
						array(
							'id'=>$resim->id
						)
					);

				}


			}




		$tumusil = $this->urun_detay_model->vt_sil(
			array(
				'grup_id'=>$bul->grup_id
			)
			);


			$sil = $this->urunler_model->vt_sil(
				array(
					'id'=>$id
				)

			);

			if($sil) {
				$alert=alert("İşlem Başarılı","Kayıt Silindi","success");
			}else {

				$alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");


			}
		$this->session->set_flashdata("alert",$alert);
        redirect(base_url($this->yonlendirme));


	}

	public function AktifPasif($id)
	{

		if($id) {

			$durumu = ($this->input->post("data") === "true") ? 1 : 0;

			$this->urunler_model->vt_guncelle(

				array(
					"id"=>$id
				),

				array(
					"isActive"=>$durumu
				)
			);


		}


	}

	public function siralama(){

		$data=$this->input->post("data");

		parse_str($data, $siralama);

		 $items = $siralama["siralama"];

		foreach ($items as $sira =>$id) {

			$this->urunler_model->vt_guncelle(

				array(
					"id"=>$id,
					"rank !="  =>$sira
				),

				array(
					"rank"=>$sira
				)

			);

		}

	}



	public function medya_upload($id){

		$urun = $this->urunler_model->cek(
			array(
				"id"			=> $id
			)
		);



		$urun_seo=seo($urun->title);

		$size=$this->cozunurluk_model->tumu();

		$file_name = seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) ."-".$urun_seo."." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		resim_orjinal_yukle($_FILES["file"]["tmp_name"], "uploads/$this->klasor", $file_name);
		$kaydet=$this->resimler_model->vt_kayit(
			array(
				"img_url"       => $file_name,
				"rank"          => 0,
				"isActive"      => 1,
				"isCover"       => 0,
				"createdAt"     => date("Y-m-d H:i:s"),
				"product_id"    => $id,
                "grup_id"     =>$urun->grup_id
                )
		);


		if($kaydet) {
			foreach ($size as $ebat) {

				$file_name = seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) ."-".$urun_seo. "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
				$ebat->klasor = resim_yukle($_FILES["file"]["tmp_name"], "uploads/$this->klasor",$ebat->genislik,$ebat->yukseklik, $file_name);

				$this->resimler_model->vt_kayit(
					array(
						"img_url"       => $file_name,
						"rank"          => 0,
						"isActive"      => 1,
						"isCover"       => 0,
						"createdAt"     => date("Y-m-d H:i:s"),
						"product_id"    => $id,
						"cozunurluk_id"	=>$ebat->id,
						"cozunurluk_yol"	=>$ebat->genislik."x".$ebat->yukseklik,

					)
				);
			}
		}

	}


	public function dosya_upload($id)
	{

        $urun = $this->urunler_model->cek(
            array(
                "id"			=> $id
            )
        );


        if ($_FILES["logo"]["name"] == "") {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Lütfen bir görsel seçiniz",
				"type" => "error"
			);

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);

            redirect(base_url($this->yonlendirme));

			die();
		}

		// Upload Süreci...

		$tarih= date('m.d.y');
		seo ($tarih);
		$dil=$this->input->post("dil");
		$dil = dil($dil);

		$file_name = $dil."-".seo($this->input->post("ad")) . "-".seo($tarih)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

		$config["allowed_types"] = "jpg|pdf|zip";
		$config["upload_path"] = "uploads/pdf/";
		$config["file_name"] = $file_name;

		$this->load->library("upload", $config);

		$upload = $this->upload->do_upload("logo");

		if ($upload) {

			$uploaded_file = $this->upload->data("file_name");

			$insert = $this->dosya_model->vt_kayit(
				array(
					"img_url"       => $file_name,
					"rank"          => 0,
					"ad"			=>$this->input->post("ad"),
					"dil"			=>$this->input->post("dil"),
					"isActive"      => 1,
					"createdAt"     => date("Y-m-d H:i:s"),
					"product_id"    => $id,
                    "grup_id"       =>$urun->grup_id
				)
			);


			if ($insert) {

				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde eklendi",
					"type" => "success"
				);

			} else {

				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type" => "error"
				);
			}

		} else {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Yükleyeceğiniz dosya PDF formatında olmalıdır.",
				"type" => "error"
			);

			$this->session->set_flashdata("alert", $alert);


            redirect(base_url($this->yonlendirme."/dokuman/$id"));

			die();

		}

		// İşlemin Sonucunu Session'a yazma işlemi...
		$this->session->set_flashdata("alert", $alert);

        redirect(base_url($this->yonlendirme."/dokuman/$id"));



	}

	public function DosyaAktifPasif($id)
	{

		if($id) {

			$durumu = ($this->input->post("data") === "true") ? 1 : 0;

			$this->dosya_model->vt_guncelle(

				array(
					"id"=>$id
				),

				array(
					"isActive"=>$durumu
				)
			);


		}





	}

	public function MedyaAktifPasif($id)
	{

		if($id) {

			$durumu = ($this->input->post("data") === "true") ? 1 : 0;

			$this->resimler_model->vt_guncelle(

				array(
					"id"=>$id
				),

				array(
					"isActive"=>$durumu
				)
			);


		}





	}

    public function MedyaKapak($id)
    {

        if($id) {

            $durumu = ($this->input->post("data") === "true") ? 1 : 0;

            $this->resimler_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "isCover"=>$durumu
                )
            );


        }





    }





	public function Medyasil($id)
	{
		$eski_yol= $this->resimler_model->cek(
			array(
				"id"=>$id
			)
		);

		$sil = $this->resimler_model->vt_sil(
			array(
				'id'=>$id
			)

			);

		if($sil) {

			unlink("uploads/{$this->klasor}/$eski_yol->img_url");
			unlink("uploads/{$this->klasor}/100x100/$eski_yol->img_url");
			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			$alert=alert("İşlem Başarılı","Kayıt başarılı bir şekilde silindi","success");
			$this->session->set_flashdata("alert",$alert);
			header("Refresh: 0; url=".$geldigi_sayfa."");

		}else {

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			$alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");
			$this->session->set_flashdata("alert",$alert);
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}

	}


	public function MedyaToplusil($id)

	{

		$resimbul = $this->resimler_model->tumu(
			array(
				'product_id'=>$id
			)
		);

		foreach ($resimbul as $resim) {

			$size=$this->cozunurluk_model->tumu();

			foreach ($size as $ebat) {
				error_reporting(0);
				$orj_sil=unlink("uploads/{$this->klasor}/$resim->img_url");
				$boyut_sil=unlink("uploads/{$this->klasor}/$ebat->klasor/$resim->img_url");

				$this->resimler_model->vt_sil(
					array(
						'id'=>$resim->id
					)
				);

			}

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			$alert=alert("İşlem Başarılı","Tüm kayıtlar başarılı bir şekilde silindi","success");
			$this->session->set_flashdata("alert",$alert);
			header("Refresh: 0; url=".$geldigi_sayfa."");




		}

		if($sil) {

			unlink("uploads/{$this->klasor}/$eski_yol->img_url");
			unlink("uploads/{$this->klasor}/100x100/$eski_yol->img_url");
			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}else {

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}





	}


	public function Pdfsil($id)
	{
		 $eski_yol= $this->dosya_model->cek(
			array(
				"id"=>$id
			)
		);



		$sil = $this->dosya_model->vt_sil(
			array(
				'id'=>$id
			)

		);

		if($sil) {
			unlink("uploads/pdf/$eski_yol->img_url");
			$alert=alert("İşlem Başarılı","PDF başarılı bir şekilde silindi","success");
			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}else {

			$geldigi_sayfa = $_SERVER['HTTP_REFERER'];
			$alert=alert("İşlem Başarısız","Lütfen tekrar deneyiniz","danger");
			header("Refresh: 0; url=".$geldigi_sayfa."");
		}
		$this->session->set_flashdata("alert",$alert);





	}


	public function urun_foto_siralama(){

		$data=$this->input->post("data");

		parse_str($data, $siralama);

		$items = $siralama["siralama"];

		foreach ($items as $sira =>$id) {

			$this->resimler_model->vt_guncelle(

				array(
					"id"=>$id,
					"rank !="  =>$sira
				),

				array(
					"rank"=>$sira
				)

			);

		}

	}













}
