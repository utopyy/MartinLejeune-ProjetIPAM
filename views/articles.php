<?php ob_start() ?>
    <div class="card-deck">
    <?php foreach($cats as $cat):?>
		  						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span
								 class="lnr lnr-arrow-right"></span><?=$cat?>
								     <?php foreach($subcats as $subcat):?>
								 <span class="number">($nbArticleCat)</span></a>
							<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
								<li class="main-nav-list child"><a href="#">$nomSUBCAT<span class="number">$nbArticlesSubCat</span></a></li>
							</ul>
						</li>
<?php endforeach?>
    <?php endforeach?>
<?php
$title="Les articles";
$content = ob_get_clean();
include 'includes/template.php';
?>
