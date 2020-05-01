<?php ob_start() ?>
<body>
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Administration WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Administration<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Créer un article</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- Formulaire de création d'article -->
	<section class="login_box_area section_gap">
		<div class="container">
			<div>
				<div class="col-lg-6">
					<h2>Formulaire de création d'article</h1>
					</br>
					<form action="<?=ROOT_PATH?>add/new/article" method="POST" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputTitle">Titre:</label>
							<input type="text" class="form-control" name="title" id="inputTitle">
						</div>
						<div class="form-group col-md-6:">
							<label for="inputPrice">Prix:</label>
							<input type="number" step="0.01" min="0" class="form-control" name="price" id="inputPrice">
						</div>
						<div class="form-group col-md-6:">
							<label for="inputDesc">Description:</label>
							<textarea class="form-control" id="inputDesc" name="description" rows="3"></textarea>
						</div>
						</div>
					<div class="form-group">
						<label class="control-label">Categorie:</label>
						<div class="form-control">
							<select name="categorieSel" id="categorieSel" onchange="giveSelection(this.value)">
								<option selected = "selected" disabled >Categorie</option>
								<option value="a">Materiel</option>
								<option value="b">Vetements</option>
								<option value="c">Nutrition</option>
							</select>
							<select name="subcatSel" id="subcatSel">
								<option value="Disques" data-option="a">Disques</option>
								<option value="Halteres" data-option="a">Halteres</option>
								<option value="Medecine Ball" data-option="a">Medecine Ball</option>
								<option value="Accessoires" data-option="a">Accessoires</option>
								<option value="Bancs de musculation" data-option="a">Bancs de musculation</option>
								<option value="Vestes et Gilets" data-option="b">Vestes et Gilets</option>
								<option value="Pulls" data-option="b">Pulls</option>
								<option value="Joggins et Bas" data-option="b">Joggins et Bas</option>
								<option value="Shorts" data-option="b">Shorts</option>
								<option value="T Shirts et Hauts" data-option="b">T Shirts et Hauts</option>
								<option value="Proteines" data-option="c">Proteines</option>
								<option value="Aliments et Snacks" data-option="c">Aliments et Snacks</option>
								<option value="Creatine" data-option="c">Creatine</option>
								<option value="Acides amines" data-option="c">Acides amines</option>
								<option value="Vitamines et Mineraux" data-option="c">Vitamines et Mineraux</option>
							</select>									
						</div>		
					</div>		
					<div class="form-group">
						<label class="control-label">Photo:</label>
						<div>
							<input type="file" name="image" class="text-center center-block file-upload" accept="image/*">
						</div>
					</div>					
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Créer l'article</button>
						</div>
					</div>		
					</form>
				</div>
			</div>
		</div>
	</section>
	<script src="<?=ROOT_PATH?>public/js/linkedSelect.js"></script>
</body>
<?php
$title = "Ajouter un article";
$content = ob_get_clean();
include("includes/template.php");
?>