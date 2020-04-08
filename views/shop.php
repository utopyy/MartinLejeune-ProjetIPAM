<?php ob_start() ?>
	<!-- Start Banner Area -->
	<body id="category">
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="/views/welcome.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Chercher une catégorie</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span
								 class="lnr lnr-arrow-right"></span>Matériel<span class="number">(53)</span></a>
							<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
								<li class="main-nav-list child"><a href="#">Disques<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Halteres<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Medecine ball<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Acessoires<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Bancs de musculation<span class="number">(11)</span></a></li>
							</ul>
						</li>

						<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
								 class="lnr lnr-arrow-right"></span>Vêtements et Accessoires<span class="number">(53)</span></a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
								<li class="main-nav-list child"><a href="#">Vestes et Gilets<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Pulls<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Joggings & Bas<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Shorts<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">T-Shirts & Hauts<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#cooking" aria-expanded="false" aria-controls="cooking"><span
								 class="lnr lnr-arrow-right"></span>Nutrition<span class="number">(53)</span></a>
							<ul class="collapse" id="cooking" data-toggle="collapse" aria-expanded="false" aria-controls="cooking">
								<li class="main-nav-list child"><a href="#">Protéines<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Aliments & Snacks<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Vitamines & Minéraux<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Créatine<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Acides aminés<span class="number">(11)</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="/public/img/p5.jpg" alt="">
								<div class="product-details">
									<h6>addidas New Hammer sole
										for Sports person</h6>
									<div class="price">
										<h6>$150.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
									<div class="prd-bottom">
										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Ajouter</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">Détails</p>
										</a>
									</div>
								</div>
							</div>
						</div>
				
					</div>
				</section>
				<!-- End Best Seller -->
			</div>
		</div>
	</div>
</body>
<?php
$title="Shop";
$content=ob_get_clean();
include 'includes/template.php';
?>