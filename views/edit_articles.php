<?php ob_start() ?>
<body id="category">
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Administration WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Administration<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Gestion articles</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
		<section>
		<div class="containerAdmin">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Titre</th>
				<th scope="col">Categorie</th>
				<th scope="col">Sous-categorie</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($articles as $article):?>
		<tr>
		<td><?=$article['title']?></td>
		<td><?=$article['catname']?></td>
		<td><?=$article['subname']?></td>		
		<td><a href="<?=ROOT_PATH?>article/<?=str_replace(" ","-",$article['subname'])?>/<?=str_replace(" ","-",$article['title'])?>">Modifier</a></td>
		<td><a href="<?=ROOT_PATH?>edit_articles?delete=<?=$article['id']?>">Supprimer</a></td>
		</tr>
	<?php endforeach?>
		<a class="primary-btn" href="<?=ROOT_PATH?>add_article">Ajouter un article +</a></td>
	</table>
	</div>
	</section>
</body>
<?php
$title = "Gestion articles";
$content = ob_get_clean();
include("includes/template.php");
?>
