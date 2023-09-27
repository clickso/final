<div class="col-12">

	<div class="card">
		<div class="card-body">

			<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

				<?php foreach ($diller as $dil) { ?>

					<?php
					$this->load->model("seo_model");
					$items = $this->seo_model->cek(
							array(
									'dil_id'=>$dil->id
							)
					);
					?>

					<li class="nav-item">
						<a class="nav-link <?php if ($dil->id ==1) { echo "active"; } ;?> " data-bs-toggle="tab" href="#<?=$dil->dil_ad;?>" role="tab" aria-selected="true">
							<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
							<span class="d-none d-sm-block"><img width="30px" src="<?=base_url("assets/images/flags/$dil->dil_url");?>.jpg"> <?=$dil->dil_ad;?></span>
						</a>
					</li>




				<?php } ?>



			</ul>

			<div class="tab-content p-3 text-muted">
				<?php foreach ($diller as $dil) { ?>

					<?php
					$this->load->model("seo_model");
					$items = $this->seo_model->cek(
							array(
									'dil_id'=>$dil->id
							)
					);
					?>



					<div class="tab-pane <?php if ($dil->id ==1) { echo "active"; } ;?>" id="<?=$dil->dil_ad;?>" role="tabpanel">
						<form action="<?php echo base_url("ayar/seo_guncelle/$items->id")?>" method="POST" >
						<label for="example-text-input" class="col-md-2 col-form-label">Anasayfa Başlık</label>
						<input class="form-control" type="text" value="<?=$items->title;?>" name="title" id="example-text-input">

							<label for="example-text-input" class="col-md-2 col-form-label">Anasayfa Açıklama</label>
							<input class="form-control" type="text" value="<?=$items->desc;?>" name="desc" id="example-text-input">

							<button class="btn mt-5 btn-success" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>
						</form>
					</div>








				<?php } ?>

			</div>

		</div>
	</div>

	</div>



