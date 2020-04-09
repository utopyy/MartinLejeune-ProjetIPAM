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
						<form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="name" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>	
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="name" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">S'enregistrer</button>
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
