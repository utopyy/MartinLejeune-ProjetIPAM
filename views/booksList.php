<?php ob_start() ?>
<body>
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Commande</h1>
						<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Mes commandes</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">	
			</br></br></br>
				<?php if($nbBooks['nbCom'] == 0):?>
					<h2>Vous n'avez pas encore effectue une commande.</h2>
					<h4>Pour en realiser une, merci d'ajouter des articles dans votre panier puis de confirmer celle-ci.</h4>
					</br></br></br>	
				<?php else:?>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Numero de commande</th>
								<th scope="col">Nb articles</th>
								<th scope="col">Prix total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($books as $book):?>
							<tr>
								<td><?=$book['noCom']?></td>
								<td><?=$book['nbArticle']?></td>
								<td><?=$book['priceTot']?>&euro;</td>		
								<td><a href="<?=ROOT_PATH?>booksList?idCom=<?=$book['noCom']?>">+</a></td>
							</tr>
						<?php endforeach?>
					</table>
		</div>	<?php endif?>
							</br></br></br>
	</section>
</body>
<?php
$title = "Details commandes";
$content = ob_get_clean();
include("includes/template.php");
?>
