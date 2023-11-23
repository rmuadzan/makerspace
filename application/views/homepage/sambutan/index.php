    <div id="banner-area" class="banner-area"
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url(<?=home_assets()?>images/tambahan/gedung.jpeg) ">
      <div class="banner-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Sambutan</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">sambutan</li>
                  </ol>
                </nav>
              </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                <h3 class="column-title"><?=$pengaturan->kadep_nama?></h3>
                <blockquote><p><?=$pengaturan->sambutan_id?></p></blockquote>

                </div><!-- Col end -->

                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                        <img loading="lazy" src="<?=upload_url('pengaturan/').$pengaturan->kadep_foto?>" class="img-fluid" alt="team-img">
                    </div>
                    </div>
                    <!--/ Team wrapper 1 end -->

                </div><!-- Col end -->          
                

                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div><!-- Container end -->
      </section><!-- Main container end -->