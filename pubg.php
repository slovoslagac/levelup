<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

$result = new cmp_results();
$allresult = $result->getMaxResultsFifa();


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
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

                <div class="ranks_competition">
                
                    <div class="ranks_header">PUBG Madness</div>
                    <?php $i = 1; foreach($allresult as $item) { ?>
                    <div class="ranks_column">
                        <div class="ranks_row">
                            <div class="ranks_rb"><?php echo $i ?></div>
                            <div class="ranks_name"><?php echo $item->home ?></div>
                            <div class="ranks_rank"><?php echo $item->hres ?></div>
                        </div>
                        <?php $i++;}?>
                    <div>
                </div>
                
			</div>

		<!-- BG -->
			<div id="pubg_bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
