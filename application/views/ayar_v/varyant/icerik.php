<div class="col-12">
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

                    <th>Grup</th>
                    <th>id</th>
                    <th width="50%">Kategori Ad</th>

                    <th>Aksiyon</th>


                </tr>
                </thead>

                <tbody

                >


                <?php foreach ($items as $item) {?>
                    <tr id="siralama-<?php echo $item->id;?>">
                        <td><strong><i class="mdi mdi-folder-move-outline"></i> <?=kategori($item->stamp_id)?></strong> </td>
                        <td><?=$item->id;?></td>
                        <td><p class="<?php if ($item->ust_kategori==0) { echo "text-primary fw-bold" ;}?>"><?=$item->ad?></p></td>






                        <td>
                            <a
                                href="<?= base_url("ayar/kategorivaryant/$item->id");?>"
                                data-bs-toggle="tooltip"
                                title="Varyant Görüntüle"
                                class="btn btn-outline-warning waves-effect waves-light ">
                                Varyant Görüntüle
                            </a>


                        </td>





                    </tr>
                <?php } ?>


                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- end col -->

