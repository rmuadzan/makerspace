<div id="banner-area" class="banner-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url(<?=home_assets()?>images/tambahan/gedung.jpeg) ">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Staff pengajar</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">beranda</a></li>
                      <li class="breadcrumb-item"><a href="#">personil</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Staff</li>
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
          <h3 class="section-sub-title">Dosen Pengajar</h3>
        </div>
    </div><!--/ Title row end -->

    <div class="row">
        <div class="col-lg-12">
          <table style="width:100%" id="lecturer" class="table">
            <thead>
              <tr>
                <th >No</th>
                <th width="20%">Foto</th>
                <th >Nama</th>
                <th>Jabatan</th>
                <th>Bidang Keahlian</th>
                <th>Email</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($dosen == null) { ?>
                  <td align="center" colspan="5"><p>Tidak Ada Data</p></td>
                <?php }else{

                  $i = 1;
                  
                foreach ($dosen as $data) { ?>
                <tr>
                  <td ><?=$i?></td>
                  <td><img src='<?=upload_url('dosen').(empty($data->foto_dosen) ? 'no_image.jpg' : $data->foto_dosen)?>'></td>
                  <td ><?=($data->gelar_depan != '' ? $data->gelar_depan.'. ' : '').$data->nama_dosen.($data->gelar_belakang != '' ? ', '.$data->gelar_belakang : '')?></td>
                  <td ><?=$data->jabatan_dosen?></td>
                  <td ><?=$data->bidang_penelitian?></td>
                  <td ><?=$data->email_dosen?></td>
                  <td ><a href="<?=base_url('dosen/').$data->nip?>" class="btn btn-primary">Profil</a></td>
                </tr>
                <?php $i++; } }?>
            </tbody>
          </table><!-- Team slide end -->
        </div>
    </div><!--/ Content row end -->
  </div><!--/ Container end -->
</section><!--/ Team end -->