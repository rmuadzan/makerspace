<div id="banner-area" class="banner-area" style="background-image:url(<?=home_assets()?>images/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title"><?=$title?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
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

	<div class="row text-center">
      <div class="col-lg-12">
        <h3 class="section-sub-title">Kepala Laboratorium</h3>
      </div>
    </div>

  	<div class="row justify-content-center">
      <div class="col-lg-3 col-sm-6 mb-5">
        <div class="ts-team-wrapper">
          <div class="team-img-wrapper" style="height: 250px; width: 250px;">
            <img loading="lazy" src="<?=upload_url('dosen').(empty($ketua->foto_dosen) ? 'no_image.jpg' : $ketua->foto_dosen)?>" class="img-fluid" alt="team-img">
          </div>
        </div>
        <div class="ts-team-content-classic">
          <h5 class="ts-name" style="color:#000;"><?=($ketua->gelar_depan != '' ? $ketua->gelar_depan . '. ' : '') . $ketua->nama_dosen . ($ketua->gelar_belakang != '' ? ', ' . $ketua->gelar_belakang : '')?></h5>
          <!--/ social-icons-->
        </div>
        <!--/ Team wrapper 1 end -->

      </div><!-- Col end -->

    </div><!-- Content row 1 end -->

    <div class="row text-center">
      <div class="col-lg-12">
        <h3 class="section-sub-title">Anggota Laboratorium</h3>
      </div>
    </div>

    <div class="row justify-content-center">
    	<?php foreach($anggota as $anggota) {
			$dosen = $this->crud_fakultas->gd('dosen',array('nip' => $anggota->dosen));?>
	    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
	        <div class="ts-team-wrapper">
	          <div class="team-img-wrapper" style="height: 250px; width: 250px;">
	            <img loading="lazy" src="<?=upload_url('dosen').(empty($dosen->foto_dosen) ? 'no_image.jpg' : $dosen->foto_dosen)?>" class="img-fluid" alt="team-img">
	          </div>
	        </div>
	        <div class="ts-team-content-classic">
            <h5 class="ts-name" style="color:#000;"><?=($dosen->gelar_depan != '' ? $dosen->gelar_depan.'. ' : '').$dosen->nama_dosen.($dosen->gelar_belakang != '' ? ', '.$dosen->gelar_belakang : '')?></h5>
            <!--/ social-icons-->
          </div>
	        <!--/ Team wrapper 5 end -->
	    </div><!-- Col end -->
		<?php } ?>
	</div>

  	<div class="col-lg-12 mt-5 mt-lg-0">

  		<div class="row text-center">
	      <div class="col-lg-12">
	        <h3 class="section-sub-title">Deskripsi Laboratorium</h3>
	      </div>
	    </div>

    	<p><?=$lab->isi_id?></p>

    	<table style="width:100%" id="lecturer" class="table">
	        <thead>
	          <tr>
	            <th>No</th>
	            <th>Nama Alat</th>
	            <th>Jumlah</th>
	            <th>Spesifikasi</th>
	            <th>Keterangan</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	            if($alat == null) { ?>
	              <td align="center" colspan="5"><p>Tidak Ada Data</p></td>
	            <?php }else{

	              $i = 1;
	              
	            foreach ($alat as $data) { ?>
	            <tr>
	              <td ><?=$i?></td>
	              <td ><?=$data->nama_alat?></td>
	              <td ><?=$data->jumlah.' '.$data->satuan?></td>
	              <td ><?=$data->spesifikasi?></td>
	              <td ><?=$data->keterangan?></td>
	            </tr>
	            <?php $i++; } }?>
	        </tbody>
	    </table>

  	</div><!-- Content col end -->

  	<div class="row justify-content-center">
      	<div class="col-lg-6">
        	<div id="page-slider" class="page-slider small-bg">
        		<div class="item">
	            <img loading="lazy" class="img-fluid" src="<?=upload_url('lab').(!empty($lab->foto_lab) ? $lab->foto_lab : 'no_image.png') ?>" alt="project-image" />
	          </div>
	    	  <?php foreach ($gambar as $gambar): ?>
	          <div class="item">
	            <img loading="lazy" class="img-fluid" src="<?=upload_url('blogs').(!empty($gambar->file) ? $gambar->file : 'no_image.png') ?>" alt="project-image" />
	          </div>
		      <?php endforeach;?>
	        </div><!-- Page slider end -->
      	</div><!-- Slider col end -->

    </div><!-- Row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->