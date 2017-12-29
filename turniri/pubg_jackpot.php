<?php
include(join(DIRECTORY_SEPARATOR, array('..','includes', 'init.php')));

$jackpot = new jackpot();
$jackpot->calculateSum();
$currentsum = $jackpot->getSum();



?>
<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Dimension by HTML5 UP</title>
		<meta http-equiv="refresh" content="30">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <style>@import url('https://fonts.googleapis.com/css?family=Montserrat');
</style>
	</head>
	<body>

		<!-- Wrapper -->
        <div id="wrapper">
            <div class="jackpot"><?php echo number_format($currentsum,0,",",".");?> Din</div>
        </div>

		<!-- BG -->
			<div id="pubg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
