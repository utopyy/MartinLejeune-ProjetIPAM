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
			<center><h2>Listing utilisateurs</h2></center>
			<br/>
			<div class="fresh-table full-color-orange">
			<div class="toolbar">
			</br>
			<table class="table divTable" id="empTable">
				<thead>
					<tr>
						<td><center>Pseudo</center></td>
						<td><center>Prenom</center></td>
						<td><center>Nom</center></td>
						<td><center>Date de naissance</center></td>
						<td><center>Rue</center></td>
						<td><center>No de Maison</center></td>
						<td><center>Code Postal</center></td>
						<td><center>Ville</center></td>
						<td><center>Pays</center></td>
						<td><center>Adresse Mail</center></td>
						<td><center>Role</center></td>
						<td><center>Date d'inscription</center></td>
						<td><center>Derniere connection</center></td>
						<td></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				<?php foreach($users as $user):?>
					<tr>
					<?php foreach($user as $row):?>
						<td class="tableCustomTd"><?=$row?></td>
					<?php endforeach?>
					<td><a href="<?=ROOT_PATH?>profil?admin=<?=$user['username']?>" <class="social-info"><span class="ti-brush"></span></a></td>
					<td><a href="<?=ROOT_PATH?>edit_users?delete=<?=$user['username']?>" onclick="return confirm('Supprimer le compte <?=$user['username']?>?');" <class="social-info"><span class="ti-trash"></span></a></td>
					</tr>
				<?php endforeach?>
			</table>
		</div>
		</div>
		</div>
		</br>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#empTable').dataTable();
		});
	</script>
</body>
<?php
$title = "Gestion membres";
$content = ob_get_clean();
include("includes/template.php");
?>
