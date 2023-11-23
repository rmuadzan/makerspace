<?php 
$modul = $this->uri->segment(2);
$method = $this->uri->segment(3);
?>

<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg p-0">
					<a class="navbar-brand" href="<?=base_url()?>">
						<img src="<?=home_assets()?>images/logo.png" alt="Logo">
					</a>

					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ion-android-menu"></span>
					</button>

					<div class="collapse navbar-collapse ml-auto" id="navbarsExample09">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item <?= (($modul == 'home' or $modul == '') ? 'active' : '') ?>">
								<a class="nav-link" href="<?=base_url()?>">Home</a>
							</li>
							<li class="nav-item <?= (($modul == 'service') ? 'active' : '') ?>">
								<a class="nav-link" href="<?=base_url()?>service">Services</a>
							</li>
							<li class="nav-item <?= (($modul == 'faq') ? 'active' : '') ?>">
								<a class="nav-link" href="#">FAQ</a>
							</li>
							<li class="nav-item <?= (($modul == 'connected') ? 'active' : '') ?>">
								<a class="nav-link" href="#">Get Connected</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header><!-- header close -->