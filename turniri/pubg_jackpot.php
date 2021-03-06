<?php
include(join(DIRECTORY_SEPARATOR, array('..', 'includes', 'init.php')));

$jackpot = new jackpot();
$jackpot->calculateSum();
$currentsum = $jackpot->getSum();

//$currentsum = 2000;

$tmpdate = new DateTime();
$realdate1 = new DateTime();
$realdate2 = new DateTime();
if (date_format($tmpdate, "H") > 13) {
    $realdate1->setTime(20, 54, 00);
    $realdate2->setTime(21, 05, 00);
} else {
    $realdate1->setTime(11, 54, 00);
    $realdate2->setTime(12, 05, 00);
}
if ($tmpdate > $realdate1 and $tmpdate < $realdate2 ) {
    $nextslide = 'lucky.php';
} else {
    $nextslide = '1.php';
}

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
    <meta http-equiv="refresh" content="60;<?php echo $nextslide?>" />
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ie9.css"/><![endif]-->
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css?family=Montserrat');
    </style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
    <div class="jackpot"><?php echo number_format($currentsum, 0, ",", "."); ?> Din</div>
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
