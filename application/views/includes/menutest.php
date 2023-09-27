<?php $user = get_active_user(); ?>
<?php $ayar = ayarlar(); ?>

<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">


                        <a href="<?=base_url();?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="https://clickso.com.tr/clickso-ssl.png" alt="" height="40">
                                </span>
                            <span class="logo-lg">
                                    <img src="https://clickso.com.tr/clickso-ssl.png" alt="" height="40">
                                </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                            data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link " href="<?=base_url();?>" id="topnav-dashboard"
                                           role="button">
                                            <i class="bx bx-home-circle"></i>  Anasayfa
                                        </a>

                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("urunler");?>" id="topnav-dashboard"
                                           role="button">
                                            Ürünler <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                            <a class="dropdown-item" href="<?php echo base_url("urunler");?>" >Tüm Ürünler</a>
                                            <a class="dropdown-item" href="<?php echo base_url("urunler/ekle");?>" >Yeni Ürün</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url();?>" id="topnav-dashboard"
                                           role="button">
                                            Kategoriler <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                            <a class="dropdown-item" href="<?php echo base_url("ayar/kategoriler");?>" >Kategoriler</a>
                                            <a class="dropdown-item" href="<?php echo base_url("ayar/kategoriekle");?>" >Yeni Kategori Ekle</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="JavaScript:void(0)" id="topnav-dashboard"
                                           role="button">
                                            Ayarlar <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                            <a class="dropdown-item" href="<?php echo base_url("ayar/users");?>" >Kullanıcılar</a>
                                            <a class="dropdown-item" href="<?php echo base_url("ayar");?>" >Genel Ayarlar</a>
                                            <a class="dropdown-item" href="<?php echo base_url("ayar/logo");?>" >Logo Ayarları</a>
                                            <a class="dropdown-item" href="<?php echo base_url("ayar/seo");?>" >Site Seo Ayarları</a>
                                            <a class="dropdown-item" href="<?php echo base_url("ayar/diller");?>" >Dil Ayarları</a>
                                            <a class="dropdown-item" href="<?php echo base_url("ayar/cozunurluk");?>" >Görsel Ebatları Ayarları</a>
                                        </div>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link " href="<?=base_url("dosyalar");?>" id="topnav-dashboard"
                                           role="button">
                                            <i class="bx bx-cloud-upload"></i>  Dosya Yükle
                                        </a>

                                    </li>





                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                             aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                               aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                        class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>



                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?=base_url("uploads/img/$ayar->fav");?>"
                                 alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"><?=$user->full_name;?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="<?=base_url("clickso");?>"><i class="mdi mdi-help-circle-outline"></i>
                                Teknik Destek</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?php echo base_url("logout");?>"><i
                                        class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Çıkış Yap</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <a type="button" href="<?=base_url("ayar");?>"  >


                        <button type="button" class="btn header-item noti-icon waves-effect" >
                            <i class="mdi mdi-settings-outline"></i>
                        </button>
                        </a>


                    </div>
                </div>
            </div>
        </header>



    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->