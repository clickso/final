<!doctype html>
<html lang="tr">



<head>


    <?php $this->load->view('header') ?>


</head>

<body style="">

<div class="container-fuild" style="background: #2a3042; padding: 15px; margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10"> <img style="" src="https://clickso.com.tr/clickso-ssl.png" alt="" height="40"></div>
            <div class="col-12 col-md-2">
                <div class="btn-group" role="group" aria-label="...">
                    <a href="<?=base_url("");?>" type="button" class="btn btn-default">Yönetim Paneli</a>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12">
            <div id="row">

                <div id="col-md-12" style=" ">
                    <div id="main" class="col-md-9">
                        <ul id="menu-group">
                            <?php foreach ($menu_groups as $menu) : ?>
                                <li id="group-<?php echo $menu->id; ?>">
                                    <a href="<?php echo site_url('menu/menu'); ?>/<?php echo $menu->id; ?>">
                                        <?php echo $menu->title; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div class="clear"></div>

                        <form method="post" id="form-menu" action="<?php echo site_url('menu/save_position'); ?>">
                            <div class="ns-row" id="ns-header">
                                <div class="actions">Aksiyon</div>
                                <div class="ns-url">URL</div>
                                <div class="ns-title">Başlık</div>
                            </div>
                            <?php echo $menu_ul; ?>
                            <div id="ns-footer">
                                <button type="submit" class="btn btn-default btn-success" id="btn-save-menu">Menüyü Güncelle
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                    <aside class="col-md-3 col-sm-12">
                        <section class="box">
                            <h2>Bilgi</h2>
                            <div>
                                <p>
                                    Yeniden sıralamak için menü listesini sürükleyin,

                                    Konumu kaydetmek için Menüyü Güncelle'ye tıklayın.

                                    Menüye öğe eklemek için aşağıdaki formu kullanın.
                                </p>
                            </div>
                        </section>

                        <section class="box">
                            <h2>Yeni Ekle</h2>
                            <div>
                                <form id="form-add-menu" method="post" action="<?php echo site_url('menu/add'); ?>">
                                    <div class="form-group">
                                        <label for="menu-title">Menü Adı</label>
                                        <input style="width: 100% !important;" type="text" name="title" required
                                               id="menu-title"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu-url">URL</label>
                                        <input type="text" name="url" id="menu-url" class="form-control" required
                                               style="width: 100% !important;">
                                    </div>


                                    <p class="buttons">
                                        <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                                        <button id="add-menu" type="submit" class="btn btn-success ">Ekle
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </section>
                    </aside>
                    <div class="clear"></div>


                </div>
                <?php $this->load->view('footer') ?>
            </div>
            <div id="loading">
                <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" alt="Loading">
                Processing...
            </div>
        </div>
    </div>
</div>






</body>

</html>
























