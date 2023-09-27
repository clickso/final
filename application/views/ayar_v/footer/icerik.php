<div class="col-12">

	<div class="card">
		<div class="card-body">

			<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

				<?php foreach ($diller as $dil) { ?>

					<?php
					$this->load->model("seo_model");
					$items = $this->footer_model->cek(
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
					$items = $this->footer_model->cek(
							array(
									'dil_id'=>$dil->id
							)
					);


					?>


                    <?php if ($items) { ?>
					<div class="tab-pane <?php if ($dil->id ==1) { echo "active"; } ;?>" id="<?=$dil->dil_ad;?>" role="tabpanel">
						<form action="<?php echo base_url("ayar/footer_guncelle/$items->id")?>" method="POST" >
						<label for="example-text-input" class="col-md-2 col-form-label">Üst Menü Düzenle</label>

                            <textarea id="elm1" name="title"><?=$items->title ?></textarea>




							<button class="btn mt-5 btn-success" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>
						</form>
					</div>

                            <?php } else { ?>
                        <div class="tab-pane " id="<?=$dil->dil_ad;?>" role="tabpanel">
                            <form action="<?php echo base_url("ayar/footer_kaydet/$dil->id")?>" method="POST" >
                                <label for="example-text-input" class="col-md-2 col-form-label">Üst Menü Düzenle</label>

                                <textarea id="elm1" name="title"></textarea>




                                <button class="btn mt-5 btn-success" type="submit"><i class="mdi mdi-update"></i> Kaydet</button>
                            </form>
                        </div>
                    <?php }?>







				<?php } ?>



			</div>

		</div>
	</div>


	</div>



