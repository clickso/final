
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title"><?=$item->title;?> -> Ürünü İçin Döküman Yükle</h4>


					<form action="<?php echo base_url($yonlendirme."/dosya_upload/$item->id");?>" method="POST" enctype="multipart/form-data">

						<div class="mb-3 mt-5 mb-5 p-5 border row">


							<div class="col-md-4">
								<input class="form-control " type="text" name="ad"  placeholder="Dosya Adını Giriniz" id="example-text-input">
							</div>

							<div class="col-md-5">
								<div class="input-group">
									<input type="file" name="logo"  class="form-control" id="inputGroupFile02">
									<label class="input-group-text" for="inputGroupFile02">Yükle</label>
								</div>
							</div>

							<div class="col-md-2">
								<select class="form-select" name="dil" aria-label="Default select example">
									<?php foreach ($diller as $dil) {?>
										<option value="<?=$dil->id;?>" ><?=$dil->dil_ad;?></option>
									<?php } ?>


								</select>
							</div>
						</div>

						<div class="col-12">
							<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Dosya Yükle</button>
							<a href="<?=base_url($yonlendirme)?>" class="btn btn-secondary" type="submit"><i class="fas fa-step-backward"></i> İptal</a>
						</div>
					</form>


				</div>


			</div>
		</div>
	</div>
	<!-- end col -->



	<div class="col-12">
		<div class="card">

			<div class="card-body render_yukle">




				<?php $this->load->view("{$klasor}/{$alt_klasor}/render_tablo/resimler.php");?>


			</div>
		</div>
	</div>
	<!-- end col -->
