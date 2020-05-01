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
							<h1>BarProt New <br>Collection!</h1>
							<h4><?=$articleName;?></h4>
							<h6><?=$articlePrice;?>&euro;</h6>
							<p><?=$articleDesc;?></p>
							<?php if(!empty($_SESSION['id']) && $_SESSION['userRole'] == 1):?>
							<div class="add-bag d-flex align-items-center">
								<a class="add-btn" href="<?=ROOT_PATH?>panier?title=<?=$articleName?>"><span class="lnr lnr-cross"></span></a>
								<span class="add-text text-uppercase">Ajouter au panier</span>
							</div>
							<?php endif?>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="banner-img">
							<img class="img-fluid" src="<?=$articlePhoto?>" alt="">
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
