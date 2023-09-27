
		<?php $ayar = ayarlar();?>
		<?php $user = get_active_user();?>
		<meta charset="utf-8" />
        <title><?= $ayar->company_name;?> Yönetim Paneli</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="<?= $ayar->company_name;?> Yönetim Paneli" name="description" />
        <meta content="Themesbrand" name="Umur Sangi" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="<?php echo  base_url("uploads/img/").$ayar->fav;?>">

		<?php $this->load->view("includes/stiller");?>




