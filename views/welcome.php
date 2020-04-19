<?php ob_start() ?>
<body>
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">	
				<!-- Prévu en bootstrap pour faire défiler des éléments, ici je n'en affiche qu'un -->
				<div class="row single-slide">
					<div class="col-lg-5">
						<div class="banner-content">
							<h1>Whey New <br>Collection!</h1>
							<p>	Avec jusqu'à 75 % de sucre en moins que les produits disponibles en grande surface, ce biscuit vous permet de profiter d'un coup de fouet en milieu d'après-midi sans gâcher vos efforts.
							Composé d'une délicieuse poudre de cacao et cuit au four avec des éclats de chocolat sucrés, notre Protein Bar apporte 23 g de protéines pour petit plaisir gourmand tous les jours.
							</p>
							<?php if(!empty($_SESSION['id']) && $_SESSION['userRole'] == 1):?>
							<div class="add-bag d-flex align-items-center">
								<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
								<span class="add-text text-uppercase">Ajouter au panier</span>
							</div>
							<?php endif?>
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
	<!-- Box features -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- 1 item -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon1.png" alt="">
						</div>
						<h6>Livraison Gratuite</h6>
						<p>Livraison gratuite sur toutes nos commandes</p>
					</div>
				</div>
				<!-- 1 item -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon2.png" alt="">
						</div>
						<h6>Politique de Retour</h6>
						<p>Article endommage? Nous vous le remboursons</p>
					</div>
				</div>
				<!-- 1 item -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?=ROOT_PATH?>public/img/f-icon3.png" alt="">
						</div>
						<h6>Support</h6>
						<p>Notre support est joignable h24, 7j/7</p>
					</div>
				</div>
				<!-- 1 item -->
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
</body>
<?php
$title="Welcome";
$content=ob_get_clean();
include 'includes/template.php';
?>
