<?php if(empty($resimler)){ ?>

	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<i class="mdi mdi-check-all me-2"></i> Henüz Belge Yüklenmemiş

	</div>

<?php } else{ ?>

	<table class="table table-bordered mb-0">

		<thead>
		<tr>
			<th width="5%">Dili</th>
			<th width="5%">#id</th>
			<th width="45%">Dosya Adı</th>
			<th width="15%">İndir</th>
			<th width="5%">Durum</th>

			<th width="5%">Aksiyon</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($resimler as $resim) {?>


            <?php
            $bayrak = $this->diller_model->cek(
                array(
                    'id'=>$resim->dil,
                )

            );


            ?>

			<tr id="siralama-<?php echo $resim->id;?>">
				<td><img width="30px" class="mt-2" src="<?=base_url("assets/images/flags/$bayrak->dil_url")?>.jpg"> </td>
				<td><?php echo $resim->id;?></td>
				<td> <?php echo $resim->ad;?>  </td>
				<td>
					<a href="<?php echo base_url("uploads/pdf/$resim->img_url");?>"

							data-bs-toggle="tooltip"
							title="İndir"
					   		target="_blank"
							class="btn btn-outline-dark waves-effect waves-light ">
						<i class="bx bxs-file-pdf"></i> İndir
					</a>

					  </td>
				<td>
					<input
						data-url="<?php echo base_url($yonlendirme."/DosyaAktifPasif/$resim->id");?>"
						class="durum"
						type="checkbox"
						id="switch<?=$resim->id;?>"
						switch="none"
						<?php echo ($resim->isActive) ? "checked" : ""; ?>

					/>
					<label class="form-label" for="switch<?=$resim->id;?>" ></label>
				</td>

				<td>
					<button
						data-url="<?= base_url($yonlendirme."/Pdfsil/$resim->id");?>"
						data-bs-toggle="tooltip"
						title="Sil"
						class="btn btn-outline-danger waves-effect waves-light buton-sil">
						<i class="bx bx-trash-alt"></i>
					</button>
				</td>
			</tr>
		<?php } ?>

		</tbody>
	</table>

<?php }  ?>
