<?php ob_start()?>
<body id="category">
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Magasin WayProt</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
						<a href="<?=ROOT_PATH?>shop">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Statistiques commandes</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
	<?php if($nbComs[0] == 0 ):?>
		<h2>Aucun client n'a encore effectue de commande.</h2>
		<h4>Attendez qu'une commande soit faite pour avoir acces au listing et aux statistiques.</h4>
		<br/><br/>
		<?php else:?>
		<div class="chart1"><h3>Articles les plus vendus</h3><br/>
			<!-- Graphique 1 -->
			<canvas id="myChart" width="1000" height="600"></canvas>
			<script>var ctx = document.getElementById('myChart').getContext('2d');
					var chart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: <?php echo json_encode($json); ?>,
							datasets: [{
								backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
								data: <?php echo json_encode($json2); ?>,
							}]
						},
						options: {
							legend: { display: false },
							title: {
								display: true,
								text: 'Top <?=$limit?> : Toutes categories',
							},
							scales: {
							 yAxes: [{
								 ticks: {
									 beginAtZero:true
								 }
							 }]
						 },
						 responsive: false
						}
					});
			</script>
			<br/>
			<form action="<?=ROOT_PATH?>stats" method="POST">
				<div class="form-row">
					<div class="form-group col-md-6:">
						<input type="number" step="1" min="2" max="20" class="form-control" name="nb" id="inputNb" placeholder="Nb elements" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nb elements'">
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Ok</button>
						</div>
					</div>	
				</div>
			</form>
			<hr>
		</div>
		<!-- Graphique 2 -->
		<div class="chart2">
			<h3>Ventes par categorie</h3><br/>
			<canvas id="myChart2" width="1000" height="600"></canvas>
			<script>var ctx = document.getElementById('myChart2').getContext('2d');
					var chart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: <?php echo json_encode($json3); ?>,
							datasets: [{
								backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
								data: <?php echo json_encode($json4); ?>,
							}]
						},
						options: {
							legend: { display: true },
						 responsive: false
						}
					});
			</script>
			<br/><hr>
		</div>	
		<!-- Graphique 3 -->
		<div class="chart3">
			<h3>Ventes par sous-categories</h3><br/>
			<canvas id="myChart3" width="1000" height="600"></canvas>
			<script>var ctx = document.getElementById('myChart3').getContext('2d');
					var chart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: <?php echo json_encode($json5); ?>,
							datasets: [{
								backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
								data: <?php echo json_encode($json6); ?>,
							}]
						},
						options: {
							legend: { display: true },
						 responsive: false
						}
					});
			</script>
			<br/>
		</div>
	<?php endif?>		
	</section>
</body>
<?php
$title="Commandes statistiques";
$content=ob_get_clean();
include 'includes/template.php';?>



