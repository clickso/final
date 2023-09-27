<!doctype html>
<html lang="tr">



<head>

	<?php $this->load->view("includes/head");?>

    <?php
    header("Refresh: 60;");
    ?>

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

				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="page-title mb-0 font-size-18">Günlük Siparişler</h4>


						</div>
					</div>
				</div>
				<!-- end page title -->




				<div class="row">

                    <script>
                        $(document).ready(function () {
                          $.ajax({
                              url:"<?=base_url("siparisler/bildirim");?>",
                              type:"post",
                              success: function (result) {
                                  console.log(result);

                              }
                          })
                        })
                    </script>





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
