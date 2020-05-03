<!-- Role 1 = User, Role  2 = Admin -->
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Traitement de la navbar pour affichage flexible (notamment sur mobile, ou redimension page) -->
				<a class="navbar-brand logo_h" href="<?=ROOT_PATH?>"><img src="<?=ROOT_PATH?>public/img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<!-- Regroupement des items de la navbar -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>">Accueil</a></li>
						<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>shop">Shop</a></li>
						<?php if(isset($_SESSION['userRole']) && $_SESSION['userRole']==1):?>
							<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>panier">Panier</a></li>
						<?php endif?>
						<?php if(isset($_SESSION['userRole']) && $_SESSION['userRole']==2):?>
							<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Administration</a>
							<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>edit/all/users">Gestion membres</a></li>
							<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>booksList">Gestion commandes</a></li>
							<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>edit/all/articles">Gestion shop</a></li>
							<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>stats">Statistiques ventes</a></li>
							</ul>
							</li>
						<?php endif?>
						<li class="nav-item submenu dropdown">
						<?php if(empty($_SESSION['id'])):?>
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Connexion</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>login">Se connecter</a></li>
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>signup">S'enregistrer</a></li>
							</ul>
							<?php else:?>
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false"><?=$_SESSION['username']?></a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>profil">Mon profil</a></li>
								<?php if($_SESSION['userRole']==1):?>
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>booksList">Mes commandes</a></li>
								<?php endif?>
								<?php if(isset($_SESSION['panier']) && count($_SESSION['panier']['nameId'])!=0):?>
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>logout" onclick="return confirm('Votre panier va être supprimé');">Se déconnecter</a></li>								
								<?php else:?>
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>logout">Se déconnecter</a></li>
								<?php endif?>
							</ul> 
						<?php endif?>						
						</li>
					</ul>
					<?php if(!empty($_SESSION['userRole']) && $_SESSION['userRole']==1):?>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="#" <class="social-info"><span class="ti-bag"></span></a></li>
					</ul>							
					<?php else:?>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="#" class="cart"><span class="ti-cup"></span></a></li>
					</ul>
					<?php endif?>
				</div>
			</div>
		</nav>
	</div>
</header>