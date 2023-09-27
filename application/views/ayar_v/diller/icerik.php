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
					<th>Sıra ve İd </th>
					<th width="50%">Dil Adı</th>

					<th >Aktif/Pasif</th>
					<th >Sil</th>
				</tr>
				</thead>

				<tbody
				class="sortable"
				data-url="<?=base_url("ayar/dilsiralama")?>"
				>

				<?php foreach ($items as $item) {?>
				<tr id="siralama-<?php echo $item->id;?>">
					<td><i class="bx bx-move"></i> <?php echo $item->id;?> </td>
					<td><?=$item->dil_ad?></td>


					<td>
						<input
							   data-url="<?php echo base_url("ayar/dilAktifPasif/$item->id");?>"
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
								data-url="<?= base_url("ayar/dilsil/$item->id");?>"
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
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="col-12">
				<a href="<?=base_url("ayar/dilekle");?>" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="tooltip" title="" data-bs-original-title="Dil Ekle">
					<i class="bx bx-plus-circle"></i> Dil Ekle
				</a>
			</div>
		</div>
	</div>
</div>
<!-- end col -->

