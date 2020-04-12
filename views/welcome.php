<?php ob_start() ?>
	<body>
	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">	
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Whey New <br>Collection!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Ajouter au panier</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="<?=ROOT_PATH?>public/img/banner-img.png" alt="">
								</div>
							</div>
						</div>			
			</div>
		</div>
	</section>
	<!-- End banner Area -->
	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon1.png" alt="">
						</div>
						<h6>Livraison Gratuite</h6>
						<p>Livraison gratuite sur toutes nos commandes</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon2.png" alt="">
						</div>
						<h6>Politique de Retour</h6>
						<p>Article endommage? Nous vous le remboursons</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon3.png" alt="">
						</div>
						<h6>Support</h6>
						<p>Notre support est joignable h24, 7j/7</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon4.png" alt="">
						</div>
						<h6>Paiement securise</h6>
						<p>Nous garantissons des transactions securisees</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->
</body>
<?php
$title="Welcome";
$content=ob_get_clean();
include 'includes/template.php';
?>
