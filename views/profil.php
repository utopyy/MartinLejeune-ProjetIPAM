<?php ob_start()?>
<body id="category">
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="<?=ROOT_PATH?>profil">Mon profil</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section>
	<div class="container">
    <h1>Profil</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="col-sm-10"><h3><?=$user['username']?></h3></div>
		<div class="col-sm-12">Date de création: <?=$user['date_creation']?></div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          L'adresse indiquée ci-dessous sera celle de livraison de vos prochaines commandes.
        </div>
        <h3>Infos personnelles</h3>        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Prenom:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['firstname']?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nom:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['lastname']?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date de naissance:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" value="<?=$user['birthdate']?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" value="<?=$user['mail']?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Rue:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['street']?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">No de maison:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['house_number']?>">
            </div>
          </div>
		  		  <div class="form-group">
            <label class="col-lg-3 control-label">Code postal:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['zip']?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Ville:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['city']?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Pays:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['country']?>">
            </div>
			<br/>
			<h6>Si vous ne souhaitez pas changer de mot de passe, ne pas remplir les prochains champs</h6>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Nouveau mot de passe:</label>
            <div class="col-md-8">
              <input class="form-control" type="password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Confirmer le mot de passe:</label>
            <div class="col-md-8">
              <input class="form-control" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Sauvegarder">
              <span></span>
              <input type="reset" class="btn btn-default" value="Annuler">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</section>                                               
</body> 
<?php
$title="Profil";
$content=ob_get_clean();
include 'includes/template.php';
?>