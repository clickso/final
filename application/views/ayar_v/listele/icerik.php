<div class="col-12">
    <div class="card">
        <div class="card-body">



            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tema" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Tema Ayarları</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#home1" role="tab" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Firma Bilgileri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Sosyal Medya Hesapları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <span class="d-none d-sm-block">Meta Etiketleri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Api & Google Maps</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#smtp" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">SMTP Ayarlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#lisans" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Lisans Bilgileri</span>
                    </a>
                </li>



            </ul>
            <form class="repeater" action="<?php echo base_url("ayar/guncelle/")?>" method="POST" enctype="multipart/form-data">
                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">

                    <div class="tab-pane " id="home1" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/firma");?>
                    </div>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/sosyal-medya");?>
                    </div>
                    <div class="tab-pane" id="messages1" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/meta");?>
                    </div>
                    <div class="tab-pane" id="settings1" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/api");?>
                    </div>
                    <div class="tab-pane" id="smtp" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/smtp");?>
                    </div>
                    <div class="tab-pane" id="lisans" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/lisans");?>
                    </div>

                    <div class="tab-pane active" id="tema" role="tabpanel">
                        <?php $this->load->view("{$klasor}/{$alt_klasor}/detay/tema");?>
                    </div>

                </div>
                <div class="col-12"><button class="btn btn-success" type="submit"><i class="mdi mdi-update"></i> Güncelle</button></div>
            </form>

        </div>
    </div>
</div>
