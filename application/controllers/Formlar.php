<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Formlar extends MY_Controller {

	 public $klasor = "";


	public function __construct()
	{
		parent::__construct();

		$this->klasor = "anasayfa_v";
		$this->load->model("ayar_model");
		$this->load->model("user_model");

	}

	public function destek()
	{
		if(!get_active_user()){
			redirect(base_url("login"));
		}
		$config = mailayar();


		$this->load->library("email", $config);
		$this->email->from($ayar->smtp_user, $ayar->company_name);
		$this->email->to($gelen_mail);
		$this->email->subject($ayar->company_name."- Teknik Destek Talebi");
		$this->email->message("
			
		<html lang=\"en-US\">

		<head>
    	<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\" />
    	<title>Reset Password Email Template</title>
    	<meta name=\"description\" content=\"Reset Password Email Template.\">
    	<style type=\"text/css\">
        a:hover {text-decoration: underline !important;}
    	</style>
		</head>

		<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">
    	<!--100% body table-->
    	<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"
        style=\"@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;\">
        <tr>
            <td>
                <table style=\"background-color: #f2f3f8; max-width:670px;  margin:0 auto;\" width=\"100%\" border=\"0\"
                    align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                    <tr>
                        <td style=\"height:80px;\">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style=\"text-align:center;\">
                          <a href=\"$site\" title=\"logo\" target=\"_blank\">
                            <img width=\"60\" src=\"$logo\" title=\"logo\" alt=\"logo\">
                          </a>
                        </td>
                    </tr>
                  
                    <tr>
                        <td>
                            <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"
                                style=\"max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);\">
                                <tr>
                                    <td style=\"height:40px;\">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style=\"padding:0 35px;\">
                                        <h1 style=\"color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;\">Yeni Şifreniz Oluşturuldu</h1>
                                        <span
                                            style=\"display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;\"></span>
                                        <p style=\"color:#455056; font-size:15px;line-height:24px; margin:0;\">
                                           Yeni Şifreniz ile artık giriş yapabilirsiniz.
                                        </p>
                                        <a href=\"javascript:void(0);\"
                                            style=\"background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;\">
                                            Yeni Şifreniz : $yeni_sifre</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"height:40px;\">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style=\"height:20px;\">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style=\"text-align:center;\">
                            <p style=\"font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;\">&copy; <strong>$site</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"height:80px;\">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
			");

		$send = $this->email->send();

		if($send){
			redirect('login?sifre=yenile&yeni-sifre=ok');
		} else {

			echo $this->email->print_debugger();

		}



	}

	public function sms() {

		 $tel=$this->input->post('telefon');


		$user = $this->user_model->get(
			array(
				"telefon"     => $tel

			)
		);





		if ($user) {
			$kullanicitelefon=$user->telefon;
			$mail=$user->email;


			$yenisifre=rand(100000,999999);
			$update = $this->user_model->update(
				array(
					'id'=>$user->id
				),

				array(
					"password"			=>md5($yenisifre),
					"guvenlik"		=>1

		)
		);
			$this -> load-> library("MesajPaneliApi");


			try {
				$smsApi = new MesajPaneliApi();
				$mesaj  = new TopluMesaj( 'Yönetim paneli şifreniz :'.$yenisifre.' Olarak belirlenmiştir.Lütfen şifreyi paylaşmayınız. Kullanıcı Adını:'.$mail, $kullanicitelefon );

				$smsCevap = $smsApi->topluMesajGonder( 'ClicksoBlsm', $mesaj );
			}
			catch ( Exception $e ) {
				echo $e->getMessage();
			}
			redirect(base_url("login?sms=ok"));


		} else {
			error_reporting(0);

			redirect(base_url("login?sifre=yenile&durum=no"));


		}





	}


}


