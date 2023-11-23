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
                        <h2 class="banner-title">Program Studi Teknik Geologi</h2>
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
                                    sarjana
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
            <?php foreach($data as $title){ ?>
                <button class="nav-link text-left" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?=$title->id?>" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><?=$title->title?></button>
            <?php } ?>
        </div>
        <div class="tab-content col-lg-10" id="v-pills-tabContent">
            <?php foreach($data as $isi){ ?>
            <div class="tab-pane fade" id="v-pills-<?=$isi->id?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="item">
                        <?=$isi->body?>
                      </div>
                  </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>

    </div>
</section>
<!-- vertical tab End -->