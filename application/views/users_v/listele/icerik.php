<div class="col-12">
	<div class="card">

		<div class="card-body">

			<?php if(empty($items)){ ?>

				<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<i class="mdi mdi-check-all me-2"></i> Kayıt bulunamadı

				</div>

			<?php } ?>



			<table id="datatable-buttons"
				   class="table table-striped table-bordered dt-responsive nowrap  "
				   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead>
				<tr>
					<td style="width: 5%">Sıra </td>
					<th>Ürün Adı</th>


					<th style="width: 6%;">Durumu</th>

					<th style="width: 6%;">Aksiyon</th>
				</tr>
				</thead>

				<tbody>

				<?php foreach ($items as $item) {?>
				<tr id="siralama-<?php echo $item->id;?>">
					<td><i class="bx bx-move"></i> </td>
					<td><?=$item->full_name?></td>


					<td>
						<input
							   data-url="<?php echo base_url("users/AktifPasif/$item->id");?>"
                               class="durum"
							   type="checkbox"
							   id="switch<?=$item->id;?>"
							   switch="none"
							   <?php echo ($item->isActive) ? "checked" : ""; ?>

						/>
						<label class="form-label" for="switch<?=$item->id;?>" ></label>
					</td>

					<td>
						<button
						data-url="<?= base_url("users/sil/$item->id");?>"
						data-bs-toggle="tooltip"
						title="Sil"
						class="btn btn-outline-danger waves-effect waves-light buton-sil">
								<i class="bx bx-trash-alt"></i>
						</button>




						<a href="<?= base_url("users/duzenle/$item->id");?>"
						type="button" class="btn btn-outline-primary waves-effect waves-light"
						data-bs-toggle="tooltip"
						title="Düzenle"
						>
						<i class="bx bx-edit"></i>
						</a>



					</td>
				</tr>
				<?php } ?>


				</tbody>
			</table>
			<a href="<?= base_url("users/ekle");?>" class="btn btn-primary" type="submit"><i class="mdi mdi-plus"></i> Yeni Kullanıcı</a>
		</div>
	</div>
</div>
<!-- end col -->

