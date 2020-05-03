<?php ob_start() ?>
<body id="category">
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
		<div class="containerAdmin">	
			<center><h2>Listing commandes</h2></center>
			<br/><br/>		
			<?php if($nbBooks['nbCom'] == 0 ):?>
				<?php if($_SESSION['userRole']==1):?>
					<h2>Vous n'avez pas encore effectue une commande.</h2>
					<h4>Pour en realiser une, merci d'ajouter des articles dans votre panier puis de confirmer celle-ci.</h4>
					</br></br></br>	
				<?php elseif($_SESSION['userRole']==2):?>
					<h2>Aucun client n'a encore effectue de commande.</h2>
					<h4>Attendez qu'une commande soit faite pour avoir acces au listing et aux statistiques.</h4>
				<?php endif?>
			<?php else:?>
			<div class="toolbar">
				<br/>
				<table class="table divTable" id="empTable">
					<thead>
						<tr>
							<td><center>No commande</center></td>
							<?php if($_SESSION['userRole']==2):?>
							<td><center>Auteur</center></td>
							<?php endif?>
							<td><center>Nb articles</center></td>
							<td><center>Prix total</center></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($books as $book):?>
						<tr>
							<td><center><?=$book['noCom']?></td>
							<?php if($_SESSION['userRole']==2):?>
							<td><center><?=$book['nomCli']?></td>
							<?php endif?>
							<td><center><?=$book['nbArticle']?></td>
							<td><center><?=$book['priceTot']?>&euro;</td>		
							<td><center><a href="<?=ROOT_PATH?>booksList?idCom=<?=$book['noCom']?>" <class="social-info"><span class="ti-zoom-in"></span></a></td>
						</tr>
					<?php endforeach?>
				</table>
				</div>
			<?php endif?>
			</br></br></br>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#empTable').dataTable();
		});
	</script>
</body>
<?php
$title = "Details commandes";
$content = ob_get_clean();
include("includes/template.php");
?>
