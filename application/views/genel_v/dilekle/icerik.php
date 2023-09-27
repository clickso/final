<div class="col-12">




    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> <?=$eksikdil->title;?> Düzenleniyor</h4>

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
                    <form action="<?= base_url($yonlendirme."/dilkaydet/$eksikdil->grup_id")?>" method="POST">
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">

                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Eksik Dil Seçimi</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="yeni_dil" aria-label="Default select example">
                                            <?php foreach ($diller as $dil) { ?>
                                                <option value="<?=$dil->id;?>"><?=$dil->dil_ad;?></option>
                                            <?php	} ?>


                                        </select>
                                        <p>Üst alanda eksik olan dilinizi seçmeniz gerekir</p>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Başlık</label>
                                    <div class="col-md-10">
                                        <input class="form-control " type="text" name="title" value="<?=$eksikdil->title ?>" id="example-text-input">
                                        <?php if (isset($form_error)) {?>
                                            <span class="text-danger float-start"><i class="fas fa-exclamation-circle"></i><span class="float-end "> <?php echo form_error("title");?></span></span>
                                        <?php }?></div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Açıklama </label>
                                    <div class="col-md-10">
                                        <textarea id="elm1" name="aciklama"><?=$eksikdil->aciklama ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Teknik Özellik </label>
                                    <div class="col-md-10">
                                        <textarea id="elm1" name="teknik"><?=$eksikdil->teknik ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Seo Başlık</label>
                                    <div class="col-1"><input type="button" id="sayacc" value="60"></div>
                                    <div class="col-md-9">
                                        <input class="form-control " id="yazii" type="text" name="seo_title" value="<?=$eksikdil->seo_title ?>" id="example-text-input">

                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label"> Seo Açıklama</label>
                                    <div class="col-1"><input type="button" id="sayac" value="160"></div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="yazi"  type="text" name="seo_desc"  value="<?=$eksikdil->seo_desc ?>" id="example-text-input">

                                    </div>

                                </div>


                            </div>

                            <div class="tab-pane" id="ozel" role="tabpanel">

                                <p>Bu alan aktif değildir.</p>


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



