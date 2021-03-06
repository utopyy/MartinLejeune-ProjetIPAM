<?php ob_start() ?>
<body id="category">
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
			<center><h2>Listing articles</h2></center>
			<br/><br/>
			<a href="<?=ROOT_PATH?>add/new/article" class="btn btn-outline-success">Ajouter un article +</a>
			<div class="fresh-table full-color-orange">
				<div class="toolbar">
					<br/>
					<table class="table divTable" id="empTable">
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
								<td><center><img src=<?=ROOT_PATH.$article['photo_path']?> height="100px" width="100px"></center></td>
								<td class="tableCustomTd"><center><br/><?=$article['title']?></center></td>
								<td class="tableCustomTd"><center><br/><?=$article['price']?>&euro;</center></td>
								<td class="tableCustomTd"><center><br/><?=$article['catname']?></center></td>
								<td class="tableCustomTd"><center><br/><?=$article['subname']?></center></td>
								<td><br/><a href="<?=ROOT_PATH?>article/<?=str_replace(" ","-",$article['subname'])?>/<?=str_replace(" ","-",$article['title'])?>" <class="social-info"><span class="ti-brush"></span></a></td>
								<td><br/><a href="<?=ROOT_PATH?>edit_articles?delete=<?=$article['id']?>" onclick="return confirm('Supprimer l\'article <?=$article['title']?>?')" <class="social-info"><span class="ti-trash"></span></a></td>						
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>			
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