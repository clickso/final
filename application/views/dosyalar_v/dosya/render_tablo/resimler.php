<?php if(empty($resimler)){ ?>

	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<i class="mdi mdi-check-all me-2"></i> Henüz Resim Eklenmemiş

	</div>

<?php } else{ ?>

	<table class="table table-bordered mb-0">

		<thead>
		<tr>
			<th>#Sıra</th>
			<th>#id</th>
			<th>Görsel</th>
			<th>Durumu</th>
			<th>Cover</th>
			<th>Aksiyon</th>
		</tr>
		</thead>
		<tbody
			class="sortable"
			data-url="<?=base_url("urunler/urun_foto_siralama")?>"
		>
		<?php foreach ($resimler as $resim) {?>
			<tr id="siralama-<?php echo $resim->id;?>">
				<td>1</td>
				<td><?php echo $resim->id;?></td>
				<td> <img width="50" height="50" src="<?php echo base_url("uploads/{$klasor}/100x100/$resim->img_url");?>" class="img-responsive"/>  </td>
				<td>
					<input
						data-url="<?php echo base_url("urunler/MedyaAktifPasif/$resim->id");?>"
						class="durum"
						type="checkbox"
						id="switch<?=$resim->id;?>"
						switch="none"
						<?php echo ($resim->isActive) ? "checked" : ""; ?>

					/>
					<label class="form-label" for="switch<?=$resim->id;?>" ></label>
				</td>

				<td>

					<input
							data-url="<?php echo base_url("urunler/MedyaKapak/$resim->id/$resim->product_id");?>"
							class="cover"
							type="checkbox"
							id="switch-umur-<?=$resim->id;?>"
							switch="none"
							<?php echo ($resim->isCover) ? "checked" : ""; ?>

					/>
					<label class="form-label" for="switch-umur-<?=$resim->id;?>" ></label>
				</td>

				<td>
					<button
						data-url="<?= base_url("urunler/Medyasil/$resim->id");?>"
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
