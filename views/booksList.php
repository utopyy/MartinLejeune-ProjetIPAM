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
			<?php if($nbBooks['nbCom'] == 0 ):?>
				<?php if($_SESSION['userRole']==1):?>
					<h2>Vous n'avez pas encore effectue une commande.</h2>
					<h4>Pour en realiser une, merci d'ajouter des articles dans votre panier puis de confirmer celle-ci.</h4>
					</br></br></br>	
				<?php elseif($_SESSION['userRole']==2):?>
					<h2>Aucun client n'a encore effectué de commande.</h2>
					<h4>Attendez qu'une commande soit fait pour avoir accès au listing et aux statistiques.</h4>
				<?php endif?>
			<?php else:?>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Numero de commande</th>
							<?php if($_SESSION['userRole']==2):?>
							<th scope="col">Auteur</th>
							<?php endif?>
							<th scope="col">Nb articles</th>
							<th scope="col">Prix total</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($books as $book):?>
						<tr>
							<td><?=$book['noCom']?></td>
							<?php if($_SESSION['userRole']==2):?>
							<td><?=$book['nomCli']?></td>
							<?php endif?>
							<td><?=$book['nbArticle']?></td>
							<td><?=$book['priceTot']?>&euro;</td>		
							<td><a href="<?=ROOT_PATH?>booksList?idCom=<?=$book['noCom']?>">+</a></td>
						</tr>
					<?php endforeach?>
				</table>
			<?php endif?>
			</br></br></br>
		</div>
	</section>
</body>
<?php
$title = "Details commandes";
$content = ob_get_clean();
include("includes/template.php");
?>
