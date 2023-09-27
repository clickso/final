<div class="col-12">
    <div class="card">

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12 col-md-8">  <h5>Çeviriler</h5></div>
                <div class="col-12 col-md-4">
                    <a href="<?=base_url("ayar/ceviriekle/2");?>" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="tooltip" title="" data-bs-original-title="Kategori Ekle">
                        <i class="bx bx-plus-circle"></i> Yeni Çeviri Ekle
                    </a>
                </div>
            </div>

            <?php if(empty($items)){ ?>

                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i> Kayıt bulunamadı

                </div>

            <?php } ?>



            <table
                    class="table table-striped table-bordered   "
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>


                    <th>id</th>
                    <th width="50%">Kategori Ad</th>

                    <th>Aksiyon</th>
                    <th>Vitrin</th>
                    <th>Sil</th>


                </tr>
                </thead>

                <tbody>


                <?php foreach ($items as $item) {?>
                <tr id="siralama-<?php echo $item->id;?>">

                    <td><?=$item->id;?></td>
                    <td><p class="<?php if ($item->ust_kategori==0) { echo "text-primary fw-bold" ;}?>"><?=$item->ad?></p></td>
                    <td>
                        <a
                                href="<?= base_url("ayar/ceviriduzenle/$item->id");?>"
                                data-bs-toggle="tooltip"
                                title="Düzenle"
                                class="btn btn-outline-warning waves-effect waves-light ">
                            Düzenle
                        </a>


                    </td>

                    <td>
                        <button style="width: 100%;"
                                data-url="<?= base_url("/ayar/cevirisil/$item->id");?>"
                                data-bs-toggle="tooltip"
                                title="Sil"
                                class="btn btn-block btn-danger waves-effect waves-light buton-sil">
                            <i class="bx bx-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <?php
                $alt = $this->ceviriler_model->tumu(
                    array(
                        'ust_kategori'=>$item->id
                    ),"RANK ASC"

                );
                ?>
                <?php
                if ($alt) {?>

                <tbody class="sortable"
                       data-url="<?=base_url("ayar/kategorisiralama")?>">
                <?php foreach ($alt as $item) {?>

                    <tr id="siralama-<?php echo $item->id;?>">

                        <td><?=$item->id;?></td>
                        <td><p class="<?php if ($item->ust_kategori==0) { echo "text-primary fw-bold" ;}?>"><?=$item->ad?></p></td>
                        <td>
                            <a
                                    href="<?= base_url("ayar/ceviriduzenle/$item->id");?>"
                                    data-bs-toggle="tooltip"
                                    title="Düzenle"
                                    class="btn btn-outline-warning waves-effect waves-light ">
                                Düzenle
                            </a>


                        </td>
                        <td>

                            <input
                                    data-url="<?php echo base_url("ayar/kategorivitrin/$item->id");?>"
                                    class="cover"
                                    type="checkbox"
                                    id="switch-umur-<?=$item->id;?>"
                                    switch="none"
                                <?php echo ($item->vitrin) ? "checked" : ""; ?>

                            />
                            <label class="form-label" for="switch-umur-<?=$item->id;?>" ></label>
                        </td>
                        <td>
                            <button style="width: 100%;"
                                    data-url="<?= base_url("/ayar/kategorisil/$item->id");?>"
                                    data-bs-toggle="tooltip"
                                    title="Sil"
                                    class="btn btn-block btn-danger waves-effect waves-light buton-sil">
                                <i class="bx bx-trash-alt"></i>
                            </button>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>

                <?php } ?>
                <?php } ?>


                </tbody>
            </table>
        </div>
    </div>


</div>


