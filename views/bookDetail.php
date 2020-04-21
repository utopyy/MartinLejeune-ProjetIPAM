<?php ob_start(); ?>

<body id="category">
	<!-- Bannière de page, pas dans le template c'est voulu -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="<?=ROOT_PATH?>shop">Detail commande</a>
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
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($book as $row):?>
                            <tr>
                                <td>
                                    <div class="media">
									<div class="col-lg-3 col-md-6">
                                        <div class="single-product">
                                            <img class="img-fluid" src="<?=$row['path']?>" alt="">
                                        </div>
										</div>
                                        <div class="media-body">
                                            <p><?=$row['title']?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?=$row['price']?>&euro;</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <h5><?=$row['qtProduit']?>x</h5>
                                    </div>
                                </td>
                                <td>
                                    <h5><?=$row['total']?>&euro;</h5>
                                </td>
                            </tr>
							<?php endforeach?>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Total commande</h5>
                                </td>
                                <td>
                                    <h5><?=$priceTot['total']?>&euro;</h5>
                                </td>
								<td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
$title = "Detail commande";
$content = ob_get_clean();
include("includes/template.php");
?>