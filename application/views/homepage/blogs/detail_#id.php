<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
          <div class="post-media post-image">
            <img loading="lazy" src="<?=upload_url('blogs/').$blogs->gambar?>" class="img-fluid" alt="post-image">
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
                <?=$blogs->judul_id?>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p><?=$blogs->isi_id?></p>
            </div>

          </div><!-- post-body end -->
        </div><!-- post content end -->
	     
        <div id="page-slider" class="page-slider small-bg">
    	  <?php foreach ($gambar as $gambar): ?>
          <div class="item">
            <img loading="lazy" class="img-fluid" src="<?=upload_url('blogs').(!empty($gambar->file) ? $gambar->file : 'no_image.png') ?>" alt="project-image" />
          </div>
	      <?php endforeach;?>
        </div><!-- Page slider end -->
	     

      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Berita Terbaru</h3>
            <ul class="list-unstyled">
	          <?php foreach ($latest as $latest) { 
				if($latest->id_blog == $blogs->id_blog)
					continue;
			  ?>
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="img" src="<?=upload_url('blogs/thumbs').(!empty($latest->gambar) ? $latest->gambar : 'no_image.png') ?>"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="<?=site_url('berita/'.$latest->slug_id)?>"><?=$latest->judul_id?></a>
                  </h4>
                </div>
              </li><!-- 1st post end-->
	          <?php } ?>

            </ul>

          </div><!-- Recent post end -->


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->