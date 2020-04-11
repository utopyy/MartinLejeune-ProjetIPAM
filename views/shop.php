<?php ob_start() ?>
<?php require '../models/articles.php';
$cats = getCats(); // normalement ca doit venir du controller!!!!
$var = 0;
?>

	<!-- Start Banner Area -->
	<body id="category">
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="/views/welcome.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
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
						<?php foreach($cats as $row):?>	
						<li class="main-nav-list"><a data-toggle="collapse" href="#<?=$row?>"><span
								 class="lnr lnr-arrow-right"></span><?=$row?>
								 <?php $nbCat = getNbCats($row);?>
								 <span class="number">(<?=$nbCat?>)</span></a>
							<ul class="collapse" id="<?=$row?>">
								<?php $subcat = getSubCats($row);
								foreach($subcat as $row2):?>
								<?php $nbSub = getNbSubCats($row2);?>
								<li class="main-nav-list child"><a href="/views/shop.php?sub=<?=$row2?>"><?=$row2?><span class="number">(<?=$nbSub?>)</span></a></li>
								<?php endforeach?>
							</ul>
						</li>
						 <?php endforeach?>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
					
					<?php 
					if (!empty($_GET['sub'])):
					$data = array();
					$name = $_GET['sub'];
					$title = getArticleTitle($name);
					$price = getArticlePrice($name);
					$desc = getArticleDesc($name);
					$path = getArticlePath($name);
					$data = array();
					for($cpt=0;$cpt<count($title);$cpt++){
						$temptab = ['title' => $title[$cpt],
						'price' => $price[$cpt],
						'desc' => $desc[$cpt],
						'path' => $path[$cpt],];
						array_push($data,$temptab);
					}
					foreach($data as $row):?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="<?=$row['path']?>" alt="">
								<div class="product-details">
									<h6><?=$row['title']?></h6>
									<div class="price">
										<h6><?=$row['price']?>€</h6>
										<h6 class="l-through">210.00€</h6>
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
					<?php endforeach?>
					<?php else: //ici on créé un affichage si aucune caté n'est sélectionnée?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="<?=$row['path']?>" alt="">
								<div class="product-details">
									<h6><?=$row['title']?></h6>
									<div class="price">
										<h6><?=$row['price']?>€</h6>
										<h6 class="l-through">210.00€</h6>
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
					<?php endif?>
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