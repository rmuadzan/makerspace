<div id="banner-area" class="banner-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url(<?=home_assets()?>images/tambahan/gedung.jpeg) ">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Perpustakaan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">beranda</a></li>
                      <li class="breadcrumb-item"><a href="#">perpustakaan</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Skripsi</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

  <!--  Main container end -->

<section id="ts-team" class="ts-team">
  <div class="container">
    <div class="row text-center">
        <div class="col-lg-12">
          <h3 class="section-sub-title">Skripsi</h3>
        </div>
    </div><!--/ Title row end -->

    <div class="row">
        <div class="col-lg-12">
          <table style="width:100%" id="lecturer" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Stambuk</th>
                <th>Nama Mahasiswa</th>
                <th>Judul Skripsi</th>
                <th>Pembimbing</th>
                <!-- <th>Email</th> -->
                <!-- <th></th> -->
              </tr>
            </thead>
            <tbody>
              <?php
                if($pp == null) { ?>
                  <td align="center" colspan="5"><p>Tidak Ada Data</p></td>
                <?php }else{

                  $i = 1;
                  
                foreach ($pp as $data) { ?>
                <tr>
                  <td ><?=$i?></td>
                  <td ><?=$data->nim?></td>
                  <td ><?=$data->nama?></td>
                  <td ><?=$data->nama_file_id?></td>
                  <td ><?=$data->pembimbing_1.' & '.$data->pembimbing_2?></td>
                  <!-- <td ><a href="<?=base_url('dosen/').$data->nip?>" class="btn btn-primary">Profil</a></td> -->
                </tr>
                <?php $i++; } }?>
            </tbody>
          </table><!-- Team slide end -->
        </div>
    </div><!--/ Content row end -->
  </div><!--/ Container end -->
</section><!--/ Team end -->