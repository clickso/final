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
                    <div class="col-12 ">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-10">

                                        <h4 class="page-title mb-0 font-size-18">Kategoriler</h4>


                                    </div>

                                    <div class="col-12 col-md-2">
                                        <?php $this->load->view("includes/breadcrumb");?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- end page title -->




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

<script>

</script>


<?php $this->load->view("includes/footer");?>

</body>

</html>
