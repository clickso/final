<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayar extends MY_Controller {

	public $klasor="";

	public function __construct()
	{
		parent::__construct();
		$this->klasor="ayar_v";
		$this->load->model("ayar_model");
		$this->load->model("diller_model");
        $this->load->model("kategoriler_model");
        $this->load->model("varyant_model");
        $this->load->model("varyant_iliski_model");
        $this->load->model("kategori_iliski_model");
		$this->load->model("cozunurluk_model");
		$this->load->model("seo_model");
		$this->load->model("urun_varyant_model");
		$this->load->model("grupmenu_model");
		$this->load->model("tekilmenu_model");
		$this->load->model("ceviriler_model");
		$this->load->model("ceviri_iliski_model");

        $this->load->model("topbar_model");
        $this->load->model("footer_model");
        $this->load->helper('url');
        $this->load->model('Menu_model', 'manager');
        $this->load->helper('my_helper');


		if(!get_active_user()){
			redirect(base_url("login"));
		}



	}

	//  Listeleme
	public function index()
	{

		/** Tablodan Verilerin Getirilmesi.. */
		$items = $this->ayar_model->cek(
			array(
				"id"=>1
			)
		);
		$diller = $this->diller_model->tumu(
			array()

		);

		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->diller=$diller;
		$viewData->alt_klasor="listele";
		$viewData->items=$items;


		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}





	public function logo()
	{

		/** Tablodan Verilerin Getirilmesi.. */
		$items = $this->ayar_model->cek(
			array(
				"id"=>1
			)
		);
		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="logo";
		$viewData->items=$items;

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	public function seo()
	{

		/** Tablodan Verilerin Getirilmesi.. */

		$diller = $this->diller_model->tumu(
			array()

		);

		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->diller=$diller;
		$viewData->alt_klasor="seo";


		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}


    public function altvaryantaktif($id)
    {

        if($id) {

            $durumu = ($this->input->post("data") === "true") ? 1 : 0;

            $this->urun_varyant_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "isActive"=>$durumu
                )
            );


        }


    }

	public function dilekle()
	{




		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->alt_klasor="dilekle";


		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

    public function kategorivitrin($id)
    {

        if($id) {

            $durumu = ($this->input->post("data") === "true") ? 1 : 0;

            $this->kategoriler_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "vitrin"=>$durumu
                )
            );


        }


    }

    public function kategoriekle()
    {




        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->alt_klasor="kategoriekle";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function kat($id) {



        $guncelle=$this->kategoriler_model->vt_guncelle(

            array(
                "id"=>$id,
            ),

            array(
                "rank"=>$this->input->post("sira")
            )

        );

        if($guncelle) {
            echo "başarılı";
            die();
        } else {
            echo "başarısız";
            echo "başarısız";
        }
    }

    public function kategorisiralama(){

        $data=$this->input->post("data");

        parse_str($data, $siralama);

        $items = $siralama["siralama"];

        foreach ($items as $sira =>$id) {

            $this->kategoriler_model->vt_guncelle(

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

    public function kategoriduzenle($id)
    {
        $item = $this->kategoriler_model->cek(
            array(
                'id'=>$id
            )

        );
        $diller = $this->diller_model->tumu(
            array()

        );




        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->item=$item;
        $viewData->diller=$diller;
        $viewData->alt_klasor="kategoriduzenle";


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function kategoriler()
    {


        $diller = $this->diller_model->tumu(
            array()

        );
        $items = $this->kategoriler_model->tumu(
            array(
                'stamp_id'=>2,
                'ust_kategori'=>0
            )

        );

        $urun = $this->kategoriler_model->tumu(
            array(
                'stamp_id'=>1,
                'ust_kategori'=>0
            )

        );



        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->items=$items;
        $viewData->urun=$urun;
        $viewData->diller=$diller;
        $viewData->alt_klasor="kategoriler";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function ceviriler()
    {


        $diller = $this->diller_model->tumu(
            array()

        );
        $items = $this->ceviriler_model->tumu(
            array(
                'stamp_id'=>2,
                'ust_kategori'=>0
            )

        );

        $urun = $this->ceviriler_model->tumu(
            array(
                'stamp_id'=>1,
                'ust_kategori'=>0
            )

        );



        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->items=$items;
        $viewData->urun=$urun;
        $viewData->diller=$diller;
        $viewData->alt_klasor="ceviriler";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }
    public function cevirisil($id)
    {

        $insert = $this->ceviriler_model->cek(

            array(
                "id"=>$id
            )

        );

        $grupsil = $this->ceviri_iliski_model->vt_sil(

            array(
                "dil_stamp"=>$insert->dil_stamp
            )

        );



        if ($grupsil) {



            $sil = $this->ceviriler_model->vt_sil(

                array(
                    "id"=>$id
                )

            );



            $alert=alert("İşlem Başarılı","Kategori Silindi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/ceviriler"));

    }
    public function ceviriduzenle($id)
    {
        $item = $this->ceviriler_model->cek(
            array(
                'id'=>$id
            )

        );
        $diller = $this->diller_model->tumu(
            array()

        );




        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->item=$item;
        $viewData->diller=$diller;
        $viewData->alt_klasor="ceviriduzenle";


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function ceviri_dil_guncelle($id)
    {

        $gelenseo=$this->input->post("seo_url");

        if($gelenseo) {
            $seo=seo($this->input->post("seo_url"));
        }else {
            $seo=seo($this->input->post("title"));
        }


        $insert = $this->ceviri_iliski_model->vt_guncelle(

            array(
                "id"=>$id
            ),

            array(
                "title" => $this->input->post("title"),
                "seo_url"   =>$seo


            )
        );

        if ($insert) {

            $alert=alert("İşlem Başarılı","Çeviri Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/ceviriler"));

    }
    public function varyant_dil_kaydet($dil,$item,$stamp)
    {



        $gelenseo=$this->input->post("seo_url");

        if($gelenseo) {
            $seo=seo($this->input->post("seo_url"));
        }else {
            $seo=seo($this->input->post("title"));
        }


        $insert = $this->varyant_iliski_model->vt_kayit(

            array(
                "title" => $this->input->post("title"),
                "seo_url"   =>$seo,
                "dil_stamp" =>$stamp,
                "dil_id" =>$dil


            )
        );

        if ($insert) {

            $alert=alert("İşlem Başarılı","Çeviri Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/ceviriler"));

    }
    public function ceviri_dil_kaydet($dil,$item,$stamp)
    {



        $gelenseo=$this->input->post("seo_url");

        if($gelenseo) {
            $seo=seo($this->input->post("seo_url"));
        }else {
            $seo=seo($this->input->post("title"));
        }


        $insert = $this->ceviri_iliski_model->vt_kayit(

            array(
                "title" => $this->input->post("title"),
                "seo_url"   =>$seo,
                "dil_stamp" =>$stamp,
                "dil_id" =>$dil


            )
        );

        if ($insert) {

            $alert=alert("İşlem Başarılı","Çeviri Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/ceviriler"));

    }

    public function yeniceviri()

    {
        $file_name = seo($this->input->post("ad"))."-".rand(1000,9999999)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/img/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);




        $upload = $this->upload->do_upload("logo");

        if($this->input->post("logo")) {

            $uploaded_file = $this->upload->data("file_name");
        } else {

            $uploaded_file = $this->upload->data("file_name");

        }


        $dilstamp_id=rand(1000000000,9999999999);
        $tumdiller = $this->diller_model->tumu();

        $insert = $this->ceviriler_model->vt_kayit(

            array(
                "ad" => $this->input->post("ad"),
                "dil_stamp" =>$dilstamp_id,
                "stamp_id" => $this->input->post("stamp_id"),
                "ust_kategori" => $this->input->post("ust_kategori"),
                "seo_url"   =>seo($this->input->post("ad")),
                "img_url" => $uploaded_file,

            )
        );

        if($insert) {

            foreach ($tumdiller as $dil) {

                $insert = $this->ceviri_iliski_model->vt_kayit(

                    array(
                        "dil_id"=>$dil->id,
                        "title" => $this->input->post("ad"),
                        "dil_stamp" =>$dilstamp_id,
                        "seo_url"   =>seo($this->input->post("ad"))

                    )
                );
            }

            if ($insert) {

                $alert=alert("İşlem Başarılı","Çeviri Eklendi", "success");
            }else {
                $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
            }

        }










        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/ceviriler"));

    }

    public function ceviriekle()
    {




        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->alt_klasor="ceviriekle";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function varyant()
    {


        $diller = $this->diller_model->tumu(
            array()

        );
        $items = $this->kategoriler_model->tumu(
            array("stamp_id"=>1)

        );



        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->items=$items;
        $viewData->diller=$diller;
        $viewData->alt_klasor="varyant";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function kategorivaryant ($id) {

        $diller = $this->diller_model->tumu(
            array()

        );
        $items = $this->varyant_model->tumu(
            array("kategori_id"=>$id)

        );

        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->items=$items;
        $viewData->kategori_id=$id;
        $viewData->diller=$diller;
        $viewData->alt_klasor="varyantiliski";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function kategorivaryantsil($id)
    {

        $insert = $this->varyant_model->cek(

            array(
                "id"=>$id
            )

        );

        $grupsil = $this->varyant_model->vt_sil(

            array(
                "dil_stamp"=>$insert->dil_stamp
            )

        );



        if ($grupsil) {



            $sil = $this->varyant_model->vt_sil(

                array(
                    "id"=>$id
                )

            );



            $alert=alert("İşlem Başarılı","Alt Varyant Silindi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/varyant"));

    }

    public function altvaryantiliski ($id) {

        $diller = $this->diller_model->tumu(
            array(

            )

        );
        $items = $this->urun_varyant_model->tumu(
            array("varyant_id"=>$id)

        );


        $item= $this->varyant_model->tumu(
            array("kategori_id"=>$id)

        );

        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->items=$items;
        $viewData->item=$item;
        $viewData->kategori_id=$id;
        $viewData->diller=$diller;
        $viewData->alt_klasor="altvaryantiliski";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function altvaryant ($id) {

        $diller = $this->diller_model->tumu(
            array(

            )

        );
        $items = $this->urun_varyant_model->tumu(
            array("varyant_id"=>$id)

        );

        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->items=$items;
        $viewData->kategori_id=$id;
        $viewData->diller=$diller;
        $viewData->alt_klasor="altvaryant";

        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function altvaryantsil($id)
    {

        $insert = $this->urun_varyant_model->cek(

            array(
                "id"=>$id
            )

        );

        $grupsil = $this->urun_varyant_model->vt_sil(

            array(
                "dil_stamp"=>$insert->dil_stamp
            )

        );



        if ($grupsil) {



            $sil = $this->urun_varyant_model->vt_sil(

                array(
                    "id"=>$id
                )

            );



            $alert=alert("İşlem Başarılı","Alt Varyant Silindi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/varyant"));

    }

    public function varyantekle($id)
    {



        $items = $this->kategoriler_model->cek(
            array('id'=>$id)

        );


        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->item=$items;
        $viewData->alt_klasor="varyantekle";


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function kategoriyevaryantekle($id)

    {


        $file_name = seo($this->input->post("ad"))."-".rand(1000,9999999)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/img/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);




        $upload = $this->upload->do_upload("logo");

        if($this->input->post("logo")) {

            $uploaded_file = $this->upload->data("file_name");
        } else {

            $uploaded_file = $this->upload->data("file_name");

        }


        $dilstamp_id=rand(1000000000,9999999999);
        $tumdiller = $this->diller_model->tumu();

        $insert = $this->varyant_model->vt_kayit(

            array(
                "kategori_id"=>$id,
                "varyant" => $this->input->post("ad"),
                "dil_stamp" =>$dilstamp_id,
                "seo_url"   =>seo($this->input->post("ad")),
                "img_url" => $uploaded_file,

            )
        );

        if($insert) {

            foreach ($tumdiller as $dil) {

                $insert = $this->varyant_iliski_model->vt_kayit(

                    array(
                        "dil_id"=>$dil->id,
                        "kategori_id"=>$id,
                        "title" => $this->input->post("ad"),
                        "dil_stamp" =>$dilstamp_id,
                        "seo_url"   =>seo($this->input->post("ad"))

                    )
                );
            }

            if ($insert) {

                $alert=alert("İşlem Başarılı","Kategori Eklendi", "success");
            }else {
                $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
            }

        }










        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function altvaryantekle($id)

    {




        $dilstamp_id=rand(1000000000,9999999999);
        $tumdiller = $this->diller_model->tumu();

        $insert = $this->urun_varyant_model->vt_kayit(

            array(
                "varyant_id"=>$id,
                "title" => $this->input->post("ad"),
                "dil_stamp" =>$dilstamp_id,
                "seo_url"   =>seo($this->input->post("ad")),

            )
        );

        if($insert) {

            foreach ($tumdiller as $dil) {

                $insert = $this->varyant_iliski_model->vt_kayit(

                    array(
                        "dil_id"=>$dil->id,
                        "kategori_id"=>$id,
                        "title" => $this->input->post("ad"),
                        "dil_stamp" =>$dilstamp_id,
                        "seo_url"   =>seo($this->input->post("ad"))

                    )
                );
            }

            if ($insert) {

                $alert=alert("İşlem Başarılı","Kategori Eklendi", "success");
            }else {
                $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
            }

        }










        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/varyant"));

    }

    public function varyantduzenle($id)
    {
        $item = $this->varyant_model->cek(
            array(
                'id'=>$id
            )

        );
        $diller = $this->diller_model->tumu(
            array()

        );




        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->item=$item;
        $viewData->diller=$diller;
        $viewData->alt_klasor="varyantduzenle";


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function altvaryantduzenle($id)
    {
        $item = $this->urun_varyant_model->cek(
            array(
                'id'=>$id
            )

        );


        $diller = $this->diller_model->tumu(
            array()

        );




        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->item=$item;
        $viewData->diller=$diller;
        $viewData->alt_klasor="altvaryantduzenle";


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function diller()
	{



		$items = $this->diller_model->tumu(
			array(),"rank ASC"

		);

		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->items=$items;
		$viewData->alt_klasor="diller";

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

    public function menu()
    {

        $viewData =new stdClass() ;

        $this->load->view("menu-duzenle");



    }

    public function cozunurluk()
	{

		/** Tablodan Verilerin Getirilmesi.. */

		$items = $this->cozunurluk_model->tumu(
			array()

		);

		$viewData =new stdClass() ;
		$viewData->klasor=$this->klasor;
		$viewData->items=$items;
		$viewData->alt_klasor="cozunurluk";

		$this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
	}

	public function cozunurluk_ekle()
	{



		$viewData =new stdClass() ;


		$this->load->view("ayar_v/cozunurluk/ekle/index");
	}

	public function dilAktifPasif($id)
	{

		if($id) {

			$durumu = ($this->input->post("data") === "true") ? 1 : 0;

			$this->diller_model->vt_guncelle(

				array(
					"id"=>$id
				),

				array(
					"isActive"=>$durumu
				)
			);


		}

	}

	public function dilsiralama(){

		$data=$this->input->post("data");

		parse_str($data, $siralama);

		$items = $siralama["siralama"];

		foreach ($items as $sira =>$id) {

			$this->diller_model->vt_guncelle(

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

	public function dilsil($id)
	{





		$sil = $this->diller_model->vt_sil(
			array(
				'id'=>$id
			),

			);

		if($sil) {

            $grupbul = $this->grupmenu_model->cek(
                array(
                    'dil'=>$id
                ),

            );

            $menusil = $this->tekilmenu_model->vt_sil(
                array(
                    'group_id'=>$grupbul->id
                ),

            );

            $grupsil = $this->grupmenu_model->vt_sil(
                array(
                    'id'=>$grupbul->id
                ),

            );



            $alert=array(
				"text"=> "İşlem Başarılı",
				"type"=>"success"
			);
		}else {

			$alert=array(
				"text"=> "İşlem Başarısız",
				"type"=>"danger"
			);


		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("ayar/diller"));


	}

	public function yenidil()
	{

		$limit=lisansbilgisi();
		$dillimit=$limit->dillimit;

		$tumdiller = $this->diller_model->tumu();

		$tumdiller = $this->diller_model->tumu();
		$toplamdil=count($tumdiller);


		if ($toplamdil<$dillimit) {


			$insert = $this->diller_model->vt_kayit(

				array(
					"dil_ad" => $this->input->post("dil_ad"),
					"dil_url" => $this->input->post("dil_url"),
                    "zaman"		=> date("Y-m-d H:i:s"),
					"isActive"=>1


				)
			);
            $item_id = $this->db->insert_id();

			// TODO Alert sistemi eklenecek...
			if($insert){

                $menuekle = $this->grupmenu_model->vt_kayit(

                    array(
                        "title" => $this->input->post("dil_ad"),
                        "dil" =>$item_id



                    )
                );




				$dilgetir = $this->diller_model->cek(

					array(
						"dil_url" => $this->input->post("dil_url")

					)
				);


				$seoekle = $this->seo_model->vt_kayit(

					array(
						"dil_id" => $dilgetir->id,
						"title" => "Lütfen yenil dil için başlık ekleyiniz",
						"desc" => "Lütfen yenil dil için açıklama ekleyiniz",

					)
				);


				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde eklendi",
					"type"  => "success"
				);

			} else {

				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);
			}
		} else {
			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Maksimum sayıda dil eklenmiştir, yeni dil eklemek için Clickso ile iletişime geçiniz.",
				"type"  => "error"
			);
		}



		// İşlemin Sonucunu Session'a yazma işlemi...
		$this->session->set_flashdata("alert", $alert);

		redirect(base_url("ayar/dilekle"));

	}

    public function yenikategori()

    {
        $file_name = seo($this->input->post("ad"))."-".rand(1000,9999999)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/img/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);




        $upload = $this->upload->do_upload("logo");

        if($this->input->post("logo")) {

            $uploaded_file = $this->upload->data("file_name");
        } else {

            $uploaded_file = $this->upload->data("file_name");

        }


        $dilstamp_id=rand(1000000000,9999999999);
        $tumdiller = $this->diller_model->tumu();

        $insert = $this->kategoriler_model->vt_kayit(

            array(
                "ad" => $this->input->post("ad"),
                "dil_stamp" =>$dilstamp_id,
                "stamp_id" => $this->input->post("stamp_id"),
                "ust_kategori" => $this->input->post("ust_kategori"),
                "seo_url"   =>seo($this->input->post("ad")),
                "img_url" => $uploaded_file,

            )
        );

        if($insert) {

            foreach ($tumdiller as $dil) {

                $insert = $this->kategori_iliski_model->vt_kayit(

                    array(
                        "dil_id"=>$dil->id,
                        "title" => $this->input->post("ad"),
                        "dil_stamp" =>$dilstamp_id,
                        "seo_url"   =>seo($this->input->post("ad"))

                    )
                );
            }

            if ($insert) {

                $alert=alert("İşlem Başarılı","Kategori Eklendi", "success");
            }else {
                $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
            }

        }










        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function kategoriikonguncelle($id)
    {

        $file_name = seo($this->input->post("ad"))."-".rand(1000,9999999)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/img/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("logo");

        if($upload) {

            $uploaded_file = $this->upload->data("file_name");

            $insert = $this->kategoriler_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(

                    "icon_url"=>$uploaded_file,
                    "icon"=>$this->input->post("icon"),


                )
            );


        } else {

            $insert = $this->kategoriler_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "icon"=>$this->input->post("icon"),


                )
            );

        }




        if ($insert) {

            $alert=alert("İşlem Başarılı","Kategori Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function kategori_dil_kaydet($dil,$item,$stamp)
    {



        $gelenseo=$this->input->post("seo_url");

        if($gelenseo) {
            $seo=seo($this->input->post("seo_url"));
        }else {
            $seo=seo($this->input->post("title"));
        }


        $insert = $this->kategori_iliski_model->vt_kayit(

            array(
                "title" => $this->input->post("title"),
                "seo_url"   =>$seo,
                "dil_stamp" =>$stamp,
                "dil_id" =>$dil


            )
        );

        if ($insert) {

            $alert=alert("İşlem Başarılı","Kategori Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function kategoriguncelle($id)
    {

        $file_name = seo($this->input->post("ad"))."-".rand(1000,9999999)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/img/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("logo");

        if($upload) {

            $uploaded_file = $this->upload->data("file_name");

            $insert = $this->kategoriler_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "ad" => $this->input->post("ad"),
                    "img_url"=>$uploaded_file,
                    "seo_url"   =>seo($this->input->post("ad"))

                )
            );


        } else {

            $insert = $this->kategoriler_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "ad" => $this->input->post("ad"),
                    "seo_url"   =>seo($this->input->post("ad"))

                )
            );

        }




        if ($insert) {

            $alert=alert("İşlem Başarılı","Kategori Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function varyantguncelle($id)
    {

        $file_name = seo($this->input->post("ad"))."-".rand(1000,9999999)."." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/img/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("logo");

        if($upload) {



            $uploaded_file = $this->upload->data("file_name");

            $insert = $this->urun_varyant_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "title" => $this->input->post("ad"),
                    "img_url"=>$uploaded_file,
                    "seo_url"   =>seo($this->input->post("ad"))

                )
            );


        } else {

            $insert = $this->urun_varyant_model->vt_guncelle(

                array(
                    "id"=>$id
                ),

                array(
                    "title" => $this->input->post("ad"),
                    "seo_url"   =>seo($this->input->post("ad"))

                )
            );

        }




        if ($insert) {

            $alert=alert("İşlem Başarılı","Varyant Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        $geldigi_sayfa = $_SERVER['HTTP_REFERER'];

        redirect($geldigi_sayfa);


    }

    public function kategorisil($id)
    {

        $insert = $this->kategoriler_model->cek(

            array(
                "id"=>$id
            )

        );

        $grupsil = $this->kategori_iliski_model->vt_sil(

            array(
                "dil_stamp"=>$insert->dil_stamp
            )

        );



        if ($grupsil) {



            $sil = $this->kategoriler_model->vt_sil(

                array(
                    "id"=>$id
                )

            );



            $alert=alert("İşlem Başarılı","Kategori Silindi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function kategori_dil_guncelle($id)
    {
        $gelenseo=$this->input->post("seo_url");

        if($gelenseo) {
            $seo=seo($this->input->post("seo_url"));
        }else {
            $seo=seo($this->input->post("title"));
        }


        $insert = $this->kategori_iliski_model->vt_guncelle(

            array(
                "id"=>$id
            ),

            array(
                "title" => $this->input->post("title"),
                "seo_url"   =>$seo


            )
        );

        if ($insert) {

            $alert=alert("İşlem Başarılı","Kategori Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/kategoriler"));

    }

    public function varyant_dil_guncelle($id)

    {



        $gelenseo=$this->input->post("seo_url");
        $yonlendirme=$this->input->post("yonlendirme");



        if($gelenseo) {
            $seo=seo($this->input->post("seo_url"));
        }else {
            $seo=seo($this->input->post("title"));
        }


        $insert = $this->varyant_iliski_model->vt_guncelle(

            array(
                "id"=>$id
            ),

            array(
                "title" => $this->input->post("title"),
                "seo_url"   =>$seo


            )
        );

        if ($insert) {

            $alert=alert("İşlem Başarılı","Varyant Dil Güncellendi", "success");
        }else {
            $alert=alert("İşlem Başarızı","Hatal Oluştu", "danger");
        }


        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);
        $geldigi_sayfa = $_SERVER['HTTP_REFERER'];

        redirect($geldigi_sayfa);

    }

	public function yenicozunurluk()
	{
		$insert = $this->cozunurluk_model->vt_kayit(

			array(
				"genislik" => $this->input->post("genislik"),
				"yukseklik" => $this->input->post("yukseklik"),
				"klasor"	=>$this->input->post("genislik")."x".$this->input->post("yukseklik"),

			)
		);


		if($insert){

			$alert = array(
				"title" => "İşlem Başarılı",
				"text" => "Kayıt başarılı bir şekilde eklendi",
				"type"  => "success"
			);

		} else {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Kayıt Ekleme sırasında bir problem oluştu",
				"type"  => "error"
			);
		}

		// İşlemin Sonucunu Session'a yazma işlemi...
		$this->session->set_flashdata("alert", $alert);

		redirect(base_url("ayar/cozunurluk"));

	}


    public function guncelle(){


        $this->load->library("form_validation");

        // Kurallar yazilir..



        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"     => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"  => "Lütfen geçerli bir <b>{field}</b> giriniz"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            $wp=$this->input->post("whatsapp");
            $wp=str_replace("-","",$wp);
            $tel=$this->input->post("phone_1");
            $tel=str_replace("-","",$tel);
            $tel2=$this->input->post("phone_2");
            $tel2=str_replace("-","",$tel);



            $insert = $this->ayar_model->vt_guncelle(
                array(
                    "id"=>1
                ),
                array(
                    "company_name"			=> $this->input->post("company_name"),
                    "phone_1"				=> $tel,
                    "phone_2"				=> $tel2,
                    "whatsapp"				=> $wp,
                    "vergino"				=> $this->input->post("vergino"),
                    "vergidairesi"				=> $this->input->post("vergidairesi"),
                    "mersis"				=> $this->input->post("mersis"),
                    "bildirim_ok"				=> $this->input->post("bildirim_ok"),
                    "email"					=> $this->input->post("email"),
                    "facebook"				=> $this->input->post("facebook"),
                    "twitter"				=> $this->input->post("twitter"),
                    "linkedin"				=> $this->input->post("linkedin"),
                    "adress"				=> $this->input->post("adress"),
                    "instagram"				=> $this->input->post("instagram"),
                    "youtube"				=> $this->input->post("youtube"),
                    "recapthca_site_key"	=> $this->input->post("recapthca_site_key"),
                    "recapthca_secret_key"	=> $this->input->post("recapthca_secret_key"),
                    "google_maps"			=> $this->input->post("google_maps"),
                    "smtp_host"				=> $this->input->post("smtp_host"),
                    "smtp_user"				=> $this->input->post("smtp_user"),
                    "smtp_pass"				=> $this->input->post("smtp_pass"),
                    "meta_tagmanager"				=> $this->input->post("meta_tagmanager"),
                    "smtp_port"				=> $this->input->post("smtp_port"),
                    "smtp_ssl"				=> $this->input->post("smtp_ssl"),
                    "meta_header"			=> $this->input->post("meta_header"),
                    "meta_footer"			=> $this->input->post("meta_footer"),
                    "anasayfa_header_tip"			=> $this->input->post("anasayfa_header_tip"),
                    "sayfa_header_tip"			=> $this->input->post("sayfa_header_tip"),
                    "urunler_header_tip"			=> $this->input->post("urunler_header_tip"),
                    "footer_tip"			=> $this->input->post("footer_tip"),
                    "hb_color"			=> $this->input->post("hb_color"),
                    "hb"			=> $this->input->post("hb"),
                    "hborder_color"			=> $this->input->post("hborder_color"),
                    "hb_border"			=> $this->input->post("hb_border"),


                    "menu_link"			=> $this->input->post("menu_link"),
                    "menu_hover"			=> $this->input->post("menu_hover"),
                    "alt_menu_link"			=> $this->input->post("alt_menu_link"),
                    "alt_menu_hover"			=> $this->input->post("alt_menu_hover"),
                    "libackgroundhover"			=> $this->input->post("libackgroundhover"),
                    "libghover"			=> $this->input->post("libghover"),
                    "liboderhover"			=> $this->input->post("liboderhover"),
                    "liahover"			=> $this->input->post("liahover"),
                    "libackgorund"			=> $this->input->post("libackgorund"),
                    "ulbg"			=> $this->input->post("ulbg"),
                    "mobilicon"			=> $this->input->post("mobilicon"),
                    "footerbg"			=> $this->input->post("footerbg"),
                    "footerp"			=> $this->input->post("footerp"),
                    "footera"			=> $this->input->post("footera"),
                    "footerh"			=> $this->input->post("footerh"),
                    "footerbottombackground"			=> $this->input->post("footerbottombackground"),
                    "footerbottom_p"			=> $this->input->post("footerbottom_p"),
                    "footerbottom_a"			=> $this->input->post("footerbottom_a"),
                    "topbarcolor"			=> $this->input->post("topbarcolor"),
                    "topbarlinkcolor"			=> $this->input->post("topbarlinkcolor"),
                    "topbarlinkhover"			=> $this->input->post("topbarlinkhover"),
                    "topbarsosyal"			=> $this->input->post("topbarsosyal"),
                    "custom_css"			=> $this->input->post("custom_css"),
                    "custom_mobil_css"			=> $this->input->post("custom_mobil_css"),
                    "satis"			=> $this->input->post("satis"),


                    "smtp_gonderilecek_adres"=> $this->input->post("smtp_gonderilecek_adres"),

                    "createdAt"     		=> date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }



            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("ayar"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->klasor = $this->klasor;
            $viewData->subViewFolder = "listele";
            $viewData->form_error = true;

            redirect(base_url("ayar"));

        }

    }

	public function seo_guncelle($id)
	{


		$insert = $this->seo_model->vt_guncelle(
			array(
				"id" => $id
			),
			array(
				"desc" => $this->input->post("desc"),
				"title" => $this->input->post("title")

			)
		);

		// TODO Alert sistemi eklenecek...
		if($insert){

			$alert = array(
				"title" => "İşlem Başarılı",
				"text" => "Kayıt başarılı bir şekilde eklendi",
				"type"  => "success"
			);

		} else {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Kayıt Ekleme sırasında bir problem oluştu",
				"type"  => "error"
			);
		}



		// İşlemin Sonucunu Session'a yazma işlemi...
		$this->session->set_flashdata("alert", $alert);

		redirect(base_url("ayar/seo"));

	}

	public function logo_guncelle()
	{
		$ayar=ayarlar();
		$firma=seo($ayar->company_name);
		unlink("uploads/img/$ayar->logo");

		if ($_FILES["logo"]["name"] == "") {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Lütfen bir görsel seçiniz",
				"type" => "error"
			);


			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("ayar"));

			die();
		}

			// Upload Süreci...

		    $file_name = $firma ."-light-logo". "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

			$config["allowed_types"] = "jpg|jpeg|png";
			$config["upload_path"] = "uploads/img/";
			$config["file_name"] = $file_name;

			$this->load->library("upload", $config);

			$upload = $this->upload->do_upload("logo");

			if ($upload) {

				$uploaded_file = $this->upload->data("file_name");

				$insert = $this->ayar_model->vt_guncelle(
					array(
						"id" => 1
					),
					array(

						"logo" => $uploaded_file,
						"createdAt" => date("Y-m-d H:i:s")
					)
				);

				// TODO Alert sistemi eklenecek...
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
					"text" => "Görsel yüklenirken bir problem oluştu",
					"type" => "error"
				);

				$this->session->set_flashdata("alert", $alert);

				redirect(base_url("ayar/logo"));

				die();

			}

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("ayar/logo"));



	}

	public function dark_logo_guncelle()
	{
		$ayar=ayarlar();
		$firma=seo($ayar->company_name);
		unlink("uploads/img/$ayar->darklogo");

		if ($_FILES["darklogo"]["name"] == "") {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Lütfen bir görsel seçiniz",
				"type" => "error"
			);

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("ayar"));

			die();
		}

		// Upload Süreci...

		$file_name = $firma ."-dark-logo". "."  . pathinfo($_FILES["darklogo"]["name"], PATHINFO_EXTENSION);

		$config["allowed_types"] = "jpg|jpeg|png";
		$config["upload_path"] = "uploads/img/";
		$config["file_name"] = $file_name;

		$this->load->library("upload", $config);

		$upload = $this->upload->do_upload("darklogo");

		if ($upload) {

			$uploaded_file = $this->upload->data("file_name");

			$insert = $this->ayar_model->vt_guncelle(
				array(
					"id" => 1
				),
				array(

					"darklogo" => $uploaded_file,
					"createdAt" => date("Y-m-d H:i:s")
				)
			);

			// TODO Alert sistemi eklenecek...
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
				"text" => "Görsel yüklenirken bir problem oluştu",
				"type" => "error"
			);

			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("ayar/logo"));

			die();

		}

		// İşlemin Sonucunu Session'a yazma işlemi...
		$this->session->set_flashdata("alert", $alert);

		redirect(base_url("ayar/logo"));


	}

	public function fav_guncelle()
	{


		if ($_FILES["fav"]["name"] == "") {

			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Lütfen bir görsel seçiniz",
				"type" => "error"
			);

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("ayar"));

			die();
		}
		$ayar=ayarlar();
		unlink("uploads/img/$ayar->fav");
		$file_name = seo("fav") . "." . pathinfo($_FILES["fav"]["name"], PATHINFO_EXTENSION);

		$config["allowed_types"] = "jpg|jpeg|png";
		$config["upload_path"] = "uploads/img/";
		$config["file_name"] = $file_name;

		$this->load->library("upload", $config);

		$upload = $this->upload->do_upload("fav");

		if ($upload) {

			$uploaded_file = $this->upload->data("file_name");

			$insert = $this->ayar_model->vt_guncelle(
				array(
					"id" => 1
				),
				array(

					"fav" => $uploaded_file,
					"createdAt" => date("Y-m-d H:i:s")
				)
			);

			// TODO Alert sistemi eklenecek...
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
				"text" => "Görsel yüklenirken bir problem oluştu",
				"type" => "error"
			);

			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("ayar/logo"));

			die();

		}

		// İşlemin Sonucunu Session'a yazma işlemi...
		$this->session->set_flashdata("alert", $alert);

		redirect(base_url("ayar/logo"));



	}

    public function bar_guncelle($id)
    {


        $insert = $this->topbar_model->vt_guncelle(
            array(
                "id" => $id
            ),
            array(
                "title" => $this->input->post("title")

            )
        );

        // TODO Alert sistemi eklenecek...
        if($insert){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde eklendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }



        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/topbar"));

    }

    public function footer_guncelle($id)
    {


        $insert = $this->footer_model->vt_guncelle(
            array(
                "id" => $id
            ),
            array(
                "title" => $this->input->post("title")

            )
        );

        // TODO Alert sistemi eklenecek...
        if($insert){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde eklendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }



        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/footer"));

    }

    public function bar_kaydet($id)
    {


        $insert = $this->topbar_model->vt_kayit(

            array(
                "title" => $this->input->post("title"),
                "dil_id" => $id

            )
        );

        // TODO Alert sistemi eklenecek...
        if($insert){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde eklendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }



        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/topbar"));

    }

    public function footer_kaydet($id)
    {


        $insert = $this->footer_model->vt_kayit(

            array(
                "title" => $this->input->post("title"),
                "dil_id" => $id

            )
        );

        // TODO Alert sistemi eklenecek...
        if($insert){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde eklendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }



        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("ayar/footer"));

    }


    public function topbar()
    {

        /** Tablodan Verilerin Getirilmesi.. */

        $diller = $this->diller_model->tumu(
            array()

        );

        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->diller=$diller;
        $viewData->alt_klasor="topbar";


        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }

    public function footer()
    {



        /** Tablodan Verilerin Getirilmesi.. */

        $diller = $this->diller_model->tumu(
            array()

        );

        $viewData =new stdClass() ;
        $viewData->klasor=$this->klasor;
        $viewData->diller=$diller;
        $viewData->alt_klasor="footer";



        $this->load->view("{$this->klasor}/{$viewData->alt_klasor}/index",$viewData);
    }







}
