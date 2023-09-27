<?php
$diller = $this->diller_model->tumu(
    array()
);
?>

<h2>Yeni Menü Ekle</h2>
<form method="post" action="<?php echo site_url('menugroup/add'); ?>">
    <p>
        <label for="menu-group-title">Menü Adı</label>
        <input type="text" name="title" id="menu-group-title">
    </p>

    <p>
        <label for="menu-group-title">dil</label>
        <input type="text" name="dil" id="menu-group-title">
    </p>

    <p>
        <?php
        /*
         *
         *    <label for="menu-group-title">Dil</label>
       <select name="dil" style="width: 100%;">
           <?php foreach ($diller as $dil) {?>
           <option value="<?=$dil->id;?>"><?=$dil->dil_ad;?></option>
          <?php } ?>


       </select>
         */
        ?>
    </p>
</form>