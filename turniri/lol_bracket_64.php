<?php

include(join(DIRECTORY_SEPARATOR, array('..','includes', 'init.php')));

$tmpmatch = new cmp_matches();
$allmatches = $tmpmatch->getallmatchesteams();

?>

<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
<!--        <meta http-equiv="refresh" content="30;fifa_bracket_64.php" />-->
		<title>Dimension by HTML5 UP</title>
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
                <div class="left_64">
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                    <div class="match_64"></div>
                </div>
                <div class="left_32">
                    <?php for($i=0; $i< 8; $i++) { $item = $allmatches[$i];?>
                    <div class="match_32" id="<?php echo $i+1;?>" <?php echo ($i == 7) ? ' style="margin-bottom:0px;"': '' ?>>
                        <div class="match_name_box">
                            <div class="team"><?php echo $item->home;?></div>
                            <div class="result"><?php echo $item->homeval;?></div>
                            <div class="team"><?php echo $item->visitor;?></div>
                            <div class="result"><?php echo $item->visitorval;?></div>
                            <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                        </div>
                    </div>

                    <?php }?>
                </div>
                <div class="left_16">
                    <?php for($i=16; $i< 20; $i++) { $item = $allmatches[$i];?>
                    <div class="match_16" id="<?php echo $i+1;?>" <?php echo ($i == 19) ? ' style="margin-bottom:0px;"': '' ?>>
                        <div class="match_name_box">
                            <div class="team"><?php echo $item->home;?></div>
                            <div class="result"><?php echo $item->homeval;?></div>
                            <div class="team"><?php echo $item->visitor;?></div>
                            <div class="result"><?php echo $item->visitorval;?></div>
                            <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="left_8">
                    <?php for($i=24; $i< 26; $i++) { $item = $allmatches[$i];?>
                    <div class="match_8" id="<?php echo $i+1;?>" <?php echo ($i == 25) ? ' style="margin-bottom:0px;"': '' ?>>
                        <div class="match_name_box">
                            <div class="team"><?php echo $item->home;?></div>
                            <div class="result"><?php echo $item->homeval;?></div>
                            <div class="team"><?php echo $item->visitor;?></div>
                            <div class="result"><?php echo $item->visitorval;?></div>
                            <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="semi">
                    <?php for($i=28; $i< 30; $i++) { $item = $allmatches[$i];?>
                        <div class="match_4" id="<?php echo $i+1;?>" <?php echo ($i == 29) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="final">
                    <?php $i =30; $item = $allmatches[$i];?>
                    <div class="match_2" id="<?php echo $i+1;?>" <?php echo ($i == 30) ? ' style="margin-bottom:0px;"': '' ?>>
                        <div class="team"><?php echo $item->home;?></div>
                        <div class="result"><?php echo $item->homeval;?></div>
                        <div class="team"><?php echo $item->visitor;?></div>
                        <div class="result"><?php echo $item->visitorval;?></div>
                    </div>

                    <?php ?>
                </div>
                <div class="right_8">
                    <?php for($i=26; $i< 28; $i++) { $item = $allmatches[$i];?>
                    <div class="match_8" id="<?php echo $i+1;?>" <?php echo ($i == 27) ? ' style="margin-bottom:0px;"': '' ?>>
                        <div class="match_name_box">
                            <div class="team"><?php echo $item->home;?></div>
                            <div class="result"><?php echo $item->homeval;?></div>
                            <div class="team"><?php echo $item->visitor;?></div>
                            <div class="result"><?php echo $item->visitorval;?></div>
                            <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="right_16">
                    <?php for($i=20; $i< 24; $i++) { $item = $allmatches[$i];?>
                    <div class="match_16" id="<?php echo $i+1;?>" <?php echo ($i == 23) ? ' style="margin-bottom:0px;"': '' ?>>
                        <div class="match_name_box">
                            <div class="team"><?php echo $item->home;?></div>
                            <div class="result"><?php echo $item->homeval;?></div>
                            <div class="team"><?php echo $item->visitor;?></div>
                            <div class="result"><?php echo $item->visitorval;?></div>
                            <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="right_32">
                    <?php for($i=8; $i< 16; $i++) { $item = $allmatches[$i];?>
                        <div class="match_32" id="<?php echo $i+1;?>" <?php echo ($i == 15) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - <span><?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="right_64">
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                    <div class="match_64r"></div>
                </div>
                <div class="fifa_logo"></div>
                <div class="tournament_id">Turnir 1/15</div>
                <div class="prizes"></div>
                
                
			</div>

		<!-- BG -->
			<div id="fifa"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
