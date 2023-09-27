<?php $lb=lisansbilgisi();  ?>

<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="https://clickso.com.tr/assets/img/logo-light.png" alt="">
				</div>
				<div class="col-12 col-md-8">
					<div class="table-responsive">
						<table class="table table-sm  table-bordered mb-0">

							<tbody>
							<tr>
								<th colspan="5" scope="3">Clickso Sanayi Ticaret Ltd. Şti.</th>

							</tr>
							<tr>
								<th scope="row">Adres</th>
								<td colspan="3">Çınardere, Doruk Plaza, Acar Sk. No:4 Kat:3,34896 Pendik/İstanbul</td>

							</tr>
							<tr>
								<th scope="row">Telefon</th>
								<td><a href="tel:+902162230244">0216 223 02 44</a></td>
								<th scope="row">Mail</th>
								<td><a href="mailto:info@clickso.com.tr">info@clickso.com.tr</a></td>

							</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-12">
					<hr>
					<h4>Teknik Destek</h4>
					<p>Teknik Destek almak için formu doldurun veya Whatsapp Destek hattı üzerinden canlı yardım alın.</p>
				</div>
				<?php
				$user=$this->session->userdata("user");
				$firma=$this->session->userdata("firmabilgi");
				$ayar=ayarlar();


				?>
				<div class="col-12 col-md-6 bg-light p-3 rounded-3 border-end">
					<h6>Teknik Destek Formu</h6>
					<form action="<?=base_url("formlar/destek");?>" method="post" class="needs-validation mb-3" novalidate>
						<div class="row">
							<div class="col-12 mt-3">
								<div class="mb-3 position-relative">
									<label class="form-label" for="validationTooltip01">Ad Soyad</label>
									<input type="text" class="form-control" id="validationTooltip01"
										   placeholder="Ad Soyad" value="<?=$user->full_name;?>" required>

								</div>
							</div>
							<div class="col-12 ">
								<div class="mb-3 position-relative">
									<label class="form-label" for="validationTooltip01">Telefon</label>
									<input type="text" class="form-control" id="validationTooltip01"
										   placeholder="Ad Soyad" value="<?=$ayar->phone_2;?>" required>

								</div>
							</div>

							<div class="col-12 ">
								<div class="mb-3 position-relative">
									<label class="form-label" for="validationTooltip01">Konu</label>
									<input type="text" class="form-control" id="validationTooltip01"
										   placeholder="Lütfen talebinizi belirtiniz."  required>

								</div>
							</div>

							<div class="col-12 ">
								<div class="mb-3 position-relative">
									<label class="form-label" for="validationTooltip01">Açıklama</label>
									<textarea required="" class="form-control" rows="5"></textarea>

								</div>
							</div>



						</div>

						<button class="btn btn-primary" type="submit">Gönder</button>
					</form>
				</div>

				<div class="col-12 col-md-6">
					<h6>Bizimle İletişime Geçin</h6>

					<div class="d-grid gap-2">
						<a href="https://wa.me/9<?=$firma->wp;?>" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1">Whatsapp Destek</a>
						<a href="mailto:info@clickso.com.tr" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1">E-Posta Gönder</a>
						<a href="https://clickso.com.tr" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1">Web Site</a>

					</div>

					<div class="card">
						<div class="card-body">
							<iframe src="<?=$firma->google_maps;?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>


</div>



