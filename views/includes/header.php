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
						<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>logout">Contact</a></li>
						<li class="nav-item submenu dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Connexion</a>
						<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>login">Se connecter</a></li>
								<li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>signup">S'enregistrer</a></li>
						</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>