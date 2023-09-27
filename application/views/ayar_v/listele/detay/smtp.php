
<div class="col-12"><h5>SMTP Ayarları</h5></div>
<hr>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Host </label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->smtp_host ;?>" name="smtp_host" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Kullanıcı Adı </label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->smtp_user ;?>" name="smtp_user" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Şifre </label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->smtp_pass ;?>" name="smtp_pass" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Port </label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->smtp_port ;?>" name="smtp_port" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Bildirim URL </label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->bildirim_ok ;?>" name="bildirim_ok" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Güvenlik Protokolü </label>
    <div class="col-md-10">
        <select class="form-select" name="smtp_ssl" aria-label="Default select example">
            <option <?php echo ($items->smtp_ssl) == "ssl" ? "selected" : ""; ?> value="ssl">SSL</option>
            <option <?php echo ($items->smtp_ssl) == "tls" ? "selected" : ""; ?>  value="tls">TLS</option>
        </select>

    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">İleti Adresi</label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->smtp_gonderilecek_adres ;?>" name="smtp_gonderilecek_adres" id="example-text-input">
    </div>
</div>

