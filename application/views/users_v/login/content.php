

<?php $ayar = ayarlar(); ?>

<?php

$alert=$this->session->userdata("alert", $alert);


?>



<form class="form-horizontal" method="post" action="<?php echo base_url("userop/validate"); ?>">
	<?php if ($alert) { ?>
		<div class="bg-danger rounded-3 mb-3 p-3 text-white">
			<i class="mdi mdi-alert-rhombus-outline"></i> Kullanıcı Bulunamadı
		</div>
	<?php } ?>

	<?php if($_GET["sms"]=="ok") { ?>
		<div class="bg-success rounded-3 mb-3 p-3 text-white">
			<i class="mdi mdi-check-bold"></i> Şifreniz SMS olarak gönderilmiştir.
		</div>
	<?php }?>

	<?php if($_GET["mail"]=="ok") { ?>
		<div class="bg-success rounded-3 mb-3 p-3 text-white">
			<i class="mdi mdi-check-bold"></i> Şifreniz E-posta olarak gönderilmiştir.
		</div>
	<?php }?>


	<div class="mb-3">
		<label class="form-label text-dark " for="username">Kullanıcı Adı</label>
		<input type="text" class="form-control" id="username" name="user_email" placeholder="E-posta adresiniz">
		<?php if(isset($form_error)){ ?>
			<small class="pull-right input-form-error"> <?php echo form_error("user_email"); ?></small>
		<?php } ?>
	</div>

	<div class="mb-3">
		<label class="form-label text-dark" for="userpassword">Şifre</label>
		<input type="password" class="form-control" id="userpassword" name="user_password"
			   placeholder="Şifreniz">

		<?php if(isset($form_error)){ ?>
			<small class="pull-right input-form-error"> <?php echo form_error("user_password"); ?></small>
		<?php } ?>
	</div>

	<div class="g-recaptcha" data-sitekey="<?php echo $ayar->recapthca_site_key;?>"></div>

	<?php if($_GET["durum"]=="captcha") { ?>

		<div class="alert alert-danger mt-2" role="alert">
			Lütfen Ben robot değilimi işaretliyiniz.
		</div>

	<?php } ?>

	<div class="form-check mt-3">
		<input type="checkbox" class="form-check-input" id="customControlInline">
		<label class="form-check-label text-dark" for="customControlInline">Beni Hatırla</label>
	</div>

	<div class="mt-3">
		<button class="btn btn-dark w-100 waves-effect waves-light" type="submit"> Giriş Yap</button>
	</div>



	<div class="mt-4 ">
		<a href="<?php echo base_url("login?sifre=yenile");?>" class="text-muted"><i
					class="mdi mdi-lock me-1"></i> Şifremi Unuttum</a>
	</div>
</form>
