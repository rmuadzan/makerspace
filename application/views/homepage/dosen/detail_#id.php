<section id="main-container" class="main-container pb-4">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h3 class="section-sub-title"><?=($dosen->gelar_depan != '' ? $dosen->gelar_depan.' ' : '').$dosen->nama_dosen.($dosen->gelar_belakang != '' ? ', '.$dosen->gelar_belakang : '')?></h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
        <div class="ts-team-wrapper">
          <div class="team-img-wrapper">
            <img loading="lazy" src="<?=upload_url('/dosen').$dosen->foto_dosen?>" class="img-fluid" alt="team-img" style="width: 250px;">
          </div>
        </div>
        <!--/ Team wrapper 3 end -->
      </div><!-- Col end -->

      <div class="col-lg-9 col-md-8 col-sm-6 mb-5">
		<div style="padding-left: 50px; margin-top: 50px;">
			<table id="detailprofil">
				<tr>
					<th>Nama Lengkap</th>
					<td><?=$title?></td>
				</tr>
				<tr>
					<th>NIDN / NIP</th>
					<td><?=$dosen->nip?></td>
				</tr>
				<tr>
					<th>Jabatan Akademik</th>
					<td><?=$dosen->jabatan_dosen?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?=$dosen->email_dosen?></td>
				</tr>
				<tr>
					<th>Bidang Keahlian</th>
					<td><?=$dosen->bidang_penelitian?></td>
				</tr>
			</table>
		</div>
      </div><!-- Col end -->
    </div><!-- Content row end -->

  </div><!-- Container end -->
</section>

<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <h3 class="border-title border-left mar-t0">Data Pendukung</h3>

        <div class="accordion accordion-group accordion-classic" id="construction-accordion">
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  Mata Kuliah
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
              data-parent="#construction-accordion">
              <div class="card-body">
				<div id="dosen-data" class="scrollable">
					<table>
							<tr>
								<th width="20%">Kode Mata Kuliah</th>
								<th width="50%">Mata Kuliah</th>
								<th width="10%">SKS</th>
								<th width="20%">Semester</th>
							</tr>
						<?php if(count($mk) == 0){ ?>
							<tr>
								<td colspan="4" width="100%" class="text-center">Tidak Ada Data Mata Kuliah</td>
							</tr>
						
						<?php } else{
							$i = 1;
							foreach ($mk as $data) {
								$mk = $this->crud_mahasiswa->gd('mata_kuliah', array('id_mata_kuliah' => $data->id_mk));
						?>	
							<tr>
								<td><?=$mk->kode_mata_kuliah?></td>
								<td><?=$mk->nama_mata_kuliah?></td>
								<td><?=$mk->sks?></td>
								<td><?=$mk->semester?></td>
							</tr>
						<?php $i++; }} ?>
							
					</table>
				</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Publikasi
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
              <div class="card-body">
				<div id="dosen-data" class="scrollable">
					<table>
						<tr>
							<th width="60%">Judul Publikasi</th>
							<th width="10%">Vol/No/Tahun</th>
							<th width="30%">Jurnal</th>
						</tr>
						<?php if(count($publikasi) == 0){ ?>
							<tr>
								<td colspan="4" width="100%" class="text-center">Tidak Ada Data Publikasi</td>
							</tr>
						
						<?php } else{
							$i = 1;
							foreach ($publikasi as $data) {
						?>	
							<tr>
								<td class="text-left" width="100%"><?=$i.'. '.$data->judul?></td>
								<td class="text-left" width="100%"><?=$data->vol.'/'.$data->no.'/'.$data->tahun?></td>
								<td class="text-left" width="100%"><?=$data->jurnal?></td>
							</tr>
						<?php $i++; }} ?>
					</table>
				</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Penelitian
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
              data-parent="#construction-accordion">
              <div class="card-body">
				<div id="dosen-data" class="scrollable">
					<table>
						<tr>
							<th width="80%">Judul Penelitian</th>
							<th width="20%">Tahun</th>
						</tr>
						<?php if(count($penelitian) == 0){ ?>
							<tr>
								<th width="100%" class="text-center">Tidak Ada Penelitian</td>
							</tr>
						<?php } else{
							foreach ($penelitian as $data) {
								// var_dump($p1->jenis == 'penelitian');
								// die();
								if($data != null){ if($data->jenis == 'penelitian'){
						?>	
							<tr>
								<td class="text-left"><?=$data->judul?></td>
								<td class="text-center"><?=$data->tahun?></td>
							</tr>
						<?php }}}} ?>
					</table>
				</div>
              </div>
            </div>
          </div>
		  <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingFour">
              <h2 class="mb-0">
                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Pengabdian
                </button>
              </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
              data-parent="#construction-accordion">
              <div class="card-body">
				<div id="dosen-data" class="scrollable">
					<table>
						<tr>
							<th width="80%">Judul Pengabdian</th>
							<th width="20%">Tahun</th>
						</tr>
						<?php if(count($penelitian) == 0){ ?>
							<tr>
								<th width="100%" class="text-center">Tidak ada Pengabdian</td>
							</tr>
						<?php } else{
							foreach ($penelitian as $data) {
								if($data != null){ if($data->jenis == 'pengabdian'){
						?>	
							<tr>
								<td class="text-left"><?=$data->judul?></td>
								<td class="text-center"><?=$data->tahun?></td>
							</tr>
						<?php }}}} ?>
					</table>
				</div>
            </div>
          </div>
        </div>
        <!--/ Accordion end -->

    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->