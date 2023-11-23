<style>
    .nav-pills .nav-link.active, .nav-pils .show>.nav-link{
        color: #ffffff;
        background-color:#f86f03;
    }

    .nav-link{
        color: #000000;
    }
</style>

<div
    id="banner-area"
    class="banner-area"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url(images/slider-main/bg1.jpg)"
>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Program Studi Magister Teknik Geologi</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="#">beranda</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">akademik</a>
                                </li>
                                <li
                                    class="breadcrumb-item active"
                                    aria-current="page"
                                >
                                    magister
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Col end -->
            </div>
            <!-- Row end -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Banner text end -->
</div>
<!-- Banner area end -->

<!-- vertical tab -->
<section id="main-container" class="main-container">
    <div class="container">

        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 col-lg-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link text-left active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#tentang" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tentang</button>
                <button class="nav-link text-left" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#akreditasi" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Akreditasi</button>
                <button class="nav-link text-left" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#penyelenggaraan" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Penyelenggaraan Program Studi</button>
                <button class="nav-link text-left" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#kurikulum" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Kurikulum</button>
                <button class="nav-link text-left" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#rps" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Rencana Pembelajaran Semester</button>
                <button class="nav-link text-left" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#kegiatan" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Kegiatan</button>
            </div>
            <div class="tab-content col-lg-10" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="tentang" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row">

                      <div class="col-lg-12">
                          <div class="item">
                            <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/f_depan.jpg" alt="struktur-organisasi" />
                          </div>
                      </div><!-- Slider col end -->
                      <div class="col-lg-12">
                          <div class="item">
                            <<img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/f_belakang.jpg" alt="struktur-organisasi" />
                          </div>
                      </div><!-- Slider col end -->
                    </div>
                </div>
                <div class="tab-pane fade" id="akreditasi" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">

                      <div class="col-lg-12">
                          <div class="item">
                            <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/akreditasi s2 geo.jpg" alt="struktur-organisasi" />
                          </div>
                      </div><!-- Slider col end -->
                      <div class="col-lg-12">
                          <div class="item">
                            <iframe src="<?=home_assets()?>doc/akreditasi.pdf" width="100%" height="600px"></iframe>
                          </div>
                      </div><!-- Slider col end -->
                    </div>
                </div>
                <div class="tab-pane fade" id="penyelenggaraan" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row"><!-- Slider col end -->
                      <div class="col-lg-12">
                          <div class="item">
                            <iframe src="<?=home_assets()?>doc/penyelenggaraan.pdf" width="100%" height="600px"></iframe>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="kurikulum" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row"><!-- Slider col end -->

                      <div class="col-lg-12">
                        <h4>Bagan Kurikulum</h4>
                          <div class="item">
                            <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/bagan.png" alt="bagan-kurikulum" />
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="item">
                            <iframe src="<?=home_assets()?>doc/kurikulum.pdf" width="100%" height="600px"></iframe>
                          </div>
                      </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="rps" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row"><!-- Slider col end -->

                      <div class="col-lg-12">
                        <h4>Daftar RPS</h4>
                          <div class="item">
                            <a href="<?=upload_url('rps').'RPS_Geologi_model.pdf'?>" target="_blank">
                                <p>
                                    RPS Geologi Model
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Petrologi_Lanjut.pdf'?>" target="_blank">
                                <p>
                                    RPS_Petrologi_Lanjut
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'6_18D06212002_Geologi_Karst.pdf'?>" target="_blank">
                                <p>
                                    6_18D06212002_Geologi_Karst
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'15_18D06210802_Geodinamika_Pantai_Lanjut.pdf'?>" target="_blank">
                                <p>
                                    15_18D06210802_Geodinamika_Pantai_Lanjut
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'16_18D06210102_Metode_Penelitian_dan_Filsafat_Ilmu_Kebumian.pdf'?>" target="_blank">
                                <p>
                                    16_18D06210102_Metode_Penelitian_dan_Filsafat_Ilmu_Kebumian
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'19_18D06212202_GEOLOGI_TEKNIK_LANJUT.pdf'?>" target="_blank">
                                <p>
                                    19_18D06212202_GEOLOGI_TEKNIK_LANJUT
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'21_18D06210302_Geotektonik_2023.pdf'?>" target="_blank">
                                <p>
                                    21_18D06210302_Geotektonik_2023
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'23_18D06210602_Alterasi_dan_Mineralisasi_Hidrotermal.pdf'?>" target="_blank">
                                <p>
                                    23_18D06210602_Alterasi_dan_Mineralisasi_Hidrotermal
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'24_18D06212402_Geologi_Tata_Lingkungan_Lanjut.pdf'?>" target="_blank">
                                <p>
                                    24_18D06212402_Geologi_Tata_Lingkungan_Lanjut
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'29_18D06212302_Mitigasi_dan_Bencana_Geologi.pdf'?>" target="_blank">
                                <p>
                                    29_18D06212302_Mitigasi_dan_Bencana_Geologi
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Geokronologi.pdf'?>" target="_blank">
                                <p>
                                    RPS_Geokronologi
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Geologi_Regional_dan_Ekskursi.pdf'?>" target="_blank">
                                <p>
                                    RPS_Geologi_Regional_dan_Ekskursi
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'7_18D06211002_RPS_Rekayasa_Pantai.pdf'?>" target="_blank">
                                <p>
                                    7_18D06211002_RPS_Rekayasa_Pantai
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'8_18D06211302_Geologi_Batuan_Dasar_2023.pdf'?>" target="_blank">
                                <p>
                                    8_18D06211302_Geologi_Batuan_Dasar_2023
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'30_18D06210902_Oseanografi_Lanjut.pdf'?>" target="_blank">
                                <p>
                                    30_18D06210902_Oseanografi_Lanjut
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Geokimia_Endapan_Mineral.pdf'?>" target="_blank">
                                <p>
                                    RPS_Geokimia_Endapan_Mineral
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Geologi_Pengelolaan_Limbah.pdf'?>" target="_blank">
                                <p>
                                    RPS_Geologi_Pengelolaan_Limbah
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Pencemaran_Air_Tanah_Lanjutan.pdf'?>" target="_blank">
                                <p>
                                    RPS_Pencemaran_Air_Tanah_Lanjutan
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Seminar_Proposal.pdf'?>" target="_blank">
                                <p>
                                    RPS_Seminar_Proposal
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'14_18D06210202_Petrologi_Lanjut.pdf'?>" target="_blank">
                                <p>
                                    14_18D06210202_Petrologi_Lanjut
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'5_18D06210702_Eksplorasi_Bawah_Permukaan.pdf'?>" target="_blank">
                                <p>
                                    5_18D06210702_Eksplorasi_Bawah_Permukaan
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'20_18D06211602_Geologi_laterit.pdf'?>" target="_blank">
                                <p>
                                    20_18D06211602_Geologi_laterit
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'27_RPS_18D06212802_Geokimia_Lingkungan.pdf'?>" target="_blank">
                                <p>
                                    27_RPS_18D06212802_Geokimia_Lingkungan
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'28_18D06211902_Geologi_Kuarter_Lanjut.pdf'?>" target="_blank">
                                <p>
                                    28_18D06211902_Geologi_Kuarter_Lanjut
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Alterasi_dan_Mineralisasi_Hidrotermal.pdf'?>" target="_blank">
                                <p>
                                    RPS_Alterasi_dan_Mineralisasi_Hidrotermal
                                </p>
                            </a>
                            <a href="<?=upload_url('rps').'RPS_Geokimia_Lingkungan.pdf'?>" target="_blank">
                                <p>
                                    RPS_Geokimia_Lingkungan.pdf
                                </p>
                            </a>
                          </div>
                      </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="kegiatan" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="row">

                      <div class="col-lg-12">
                        <h4>Kegiatan Geologi Regional dan Ekskursi</h4>
                          <div class="item">
                            <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/k1.png" alt="struktur-organisasi" />
                          </div>
                      </div><!-- Slider col end -->
                      <div class="col-lg-12">
                        <h4>Lokasi Kegiatan</h4>
                          <div class="item">
                            <<img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/k2.png" alt="struktur-organisasi" />
                          </div>
                      </div>
                      <div class="col-lg-12">
                        <h4>Mitra</h4>
                          <div class="item">
                            <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/k3.png" alt="struktur-organisasi" />
                          </div>
                      </div><!-- Slider col end -->
                      <div class="col-lg-12">

                        <h4>Foto Kegiatan</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/fk1.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/fk2.png" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/fk3.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/fk4.png" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/fk5.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/fk6.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-lg-12">
                        <h4>Sosialisasi Prodi Magister Geologi di Prodi Teknik Geologi Universitas Haluoleo</h4>
                          <div class="item">
                            <p>Kegiatan Sosialisasi Prodi Magister dilaksanakan pada tanggal     16 Oktober 2020 di Prodi Teknik Geologi Universitas Haluoleo. Kegiatan ini diikuti oleh beberapa staf pengajar dari Prodi Magister Geologi Universitas Hasanuddin yang dikoordinir oleh Kaprodi S2 Ir. Ratna Husain, ST., MT</p>
                          </div>
                      </div><!-- Slider col end --><!-- Slider col end -->
                      <div class="col-lg-12">

                        <h4>Foto Kegiatan</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/kb1.png" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/kb2.png" alt="struktur-organisasi" />
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-lg-12">
                        <h4>Benchmarking S2 dan S3 DepartemenTeknik Geologidi Teknik Geologi UGM</h4>
                          <div class="item">
                            <p>Program Studi Magister Geologi dan Program Studi Tekhnologi Kebumian dan Lingkungan Departemen Teknik Geologi Universitas Hasanuddin melaksanakan kegiatan benchmarking ke                                       Departemen  Teknik Geologi Universitas Gajah Mada. Kegiatan ini dilaksanakan pada tanggal 23 September 2022, kunjungan ini diantaranya diikuti oleh staf pengajar S2 dan S3, tendik dan laboran.</p>
                          </div>
                      </div><!-- Slider col end --><!-- Slider col end -->
                      <div class="col-lg-12">

                        <h4>Foto Kegiatan</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/bk1.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/bk2.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <img loading="lazy" class="img-fluid" src="<?=home_assets()?>images/tambahan/bk3.jpg" alt="struktur-organisasi" />
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">D</div>
            </div>
        </div>

    </div>
</section>
<!-- vertical tab End -->