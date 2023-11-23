<div id="banner-area" class="banner-area" style="background-image:url(<?=home_assets()?>images/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">News</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">News</a></li>
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

      <div class="col-lg-8 mb-5 mb-lg-0">
      	<?php foreach ($blogs as $blogs) {
            $isi_blogs = substr(strip_tags((($blogs->isi_en) ? $blogs->isi_en : $blogs->isi_id)), 0, 150).'...';
        ?>
        <div class="post">
          <div class="post-media post-image">
            <img loading="lazy" src="<?=upload_url('blogs/thumbs').(empty($blogs->gambar) ? 'no_image.jpg' : $blogs->gambar)?>" class="img-fluid" alt="post-image">
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> <?=$blogs->fullname?></a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> <?=$blogs->kategori?></a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i> <?=tgl_indo($blogs->iat)?></span>
              </div>
              <h2 class="entry-title">
                <a href="<?=site_url('news/'.(($blogs->slug_en) ? ($blogs->slug_en) : ($blogs->slug_id)))?>"><?=(($blogs->judul_en) ? $blogs->judul_en : $blogs->judul_id)?></a>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p><?=$isi_blogs?></p>
            </div>

            <div class="post-footer">
              <a href="<?=site_url('news/'.(($blogs->slug_en) ? ($blogs->slug_en) : ($blogs->slug_id)))?>" class="btn btn-primary">Continue Reading</a>
            </div>

          </div><!-- post-body end -->
        </div><!-- 1st post end -->
	    <?php } ?>

        <nav class="paging" aria-label="Page navigation example">
          <?=(isset($pagination) ? $pagination . '<br/>' : '')?>
        </nav>

      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Informasi Terbaru</h3>
            <ul class="list-unstyled">
              <!-- <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="img" src="images/news/news1.jpg"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="#">We Just Completes $17.6 Million Medical Clinic In Mid-missouri</a>
                  </h4>
                </div>
              </li> -->
              <!-- 1st post end-->

            </ul>


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->
