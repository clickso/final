<div class="col-12">
	<div class="card">

		<div class="card-body">

			<?php if(empty($items)){ ?>

				<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<i class="mdi mdi-check-all me-2"></i> Kayıt bulunamadı

				</div>

			<?php } ?>



			<table
				   class="table table-striped table-bordered dt-responsive nowrap DataTable  "
				   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead>
				<tr>
					<th>Sıraa </th>
                    <th>Düzenle</th>
                    <th>Kategori</th>
					<th width="20%">Ürün Adı</th>


					<th >Durum</th>

					<th >PDF Yükle</th>
					<th >Ürün Görselleri</th>

					<th >Diller</th>


				</tr>
				</thead>

				<tbody
				class="sortable"
				data-url="<?=base_url($yonlendirme."/siralama")?>"
				>

				<?php foreach ($items as $item) {?>
				<tr id="siralama-<?php echo $item->id;?>">
					<td><i class="bx bx-move"></i> </td>
                    <td>
                        <a href="<?= base_url($yonlendirme."/grupduzenle/$item->id");?>"
                           type="button" class="btn btn-outline-secondary waves-effect waves-light"
                           data-bs-toggle="tooltip"
                           title="Ana Ürünü Düzenle"><i class="bx bx-edit-alt"></i>

                        </a>
                    </td>

                    <?php
                    if ($item->kategori_id==99999) {
                        $tag="";
                    } else {
                        $mevcut=$this->kategoriler_model->cek(
                            array(
                                'stamp_id'=>$stamp_id,
                                'id'=>$item->kategori_id
                            )


                        );
                        $tag=$mevcut->ad;

                    }




                    ?>
                    <td><?=$tag;?></td>
					<td><?=$item->title?></td>


					<td>
						<input
							   data-url="<?php echo base_url($yonlendirme."/AktifPasif/$item->id");?>"
                               class="durum"
							   type="checkbox"
							   id="switch<?=$item->id;?>"
							   switch="none"
							   <?php echo ($item->isActive) ? "checked" : ""; ?>

						/>
						<label class="form-label" for="switch<?=$item->id;?>" ></label>
					</td>



					<td>	<a href="<?= base_url($yonlendirme."/dokuman/$item->id");?>"
							   type="button" class="btn btn-outline-primary waves-effect waves-light"
							   data-bs-toggle="tooltip"
							   title="Katalog,kullanım klavuzu vb.">
							<i class="bx bx-image-add"></i> PDF
						</a>
					</td>

					<td>	<a href="<?= base_url($yonlendirme."/medya/$item->id");?>"
							   type="button" class="btn btn-outline-primary waves-effect waves-light"
							   data-bs-toggle="tooltip"
							   title="Görsel Ekle"
						>
							<i class="bx bx-image-add"></i> Galeri
						</a>
					</td>


					<td>


						<?php foreach ($diller as $dil) {?>
								<?php

								$this->load->model($model);
								$dilduzen=$this->$model->cek(
									array(
											'grup_id'=>$item->grup_id,
											'dil' =>$dil->id,
									)
								);
								?>
							<?php
							if ($dilduzen) {?>
								<a href="<?= base_url($yonlendirme."/duzenle/$dilduzen->id");?>"
							   type="button" class="btn btn-outline-secondary waves-effect waves-light"
							   data-bs-toggle="tooltip"
							   title="<?=$dil->dil_ad;?> Düzenle">
								<img src="<?=base_url("assets/images/flags/$dil->dil_url")?>.jpg" alt="Header Language" height="16">
							</a>
							<?php } else { ?>
								<a href="<?= base_url($yonlendirme."/dilekle/$item->grup_id");?>"
								   type="button" class="btn btn-outline-secondary waves-effect waves-light"
								   data-bs-toggle="tooltip"
								   title="Eksik Dil Mevcut"
								>
									Veri Kopyala
								</a>
								<?php }?>
						<?php } ?>


					</td>


				</tr>
				<?php } ?>


				</tbody>
			</table>


		</div>
	</div>
</div>
<!-- end col -->

