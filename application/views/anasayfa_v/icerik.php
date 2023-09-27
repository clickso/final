<div class="col-12">
    <div class="card">

        <div class="card-body">

            <?php if(empty($items)){ ?>

                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i> Kayıt bulunamadı

                </div>

            <?php } ?>



            <table
                    class="table table-striped table-bordered dt-responsive nowrap DataTable  "
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sıraa </th>
                    <th>Düzenle</th>
                    <th>Siparis No</th>
                    <th width="20%">Müsteri Adı</th>


                    <th >Durum</th>

                    <th >Ödeme Türü</th>
                    <th >Teslimata Gönder</th>



                </tr>
                </thead>

                <tbody
                        class="sortable"
                        data-url="<?=base_url($yonlendirme."/siralama")?>"
                >

                <?php foreach ($items as $item) {?>
                    <tr id="siralama-<?php echo $item->id;?>">
                        <td><i class="bx bx-move"></i> </td>
                        <td>
                            <a href="<?= base_url($yonlendirme."/grupduzenle/$item->id");?>"
                               type="button" class="btn btn-outline-secondary waves-effect waves-light"
                               data-bs-toggle="tooltip"
                               title="Ana Ürünü Düzenle"><i class="bx bx-edit-alt"></i>

                            </a>
                        </td>



                        <td><?=$item->sip_no?></td>
                        <td><?=$item->musteri_id?></td>
                        <td><?=$item->odeme_durum?></td>
                        <td><?=$item->odeme_tip?></td>



                        <td>
                            <a href="" class="btn btn-outline-success">Siparişi Onayla</a>
                        </td>








                    </tr>
                <?php } ?>


                </tbody>
            </table>


        </div>
    </div>
</div>
<!-- end col -->

