<?php ob_start() ?>
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
						<a href="#"><?=$titleCat?></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- Box articles -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
			<!-- Sidebar pour chercher les articles -->
				<div class="sidebar-categories">
					<div class="head">Chercher une catégorie</div>
					<ul class="main-categories">
						<?php foreach($dataSub as $rowSub):?>	
						<li class="main-nav-list"><a data-toggle="collapse" href="#<?=$rowSub['name']?>"><span
								 class="lnr lnr-arrow-right"></span><?=$rowSub['name']?>
								 <span class="number">(<?=$rowSub['nb']?>)</span></a>
							<ul class="collapse" id="<?=$rowSub['name']?>">
								<?php foreach($rowSub['subcat'] as $sub):?>
								<li class="main-nav-list child"><a href="<?=ROOT_PATH?>shop/<?=str_replace(" ","-", $sub['nameSub'])?>"><?=$sub['nameSub']?><span class="number">(<?=$sub['nbSub']?>)</span></a></li>
								<?php endforeach?>
							</ul>
						</li>
						 <?php endforeach?>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Affichage des articles en fonction du choix de l'user -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">					
					<?php 
					foreach($data as $row):?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="<?=ROOT_PATH . $row['path']?>" alt="">
								<div class="product-details">
									<h6><?=$row['title']?></h6>
									<div class="price">
										<h6><?=$row['price']?>&euro;</h6>
									</div>
									<div class="prd-bottom">									
									<?php  //si la personne est connectée et utilisateur (role=1)
									if(!empty($_SESSION['id']) && $_SESSION['userRole'] == 1):?>
										<a href="<?=ROOT_PATH?>panier?title=<?=$row['title']?>" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Panier +</p>
										</a>
										<?php endif?>
										<a href="<?=ROOT_PATH?>article/<?=str_replace(" ","-",$row['category'])?>/<?=str_replace(" ","-",$row['title'])?>" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">Détails</p>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach?>
					</div>
				</section>
			</div>
		</div>
	</div>
</body>
<?php
$title="Shop";
$content=ob_get_clean();
include 'includes/template.php';
?>