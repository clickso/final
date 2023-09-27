<?php

class Userop extends MY_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";
		$this->load->model("ayar_model");
        $this->load->model("user_model");


    }

    public function login(){


        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


	public function validate()
	{


		$ayar = $this->ayar_model->cek(
			array(
				"id"  => 1
			)
		);

		$captcha_response = trim($this->input->post('g-recaptcha-response'));

		if($captcha_response != '')
		{


			$keySecret = $ayar->recapthca_secret_key;

			$check = array(
				'secret'		=>	$keySecret,
				'response'		=>	$this->input->post('g-recaptcha-response')
			);

			$startProcess = curl_init();

			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

			curl_setopt($startProcess, CURLOPT_POST, true);

			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

			$receiveData = curl_exec($startProcess);

			$finalResponse = json_decode($receiveData, true);

			if($finalResponse['success'])
			{

				if(get_active_user()){
					redirect(base_url());
				}

				$this->load->library("form_validation");

				// Kurallar yazilir..
				$this->form_validation->set_rules("user_email", "E-posta", "required|trim|valid_email");
				$this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[6]");

				$this->form_validation->set_message(
					array(
						"required"    => "<b>{field}</b> alanı doldurulmalıdır",
						"valid_email" => "Lütfen geçerli bir e-posta adresi giriniz",
						"min_length"  => "<b>{field}</b> en az 6 karakterden oluşmalıdır",
						"max_length"  => "<b>{field}</b> en fazla 8 karakterden oluşmalıdır",
					)
				);

				// Form Validation Calistirilir..
				if($this->form_validation->run() == FALSE){

					$viewData = new stdClass();

					/** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "login";
					$viewData->form_error = true;

					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

				} else {


					$user = $this->user_model->get(
						array(
							"email"     => $this->input->post("user_email"),
							"password"  => md5($this->input->post("user_password")),
							"isActive"  => 1
						)
					);

					if($user){

						$alert = array(
							"title" => "İşlem Başarılı",
							"text" => "$user->full_name hoşgeldiniz",
							"type"  => "success"
						);

						$this->session->set_userdata("user", $user);
						$this->session->set_flashdata("alert", $alert);

						redirect(base_url());

					} else {



						$alert = array(
							"title" => "İşlem Başarısız",
							"text" => "Lütfen giriş bilgilerinizi kontrol ediniz",
							"type"  => "error"
						);

						$this->session->set_flashdata("alert", $alert);

						$viewData = new stdClass();

						$viewData->viewFolder = $this->viewFolder;
						$viewData->subViewFolder = "login";

						$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);



					}

				}




			}
			else
			{
				$this->session->set_flashdata('message', 'Validation Fail Try Again');
				redirect('login');
			}
		}
		else
		{

			redirect('login?durum=captcha');
		}
	}




	public function yeni_sifre(){

    	$gelen_mail=$this->input->post("user_email");

		$uye_sor = $this->user_model->get(
			array(
				"email"  => $gelen_mail
			)
		);


		if($uye_sor){

			$yeni_sifre=rand(100000,200000);

			$kayit = $this->user_model->update(
				array(
					"id" => 1
				),
				array(
					"password"			=> md5($yeni_sifre),
					"guvenlik" =>1
				)
			);

			$ayar = $this->ayar_model->cek(
				array(
					"id"  => 1
				)
			);

			$logo = base_url("uploads/img/").$ayar->logo;
			$site=base_url();

			$config = mailayar();

			$this->load->library("email", $config);
			$this->email->from($ayar->smtp_user, $ayar->company_name);
			$this->email->to($gelen_mail);
			$this->email->subject("Yeni Sifreniz Oluşturuldu");
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
				redirect('login?mail=ok');
			} else {

				echo $this->email->print_debugger();

			}


		} else {
			redirect('login?sifre=yenile&kayit-bulunamadi=ok');
		}






	}





    public function eski_login(){


        if(get_active_user()){
            redirect(base_url());
        }

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("user_email", "E-posta", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[6]|max_length[8]");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz",
                "min_length"  => "<b>{field}</b> en az 6 karakterden oluşmalıdır",
                "max_length"  => "<b>{field}</b> en fazla 8 karakterden oluşmalıdır",
            )
        );

        // Form Validation Calistirilir..
        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {


            $user = $this->user_model->get(
                array(
                    "email"     => $this->input->post("user_email"),
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"  => 1
                )
            );

            if($user){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "$user->full_name hoşgeldiniz",
                    "type"  => "success"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {

                // Hata Verilecek...



                redirect(base_url("login?durum=captcha"));

            }

        }
    }

    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));

    }

}
