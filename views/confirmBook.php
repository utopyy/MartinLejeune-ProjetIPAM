<?php ob_start() ?>
<body>
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Commande</h1>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">	
			</br></br></br>
			<h2>Commande confirmée!</h2>
			<h4>Nous avons bien reçu votre commande et celle-ci sera traitée dans les plus brefs délais.</h4>
			<h6>Votre panier a été réinitialisé!</br>Vous pouvez cependant consulter la liste de vos commandes dans votre menu personnel ou 
			en cliquant sur <a href="<?=ROOT_PATH?>booksList">ce lien</a></h6>
			</br></br></br>					
		</div>
	</section>
</body>
<?php
$title = "Commande confirmee";
$content = ob_get_clean();
include("includes/template.php");
?>