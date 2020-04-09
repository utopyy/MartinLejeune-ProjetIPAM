<?php ob_start() ?>
	<!-- Start Banner Area -->
	<body id="category">
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Enregistrement WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="/views/welcome.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">S'enregistrer</a>
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
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>S'enregistrer</h3>
						<form class="row login_form" action="../controllers/signup.php" method="POST" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prénom'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'">
							</div>
							<div class="col-md-12 form-group">
								<label for="birthdate">Date d'anniversaire: </label>
								<input type="date" class="form-control" id="birthdate" name="birthdate">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="mail" name="mail" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>	
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmation mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirmation mot de passe'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="form_insert" value="submit" class="primary-btn">S'enregistrer</button>
							</div>						
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
<?php
$title = "S'inscrire";
$content = ob_get_clean();
include("includes/template.php");
?>
