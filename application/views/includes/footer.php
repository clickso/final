<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="<?=base_url();?>assets/libs/jquery/jquery.min.js"></script>





<script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?=base_url();?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?=base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- apexcharts -->
<script src="<?=base_url();?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="<?=base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url();?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<script src="<?=base_url();?>assets/js/pages/dashboard.init.js"></script>

<script src="<?=base_url();?>assets/js/app.js"></script>



<!-- Required datatable js -->
<script src="<?=base_url();?>assets/libs/jquery-ui-dist/jquery-ui.min.js"></script>

<script src="<?=base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?=base_url();?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


<!-- form repeater js -->
<script src="<?=base_url();?>/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>


<!-- Responsive examples -->
<script src="<?=base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?=base_url();?>assets/js/pages/datatables.init.js"></script>

<script src="<?=base_url();?>assets/libs/tinymce/tinymce.min.js"></script>
<script src="<?=base_url();?>assets/js/pages/form-editor.init.js"></script>

<!-- Sweet Alerts js -->
<script src="<?=base_url();?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?=base_url();?>assets/js/pages/sweet-alerts.init.js"></script>

<!-- Plugins js -->
<script src="<?=base_url();?>assets/libs/dropzone/min/dropzone.min.js"></script>

<script src="<?=base_url();?>assets/iziToast.min.js"></script>
<!-- form mask -->
<script src="<?=base_url();?>assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- form mask init -->
<script src="<?=base_url();?>assets/js/pages/form-mask.init.js"></script>
<script src="<?=base_url();?>assets/umur.js"></script>



<script src="<?=base_url();?>/assets/libs/select2/js/select2.min.js"></script>

<script src="<?=base_url();?>/assets/js/pages/form-advanced.init.js"></script>









<?php

$alert = $this->session->userdata("alert");
if($alert) {

	if($alert["type"]==="success") { ?>
			<script>
				iziToast.success({
					title: 'Tebrikler',
					position:'topCenter',
					message: '<?php echo $alert["text"];?>'
				});
			</script>


	<?php }else if ($alert["type"]==="error") { ?>

		<script>
			iziToast.error({
				title: 'Üzgünüm',
				position:'topCenter',
				message: '<?php echo $alert["text"];?>'
			});
		</script>

	<?php }


}

?>


