<!doctype html>
<html lang="tr">



<head>

	<?php $this->load->view("includes/head");?>



    <style type="text/css" media="print" />
    body {visibility:hidden;}
    .print {visibility:visible;}
    </style>




</head>

<body data-layout="horizontal" data-topbar="dark">


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





				<div class="row">






					<?php $this->load->view("{$klasor}/{$alt_klasor}/icerik");?>
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

<?php
$bildirim=$this->session->flashdata("bildirim");
if ($bildirim) {?>


    YENİ SİPARİŞ





<?php } ?>



</body>

</html>
