<?php
$connect = mysqli_connect("localhost","root","","wayprotein");
$query = "SELECT a.title AS title, COUNT(ba.item_id) AS amount FROM article AS a, book_article AS ba WHERE a.id = ba.item_id GROUP BY ba.item_id ORDER BY amount DESC LIMIT 5";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Statistiques</title>
<script src="<?=ROOT_PATH?>public/js/googleChart.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart); 
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Article', 'Amount'],
			<?php
			while($row = mysqli_fetch_array($result))
			{
				echo "['".$row["title"]."', ".$row["amount"]."],";
			}
			?>
		]);
			var options ={
				title:'Coucou'
			};
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
		}
	</script></head>
	<body>
		<!-- Bannière de page, pas dans le template c'est voulu -->
		<section class="banner-area organic-breadcrumb">
			<div class="container">
				<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
					<div class="col-first">
						<h1>Magasin WayProt</h1>
						<nav class="d-flex align-items-center">
							<a href="<?=ROOT_PATH?>">Accueil<span class="lnr lnr-arrow-right"></span></a>
							<a href="<?=ROOT_PATH?>shop">Shop<span class="lnr lnr-arrow-right"></span></a>
							<a href="#">Détail article</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div style="width:900px;">
				<h3 align="center">Graphique</h3>
				<br />
				<div id="piechart" style="width: 900px; height:500px;"></div>
	  </section>
	</body>

