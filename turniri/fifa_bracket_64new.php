<?php

include(join(DIRECTORY_SEPARATOR, array('..','includes', 'init.php')));

$tmpmatch = new cmp_matches();
$allmatches = $tmpmatch->getallmatchesplayer();
str_replace('č','&#269',$allmatches);
str_replace('š','&#353',$allmatches);



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
        <meta http-equiv="refresh" content="30" />
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8">
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
                    <?php for($i=0; $i< 16; $i++) { $item = $allmatches[$i];?>
                        <div class="match_64" id="<?php echo $i+1;?>" <?php echo ($i == 15) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_time_box"><?php echo $item->matchtime;?><span>#<?php echo $item->ps;?></span></div>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="left_32">
                    <?php for($i=32; $i< 40; $i++) { $item = $allmatches[$i];?>
                        <div class="match_32" id="<?php echo $i+1;?>" <?php echo ($i == 39) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="left_16">
                    <?php for($i=48; $i< 52; $i++) { $item = $allmatches[$i];?>
                        <div class="match_16" id="<?php echo $i+1;?>" <?php echo ($i == 51) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="left_8">

                    <?php for($i=56; $i< 58; $i++) { $item = $allmatches[$i];?>
                        <div class="match_8" id="<?php echo $i+1;?>" <?php echo ($i == 57) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="semi">
                    <?php for($i=60; $i< 62; $i++) { $item = $allmatches[$i];?>
                        <div class="match_4" id="<?php echo $i+1;?>" <?php echo ($i == 61) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="final">
                    <?php $i =62; $item = $allmatches[$i];?>
                        <div class="match_2" id="<?php echo $i+1;?>" <?php echo ($i == 62) ? ' style="margin-bottom:0px;"': '' ?>>
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                        </div>

                    <?php ?>
                </div>
                <div class="right_8">
                    <?php for($i=58; $i< 60; $i++) { $item = $allmatches[$i];?>
                        <div class="match_8" id="<?php echo $i+1;?>" <?php echo ($i == 59) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="right_16">
                    <?php for($i=52; $i< 56; $i++) { $item = $allmatches[$i];?>
                        <div class="match_16" id="<?php echo $i+1;?>" <?php echo ($i == 55) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="right_32">
                    <?php for($i=40; $i< 48; $i++) { $item = $allmatches[$i];?>
                        <div class="match_32" id="<?php echo $i+1;?>" <?php echo ($i == 47) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                                <div class="match_time"><?php echo $item->matchtime;?> - Playstation <span>#<?php echo $item->ps;?></span></div>
                            </div>
                        </div>

                    <?php }?>
                </div>
                <div class="right_64">
                    <?php for($i=16; $i< 32; $i++) { $item = $allmatches[$i];?>
                        <div class="match_64" id="<?php echo $i+1;?>" <?php echo ($i == 31) ? ' style="margin-bottom:0px;"': '' ?>>
                            <div class="match_time_box"><?php echo $item->matchtime;?><span>#<?php echo $item->ps;?></span></div>
                            <div class="match_name_box">
                                <div class="team"><?php echo $item->home;?></div>
                                <div class="result"><?php echo $item->homeval;?></div>
                                <div class="team"><?php echo $item->visitor;?></div>
                                <div class="result"><?php echo $item->visitorval;?></div>
                            </div>
                        </div>

                    <?php }?>
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
