<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/main.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/themify-icons.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/linearicons.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/nice-select.css">
	<script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.js"></script>
	<script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/main.js"></script>
	<script src="<?=ROOT_PATH?>public/js/jquery.magnific-popup.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/jquery.sticky.js"></script>
	<?php if($title="Statistiques"):?>
	<script src="<?=ROOT_PATH?>public/js/googleChart.js"></script>
	<script src="<?=ROOT_PATH?>public/js/chartLoader.js"></script>
	<?php endif?>
	<script src="<?=ROOT_PATH?>public/js/jquery.nice-select.min.js"></script>
	<script src="<?=ROOT_PATH?>public/js/martin.js"></script>
	</head>
<?php
if(!empty($errorMessage)){
    include('error.php');
}

include 'header.php';
echo $content;
include 'footer.php'; ?>
</html>
