<div class="col-6 mx-auto">
    <div class="card">

        <div class="card-body">

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


                    <th width="50%">Varyant Adı</th>

                    <th>Aksiyon</th>
                    <th>Sil</th>

                </tr>
                </thead>

                <tbody

                >


                <?php foreach ($items as $item) {?>
                    <tr id="siralama-<?php echo $item->id;?>">

                        <td><?=$item->title;?></td>




                        <td>
                            <a
                                href="<?= base_url("ayar/altvaryantduzenle/$item->id");?>"
                                data-bs-toggle="tooltip"
                                title="Varyant Görüntüle"
                                class="btn btn-outline-warning waves-effect waves-light ">
                                Düzenle
                            </a>


                        </td>
                        <td>
                            <button style="width: 100%;"
                                    data-url="<?= base_url("/ayar/altvaryantsil/$item->id");?>"
                                    data-bs-toggle="tooltip"
                                    title="Sil"
                                    class="btn btn-block btn-danger waves-effect waves-light buton-sil">
                                <i class="bx bx-trash-alt"></i>
                            </button>
                        </td>




                    </tr>
                <?php } ?>


                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <a href="<?=base_url("ayar/altvaryant/$kategori_id");?>" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="tooltip" title="" data-bs-original-title="Dil Ekle">
                    <i class="bx bx-plus-circle"></i> Yeni Alt Varyant Ekle
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end col -->

