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
						<a href="#">Detail article</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- article -->
	<div class ="container">
		<div class="owl-item active">				
			<!-- affichage pour les users/visiteurs -->
			<div>
				<img class="resizePrevu" src="<?=ROOT_PATH.$article['photo_path']?>" alt="">
			</div>
			</br>
				<h6><?=$article['price']?>&euro;</h6>
				<h4><?=$article['title']?></h4>
				<h5><?=$article['description']?></h5>
				<h6>Categorie: <?=$article['subName']?></h6>
				<?php if(!empty($_SESSION['id']) && $_SESSION['userRole'] == 1):?>
				<div class="add-bag d-flex align-items-center">
					<a class="add-btn" href="<?=ROOT_PATH?>panier?title=<?=$article['title']?>"><span class="lnr lnr-cross"></span></a>
					<span class="add-text text-uppercase">Ajouter au panier</span>
				</div>
				<?php endif?>
				<!-- affichage pour l'admin : modification d'article -->
				<?php if(!empty($_SESSION['id']) && $_SESSION['userRole'] == 2):?>
				<div class="col-md-9 personal-info">
					<br/></br/>
					<div class="alert alert-info alert-dismissable">
					  <a class="panel-close close" data-dismiss="alert">×</a> 
					  <i class="fa fa-coffee"></i>
					  La photo doit être au format (jpeg, pjpeg ou png) et sa hauteur identique à sa largeur.
					</div>
						<h3>Modifier l'article</h3>
						<form class="form-horizontal" action="<?=ROOT_PATH?>article?cat=<?=strtolower($article['subName'])?>&name=<?=strtolower($article['title'])?>" method="POST" id="contactForm" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-lg-3 control-label">Titre:</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" id="title" name="title" value="<?=$article['title']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Prix:</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" id="price" name="price" value="<?=$article['price']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Description:</label>
								<div class="col-lg-8">
									<textarea class="form-control" id="" rows='3' name="description"><?=$article['description']?></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-lg-3 control-label">Categorie:</label>
								<div class="col-lg-8">
									<div class="form-control">
										<select name="categorieSel" id="categorieSel" onchange="giveSelection(this.value)">
											<option <?php if($article['catName']=="Materiel"):?> selected="selected"<?php endif?> value="a">Materiel</option>
											<option <?php if($article['catName']=="Vetements"):?> selected="selected"<?php endif?> value="b">Vetements</option>
											<option <?php if($article['catName']=="Nutrition"):?> selected="selected"<?php endif?>value="c">Nutrition</option>
										</select>
										<select name="subcatSel" id="subcatSel">
											<option <?php if($article['subName']=="Disques"):?> selected="selected"<?php endif?> value="Disques" data-option="a">Disques</option>
											<option <?php if($article['subName']=="Halteres"):?> selected="selected"<?php endif?> value="Halteres" data-option="a">Halteres</option>
											<option <?php if($article['subName']=="Medecine Ball"):?> selected="selected"<?php endif?> value="Medecine Ball" data-option="a">Medecine Ball</option>
											<option <?php if($article['subName']=="Accessoires"):?> selected="selected"<?php endif?> value="Accessoires" data-option="a">Accessoires</option>
											<option <?php if($article['subName']=="Bancs de musculation"):?> selected="selected"<?php endif?> value="Bancs de musculation" data-option="a">Bancs de musculation</option>
											<option <?php if($article['subName']=="Vestes et Gilets"):?> selected="selected"<?php endif?> value="Vestes et Gilets" data-option="b">Vestes et Gilets</option>
											<option <?php if($article['subName']=="Pulls"):?> selected="selected"<?php endif?> value="Pulls" data-option="b">Pulls</option>
											<option <?php if($article['subName']=="Joggins et Bas"):?> selected="selected"<?php endif?> value="Joggins et Bas" data-option="b">Joggins et Bas</option>
											<option <?php if($article['subName']=="Shorts"):?> selected="selected"<?php endif?> value="Shorts" data-option="b">Shorts</option>
											<option <?php if($article['subName']=="T Shirts et Hauts"):?> selected="selected"<?php endif?> value="T Shirts et Hauts" data-option="b">T Shirts et Hauts</option>
											<option <?php if($article['subName']=="Proteines"):?> selected="selected"<?php endif?> value="Proteines" data-option="c">Proteines</option>
											<option <?php if($article['subName']=="Aliments et Snacks"):?> selected="selected"<?php endif?> value="Aliments et Snacks" data-option="c">Aliments et Snacks</option>
											<option <?php if($article['subName']=="Creatine"):?> selected="selected"<?php endif?> value="Creatine" data-option="c">Creatine</option>
											<option <?php if($article['subName']=="Acides amines"):?> selected="selected"<?php endif?> value="Acides amines" data-option="c">Acides amines</option>
											<option <?php if($article['subName']=="Vitamines et Mineraux"):?> selected="selected"<?php endif?> value="Vitamines et Mineraux" data-option="c">Vitamines et Mineraux</option>
											</select>
											
									</div>	
								</div>
							</div>	
							<div class="form-group">
								<label class="col-lg-3 control-label">Photo:</label>
								<div class="col-lg-8">
									<input type="file" name="image" class="text-center center-block file-upload" accept="image/*">
								</div>
							</div>
							 <div class="form-group">
							 	<div class="col-lg-8">
									<button type="submit" class="btn btn-primary">Modifier l'article</button>
								</div>
							</div>		
						</form>								
				</div>
				<?php endif?>

				</div>
<hr/>
	</div>
	
	<script src="<?=ROOT_PATH?>public/js/linkedSelect.js"></script>
</body>
<?php
$title="Welcome";
$content=ob_get_clean();
include 'includes/template.php';?>

