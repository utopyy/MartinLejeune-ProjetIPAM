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
	<table>
	<?php foreach($users as $user):?>
		<tr>
		<?php foreach($user as $row):?>
				<th><?=$row?></th>
		<?php endforeach?>
		<th><a id="link_update_member" href="<?=ROOT_PATH?>edit_users?modify<?=$user['username']?>">Modifier</a></th>
		<th><a id="link_update_member" href="<?=ROOT_PATH?>edit_users?delete=<?=$user['username']?>">Supprimer</a></th>
		</tr>
	<?php endforeach?>
	</table>
</body>
<?php
$title = "Gestion membres";
$content = ob_get_clean();
include("includes/template.php");
?>
