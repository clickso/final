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
<!-- end col -->



