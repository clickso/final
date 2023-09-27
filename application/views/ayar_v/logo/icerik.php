<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="mb-3 pb-3 border-bottom">Light Logo</h4>
			<p>Bu işlem sitenizde yer alan tüm logoları etkliyecektir.</p>


			<form action="<?php echo base_url("ayar/logo_guncelle/")?>" method="POST" enctype="multipart/form-data">

				<div class="mb-3 p-5 border row">
					<div class="col-md-3 text-center p-3"> <img class="rounded mr-2" alt="200x200" width="200" src="<?php echo base_url("uploads/img/$items->logo");?>" data-holder-rendered="true"> </div>

					<div class="col-md-8">
						<div class="input-group">
							<input type="file" name="logo"  class="form-control" id="inputGroupFile02">
							<label class="input-group-text" for="inputGroupFile02">Yükle</label>
						</div>
					</div>
				</div>

				<div class="col-12">
					<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>
					<a href="<?=base_url("ayar")?>" class="btn btn-secondary" type="submit"><i class="fas fa-step-backward"></i> İptal</a>
				</div>
			</form>






			</div>
		</div>
	</div>




<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="mb-3 pb-3 border-bottom">Dark Logo</h4>
			<p>Bu işlem sitenizde yer alan tüm logoları etkliyecektir.</p>


			<form action="<?php echo base_url("ayar/dark_logo_guncelle/")?>" method="POST" enctype="multipart/form-data">

				<div class="mb-3 p-5 border row">
					<div class="col-md-3 p-3 text-center bg-dark"> <img class="rounded mr-2" alt="200x200" width="200" src="<?php echo base_url("uploads/img/$items->darklogo");?>" data-holder-rendered="true"> </div>

					<div class="col-md-8">
						<div class="input-group">
							<input type="file" name="darklogo"  class="form-control" id="inputGroupFile02">
							<label class="input-group-text" for="inputGroupFile02">Yükle</label>
						</div>
					</div>
				</div>

				<div class="col-12">
					<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>
					<a href="<?=base_url("ayar")?>" class="btn btn-secondary" type="submit"><i class="fas fa-step-backward"></i> İptal</a>
				</div>
			</form>






		</div>
	</div>
</div>

<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="mb-3 pb-3 border-bottom">İkon</h4>
			<p>Bu işlem sitenizde yer alan tüm logoları etkliyecektir.</p>


			<form action="<?php echo base_url("ayar/fav_guncelle/")?>" method="POST" enctype="multipart/form-data">

				<div class="mb-3 p-5 border row">
					<div class="col-md-3 p-3 text-center "> <img class="rounded mr-2" alt="200x200" width="100" src="<?php echo base_url("uploads/img/$items->fav");?>" data-holder-rendered="true"> </div>

					<div class="col-md-8">
						<div class="input-group">
							<input type="file" name="fav"  class="form-control" id="inputGroupFile02">
							<label class="input-group-text" for="inputGroupFile02">Yükle</label>
						</div>
					</div>
				</div>

				<div class="col-12">
					<button class="btn btn-primary" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>
					<a href="<?=base_url("ayar")?>" class="btn btn-secondary" type="submit"><i class="fas fa-step-backward"></i> İptal</a>
				</div>
			</form>






		</div>
	</div>
</div>


