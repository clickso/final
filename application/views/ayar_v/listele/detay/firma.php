<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Firma Adı</label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->company_name;?>" name="company_name" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Firma Adres</label>
    <div class="col-md-10">
        <input class="form-control" type="text" value="<?php echo $items->adress;?>" name="adress" id="example-text-input">
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Telefon No</label>
    <div class="col-md-10">
        <input id="input-date1" class="form-control input-mask"
               data-inputmask="'mask': '999-999-99-99'"
               name="phone_1"
               value="<?php echo $items->phone_1;?>"
        >
        <span class="text-muted">Başında Sıfır Olmadan Giriniz</span>
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Telefon No</label>
    <div class="col-md-10">
        <input id="input-date1" class="form-control input-mask"
               data-inputmask="'mask': '999-999-99-99'"
               name="phone_2"
               value="<?php echo $items->phone_2;?>"
        >
        <span class="text-muted">Başında Sıfır Olmadan Giriniz</span>
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Whatsapp Destek</label>
    <div class="col-md-10">
        <input id="input-date1" class="form-control input-mask"
               data-inputmask="'mask': '999-999-99-99'"
               name="whatsapp"
               value="<?php echo $items->whatsapp;?>"
        >
        <span class="text-muted">Başında Sıfır Olmadan Giriniz</span>
    </div>
</div>


<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Vergi Dairesi</label>
    <div class="col-md-10">
        <input class="form-control"

               name="vergidairesi"
               value="<?php echo $items->vergidairesi;?>"
        >

    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Vergi No</label>
    <div class="col-md-10">
        <input class="form-control"

               name="vergino"
               value="<?php echo $items->vergino;?>"
        >

    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Mersis No</label>
    <div class="col-md-10">
        <input class="form-control"

               name="mersis"
               value="<?php echo $items->mersis;?>"
        >

    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">E-Posta Adresiniz</label>
    <div class="col-md-10">
        <input class="form-control" type="text"  value="<?php echo $items->email;?>" name="email" id="example-text-input">
    </div>
</div>
