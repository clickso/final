<?php if(empty($resimler)){ ?>

	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<i class="mdi mdi-check-all me-2"></i> Henüz Resim Eklenmemiş

	</div>

<?php } else{ ?>

	<table id="datatable-buttons"
		   class="table table-striped table-bordered dt-responsive nowrap  "
		   style="border-collapse: collapse; border-spacing: 0; width: 100%;">

		<thead>
		<tr>
			<th>#Sıra</th>
			<th>#id</th>
			<th>Görsel</th>
			<th>Url</th>

			<th>Aksiyon</th>
		</tr>
		</thead>
		<tbody

		>
		<?php foreach ($resimler as $resim) {?>
			<tr id="siralama-<?php echo $resim->id;?>">
				<td>1</td>
				<td><?php echo $resim->id;?></td>
				<td> <img width="50" height="50" src="<?php echo base_url("uploads/{$klasor}/$resim->url");?>" class="img-responsive"/>  </td>
				<td> <?php echo base_url("uploads/{$klasor}/$resim->url");?>  </td>

				<td>
					<button
						data-url="<?= base_url("dosyalar/Resimsil/$resim->id");?>"
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
