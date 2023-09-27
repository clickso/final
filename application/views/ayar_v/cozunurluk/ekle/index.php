

<!doctype html>
<html lang="tr">



<head>

	<?php $this->load->view("includes/head");?>

</head>

<body data-layout="horizontal" data-topbar="dark">



<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<div class="container-fluid">
	<!-- Begin page -->
	<div id="layout-wrapper">

		<?php $this->load->view("includes/topbar");?>
		<?php $this->load->view("includes/menu");?>

		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">

			<div class="page-content">

				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="page-title mb-0 font-size-18">Resim Çözünürlüğü Ekle</h4>

							<?php $this->load->view("includes/breadcrumb");?>

						</div>
					</div>
				</div>
				<!-- end page title -->




				<div class="row">

					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h4 class=" d-block bg-soft-light p-3 border"> Yeni Çözünürlük</h4>



								<form action="<?php echo base_url("ayar/yenicozunurluk")?>" method="POST" >


									<div class="mb-3 row">

										<label for="example-text-input" class="col-md-2 col-form-label">Genişlik</label>
										<div class="col-md-10">
											<input class="form-control" type="text" placeholder="Dil adını giriniz örneğin; İngilizce" name="genislik" id="example-text-input">
										</div>
									</div>
									<hr>
									<div class="mb-3 row">
										<label for="example-text-input" class="col-md-2 col-form-label">Yükseklik</label>
										<div class="col-md-10">
											<input class="form-control" type="text" placeholder="Dil uzantığını giriniz" name="yukseklik" id="example-text-input">
										</div>
									</div>


									<hr class="mt-5">


									<button class="btn btn-success" type="submit"><i class="mdi mdi-update"></i> Ekle</button>

							</div>

							</form>






						</div>
					</div>
				</div>
				<!-- end row -->
			</div>
			<!-- End Page-content -->

			<?php $this->load->view("includes/footer_imza");?>
		</div>
		<!-- end main content-->

	</div>
	<!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->





<?php $this->load->view("includes/footer");?>

</body>

</html>
