<?php error_reporting(0); ?>

<!doctype html>
<html lang="en">
<head>
	<?php $this->load->view("includes/head"); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">


	<style>
		body {
			padding: 0;
			margin: 0;
			height: 100vh;
			font-family: "Nunito Sans";
		}

		.clickbg {
			background-image: url('https://clickso.com.tr/loginbg.jpg');
			background-size: cover;
		}
		.form-control {
			line-height: 2;
		}

		.bg-custom {
			background-color: #fff;
		}

		.btn-custom {
			background-color: #3e3d56;
			color: #fff;
		}

		.btn-custom:hover {
			background-color: #33313f;
			color: #fff;
		}

		label {
			color: #fff;
		}

		a,
		a:hover {
			color: #fff;
			text-decoration: none;
		}

		a,
		a:hover {
			text-decoration: none;
		}

		@media(max-width: 932px) {
			.display-none {
				display: none !important;
			}
		}
	</style>
</head>

<body>
<div class="row m-0 h-100">
	<div class="col p-0 text-center d-flex justify-content-center align-items-center display-none clickbg" >

	</div>
	<div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100">
		<img class="mb-3" width="40%" src="https://clickso.com.tr/loginlogo.png" >
		<?php if ($_GET["sifre"]=="yenile") {
			$this->load->view("{$viewFolder}/{$subViewFolder}/yeni-sifre");
		} else {
			$this->load->view("{$viewFolder}/{$subViewFolder}/content");
		} ?>

	</div>
</div>
</body>

<script src="<?=base_url("assets/libs/jquery/jquery.min.js");?>"></script>
<!-- form mask -->
<script src="<?=base_url("assets/libs/inputmask/min/jquery.inputmask.bundle.min.js");?>"></script>

<!-- form mask init -->
<script src="<?=base_url("assets/js/pages/form-mask.init.js");?>"></script>
</html>
