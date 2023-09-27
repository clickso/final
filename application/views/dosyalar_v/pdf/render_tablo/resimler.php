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

			<th>#id</th>
			<th>İndir</th>
			<th>Görüntüle</th>
			<th>Dosya Uzantısı</th>


			<th>Aksiyon</th>
		</tr>
		</thead>
		<tbody

		>
		<?php foreach ($resimler as $resim) {?>
			<tr id="siralama-<?php echo $resim->id;?>">

				<td><?php echo $resim->id;?></td>
				<td> <a download rel="noopener noreferrer" target="_blank" type="button" href="<?php echo base_url("uploads/pdf/$resim->url");?>" class="btn btn-outline-danger waves-effect waves-light"> <i class="bx bx-download"></i> İndir</a>  </td>
				<td> <a  type="button" href="<?php echo base_url("uploads/pdf/$resim->url");?>" class="btn btn-outline-primary waves-effect waves-light"><i class="fab far fa-eye"></i> Görüntüle</a>  </td>
				<td> <?php echo base_url("uploads/{$klasor}/$resim->url");?>  </td>

				<td>
					<button
						data-url="<?= base_url("dosyalar/Pdfsil/$resim->id");?>"
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
