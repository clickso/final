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





        <div class="page-content">



            <div style="display: none" class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url("ayar/kategoriikonguncelle/$item->id")?>" method="POST" enctype="multipart/form-data" >
                                <div class="mb-3 row">
                                    <div class="col-12 col-md-3">
                                        <div class="card shadow-none border">
                                            <div class="card-body ">
                                                <img class="img-fluid" src="<?=base_url("uploads/img/$item->icon_url");?>" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-9 pt-3">

                                        <hr>

                                        <div class="mb-3 row">

                                            <label for="example-text-input" class="col-md-2 col-form-label">Kategori İkon</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input type="file" name="logo"  class="form-control" id="inputGroupFile02">
                                                    <label class="input-group-text" for="inputGroupFile02">Yükle</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="mb-3 row">

                                            <label for="example-text-input" class="col-md-2 col-form-label">Fontawsome  </label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input class="form-control" type="text"  value="<?=$item->icon;?>" name="icon" id="example-text-input">

                                                </div>
                                                <span class="d-block"><a target="_blank" href="https://fontawesome.com/search">İkon aramak için tıklayınız.</a></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>








                                <a href="<?=base_url("ayar/kategoriler");?>"  class="btn btn-light" type="submit">Geri Dön</a>
                                <button class="btn btn-success" type="submit"><i class="mdi mdi-update"></i>  i Güncelle</button>

                        </div>

                        </form>
                    </div>
                </div>
            </div>



            <div class="row">

                <div class="col-12">
                    <div style="display: none;" class="card">
                        <div class="card-body">


                            <form action="<?php echo base_url("ayar/kategoriguncelle/$item->id")?>" method="POST" enctype="multipart/form-data" >
                                <div class="mb-3 row">
                                    <div class="col-12 col-md-3">
                                        <div class="card shadow-none border">
                                            <div class="card-body ">
                                                <img class="img-fluid" src="<?=base_url("uploads/img/$item->img_url");?>" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-9 pt-3">
                                        <div class="mb-3 row">

                                            <label for="example-text-input" class="col-md-2 col-form-label">Kategori Adı</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text"  value="<?=$item->ad;?>" name="ad" id="example-text-input">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="mb-3 row">

                                            <label for="example-text-input" class="col-md-2 col-form-label">Kategori Görseli</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input type="file" name="logo"  class="form-control" id="inputGroupFile02">
                                                    <label class="input-group-text" for="inputGroupFile02">Yükle</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>








                                <a href="<?=base_url("ayar/kategoriler");?>"  class="btn btn-light" type="submit">Geri Dön</a>
                                <button class="btn btn-success" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>

                        </div>

                        </form>






                    </div>

                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                                <?php foreach ($diller as $dil) { ?>



                                    <li class="nav-item">
                                        <a class="nav-link <?php if ($dil->id ==1) { echo "active"; } ;?> " data-bs-toggle="tab" href="#<?=$dil->dil_ad;?>" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block"><img width="30px" src="<?=base_url("assets/images/flags/$dil->dil_url");?>.jpg"> <?=$dil->dil_ad;?></span>
                                        </a>
                                    </li>




                                <?php } ?>



                            </ul>

                            <div class="tab-content p-3 text-muted">
                                <?php foreach ($diller as $dil) { ?>


                                    <?php
                                    $items = $this->ceviri_iliski_model->cek(
                                        array(
                                            'dil_stamp'=>$item->dil_stamp,
                                            "dil_id" =>$dil->id
                                        )
                                    );
                                    error_reporting(0);
                                    ?>


                                    <?php if ($items) {?>
                                        <div class="tab-pane <?php if ($dil->id ==1) { echo "active"; } ;?>" id="<?=$dil->dil_ad;?>" role="tabpanel">

                                            <form action="<?php echo base_url("ayar/ceviri_dil_guncelle/$items->id")?>" method="POST" >
                                                <label for="example-text-input" class="col-md-2 col-form-label">Başlık</label>
                                                <input class="form-control" type="text" value="<?=$items->title;?>" name="title" id="example-text-input">

                                                <label for="example-text-input" class="col-md-2 col-form-label">Seo Url</label>
                                                <input class="form-control" type="text" value="<?=$items->seo_url;?>"  name="seo_url" id="example-text-input">



                                                <button class="btn mt-5 btn-success" type="submit"><i class="mdi mdi-update"></i> Güncelle</button>
                                            </form>
                                        </div>
                                    <?php } else { ?>

                                        <div class="tab-pane" id="<?=$dil->dil_ad;?>" role="tabpanel">

                                            <form action="<?php echo base_url("ayar/ceviri_dil_kaydet/$dil->id/$item->id/$item->dil_stamp")?>" method="POST" >
                                                <label for="example-text-input" class="col-md-2 col-form-label">Başlık</label>
                                                <input class="form-control" type="text" value="" name="title" id="example-text-input">

                                                <label for="example-text-input" class="col-md-2 col-form-label">Seo Url</label>
                                                <input class="form-control" type="text" value=""  name="seo_url" id="example-text-input">



                                                <button class="btn mt-5 btn-success" type="submit"><i class="mdi mdi-update"></i> Kaydet</button>
                                            </form>
                                        </div>
                                    <?php } ?>







                                <?php } ?>

                            </div>

                        </div>
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
