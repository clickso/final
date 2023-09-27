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
                            <h4 class="page-title mb-0 font-size-18">Alt Varyant Ekle</h4>

                            <?php $this->load->view("includes/breadcrumb");?>

                        </div>
                    </div>
                </div>
                <!-- end page title -->




                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <?php
                                $product_id = $this->uri->segment(3, 0);
                                ?>

                                <form action="<?php echo base_url("ayar/altvaryantekle/$product_id")?>" method="POST"  enctype="multipart/form-data" >
                                    <div class="mb-3 row">

                                        <label for="example-text-input" class="col-md-2 col-form-label"></label>

                                    </div>

                                    <div class="mb-3 row">

                                        <label for="example-text-input" class="col-md-2 col-form-label">Tipi</label>
                                        <div class="col-md-10">
                                            <select name="tipi" class="form-control" id="">
                                                <option value="0">Ana Varyant</option>
                                                <option value="1">Alt Varyant</option>
                                                <option value="2">Tablo Varyant</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <label for="example-text-input" class="col-md-2 col-form-label">Varyant Adı</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" placeholder="Varyant adını giriniz örneğin; Kurumsal" name="ad" id="example-text-input">
                                        </div>
                                    </div>
                                    <hr>





                                    <hr class="mt-5">

                                    <a href="<?=base_url("ayar/altvaryantekle");?>"  class="btn btn-light" type="submit">Geri Dön</a>
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
