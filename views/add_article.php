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
					<form action="add_article" method="POST">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputTitle">Titre</label>
							<input type="text" class="form-control" name="title" id="inputTitle">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPrice">Prix</label>
							<input type="number" step="0.01" min="0" class="form-control" name="price" id="inputPrice">
						</div>
						<div class="form-group col-md-6">
							<label for="inputDesc">Description</label>
							<textarea class="form-control" id="inputDesc" name="description" rows="3"></textarea>
						</div>
					</div>
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">Catégorie</legend>
							<div class="col-sm-10">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="1">
									<label class="form-check-label" for="1">Disques</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="2">
									<label class="form-check-label" for="2">Halteres</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="3">
									<label class="form-check-label" for="3">Medecine Ball</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="4">
									<label class="form-check-label" for="4">Accessoires</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="5">
									<label class="form-check-label" for="5">Bancs de muscu</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="6">
									<label class="form-check-label" for="6">Vestes et gilets</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="7">
									<label class="form-check-label" for="7">Pulls</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="8">
									<label class="form-check-label" for="8">Joggins et Bas</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="9">
									<label class="form-check-label" for="9">Shorts</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="10">
									<label class="form-check-label" for="10">T-Shorts et hauts</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="11">
									<label class="form-check-label" for="11">Proteines</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="12">
									<label class="form-check-label" for="12">Aliments et Snacks</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="13">
									<label class="form-check-label" for="13">Créatine</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="14">
									<label class="form-check-label" for="14">Acides Amines</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gridRadios" value="15">
									<label class="form-check-label" for="15">Vitamines et Mineraux</label>
								</div>
							</div>
						</div>
					</fieldset>
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
</body>
<?php
$title = "Ajouter un article";
$content = ob_get_clean();
include("includes/template.php");
?>