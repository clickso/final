
<?php $siralama=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46);?>
<div class="col-12"><h5>Satış Ayarları</h5></div>
<hr>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Online Satış Durumu </label>
    <div class="col-md-10">
        <select class="form-select" name="satis" aria-label="Default select example">
            <option <?php echo ($items->satis) == 1 ? "selected" : ""; ?> value="1">Açık</option>
            <option <?php echo ($items->satis) == 0 ? "selected" : ""; ?> value="0">Kapalı</option>

        </select>

    </div>
</div>



<div class="col-12"><h5>Tema Ayarları</h5></div>
<hr>


<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Anasayfa Header Tipi </label>
    <div class="col-md-10">
        <select class="form-select" name="anasayfa_header_tip" aria-label="Default select example">
            <?php foreach ($siralama as $row) {?>
                <option <?php echo ($items->anasayfa_header_tip) == $row ? "selected" : ""; ?> value="<?=$row;?>">Header Stil <?=$row;?></option>
            <?php } ?>


        </select>

    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Sayfa Header Tipi </label>
    <div class="col-md-10">
        <select class="form-select" name="sayfa_header_tip" aria-label="Default select example">
            <?php foreach ($siralama as $row) {?>
                <option <?php echo ($items->anasayfa_header_tip) == $row ? "selected" : ""; ?> value="<?=$row;?>">Header Stil <?=$row;?></option>
            <?php } ?>
        </select>

    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Ürünler Sayfası Header Tipi </label>
    <div class="col-md-10">
        <select class="form-select" name="urunler_header_tip" aria-label="Default select example">
            <?php foreach ($siralama as $row) {?>
                <option <?php echo ($items->anasayfa_header_tip) == $row ? "selected" : ""; ?> value="<?=$row;?>">Header Stil <?=$row;?></option>
            <?php } ?>
        </select>

    </div>
</div>


<div class="mb-3 row">
    <label for="example-color-input" class="col-md-2 col-form-label">Header Background</label>
    <div class="col-1">
        <input class="form-control form-control-color mw-100" name="hb_color" type="color"
               value="<?=$items->hb_color;?>" id="example-color-input">
    </div>
    <div class="col-8 pt-2">
        <div class="col-md-6">
            <div class="row">
                <div class=" col-2 form-check">
                    <input class="form-check-input" value="1" type="radio" name="hb" id="flexRadioDefault1"
                        <?php echo ($items->hb) == "1" ? "checked" : ""; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Aktif
                    </label>
                </div>
                <div class="col-2 form-check">
                    <input class="form-check-input" value="0" type="radio" name="hb" id="flexRadioDefault2"
                        <?php echo ($items->hb) == "0" ? "checked" : ""; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Pasif
                    </label>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="mb-3 row">
    <label for="example-color-input" class="col-md-2 col-form-label">Topbar Background</label>
    <div class="col-1">
        <input class="form-control form-control-color mw-100" name="topbarcolor" type="color"
               value="<?=$items->topbarcolor;?>" id="example-color-input">
    </div>



</div>

<div class="mb-3 row">
    <label for="example-color-input" class="col-md-2 col-form-label">Header Bottom Border Color</label>
    <div class="col-1">
        <input class="form-control form-control-color mw-100" name="hborder_color" type="color"
               value="<?=$items->hborder_color;?>" id="example-color-input">
    </div>
    <div class="col-8 pt-2">
        <div class="col-md-6">
            <div class="row">
                <div class=" col-2 form-check">
                    <input class="form-check-input" value="1" type="radio" name="hb_border" id="hb_border"
                        <?php echo ($items->hb_border) == "1" ? "checked" : ""; ?>>
                    <label class="form-check-label" for="hb_border">
                        Aktif
                    </label>
                </div>
                <div class="col-2 form-check">
                    <input class="form-check-input" value="0" type="radio" name="hb_border" id="hb_border"
                        <?php echo ($items->hb_border) == "0" ? "checked" : ""; ?>>
                    <label class="form-check-label" for="hb_border">
                        Pasif
                    </label>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="mb-3 row">
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Menü Link</label>
            <input class="form-control form-control-color mw-100" name="menu_link" type="color"
                   value="<?=$items->menu_link;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Menü Akif</label>
            <input class="form-control form-control-color mw-100" name="menu_hover" type="color"
                   value="<?=$items->menu_hover;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Alt Menu</label>
            <input class="form-control form-control-color mw-100" name="alt_menu_link" type="color"
                   value="<?=$items->alt_menu_link;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Alt Menu A.</label>
            <input class="form-control form-control-color mw-100" name="alt_menu_hover" type="color"
                   value="<?=$items->alt_menu_hover;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Alt Menu Aktif</label>
            <input class="form-control form-control-color mw-100" name="alt_menu_hover" type="color"
                   value="<?=$items->alt_menu_hover;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">List Arkaplan</label>
            <input class="form-control form-control-color mw-100" name="libackgroundhover" type="color"
                   value="<?=$items->libackgroundhover;?>" id="example-color-input">
        </div>
    </div>
    <hr class="mt-2 mb-2 p-0">
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">List Arkaplan Aktif</label>
            <input class="form-control form-control-color mw-100" name="libghover" type="color"
                   value="<?=$items->libghover;?>" id="example-color-input">
        </div>
    </div>

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">List  Aktif</label>
            <input class="form-control form-control-color mw-100" name="liahover" type="color"
                   value="<?=$items->liahover;?>" id="example-color-input">
        </div>
    </div>

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">List Arkaplan</label>
            <input class="form-control form-control-color mw-100" name="libackgorund" type="color"
                   value="<?=$items->libackgorund;?>" id="example-color-input">
        </div>
    </div>

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Ul Arkaplan</label>
            <input class="form-control form-control-color mw-100" name="ulbg" type="color"
                   value="<?=$items->ulbg;?>" id="example-color-input">
        </div>
    </div>

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Top Bar Link</label>
            <input class="form-control form-control-color mw-100" name="topbarlinkcolor" type="color"
                   value="<?=$items->topbarlinkcolor;?>" id="example-color-input">
        </div>
    </div>

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Top Bar Link Hover</label>
            <input class="form-control form-control-color mw-100" name="topbarlinkhover" type="color"
                   value="<?=$items->topbarlinkhover;?>" id="example-color-input">
        </div>
    </div>







    <hr class="mt-2 mb-2 p-0">

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Menü İkon</label>
            <input class="form-control form-control-color mw-100" name="mobilicon" type="color"
                   value="<?=$items->mobilicon;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-10"></div>
    <hr class="mt-2 mb-2 p-0">

    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer Bg</label>
            <input class="form-control form-control-color mw-100" name="footerbg" type="color"
                   value="<?=$items->footerbg;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer P</label>
            <input class="form-control form-control-color mw-100" name="footerp" type="color"
                   value="<?=$items->footerp;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer A</label>
            <input class="form-control form-control-color mw-100" name="footera" type="color"
                   value="<?=$items->footera;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer H3</label>
            <input class="form-control form-control-color mw-100" name="footerh" type="color"
                   value="<?=$items->footerh;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer Bottom</label>
            <input class="form-control form-control-color mw-100" name="footerbottombackground" type="color"
                   value="<?=$items->footerbottombackground;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer Bottom P</label>
            <input class="form-control form-control-color mw-100" name="footerbottom_p" type="color"
                   value="<?=$items->footerbottom_p;?>" id="example-color-input">
        </div>
    </div>
    <div class="col-12 col-md-2 ">
        <div class="row p-2">
            <label for="example-color-input" class="col-12 col-form-label">Footer Bottom A</label>
            <input class="form-control form-control-color mw-100" name="footerbottom_a" type="color"
                   value="<?=$items->footerbottom_a;?>" id="example-color-input">
        </div>
    </div>

</div>


<div class="mb-3 row">
    <div class="co-12 col-md-6">
        <label for="" class="form-control"> Özel CSS</label>
        <textarea  class="form-control" name="custom_css" rows="10"><?=$items->custom_css;?></textarea>

    </div>

    <div class="co-12 col-md-6">
        <label for="" class="form-control"> Özel Mobil CSS</label>
        <textarea  class="form-control" name="custom_mobil_css" rows="10"><?=$items->custom_mobil_css;?></textarea>

    </div>
</div>




