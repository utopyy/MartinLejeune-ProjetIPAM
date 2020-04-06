<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/main.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/themify-icons.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/linearicons.css">
	<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/font-awesome.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/main.js"></script>
	<script src="public/js/jquery.magnific-popup.min.js"></script>
	<script src="public/js/jquery.sticky.js"></script>
	<script src="public/js/jquery.nice-select.min.js"></script>
</head>

<body>

	<!-- Start Header Area -->
	<?php include 'header.php'?>
	<!-- End Header Area -->
	<?php echo $content; ?>
	<!-- start footer Area -->
	<?php include 'footer.php'?>
	<!-- End footer Area -->
</body>

</html>