<?php ob_start() ?>
	<!-- Start Banner Area -->
	<body id="category">
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Connexion WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="/views/welcome.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Se connecter</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="/public/img/signup.jpg" alt="">
						<div class="hover">
							<h4>Nouveau sur le site?</h4>
							<p>Nous vous souhaitons la bienvenue, merci de vous inscrire pour pouvoir procéder à des commandes!</p>
							<a class="primary-btn" href="/views/signup.php">Créer un compte</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Connectez-vous</h3>
						<form class="row login_form" action="../controllers/login.php" method="post" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="login" name="login" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Se connecter</button>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
</body>
<?php
$title = "Se connecter";
$content = ob_get_clean();
include("includes/template.php");
?>
