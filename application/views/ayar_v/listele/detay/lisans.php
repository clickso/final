<?php
$lb = lisansbilgisi();


?>

<table class="table table-bordered mb-0">


    <tbody>
    <tr>
        <th scope="row">Yekili Domain</th>
        <td><?=$lb->domain;?></td>

    </tr>

    <tr>
        <th scope="row">Firma</th>
        <td><?=$lb->firma;?></td>

    </tr>
    <tr>
        <th scope="row">Lisans No</th>
        <td><?=$lb->lisansno;?></td>

    </tr>

    <tr>
        <th scope="row">Dil Ekleme Limiti</th>
        <td><?=$lb->dillimit;?></td>

    </tr>

    <tr>
        <th scope="row">Disk Kapasitesi</th>
        <td><?=$lb->disk;?></td>

    </tr>

    <tr>
        <th scope="row">Lisans Başlangıç</th>
        <td><?=tarih('j F Y',$lb->baslangic);?></td>

    </tr>

    <tr>
        <th scope="row">Lisans Bitiş</th>
        <td><?=tarih('j F Y',$lb->bitis);?></td>
    </tr>

    <tr>
        <th scope="row">Ücretsiz Destek Bitiş </th>
        <td><?=tarih('j F Y',$lb->destek_bitis);?></td>
    </tr>

    </tbody>
</table>
