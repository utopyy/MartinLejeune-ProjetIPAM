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
						<a href="#">Gestion membres</a>
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
						<th scope="col">Pseudo</th>
						<th scope="col">Prénom</th>
						<th scope="col">Nom</th>
						<th scope="col">Date de naissance</th>
						<th scope="col">Rue</th>
						<th scope="col">No de Maison</th>
						<th scope="col">Code Postal</th>
						<th scope="col">Ville</th>
						<th scope="col">Pays</th>
						<th scope="col">Adresse Mail</th>
						<th scope="col">Role</th>
						<th scope="col">Date d'inscription</th>
						<th scope="col">Dernière connection</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($users as $user):?>
					<tr>
					<?php foreach($user as $row):?>
						<td><?=$row?></th>
					<?php endforeach?>
					<td><a href="<?=ROOT_PATH?>profil?admin=<?=$user['username']?>">Modifier</a></td>
					<td><a href="<?=ROOT_PATH?>edit_users?delete=<?=$user['username']?>" onclick="return confirm('Supprimer le compte <?=$user['username']?>?');">Supprimer</a></td>
					</tr>
				<?php endforeach?>
			</table>
		</div>
	</section>
</body>
<?php
$title = "Gestion membres";
$content = ob_get_clean();
include("includes/template.php");
?>
