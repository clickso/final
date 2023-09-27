<div class="col-12">




    <div class="card">
        <div class="card-body">

            <h4 class="card-title"><img width="30px;" src="<?=base_url("assets/images/flags/$bayrak->dil_url")?>.jpg"> <?=$item->title;?> Düzenleniyor</h4>

            <div class="row">
                <div class="col-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="true">

                                <span class="d-none d-sm-block">Genel Bilgiler</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false">

                                <span class="d-none d-sm-block">Seo Ayarları</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ozel" role="tab" aria-selected="false">

                                <span class="d-none d-sm-block">Özel Alan</span>
                            </a>
                        </li>


                    </ul>
                </div>

                <div class="col-12">
                    <form action="<?php echo base_url($yonlendirme."/guncelle/$item->id")?>" method="POST">
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">

                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Başlık</label>
                                    <div class="col-md-10">
                                        <input class="form-control " type="text" name="title" value="<?=$item->title ?>" id="example-text-input">
                                        <?php if (isset($form_error)) {?>
                                            <span class="text-danger float-start"><i class="fas fa-exclamation-circle"></i><span class="float-end "> <?php echo form_error("title");?></span></span>
                                        <?php }?></div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Açıklama </label>
                                    <div class="col-md-10">
                                        <textarea id="elm1" name="aciklama"><?=$item->aciklama ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Teknik Özellik </label>
                                    <div class="col-md-10">
                                        <textarea id="elm1" name="teknik"><?=$item->teknik ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Seo Başlık</label>
                                    <div class="col-1"><input type="button" id="sayacc" value="60"></div>
                                    <div class="col-md-9">
                                        <input class="form-control " id="yazii" type="text" name="seo_title" value="<?=$item->seo_title ?>" id="example-text-input">

                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Seo Açıklama</label>
                                    <div class="col-1"><input type="button" id="sayac" value="160"></div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="yazi"  type="text" name="seo_desc"  value="<?=$item->seo_desc ?>" id="example-text-input">

                                    </div>

                                </div>


                            </div>

                            <div class="tab-pane" id="ozel" role="tabpanel">
                                <?php
                               $ozel=json_decode($item->ozel_alan);


                                ?>
                                <?php if ($yonlendirme == "urunler") { ?>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label"> Ürün Kodu</label>
                                        <div class="col-md-10">
                                            <input class="form-control " type="text" name="urun_kodu" value="<?=$ozel->urun_kodu;?>"  id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label"> Fiyat</label>
                                        <div class="col-md-10">
                                            <input class="form-control " type="text" name="fiyat" value="<?php if (isset($ozel->fiyat)) {echo $ozel->fiyat; }?>"  id="example-text-input">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>Teknik Özellikler</h5>

                                    <?php $coz=json_decode($item->varyantlar); ?>






                                    <?php if ($item->teknik_deger) { ?>




                                        <?php $tdd=json_decode($item->teknik_deger,true); ?>
                                        <div class="mb-3 row">



                                            <div class="mb-3 row">


                                                <div class="col-md-4">
                                                    <?php foreach ($varyant as $row) { ?>
                                                        <input class="form-control " type="hidden" name="deger[]"  value="<?=$row->id;?>" readonly  id="example-text-input">
                                                        <input class="form-control mb-3 " type="text"  value="<?=$row->title;?>" readonly  id="example-text-input">
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php foreach ($tdd["deger"] as $row) { ?>

                                                        <?php
                                                        if ($row=="null") { ?>

                                                        <?php } else { ?>
                                                            <input class="form-control mb-3 " type="text" name="sonuc[]" value="<?=$row;?>"  id="example-text-input">
                                                        <?php  }?>


                                                    <?php } ?>
                                                </div>

                                                <div class="col-12">

                                                    <div class="form-check col-3">
                                                        <input class="form-check-input" type="radio" value="dil" name="secim" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Seçili Dili Güncelle
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-3">
                                                        <input class="form-check-input" type="radio" value="hepsi" name="secim" id="flexRadioDefault2" >
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Tüm Dilleri Güncelle
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>





                                    <?php  } else { ?>


                                    <?php }?>















                                <?php } else {
                                    echo "Bu alan aktif değildir.";
                                }
                                ?>


                            </div>


                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Kaydet</button>
                            <a href="<?=base_url($yonlendirme)?>" class="btn btn-secondary" type="submit"><i class="fas fa-step-backward"></i> İptal</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <script>
        var yazi=document.getElementById("yazi");
        var sayac=document.getElementById("sayac");

        yazi.onkeypress=function(){

            if(yazi.value.length>=160) return false;
        }

        yazi.onkeyup=function(e){


            sayac.value=(160-yazi.value.length);


        }
    </script>

    <script>
        var yazii=document.getElementById("yazii");
        var sayacc=document.getElementById("sayacc");

        yazii.onkeypress=function(){

            if(yazii.value.length>=60) return false;
        }

        yazii.onkeyup=function(e){


            sayacc.value=(60-yazii.value.length);


        }
    </script>
</div>
<!-- end col -->



