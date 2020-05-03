<?php ob_start() ?>
<body>
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
			<br/><br/>
			<center><h2>Listing articles</h2></center>
			<br/><br/>
					<table class="table table-bordered table-responsive table-hover" id="empTable">
						<thead>
							<tr>					
								<td><center>Image</center></td>
								<td><center>Titre</center></td>
								<td><center>Prix</center></td>
								<td><center>Categorie</center></td>
								<td><center>Sous-categorie</center></td>
								<td></td>
								<td></td>
							</tr>
						</thead>
						<tbody>
						<?php foreach($articles as $article):?>
							<tr>
								<td> <img src=<?=$article['photo_path']?> height="100px" width="100px"></td>
								<td><?=$article['title']?></td>
								<td><?=$article['price']?>&euro;</td>
								<td><?=$article['catname']?></td>
								<td><?=$article['subname']?></td>
								<td><a href="<?=ROOT_PATH?>article/<?=str_replace(" ","-",$article['subname'])?>/<?=str_replace(" ","-",$article['title'])?>">Modifier</a></td>
								<td><a href="<?=ROOT_PATH?>edit_articles?delete=<?=$article['id']?>" onclick="return confirm('Supprimer l\'article <?=$article['title']?>?')">Supprimer</a></td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
					</div>
					<br/>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#empTable').dataTable();
		});
	</script>
</body>

<?php
$title = "Gestion articles";
$content = ob_get_clean();
include("includes/template.php");
?>