<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?=ROOT_PATH?>public/img/f.ico" />
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/jquery.dataTables.min_.css">	
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/main.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/themify-icons.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/linearicons.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/font-awesome.min.css">

	

	<script type="text/javascript" src="<?=ROOT_PATH?>public/js/jquery-3.4.1.js"></script>
	<script src="<?=ROOT_PATH?>public/js/chartjs.js"></script>
	<script type="text/javascript" src="<?=ROOT_PATH?>public/js/jquery.dataTables.min_.js"></script>
	<script src="<?=ROOT_PATH?>public/js/jquery.magnific-popup.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/jquery.sticky.js"></script>
	<script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/martin.js"></script>
	<script src="<?=ROOT_PATH?>public/js/main.js"></script>

<?php
if(!empty($errorMessage)){
    include('error.php');
}

include 'header.php';
echo $content;
include 'footer.php'; ?>
</html>
