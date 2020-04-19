<?php ob_start()?>
<body id="category">
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="<?=ROOT_PATH?>shop">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Détail article</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- single exclusive carousel -->
	<div class ="container">
						<div class="owl-item active">
							
							<div class="single-product">
							<img class="img-fluid" src="<?=ROOT_PATH.$article['photo_path']?>" alt="">
								<div class="price">
									<h6><?=$article['price']?>€</h6>
								</div>
								<h4><?=$article['title']?></h4>
								<h5><?=$article['description']?></h3>
								<h6>Categorie: <?=$article['name']?></h2>
							</div>
						</div>
	</div>
</body>
<?php
$title="Welcome";
$content=ob_get_clean();
include 'includes/template.php';
?>
