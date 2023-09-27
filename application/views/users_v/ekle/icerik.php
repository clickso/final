<div class="col-6 mx-auto">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Yeni Kullanıcı Oluştur</h4>
			<hr>
			<form action="<?php echo base_url("users/save/") ?>" method="POST">

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Kullanıcı Adı</label>
					<div class="col-md-10">
						<input class="form-control " type="text" name="user_name" id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("user_name"); ?></span></span>
						<?php } ?></div>
				</div>

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Ad Soyad </label>
					<div class="col-md-10">
						<input class="form-control " type="text" name="full_name" id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("full_name"); ?></span></span>
						<?php } ?></div>
				</div>

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">E-Posta</label>
					<div class="col-md-10">
						<input class="form-control" type="email" name="email"
							   id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("email"); ?></span></span>
						<?php } ?>
					</div>

				</div>

				<hr>

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Şifre</label>
					<div class="col-md-10">
						<input class="form-control" type="password" name="password"
							   id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("password"); ?></span></span>
						<?php } ?>
					</div>

				</div>

				<div class="mb-3 row">
					<label for="example-text-input" class="col-md-2 col-form-label">Şifre Tekrar</label>
					<div class="col-md-10">
						<input class="form-control" type="password" name="re_password"
							   id="example-text-input">
						<?php if (isset($form_error)) { ?>
							<span class="text-danger float-start"><span
										class="float-end "> <?php echo form_error("re_password"); ?></span></span>
						<?php } ?>
					</div>

				</div>



				<div class="mb-3 row">

					<div class="col-12">
						<button class="btn btn-primary" type="submit"><i class="mdi mdi-plus"></i> Ekle</button>

					</div>
				</div>


			</form>







		</div>
	</div>
</div>
<!-- end col -->
