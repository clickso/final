<?php $user = get_active_user(); ?>
<?php $ayar = ayarlar(); ?>
<header id="page-topbar">
	<div class="navbar-header">
		<div class="container-fluid">
			<div class="float-end">

				<div class="dropdown d-inline-block d-lg-none ms-2">
					<button type="button" class="btn header-item noti-icon waves-effect"
							id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
						<i class="mdi mdi-magnify"></i>
					</button>

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
						<a class="dropdown-item" href="<?=base_url("users");?>"><i class="bx bx-user font-size-16 align-middle me-1"></i>
							Tüm Kullanıcılar</a>

						<a class="dropdown-item" href="<?=base_url("users/duzenle/$user->id");?>"><i class="bx bx-edit font-size-16 align-middle me-1"></i>
							Kullanıcı Düzenle</a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger" href="#"><i
								class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Çıkış Yap</a>
					</div>
				</div>

				<div class="dropdown d-inline-block">
					<button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
						<a href="<?=base_url("ayar");?>"> <i class="mdi mdi-settings-outline"></i></a>
					</button>
				</div>

			</div>
			<div>
				<!-- LOGO -->
				<div class="navbar-brand-box">
					<a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="<?=base_url("uploads/img/$ayar->logo");?>" alt="" height="40">
                                    </span>
						<span class="logo-lg">
                                        <img src="<?=base_url("uploads/img/$ayar->logo");?>" alt="" height="40">
                                    </span>
					</a>

					<a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="<?=base_url("uploads/img/$ayar->darklogo");?>" alt="" height="40">
                                    </span>
						<span class="logo-lg">
                                         <img src="<?=base_url("uploads/img/$ayar->darklogo");?>" alt="" height="40">
                                    </span>
					</a>
				</div>

				<button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
						id="vertical-menu-btn">
					<i class="fa fa-fw fa-bars"></i>
				</button>




			</div>

		</div>
	</div>
</header> <!-- ========== Left Sidebar Start ========== -->
