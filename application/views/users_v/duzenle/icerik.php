<div class="col-12">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Kullanıcı Bilgileri</h4>
			<hr>
			<form action="<?php echo base_url("users/guncelle/$item->id") ?>" method="POST">

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Kullanıcı Adı</label>
					<div class="col-md-10">
						<input class="form-control " type="text" name="full_name" value="<?= $item->full_name; ?>"
							   id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("full_name"); ?></span></span>
						<?php } ?></div>
				</div>

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">E-Posta</label>
					<div class="col-md-4">
						<input class="form-control" type="email" name="email" readonly  value="<?= $item->email; ?>"
							   id="example-text-input">
						</div>
					<label for="example-text-input" class="col-md-2 col-form-label">Yeni E-Posta</label>
					<div class="col-md-4">
						<input class="form-control" type="email" name="yeniemail"
							   id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("yeniemail"); ?></span></span>
						<?php } ?></div>
				</div>



				<div class="mb-3 row">

					<div class="col-12">
						<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>

					</div>
				</div>


			</form>


		</div>
	</div>
</div>
<!-- end col -->

<div class="col-12">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Yeni Şifre Oluştur</h4>
			<hr>
			<form action="<?php echo base_url("users/yeni_sifre/$item->id") ?>" method="POST">



				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Yeni Şifre</label>
					<div class="col-md-4">
						<input class="form-control" type="password" name="password"
							   id="example-text-input">
						<?php if(isset($form_error)){ ?>
							<small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
						<?php } ?>
					</div>
					<label for="example-text-input" class="col-md-2 col-form-label">Yeni Şifre Tekra</label>
					<div class="col-md-4">
						<input class="form-control" type="password" name="re_password"
							   id="example-text-input">
						<?php if(isset($form_error)){ ?>
							<small class="pull-right input-form-error"> <?php echo form_error("re_password"); ?></small>
						<?php } ?>
						</div>
				</div>



				<div class="mb-3 row">

					<div class="col-12">
						<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Şifreyi Yenile</button>

					</div>
				</div>


			</form>


		</div>
	</div>
</div>

<div class="col-12">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Telefon Numarasını Güncelle</h4>
			<hr>
			<form action="<?php echo base_url("users/yeni_tel/$item->id") ?>" method="POST">



				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Mevcut Numaranız</label>
					<div class="col-md-4">
						<input class="form-control" type="text" value="<?= $item->telefon; ?>" readonly name="telefon"
							   id="example-text-input">
						<?php if(isset($form_error)){ ?>
							<small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
						<?php } ?>
					</div>
					<label for="example-text-input" class="col-md-2 col-form-label">Yeni Numaranız</label>
					<div class="col-md-4">
						<input name="re_telefon" id="input-mask" class="form-control input-mask"
							   data-inputmask="'mask': '999-999-99-99'">
						<span class="text-muted">Örnek Numara (555-123-11-11)</span>
						<?php if(isset($form_error)){ ?>
							<small class="pull-right input-form-error"> <?php echo form_error("re_password"); ?></small>
						<?php } ?>
					</div>
				</div>



				<div class="mb-3 row">

					<div class="col-12">
						<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Şifreyi Yenile</button>

					</div>
				</div>


			</form>


		</div>
	</div>
</div>


<script src="<?=base_url("assets/libs/jquery/jquery.min.js");?>"></script>
<!-- form mask -->
<script src="<?=base_url("assets/libs/inputmask/min/jquery.inputmask.bundle.min.js");?>"></script>

<!-- form mask init -->
<script src="<?=base_url("assets/js/pages/form-mask.init.js");?>"></script>
