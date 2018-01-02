<?php
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
if ($tmpdate > $realdate1 and $tmpdate < $realdate2) {
    $nextslide = 'lucky.php';
} else {
    $nextslide = 'pubg_jackpot.php';
}
?>
<! DOCTYPE>
<html>
<head>
    <title>Dimension by HTML5 UP</title>
    <meta http-equiv="refresh" content="60;<?php echo $nextslide ?>"/>
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

</body>
</html>