<?php ob_start() ?>
	<body id="category">
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Enregistrement WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?><?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">S'enregistrer</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!--================ Box enregistrement =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="<?=ROOT_PATH?>public/img/signup.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>S'enregistrer</h3>
						<form class="row login_form" action="signup" method="POST" id="contactForm">
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
								<label for="birthdate">Date de naissance: </label>
								<input type="date" class="form-control" id="birthdate" name="birthdate">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="mail" name="mail" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="coutry" name="country" placeholder="Pays" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pays'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="city" name="city" placeholder="Ville" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ville'">
							</div>	
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="zip" name="zip" placeholder="Code Postal" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Code Postal'">
							</div>	
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="street" name="street" placeholder="Rue" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Rue'">
							</div>	
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="house_number" name="house_number" placeholder="Numéro de maison" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numéro de maison'">
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
