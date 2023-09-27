<div class="col-12">
    <?php if(empty($items)){ ?>
    <div class="card">
        <div class="card-body">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i> Kayıt bulunamadı

            </div>
        </div>
    </div>

    <?php } ?>

   <div class="row">
       <div class="col-12 col-md-3">
           <div class="card bg-success text-white-50">
               <div class="card-body">
                   <div class="row align-items-center text-white">
                       <div class="col-8">
                           <p class="mb-2">Bugün Gelen Sipariş</p>
                           <h4 class="mb-0 text-white"><?=$gunlukadet;?> Adet</h4>
                       </div>
                       <div class="col-4">
                           <div class="text-end">
                               <div>
                                   <h4 class="mb-0 text-white"><?=$gunluktoplamtl;?> TL</h4>
                               </div>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-12 col-md-3">
           <div class="card bg-soft-primary text-white-50">
               <div class="card-body">
                   <div class="row align-items-center text-primary">
                       <div class="col-8">
                           <p class="mb-2">Online Ödeme </p>
                           <h4 class="mb-0 text-primary"><?=$gunlukonlinetoplamtl;?> TL</h4>
                       </div>
                       <div class="col-4 border-start border-primary">
                           <div class="text-end">
                               <div>
                                   <h5 class="mb-0 text-primary"><?=$gunlukonlineadet;?>  Adet</h5>
                               </div>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-12 col-md-3">
           <div class="card bg-soft-danger text-white-50">
               <div class="card-body">
                   <div class="row align-items-center text-danger">
                       <div class="col-8">
                           <p class="mb-2">Kapıda Kredi Kartı </p>
                           <h4 class="mb-0 text-danger"><?=$gunlukkarttoplam[0]["toplam"];?> TL</h4>
                       </div>
                       <div class="col-4 border-start border-danger">
                           <div class="text-end">
                               <div>
                                   <h5 class="mb-0 text-danger"><?=$gunlukkartadet;?> Adet</h5>
                               </div>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-12 col-md-3">
           <div class="card bg-soft-secondary text-white-50">
               <div class="card-body">
                   <div class="row align-items-center text-secondary">
                       <div class="col-8">
                           <p class="mb-2">Kapıda Nakit</p>
                           <h4 class="mb-0 text-secondary"><?=$gunluknakittoplam[0]["toplam"];?> TL</h4>
                       </div>
                       <div class="col-4 border-start border-secondary">
                           <div class="text-center">
                               <div>
                                   <h5 class="mb-0 text-secondary"><?=$gunluknakitadet;?> Adet</h5>
                               </div>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>





   </div>


	<div class="card">

		<div class="card-body">




			<table
				   class="table table-bordered  dt-responsive nowrap DataTable  "
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

                    <?php
                    // Musteri Bilgileri
                    $musteri=$this->user_model->get(
                            array('id'=>$item->musteri_id)
                    );

                    $siparis=$this->siparisler_model->cek(
                        array('id'=>$item->id)
                    );

                    ?>
				<tr <?php if ($item->odeme_durum==59) {?> style="background: #e0f8ea; border: #e8e8e8;" <?php }?> <?php if ($item->odeme_durum==0) {?> style="background: #fcdcf3; border: #e8e8e8;" <?php }?> >
					<td><i class="bx bx-move"></i> </td>
                    <td>
                        <button type="button" class="btn btn-light waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target=".umur<?=$siparis->id;?>">
                            Detay</button>

                        <div class="modal fade umur<?=$siparis->id;?>"  tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Sipariş Detayı</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <table class="table table-bordered table-sm m-0 print">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Teslimat Bilgileri</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Sipariş No</th>
                                                <td>:</td>
                                                <td><?=$siparis->sip_no;?></td>
                                            </tr>

                                            <tr>
                                                <th>Adres</th>
                                                <td>:</td>
                                                <td><?=adres_cek($siparis->adres_id);?></td>
                                            </tr>


                                            </tbody>
                                        </table>




                                        <table class="table table-bordered table-sm print mt-3">
                                            <thead>
                                            <tr>
                                                <th colspan="3">Müşteri Bilgileri</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Ad Soyad</th>
                                                <td>Telefon</td>


                                            </tr>
                                            <tr>
                                                <th><?=$musteri->full_name;?></th>
                                                <td><?=$musteri->user_name;?></td>


                                            </tr>

                                            </tbody>
                                        </table>

                                        <table class="table table-bordered table-sm print mt-3">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Sipariş Bilgileri</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <thead>
                                            <tr>
                                                <th>Ürün</th>
                                                <th>Adet</th>
                                                <th>Fiyat</th>
                                            </tr>
                                            </thead>

                                            <?php
                                            $siparisde=json_decode($siparis->siparis);
                                            ?>
                                            <?php foreach ($siparisde as $row) {?>
                                                <tr>
                                                    <td><?=$row->name;?></td>
                                                    <td><?=$row->qty;?></td>
                                                    <td><?=number_format($row->subtotal,2);?></td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td><strong>Genel Toplam</strong></td>
                                                <td colspan="2"><strong><?=number_format($siparis->toplam,2);?> TL</strong></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Ödeme Türü</strong></td>
                                                <td colspan="2"><strong> <?=$item->odeme_tip?> </strong></td>
                                            </tr>


                                            </tbody>
                                        </table>

                                        <a onclick="window.print();return false;"  class="btn btn-success w-100">Siparişi Yazdır</a>


                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </td>



					<td  ><?=$item->sip_no?></td>
                    <td><?=$musteri->full_name?></td>
                    <td><?=odeme_durum($item->odeme_durum);?></td>
                    <td><?=$item->odeme_tip?>  </td>



					<td class="text-center">
                        <?php
                        if ($item->odeme_durum==69)
                        { ?>
                            <a href="<?=base_url($yonlendirme."/teslimatagonder/$item->id")?>" class="btn btn-primary">Teslimata Gönder</a>
                            <a href="<?=base_url($yonlendirme."/siparisiptal/$item->id")?>" class="btn btn-danger">İptal</a>
                        <?php }

                        else if ($item->odeme_durum==59)
                        {
                            echo "Sipariş Tamamlandı";
                        }

                        else if ($item->odeme_durum==0)
                        {
                            echo "İptal Edildi";
                        }
                        else { ?>
                            <a href="<?=base_url($yonlendirme."/siparis_onay/$item->id")?>" class="btn btn-success">Siparişi Onayla</a>
                            <a href="<?=base_url($yonlendirme."/siparisiptal/$item->id")?>" class="btn btn-danger">İptal</a>
                        <?php }

                        ?>


					</td>









                </tr>
				<?php } ?>


				</tbody>
			</table>


		</div>
	</div>
</div>
<!-- end col -->

