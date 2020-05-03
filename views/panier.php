<?php
ob_start();
?>
<body id="category">
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="<?=ROOT_PATH?>shop">Panier</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
   <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
						<?php if($nbArticles==0):?>
							<h5>Votre panier est vide!</h5>
						<?php else:?>
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Total</th>
								<th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
							<?php for($i=0;$i<$nbArticles;$i++):?>
                            <tr>
                                <td>
                                    <div class="media">
										<div class="col-lg-3 col-md-6">
											<div class="single-product">
												<img class="img-fluid" src="<?=$_SESSION['panier']['path'][$i]?>" alt="">
											</div>
										</div>
										<div class="media-body">
                                            <p><?=$_SESSION['panier']['nameId'][$i]?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?=$_SESSION['panier']['prixProduit'][$i]?>&euro;</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <h5><?=$_SESSION['panier']['qtProduit'][$i]?>x</h5>
                                    </div>
                                </td>
                                <td>
                                    <h5><?=$_SESSION['panier']['prixTotalProduit'][$i]?>&euro;</h5>
                                </td>
								<td>
								<a href="<?=ROOT_PATH?>panier?delete=1&nameArt=<?=$_SESSION['panier']['nameId'][$i]?>" class="social-info">
									<i class="fa fa-times" aria-hidden="true"></i>
								</a>
								</td>
                            </tr>
							<?php endfor;?>
                                <td> </td>
                                <td></td>
                                <td>
                                    <h5>Total commande</h5>
                                </td>
                                <td>
                                    <h5><?=$montantTotal;?>&euro;</h5>
                                </td>
								<td></td>							
                            </tr>
                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
								<td><div class="checkout_btn_inner d-flex align-items-center">
									<input type='button' class="gray_btn" value='Réinitialiser' onClick='deleteCom()'>
									<input type='button' class="primary-btn" value='Commander' onClick='validateCom()'>
									</div>
								</td>	
                            </tr>
                        </tbody>
						<?php endif?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
$title = "Panier";
$content = ob_get_clean();
include("includes/template.php");
?>