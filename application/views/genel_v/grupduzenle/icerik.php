<div class="col-12">




    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> <?=$item->title;?> Düzenleniyor</h4>

            <div class="row">
                <div class="col-12">
                    <form action="<?php echo base_url("$yonlendirme/grupguncelle/$item->id")?>" method="POST">
                        <!-- Tab panes -->



                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Başlık</label>
                                    <div class="col-md-10">
                                        <input class="form-control " type="text" name="title" value="<?=$item->title ?>" id="example-text-input">
                                        <?php if (isset($form_error)) {?>
                                            <span class="text-danger float-start"><i class="fas fa-exclamation-circle"></i><span class="float-end "> <?php echo form_error("title");?></span></span>
                                        <?php }?></div>
                                </div>


                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"> Amazon Bağlantı</label>
                            <div class="col-md-10">
                                <input class="form-control " type="text" name="title" value="" id="example-text-input">
                                </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"> Etsy Bağlantı</label>
                            <div class="col-md-10">
                                <input class="form-control " type="text" name="title" value="" id="example-text-input">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label"> Ebay Bağlantı</label>
                            <div class="col-md-10">
                                <input class="form-control " type="text" name="title" value="" id="example-text-input">
                            </div>
                        </div>

                        <?php $kategori = $this->kategoriler_model->tumu(
                            array(
                                'stamp_id'=>$stamp_id,
                                'ust_kategori'=>0
                            )


                        );
                        ?>

                        <?php if ($kategori) { ?>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label"> Kategori</label>
                                <div class="col-md-10">
                                    <select name="kategori" class="form-control select2">
                                        <option>Lütfen Seçim Yapınız</option>

                                        <optgroup label="Ana Kategoriler">

                                        <?php foreach ($kategori as $katitem) { ?>
                                            <option <?php if ($katitem->id==$item->kategori_id) { echo "selected";}?> value="<?=$katitem->id;?>"  ><?=$katitem->ad;?></option>
                                        <?php } ?>

                                        </optgroup>





                                        <?php foreach ($kategori as $katitem) { ?>




                                            <optgroup label="<?=$katitem->ad;?>">
                                                <?php
                                                $altkategori = $this->kategoriler_model->tumu(
                                                    array(
                                                        'stamp_id'=>$stamp_id,
                                                        'ust_kategori'=>$katitem->id
                                                    )
                                                );
                                                ?>
                                                <?=$item->kategori_id;?>
                                                <?php foreach ($altkategori as $alt) { ?>


                                                    <option <?php if ($alt->id==$item->kategori_id) { echo "selected";}?> value="<?=$alt->id;?>"><?=$alt->ad;?></option>
                                                <?php } ?>


                                            </optgroup>

                                        <?php } ?>

                                    </select>


                                </div>
                            </div>
                       


                        <?php } ?>











                        <div class="col-12">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Kaydet</button>


                            <a href="<?=base_url($yonlendirme)?>" class="btn btn-secondary" type="submit"><i class="fas fa-step-backward"></i> İptal</a>
                        </div>
                    </form>
                </div>


                <div class="col-12 col-md-2 mt-5 ">
                    <button style="width: 100%;"
                            data-url="<?= base_url($yonlendirme."/sil/$item->id");?>"
                            data-bs-toggle="tooltip"
                            title="Sil"
                            class="btn btn-block btn-danger waves-effect waves-light buton-sil">
                        <i class="bx bx-trash-alt"></i> Sil
                    </button>
                </div>
            </div>






            </div>

        </div>
    </div>


</div>
<!-- end col -->

<div class="col-12">
    <div class="card">
        <div class="card-body">



<h5>Ürün Varyant</h5>



    <?php foreach ($varyant as $row) { ?>
<form class="mb-3" action="<?php echo base_url("$yonlendirme/varyantsend/$item->id/$row->id")?>" method="POST">


    <div class="row">

        <div class="col-1"><?php echo $row->varyant;?></div>
        <div class="col-10">
            <div class="mb-3 row">



                <div class="col-12">
                    <?php
                    $urunvaryant=$this->urun_varyant_model->tumu(
                        array(
                            'varyant_id'=>$row->id,
                        )
                    );
                    ?>
                    <?php foreach ($urunvaryant as $row) { ?>

                        <?php
                        $kontrol=$this->urun_deger_model->cek(
                            array(
                                'varyant_id'=> $row->id,
                                'urun_id'=>$item->id
                            )
                        );
                        ?>


                        <div class="form-check form-switch" style="float: left; display: block; font-size: 1rem; margin-right: 10px;">
                            <input class="form-check-input"
                                   value="<?=$row->id;?>"
                                   name="varyant[]"
                                   type="checkbox" id="flexSwitchCheckChecked<?=$row->id;?>"
                                <?php if($kontrol) {?>  checked="" <?php  }?>

                            >
                            <label class="form-check-label ms-1" for="flexSwitchCheckChecked<?=$row->id;?>"><?=$row->title;?></label>
                        </div>




                    <?php } ?>

                </div>



            </div>

        </div>
        <div class="col"><button class="btn btn-outline-success waves-effect waves-light" type="submit"><i class="mdi mdi-sync"></i></button> </div>
        <div class="col-12">
            <hr class="mt-3">
        </div>
    </div>



</form>
    <?php } ?>


        </div>
    </div>
    </div>









