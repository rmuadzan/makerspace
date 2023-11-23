<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Beranda</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
    </div>
</div>
<!-- Breadcrumb section end -->
<!--vertical tab-->
	<div class="container spad">
	<div class="row">
		<div class="col-lg-3"> <!-- required for floating -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs tabs-left sideways" aria-orientation="vertical">
<?php if($data->titel1_id != NULL) { ?>
			<li class="active"><a href="#1" data-toggle="tab">Vision</a></li>
<?php } 
	if($data->titel2_id != NULL) { ?>
			<li><a href="#2" data-toggle="tab">Mission</a></li>
<?php }
	if($data->titel3_id != NULL) { ?>
			<li><a href="#3" data-toggle="tab"><?=$data->titel3_id?></a></li>
<?php } 
	if($data->titel4_id != NULL) { ?>
			<li><a href="#4" data-toggle="tab"><?=$data->titel4_id?></a></li>
<?php }
	if($data->titel5_id != NULL) { ?>
			<li><a href="#5" data-toggle="tab"><?=$data->titel5_id?></a></li>
<?php } ?>
			</ul>
		</div>

		<div class="col-lg-9">
			<!-- Tab panes -->
<?php
	if($data->titel1_id == null) { ?>
				<td align="center" colspan="5"><h4>Belum ada informasi di halaman ini</h4></td>
<?php } ?>
            <div class="tab-content">
			<div class="tab-pane active" id="1">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div class="visi">
							<h2>Vision</h2>
							<p>To be an Institution for the Development and Application of Maritime Technology in the field of Marine System Engineering.</p>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="2">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div class="misi">
							<h2>Mission</h2>
							<p>1. Providing good quality education to develop students with good character, solid Indonesian culture, ethics, and enhanced fundamental knowledge and maritime technology.Providing good quality education to develop students with good character, solid Indonesian culture, ethics, and enhanced fundamental knowledge and maritime technology.</p>
							<p>2. Contributing to the development of science and new technology up to the latest technology in marine system engineering.</p>
							<p>3. Optimizing the benefit for the application and disseminating of science and applied technology or an appropriate technology for the community in maritime technology.</p>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="3">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data->isi3_id ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="4">
				<section class="blog-page-section spad pt-0">
					<div class="faq-w3agile">
						<div class="container">
							<div>
							<h3 class="w3_agile_header">Kurikulum Program Sarjana Teknik Informatika Unhas</h3> 
							<ul class="faq">
							<?php foreach($kurikulum as $data){ ?>
								<li class="item1"><a href="#" title="click here"><?=$data->matkul?></a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p><?=$data->deskripsi?></p>
										</li>										
        							</ul>
      							</li>
							<?php }?>
							</ul>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="5">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data->isi5_id ?>
						</div>
					</div>
				</section>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
</div>
