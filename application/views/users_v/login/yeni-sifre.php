

<?php $ayar = ayarlar(); ?>
<form class="form-horizontal mb-3" style="width: 60%;" method="post" action="<?php echo base_url("userop/yeni_sifre"); ?>">

	<div class=" mb-3">
		<label class="form-label text-dark " for="username">E-Posta Adresiniz</label>
		<input type="text" class="form-control" id="username" name="user_email" placeholder="E-posta adresiniz">
		<?php if(isset($form_error)){ ?>
			<small class="pull-right input-form-error"> <?php echo form_error("user_email"); ?></small>
		<?php } ?>
	</div>

	<?php

	if($_GET["kayit-bulunamadi"]=="ok") { ?>
		<span class="text-danger"><?= "E-posta adresine ait üyelik bulunamadı"; ?></span>
	<?php }
	?>




	<div class="mt-3">
		<button class="btn btn-dark w-100 waves-effect waves-light" type="submit">Yeni Şifre Gönder</button>
	</div>




</form>


<form class="form-horizontal mt-3" style="width: 60%;" method="post" action="<?php echo base_url("formlar/sms"); ?>">
	<hr>
	<div class=" mb-3">


		<?php if(isset($form_error)){ ?>
			<small class="pull-right input-form-error"> <?php echo form_error("user_email"); ?></small>
		<?php } ?>
	</div>

	<label class="form-label text-dark " for="username">Telefon Numaranız</label>
	<?php

	if($_GET["durum"]=="no") { ?>
		<span class="bg-danger text-white w-100 d-block p-3 rounded-3 mb-3"><?= "Kayıtlı Üyelik Bulunamadı"; ?></span>
	<?php }
	?>
	<input name="telefon" id="input-mask" class="form-control input-mask"
		   data-inputmask="'mask': '999-999-99-99'">
	<span class="text-muted">Örnek Numara (555-123-11-11)</span>

	<?php

	if($_GET["kayit-bulunamadi"]=="ok") { ?>
		<span class="text-danger"><?= "E-posta adresine ait üyelik bulunamadı"; ?></span>
	<?php }
	?>






	<div class="mt-3">
		<button class="btn btn-primary w-100 waves-effect waves-light" type="submit"><i class="mdi mdi-send-outline"></i> Şifremi Sms İle Gönder</button>
	</div>





</form>

<div class="mt-4 ">
	<a href="<?php echo base_url("login");?>" class="text-muted"><i
				class="mdi mdi-lock me-1"></i> Giriş Yap</a>
</div>
