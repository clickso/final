
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title"><?=$item->title;?> -> Görsel Yükle</h4>


				<div>
					<form data-url="<?php echo base_url("urunler/render_medya_upload/$item->id");?>" action="<?php echo base_url("urunler/medya_upload/$item->id");?>" id="dropyukle" class="dropzone">
						<div class="fallback">
							<input name="file" type="file" multiple="multiple">
						</div>
						<div class="dz-message needsclick">
							<div class="mb-3">
								<i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
							</div>

							<h4>Yüklemek istediğiniz görselleri sürükleyiniz</h4>
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
